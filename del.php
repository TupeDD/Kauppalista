<?php

$x = intval($_GET["n"]);
$lista = simplexml_load_file('lista.xml');
unset($lista->tuotteet->tuote[$x]);

$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($lista->asXML());
$dom->save("lista.xml");

header("Location: index.php");
