<?php

require_once 'Database.php';
$games = Database::getInstance()->getAllGames();

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="ikonica.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Svet video igara</title>
  <link rel="stylesheet" href="style.css">
  <script defear src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
  
  <style>
  body{
      background-image: url('komppozadinaB1.jpg');
    }
    </style>
</head>

<body>
	<header>
 
  <nav >
    <img src="naslov1.png" alt="title" id="n">
    <ul>
      <li><a href="table.php" id="t" style="background-color:rgb(210, 158, 0)">Izbrisi |Izmeni| Komentari</a></li>
      <!--Ko dodaje  -->
      <li><a href="insert.php?un=admin" id="pr" style="background-color:rgb(210, 158, 0)">Dodaj igricu</a> </li>
      <!--<li> <a href="cv.html" id="cv">O nama</a></li>-->
    </ul>
  </nav>
  <label for="nav-toggle" class="nav-toggle-label">
    <span></span>
  </label>
</header>

  <div id="title">
    <img src="dobrodosli1.png" alt="title" id="motw">
    <h3>Recenzija video igara? Check. Prodavnica? Check. Saveti za sledeci game naslov? Check.</h3>
  </div>

    <br>
    <h3 style="color:rgb(120,56,10); margin-left: 5px" >Pretraži: <input type="text" class="searchInput"></h3>
    <h3 style="color:rgb(120,56,10); margin-left: 5px">Sortiraj po: <span class="nameSort">Naziv</span> | <span class="priceSort">Cena</span></h3> <br>
    <br>
    
  
    <br><br><br>
    <div class="allProducts">

      <?php foreach ($games as $game) : ?>
        <div class="product">
          <a href="post.php?id=<?php echo $game['id']; ?>"><img class="game-image" src="<?php echo $game['img']; ?>" alt="Nema slike"></a>
          <p><br>Korisnik: <?php echo $game['username']; ?></p><br>
          <p>Naziv: <?php echo $game['title']; ?></p><br>
          <p>Uzrast: <?php echo $game['gender']; ?></p><br>
          <p>Cena: $<?php echo $game['price']; ?></p><br>
          <br><br><br>
        </div>
      <?php endforeach; ?>

    </div>

    <p style="color:rgb(120,56,10);font-size:20px"><strong>Zašto mi?</strong></p>
    <p align ="justify"> Dobrodošli na naš sajt za video igre - tvoj izvor za najbolje igre koje odgovaraju svim uzrastima!</p>
    <p align ="justify">

Naša stranica je posebno osmišljena kako bismo vam pomogli da pronađete savršene video igre za sebe i svoju porodicu. Razumemo koliko je važno da roditelji budu sigurni da igre koje njihova deca igraju odgovaraju njihovom uzrastu i vrednostima. Zato smo se potrudili da naš sajt sadrži sledeće ključne elemente:</p>
    <p style="color:rgb(120,56,10);font-size:20px"><strong>Oznake uzrasta:</strong></p>
    <p align ="justify"> Svaka igra na našem sajtu je pažljivo označena kako biste lako mogli da vidite za koje uzraste je prikladna. Oznake uzrasta pomažu roditeljima da brzo identifikuju igre koje su bezbedne i odgovarajuće za njihovu decu. Osim toga, obezbeđujemo detaljne opise za svaku igru kako biste mogli da donesete informisane odluke o tome da li je određena igra prikladna za vašu porodicu.</p>
    <p style="color:rgb(120,56,10);font-size:20px"><strong>Recenzije i komentari:</strong></p>

    <p align ="justify"> Verujemo da je zajedničko iskustvo igranja igara izuzetno važno. Na našem sajtu, korisnici mogu ostavljati komentare i recenzije kako bi podelili svoje utiske o igrama. To vam omogućava da pročitate iskustva drugih igrača i donesete informisane odluke o tome koje igre da kupite. Naše recenzije su posebno korisne za roditelje koji žele da se uvere u kvalitet igre i sadržaj pre nego što je dozvole svojoj deci.</p>
        <p align="justify">Ovo je samo početak naše priče o video igrama. Nadamo se da ćete uživati u istraživanju našeg sajta i pronaći igre koje će vas zabaviti i obogatiti vaše iskustvo igranja. Hvala vam što ste deo naše zajednice!</p>
  </div>

  <div class="breakDiv"></div>

  <div id="footer">
    <img src="pac.png" alt="kraj" id="nnn">
    <h4 style="color:rgb(139, 69, 19)";>*GAMES GROUP*<br>
    <br>Zainteresovani za kupovinu ili saradnju se mogu javiti na: <br>
    <br>Mobile: 011 9999 999<br>
    <br>Email: gamesgroup.rs@gmail.com</h4>
  </div>

  <script src="app.js"></script>



</body>

</html>