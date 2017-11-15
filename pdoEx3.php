---- exemple 3 ---- //Inscription en BDD d'un utilisateur
<?php

//Ouvre une connexion à un serveur MySQL dans l'objet PDO
$dsn = "mysql:dbname=dwm8;host=127.0.0.1;charset=UTF8";
$username = "root";
$password = "0000";
$pdo = new PDO($dsn, $username, $password);

//Information renseigné par l'utilisateur, formulaire de connexion
$email= "ferey@gmail.com";
$passwd= md5("0000");

//Création de la query
$query = "INSERT INTO `users` (`id`, `email`, `password`)
          VALUES (NULL, '$email', '$passwd')";

$result = $pdo->query($query);

if($result == true) {
  echo "Inscription réussi<br>";
  //Retourne l'identifiant automatiquement généré
  //par la dernière requête
  $id = $pdo->lastInsertId();
  echo "Enregistrement effectué à l'identifiant : " . $id;
}
