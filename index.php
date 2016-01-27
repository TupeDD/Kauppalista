<!DOCTYPE html>
<html>
<head>
  <style>

  li {
    color: #00FF00;
  
    text-transform: capitalize;
    font-family: sans-serif;
    padding-bottom: 5px;
  }

  h1 {
    font-size: 40px;
    font-family: monospace;
    color: #00FF00;
  }

  div.site {
    background-color: black;
    position: absolute;
    width: 260px;
    height: 420px;
    text-align: center;


    border: 2px solid black;
    padding: 20px;
    overflow-y: scroll;
  }

  #footer {
    position:absolute;bottom:0px;
    background-color:white;
    width:100%;
    text-align:center
  }

  .otettu, .otettu a {
    color: #999;
  }
  a {
    color: #00FF00; text-decoration: none;
  }

  </style>
</head>
<body>
<div class="site">

<?php
$lista = simplexml_load_file('lista.xml');
echo "<h1>$lista->nimi</h1>";
?>

<form autocomplete="off" method="get" action="add.php">
  <input type="text" style="text-transform: capitalize;" name="tuote" placeholder="Give product" />
  <input type="submit" style="font-size: 16px; color: #00FF00; background-color: black;" value="Add" />
</form><br>

<form method="get" action="delAll.php">
  <input type="submit" style="font-size: 16px; color: #00FF00; background-color: black;" value="Delete all" />
</form><br>

<?php
$lista = simplexml_load_file('lista.xml');

$n = 0;
echo '<ul>';
foreach ($lista->tuotteet->children() as $asia) {

  if ($asia["otettu"] == 'on') {
    $luokka = ' class="otettu" ';
  } else {
     $luokka = '';
  }

  echo "<li $luokka>
          <a href=\"check.php?n=".$n."\">$asia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <a href=\"del.php?n=".$n++."\">(Poista)</a>
        </li>";

}
echo '</ul>';
?>

</div>

<div id="footer">
       &copy; All rights reserved 2016 TupeDD&trade;
</div>

</body>
</html>
