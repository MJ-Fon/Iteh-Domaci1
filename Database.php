<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

class Database {
  private $host = "localhost"; // Host
  private $db_name = "games"; // DB Name
  private $username = "root"; // DB Username
  private $password = ""; // DB Password

  private static $instance = null; // Instanca klase
  public $connection = null; // Konekcija

  private function __construct() {
    $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
  }

  public function getConnection() {
    return $this->connection;
  }

  public static function getInstance() {
    if (!isset(self::$instance)) {
      self::$instance = new Database();
    }

    return self::$instance;
  }

  public function insertGame($props) {
    $props = (object) $props;
    
    $query = "INSERT INTO game (username, title, gender, price, img) VALUES ('$props->username', '$props->title', '$props->gender', $props->price, '$props->img')";
    $result = mysqli_query($this->getConnection(), $query) or die(mysqli_error($this->getConnection()));


    if ($result) {
      return true;
    }

    return false;
  }

  public function getAllGames() {
    $query = "SELECT * FROM game";
    $result = mysqli_query($this->getConnection(), $query);
    $games = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $games;
  }

  public function getAllGamesSorted($sortType) {
    $query = "SELECT * FROM game ORDER BY $sortType";
    $result = mysqli_query($this->getConnection(), $query);
    $games = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $games;
  }

  public function searchGames($searchText) {
    $query = "SELECT * FROM game WHERE title LIKE '%$searchText%'";
    $result = mysqli_query($this->getConnection(), $query);
    $games = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $games;
  }

  public function getGame($id) {
    $query = "SELECT * FROM game WHERE id = $id";
    $result = mysqli_query($this->getConnection(), $query);
    $game = $result->fetch_assoc();

    return $game;
  }

  public function updateGame($props, $id) {
    $props = (object) $props;
    $query = "UPDATE game SET title = '$props->title', gender = '$props->gender', price = $props->price, img = '$props->img' WHERE id = $id LIMIT 1";
    $result = mysqli_query($this->getConnection(), $query) or die(mysqli_error($this->getConnection()));

    return $result;
  }

  public function deleteGame($id) {
    $query = "DELETE FROM game WHERE id = $id LIMIT 1";
    $result = mysqli_query($this->getConnection(), $query);

    return $result;
  }

  public function insertComment($props) {
    $props = (object) $props;
    $query = "INSERT INTO comment (username, content, game_id) VALUES ('$props->username', '$props->content', '$props->game_id')";
    $result = mysqli_query($this->getConnection(), $query) or die(mysqli_error($this->getConnection()));

    if ($result) {
      return true;
    }

    return false;
  }

  public function getAllComments() {
    $query = "SELECT c.*, m.title FROM comment c JOIN game m ON m.id = c.game_id";
    $result = mysqli_query($this->getConnection(), $query);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $comments;
  }

  public function getAllCommentsForGame($id) {
    $query = "SELECT * FROM comment WHERE game_id = $id";
    $result = mysqli_query($this->getConnection(), $query);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $comments;
  }
}
