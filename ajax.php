<?php


if (!isset($_POST)) {
  exit;
}


require_once 'Database.php';
$games = Database::getInstance()->getAllGames();

if (isset($_POST['sortType'])) {
  $sortType = $_POST['sortType'];
  $games = Database::getInstance()->getAllGamesSorted($sortType);

  echo json_encode($games);
  
  exit;
}

if (isset($_POST['searchText'])) {
  $searchText = $_POST['searchText'];
  $games = Database::getInstance()->searchGames($searchText);

  echo json_encode($games);
  
  exit;
}