let nameSpan = document.querySelector('.nameSort');
let priceSpan = document.querySelector('.priceSort');
let allProductsDiv = document.querySelector('.allProducts');
let searchInput = document.querySelector('.searchInput');

nameSpan.addEventListener('click', () => {
  let sortType = "title";

  $.ajax({
    url: 'ajax.php',
    type: 'POST',
    data: {
      sortType,
    },
    success: (response) => {
      let games = JSON.parse(response);
      let html = "";
      games.forEach(game => {
        html += `<div class="product">
          <a href="post.php?id=${game.id}"><img class="game-image" src="${game.img}" alt="Nema slike"></a>
          <p>username: ${game.username}</p><br>
          <p>game: ${game.title}</p><br>
          <p>gender: ${game.gender}</p><br>
          <p>price: $${game.price}</p><br>
          <br><br><br>
        </div>`;
      });

      allProductsDiv.innerHTML = html;
    }
  });
});

priceSpan.addEventListener('click', () => {
  let sortType = "price";

  $.ajax({
    url: 'ajax.php',
    type: 'POST',
    data: {
      sortType,
    },
    success: (response) => {
      let games = JSON.parse(response);
      let html = "";
      games.forEach(game => {
        html += `<div class="product">
          <a href="post.php?id=${game.id}"><img class="game-image" src="${game.img}" alt="Nema slike"></a>
          <p>username: ${game.username}</p><br>
          <p>game: ${game.title}</p><br>
          <p>gender: ${game.gender}</p><br>
          <p>price: $${game.price}</p><br>
          <br><br><br>
        </div>`;
      });

      allProductsDiv.innerHTML = html;
    }
  });
});

searchInput.addEventListener('keyup', () => {

  let searchText = searchInput.value;

  $.ajax({
    url: 'ajax.php',
    type: 'POST',
    data: {
      searchText,
    },
    success: (response) => {
      let games = JSON.parse(response);
      let html = "";
      games.forEach(game => {
        html += `<div class="product">
          <a href="post.php?id=${game.id}"><img class="game-image" src="${game.img}" alt="Nema slike"></a>
          <p>username: ${game.username}</p><br>
          <p>game: ${game.title}</p><br>
          <p>gender: ${game.gender}</p><br>
          <p>price: $${game.price}</p><br>
          <br><br><br>
        </div>`;
      });

      if(html == ""){
        html = "<strong>Ne postoje igrice sa zadatim nazivom</strong>";
      }

      allProductsDiv.innerHTML = html;
    }
  });
});