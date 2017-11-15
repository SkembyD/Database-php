----- exemple 1 ----- //Exemple classique
<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Exécute une requête sur la base de données
$query = "SELECT * FROM `animals`";
$result = mysqli_query($link, $query);

// Lit une ligne de résultat MySQL dans un tableau associatif
$array = mysqli_fetch_assoc($result);
echo '[' . $array["id"] . ']' . $array["race"] . '<br>';

----- exemple 2 ----- //Exemple de connexion
<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseigné par l'utilisateur
$email= "stephane.ferey@gmail.com";
$passwd= md5("0000");

//Création de la query
$query = "SELECT `id` FROM `users`
          WHERE `email` = $email AND `password` = $passwd
          LIMIT 1;";

//Envoie de la query à mysql
$result = mysqli_query($link, $query);

//Transfert des données dans un tableau associatif
// par rapport aux colonnes de la query
$array = mysqli_fetch_assoc($result);

//Stockage en SESSION
session_start();
$_SESSION['user'] = $array['id'];


var_dump('Identifiant utilisateur :', $_SESSION['user']);


---- exemple 3 ---- //Inscription en BDD d'un utilisateur
<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseigné par l'utilisateur
$email= "stephane.ferey@gmail.com";
$passwd= md5("0000");

//Création de la query
$query = "INSERT INTO `users` (`id`, `email`, `password`)
          VALUES (NULL, $email, $passwd)";

// Envoie de la query ) MySQL
$result = mysqli_query($link, $query);

if($result == true){
  echo "Inscription réussie";
  //Retourne l'identifiant automatique généré
  // par la denière requête
  $id = mysqli_insert_id();
  echo "<br>Enregistrement effectué à l'identifiant : ". $id;
}

---- exemple 4 ----
<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Création de la query
$query= "SELECT `id`, `email`, `password` FROM `users`;";

//Envoie de la query à mysql
$result = mysqli_query($link, $query);

$rows = [];
$numsRows = mysqli_fetch_num_rows($result);
for ($i=0; $i < $numsRows; $i++) {
  $rows[] = mysqli_fetch_assoc($result);
}

foreach ($rows as $row) {
  echo "#" . $row['id'] . " email:" . $row['email'] . " ";
  echo "Hash : " . $row['passwd'] . "<br>";
}
---- exemple 5 --------

<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseigné par l'utilisateur
$id = '25';

//Création de la query
$query = "SELECT `id`, `email`
          FROM `users`
          WHERE `id` = '$id'
          LIMIT 1;"

//Envoie de la query à MySQL
$result = mysqli_query($link, $query);

//Récupération des résultats
$array = mysqli_fetch_assoc($result);

echo "#" . $array['id'] . "Users : " . $array['email'] . "<br>";

$query = "UPDATE `users` SET `email` = ? WHERE `id` = ?";

/* Crée une requête préparée */
$stmt = mysqli_prepare($link, $query);

/* Lecture des marqueurs */
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_bind_param($stmt, "i", $id);

/* Exécution de la requête */
$result = mysqli_stmt_execute($stmt);

if($result == true) {
  echo "Mise à jour réussie";
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ----- Exemple 6 --------
<?php
  //Ouvre une connexion à un serveur MySQL
  $host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
  $link = mysqli_connect($host, $user, $passwd, $dbname);

  //Information renseigné par l'utilisateur POST
  $where = 'gmail';

  $_where = '%' . $where . '%';

  //Création de la query
  $query = "SELECT * FROM `users` WHERE `email` LIKE ?";

  /* Crée une requête préparée */
  $stmt = mysqli_prepare($link, $query);
  mysqli_stmt_bind_param($stmt, "s", $_where);
  mysqli_stmt_execute($stmt);

  /* Association des variables de résultats */
  mysqli_stmt_bind_result($stmt, $id, $email, $password);

  /* Lecture des valeurs */
  while(mysqli_stmt_fetch($stmt) == true) {
    echo "#" . $id . " email : " . $email . "<br>";
  }
