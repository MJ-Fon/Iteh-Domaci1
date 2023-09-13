<?php

require_once 'Database.php';

$isAlex = $_GET['un'] && $_GET['un'] == 'alex';
$isMarija = $_GET['un'] && $_GET['un'] == 'marija';
$isPera = $_GET['un'] && $_GET['un'] == 'pera';
$isAdmin = $_GET['un'] && $_GET['un'] == 'admin';

if (!$isMarija && !$isAlex && !$isPera && !$isAdmin) {
  header("Location: index.php");
}

$username = $_GET['un'];

if (isset($_POST['insert'])) {
  $title = $_POST['title'];
  $gender = $_POST['gender'];
  $price = $_POST['price'];
  $img = $_POST['img'];

  $errors = array();

  if (empty($title)) {
    $errors['title'] = '<br><label class="error">Unesite naziv.</label><br>';
  }

  if (empty($gender)) {
    $errors['gender'] = '<br><label class="error">Unesite pol.</label></br>';
  }

  if (empty($price)) {
    $errors['price'] = '<br><label class="error">Unesite cenu.</label></br>';
  }

  if (empty($img)) {
    $errors['img'] = '<br><label class="error">Unesite link slike.</label></br>';
  }

  if (count($errors) == 0) {
    $data = array(
      "username" => $username,
      "title" => $title,
      "gender" => $gender,
      "price" => $price,
      "img" => $img,
    );

    if(Database::getInstance()->insertGame($data)){
      header("Location: table.php");
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
  <title>Dodavanje</title>
  <style>
    .error {
      color: red;
    }
    .gameForm{
      text-align:center;
    }
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
      background-image: url('komppozadinaB.jpg');
    }
  </style>
</head>

<body style="background-color:rgb(238,232,170)">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <h2 style="color:rgb(120,56,10);text-align:center">Unesite karakteristike igrice koji želite da dodate: <br><br>
    </h2>
  <div class="gameForm">
    <form method="POST">
      
      <label for="username">Korisnik:</label><br>
      <input name="username" type="text" id="username" disabled value="<?php echo $username; ?>">
      <br>
      <label for="specimen">Naziv:</label><br>
      <input name="title" type="text" id="specimen">
      <?php echo $errors['title'] ?? ""; ?>
      <br>
      <label for="gender">Uzrast:</label><br>
      <input name="gender" type="text" id="gender">
      <?php echo $errors['gender'] ?? ""; ?>
      <br>
      <label for="price">Cena:</label><br>
      <input name="price" type="number" id="price">
      <?php echo $errors['price'] ?? ""; ?>
      <br>
      <label for="img">Slika:</label><br>
      <input name="img" type="text" id="img">
      <?php echo $errors['img'] ?? ""; ?>
      <br><br>
      <input style="background-color:rgb(120,56,10); color:rgb(238,232,170)" type="submit" name="insert" value="Dodaj">
    </form>
  </div>

  <br><br><br>
  <div id="upperleft">
    <a href="index.php" id="home" style="background-color:rgb(210, 158, 0)">Početna</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>