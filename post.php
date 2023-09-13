<?php

require_once 'Database.php';
$id = $_GET['id'];
$game = Database::getInstance()->getGame($id);

$comments = Database::getInstance()->getAllCommentsForGame($id);

if (isset($_POST['insert-comment'])) {

  $username = $_POST['username'];
  $content = $_POST['content'];

  $errors = array();

  if (empty($username)) {
    $errors['username'] = '<br><label class="error">Please Confirm Password.</label><br>';
  }

  if (empty($content)) {
    $errors['content'] = '<br><label class="error">Please Confirm Password.</label></br>';
  }

  if (count($errors) == 0) {
    $data = array(
      "username" => $username,
      "content" => $content,
      "game_id" => $id,
    );

    if (Database::getInstance()->insertComment($data)) {
      header("Location: post.php?id=$id");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="ikonica.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O proizvodu</title>
  <link rel="stylesheet" href="post.css">
  <style>
     #home {
      font-size: 30px;
      padding: 10px;
      font-family: sans-serif;
      color: white;
      border-radius: 15px;
      background-color: rgb(139, 69, 19);
      text-decoration: none;
      border-style: none;
      cursor: pointer;
    }

    #upperleft {
      position: absolute;
      top: 0;
      left: 0;
      padding: 17px;
    }

    body{
      background-image: url('komppozadinaB1.jpg');
    }
    </style>
</head>

<body>
  <img src="<?php echo $game['img']; ?>" alt="Nema slike">
  <p style="color:rgb(120,56,10);">Korisnik: <?php echo $game['username']; ?></p><br>
  <p style="color:rgb(120,56,10);">Naziv: <b> <?php echo $game['title']; ?> </b> </p><br>
  <p style="color:rgb(120,56,10);">Uzrast: <?php echo $game['gender']; ?></p><br>
  <p style="color:rgb(120,56,10);">Cena: $<?php echo $game['price']; ?></p><br>
  <br><br><br>

  <div class="Komentari:">
    <h1 style="color:rgb(120,56,10);">Komentari</h1>
    <?php echo sizeof($comments) == 0 ? "No comments" : ""; ?>
    <?php foreach ($comments as $comment) : ?>
      <div class="comment">
        <p><b>Korisnik</b> <?php echo $comment['username']; ?>:       <?php echo $comment['content']; ?></t></p>
        <p></p>
      </div>
    <?php endforeach; ?>
  </div>
      <br><br><br><br><br><br>
  <div class="commentForm">
    <form method="POST">
      <h3 style="color:rgb(120,56,10);">Dodajte Vaš komentar</h3>
      <label style="color:rgb(120,56,10);" for="username">Korisnik:</label><br>
      <input name="username" type="text" id="username">
      <br><br>
      <label style="color:rgb(120,56,10);" for="specimen">Komentar:</label><br>
      <input name="content" type="text" id="specimen">
      <br><br>
      <input style="background-color:rgb(120,56,10); color:rgb(238,232,170)" name="insert-comment" type="submit" value="Potvrdi">
    </form>
  </div>


  <br><br><br>
  <div id="upperleft">
    <a href="index.php" id="home" style="background-color:rgb(210, 158, 0)">Početna</a>
  </div>

</body>

</html>