<?php
// Inclure l'autoloader de Composer
require_once  __DIR__ . '/../config.inc.php';


loadRessource("fr");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagination Bootstrap 5 avec jQuery</title>
  <!-- Bootstrap CSS -->
  <link href="<?= HTTP_PAGE ?>css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div id="pagination-content" class="mb-3"></div>
    <nav aria-label="Page navigation example">
      <ul id="pagination" class="pagination justify-content-center"></ul>
    </nav>
  </div>

  <!-- jQuery -->
  <script src="<?= HTTP_PAGE ?>js/jquery-3.6.3.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="<?= HTTP_PAGE ?>js/bootstrap.bundle.min.js"></script>
  <script>
    // Fonction pour diviser le texte en groupes de mots
    function paginateText(text, wordsPerPage) {
      const words = text.split(' ');
      const pageCount = Math.ceil(words.length / wordsPerPage);
      const pages = [];
      let currentPage = '';
      words.forEach(word => {
        if (word.startsWith('<h3>')) {
          if (currentPage !== '') {
            pages.push(currentPage.trim());
            currentPage = '';
          }
        }
        currentPage += ' ' + word;
      });
      if (currentPage !== '') {
        pages.push(currentPage.trim());
      }
      return pages;
    }

    $(document).ready(function() {
      // Exemple de texte à paginer
      const exampleText = "<h3>Lorem ipsum dolor</h3> sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla <h3>Lorem ipsum dolor</h3>pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor <h3>Lorem ipsum dolor</h3>incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum <h3>Lorem ipsum dolor</h3>dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

      // Nombre de mots par page
      const wordsPerPage = 20;

      // Diviser le texte en pages
      const pages = paginateText(exampleText, wordsPerPage);

      // Afficher la première page par défaut
      $('#pagination-content').html(pages[0]);

      // Générer les boutons de pagination
      const pagination = $('#pagination');
      for (let i = 0; i < pages.length; i++) {
        const li = $('<li>').addClass('page-item');
        const button = $('<button>').addClass('page-link').text(i + 1);
        button.on('click', function() {
          $('#pagination-content').html(pages[i]);
        });
        li.append(button);
        pagination.append(li);
      }
    });
  </script>
</body>

</html>