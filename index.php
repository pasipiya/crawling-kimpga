<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector;

try {
    $client = new Client([
        'timeout'   => 10,
        'verify'    => false
    ]);

    $response = $client->get('https://kimpga.com/');
    $htmlString = (string) $response->getBody();
    //echo $htmlString;
    //add this line to suppress any warnings
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML($htmlString);
    print_r ($doc);
    $xpath = new DOMXPath($doc);

} catch ( Exception $e ) {
    echo $e->getMessage();
}
?>