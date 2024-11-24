<?php
$palavras = ["up", "links", "link", "bit", "short", "bio", "qrcode"];

function getWhoisServer($tld) {
    $url = "https://www.iana.org/domains/root/db/{$tld}.html";
    $html = @file_get_contents($url);

    if (!$html) {
        return null;
    }

    preg_match('/<b>WHOIS Server:<\/b>\s*([\w.-]+)/i', $html, $matches);

    return $matches[1] ?? null;
}

function verificarWhois($dominio, $servidorWhois) {
    $porta = 43;
    $conexao = fsockopen($servidorWhois, $porta);

    if (!$conexao) {
        return false;
    }

    fwrite($conexao, $dominio . "\r\n");
    $resposta = "";
    while (!feof($conexao)) {
        $resposta .= fgets($conexao, 128);
    }
    fclose($conexao);

    return strpos($resposta, "No match") !== false || strpos($resposta, "not found") !== false;
}

$tlds = file("https://data.iana.org/TLD/tlds-alpha-by-domain.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$tlds = array_map('strtolower', array_filter($tlds, function($line) { return strpos($line, "#") !== 0; }));

foreach ($palavras as $palavra) {
    foreach ($tlds as $tld) {
        $servidorWhois = getWhoisServer($tld);
        if (!$servidorWhois) continue;

        $dominio = $palavra . "." . $tld;
        if (verificarWhois($dominio, $servidorWhois)) {
            echo "data: $dominio\n\n";
            ob_flush();
            flush();
        }
    }
}
?>