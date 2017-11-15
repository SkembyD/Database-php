<?php

$dsn = "mysql:dbname=dwm8;host=127.0.0.1;charset=UTF8";
$username = "root";
$password = "0000";
$pdo = new PDO($dsn, $username, $password);

//Création de la query
$query= "SELECT `id`, `Name`, `Sexe`, `Birthday`
         FROM `bootstrap`
         ORDER BY `birthday` DESC;";

//Envoie de la query à mysql
$results = $pdo->query($query);
echo "<table class="."table table-striped table-hover table-bordered".">";
echo "<thead class="."thead-dark".">";
echo "<tr>";
echo   "<th>#</th>";
echo   "<th>Name</th>";
echo   "<th>Sexe</th>";
echo   "<th>Birthday</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
foreach ($results as $row) {
  echo "<tr>";
  echo "<td>".$row['id']."</td>";
  echo "<td>".$row['Name']."</td>";
  echo "<td>".$row['Sexe']."</td>";
  echo "<td>".$row['Birthday']."</td>";
  echo "</tr>";
  };

  echo "</tbody>";
  echo "</table>";
