<?php

header('Connection: Keep-Alive');
header('Keep-Alive: timeout=5, max=98');
header('Content-Type: application/pdf');
header('Acces-Control-Allow-Method: GET');
header('Accept-Ranges: bytes');
header('Date: ' . gmdate('D, d M Y H:m:s', time()) . ' GMT');
header('X-Frame-Options: SAMEORIGIN');

$url = $_GET['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);
$size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

header('Content-Length: ' . $size);

$sock = fopen($url, 'r');

while (!feof($sock)) {
	echo fread($sock, 1024);
}

fclose($sock);
