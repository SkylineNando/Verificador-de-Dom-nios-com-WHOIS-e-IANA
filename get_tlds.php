<?php
// URL do arquivo oficial de TLDs da IANA
$url = "https://data.iana.org/TLD/tlds-alpha-by-domain.txt";

// Baixa o arquivo de TLDs
$tlds = file($url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Remove comentários e converte para minúsculas
$tlds = array_map('strtolower', array_filter($tlds, function($line) {
    return strpos($line, "#") !== 0; // Ignora linhas de comentário
}));

// Salva as extensões em um arquivo local
file_put_contents('tlds.json', json_encode($tlds, JSON_PRETTY_PRINT));

echo "Lista de TLDs salva em tlds.json\n";
