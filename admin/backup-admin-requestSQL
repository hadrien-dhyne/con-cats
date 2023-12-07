<?php
include('admin-connectdb.php');

function insertdata($name, $firstname, $birthdate, $email, $username, $password)
{
global $db;

$sqlUser = "INSERT INTO user (username, password) VALUES (:user, :password)";

$stmtUser = $db->prepare($sqlUser);

$stmtUser->bindParam(':user', $username, PDO::PARAM_STR);
$stmtUser->bindParam(':password', $password, PDO::PARAM_STR);

try {
    $stmtUser->execute();
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured";
  }
  $sqlLastUser = "SELECT id FROM user WHERE username = :user LIMIT 1";
  $stmtLastUser = $db->prepare($sqlLastUser);
  $stmtLastUser->bindParam(':user', $username, PDO::PARAM_STR);

  try {
    $stmtLastUser->execute();
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured";
  }
  $id = $stmtLastUser->fetchColumn();
  $birthdateSQL = date('Y-m-d', strtotime($birthdate));
  
  $sqlUserData = "INSERT INTO contacts (user_id, phone_number, namec, firstnamec, emailc) VALUES (:nom, :prenom, :fonction, :dateDeNaissance, :id)";
  $stmtUserData = $bdd->prepare($sqlUserData);
  $stmtUserData->bindParam(':namec', $namec, PDO::PARAM_STR);
  $stmtUserData->bindParam(':firstnamec', $firstnamec, PDO::PARAM_STR);
  $stmtUserData->bindParam(':user_id', $user_id, PDO::PARAM_STR);
  $stmtUserData->bindParam(':phone_number', $dateDeNaissanceSQL, PDO::PARAM_STR);
  $stmtUserData->bindParam(':emailc', $emailc, PDO::PARAM_INT);
  try {
    $stmtUserData->execute();
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured.";
  }
  $message = "The user has been successfully registered.";
  return $message;
}
//Fonction qui vérifie la connexion de l'utilisateur
function connexionUser($username, $password)
{
  // Récupération de la variable global (connexion bdd)
  global $db;

  // Requête SQL pour vérifier les informations de l'utilisateur
  $sqlUserConnexion = "SELECT u.id, u.username, u.password, c.namec, c.firstnamec FROM user as u JOIN userdata as ud WHERE u.username = :username AND u.id = c.user_id";
  $stmtUserConnexion = $db->prepare($sqlUserConnexion);
  $stmtUserConnexion->bindParam(':username', $username, PDO::PARAM_STR);
  $stmtUserConnexion->execute();

  $datas = $stmtUserConnexion->fetch(PDO::FETCH_ASSOC);
 // var_dump($donnees);exit;
  // Vérifie si l'utilisateur existe et si le mot de passe correspond
  if ($datas && (md5($password) == $datas['password'])) {
    // Les informations d'identification sont correctes, connectez l'utilisateur
    session_start(); // Démarre une session 
    $_SESSION['data'] = null;
    $_SESSION['user_id'] = null;
    $_SESSION['user_id'] = $datas['id']; // Stocke l'ID de l'utilisateur en session 
    $_SESSION['data'] = ['name' => $datas['name'], 'firstname' => $datas['firstname']];
    return true; // L'utilisateur est connecté
  } else {
    return false; // Informations d'identification incorrectes
  }
}

//Fonction qui affiche tous les utilisateurs
function allUsers()
{
  global $db;
  $sqlAllUser = "SELECT * FROM user AS u JOIN contacts AS c WHERE u.id = c.user";
  $stmtsqlAllUser = $bdd->prepare($sqlAllUser);
  try {
    $stmtsqlAllUser->execute();
    // On recupère les utilisateurs
    $donnees = $stmtsqlAllUser->fetchAll();
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured.";
  }

  return $datas;
}

//Recupère les informations d'un seul utilisateur
function userID($id)
{
  global $db;
  $sqlUser = "SELECT * FROM user AS u JOIN contats as c WHERE u.id = :id AND c.user = :id";
  //var_dump($id);
  $stmtsqlUser = $db->prepare($sqlUser);
  $stmtsqlUser->bindParam(':id', $id, PDO::PARAM_STR);
  //var_dump($stmtsqlUser);exit;
  try {
    $stmtsqlUser->execute();
    // On recupère les utilisateurs
    $donnees = $stmtsqlUser->fetch();
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured";
  }
  return $datas;
}

function userUpdate($id, $name, $firstname, $birthdate, $email, $username, $password)
{
  $message = null;
  global $db;
  //prépare la date pour le format SQL
  $birthdateSQL = date('Y-m-d', strtotime($birthdate));
  //Requetes update par table
  $sqlUserUpdate = "UPDATE user SET username = :username, password = :password where id = :id";
  $stmtUserUpdate = $bdd->prepare($sqlUserUpdate);
  $stmtUserUpdate->bindParam(':id', $id, PDO::PARAM_STR);
  $stmtUserUpdate->bindParam(':username', $username, PDO::PARAM_STR);
  $stmtUserUpdate->bindParam(':password', $password, PDO::PARAM_STR);
  try {
    $stmtUserUpdate->execute();
    $message = "The user has been succesfully edited.";
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured.";
  }
  $sqlContactsUpdate = "UPDATE contacts SET namec = :namec, firstnamec = :firstnamec, emailc = :emailc, phone_number = :phone_number WHERE user = :id";
  $stmtContactsUpdate = $bdd->prepare($sqlContactsUpdate);
  $stmtContactsUpdate->bindParam(':id', $id, PDO::PARAM_STR);
  $stmtContactsUpdate->bindParam(':namec', $namec, PDO::PARAM_STR);
  $stmtContactsUpdate->bindParam(':firstnamec', $firstnamec, PDO::PARAM_STR);
  $stmtContactsUpdate->bindParam(':emailc', $emailc, PDO::PARAM_STR);
  $stmtContactsUpdate->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
  try {
    $stmtContactsUpdate->execute();
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured.";
  }
  return $message;
}

function userDelete($id)
{
  global $db;
  $sqlContactsDelete = "DELETE FROM contatcs WHERE user = :id";
  $stmtContactsDelete = $db->prepare($sqlContactsDelete);
  $stmtContactsDelete->bindParam(":id", $id, PDO::PARAM_STR);
  try {
    $stmtContactsDelete->execute();
    $message = "The user has been deleted.";
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured.";
  }
  $sqlUserDelete = "DELETE FROM user WHERE id = :id";
  $stmtUserDelete = $db->prepare($sqlUserDelete);
  $stmtUserDelete->bindParam(":id", $id, PDO::PARAM_STR);
  try {
    $stmtUserDelete->execute();
  } catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $message = "Oops, an error occured.";
  }
  return $message;
}