<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img class="cog" src="images/cog.png" alt="">
    <a class="navbar-brand mytitle" href="index.php">INDUSTRIAE PRESUL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?php if ($current=='accueil') {echo 'active';} else {echo '';}?>" aria-current="page" href="index.php">Accueil</a>
        <a class="nav-link <?php switch ($current) {case 'accueil': echo ''; break; case 'listing': echo 'active'; break; break;}?>" href="listing.php">Listing</a>
        <a class="nav-link <?php switch ($current) {case 'accueil': echo ''; break; case 'listing': echo ''; break; case 'recherche': echo 'active'; break;}?>" href="form_recherche.php">Recherche</a>
      </div>
    </div>
  </div>
</nav>
</header>