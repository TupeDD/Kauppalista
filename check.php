<?php
$x = intval($_GET["n"]);

$lista = simplexml_load_file('lista.xml');

$tuotteet = $lista->tuotteet;

if ($tuotteet->tuote[$x]["otettu"]  == "ei") {
  $tuotteet->tuote[$x]["otettu"] = "on";
} else {
  $tuotteet->tuote[$x]["otettu"] = "ei";
}

$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($lista->asXML());
$dom->save("lista.xml");

header("Location: index.php");
