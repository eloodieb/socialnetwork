<?php
include_once "PDO.php";

function GetOneUserFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user WHERE id = $id");
  return $response->fetch();
}

function GetAllUsers()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user ORDER BY nickname ASC");
  return $response->fetchAll();
}

function GetUserIdFromUserAndPassword($username, $password)
{
  global $PDO;
  $response = $PDO->query("SELECT id FROM user WHERE nickname = '$username' AND password = '$password'");
  $result = $response->fetchAll();
  $nbUsersWithPwdAndNickname = count($result);
  if ($nbUsersWithPwdAndNickname == 1) {
    $connectingUser = $result[0];
    return $connectingUser['id']; //on peut écrire $result[0]['id']
  } else {
    return -1;
  }
}
