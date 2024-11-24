<?php
// Carrega a lista de TLDs
$tlds = json_decode(file_get_contents('tlds.json'), true);

// Função para obter o servidor WHOIS de um TLD
function getWhoisServer($tld) {
    $url = "https://www.iana.org/domains/root/db/{$tld}.html";
    $html = file_get_contents($url);

    // Extrai o servidor WHOIS usando expressões regulares
    preg_match('/<b>WHOIS Server:<\/b>\s*([\w.-]+)/i', $html, $matches);

    return $matches[1] ?? null;
}

// Obtém os servidores WHOIS de todos os TLDs
$whoisServers = [];
foreach ($tlds as $tld) {
    $server = getWhoisServer($tld);
    if ($server) {
        $whoisServers[$tld] = $server;
    }
}

// Salva o mapeamento em um arquivo JSON
file_put_contents('whois_servers.json', json_encode($whoisServers, JSON_PRETTY_PRINT));

echo "Servidores WHOIS salvos em whois_servers.json\n";
