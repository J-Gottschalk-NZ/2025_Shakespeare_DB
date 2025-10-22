<!DOCTYPE HTML>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="Database of Shakespeare's characters">
    <meta name="keywords" content="Shakespeare, comedy, tragedy, history, play, characters">

    <title>Shakespeare's People</title>

    <!-- Link to make font Awesome work -->
    <script src="https://kit.fontawesome.com/37c3bd2981.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/sand_style.css" />
    <link rel="stylesheet" href="css/side_panel.css">
    <link rel="stylesheet" href="css/forms.css">


    <!-- Links to javascript - use defer to prevent javascript trying to load before elements have been created -->
    <script src="js/side_bar.js" defer></script>
    
  </head>
  <body>

  <!-- Temporary code to see screen width for media queries. -->
  <?php include('screen_size.php');?>

  <div class="wrapper">

    <div class="common logo-banner">
        <img class="logo-image" src="images/logo.png" alt="Line drawing of William Shakespear" height="75">

        <h1>Shakespeare's People</h1>
    </div>  <!-- / logo-banner --> 



    <nav>

      <?php include("filter-box.php"); ?>
      <div class="filter">

        <!-- Filter button - uses Javascript... -->

        <a href="#" class="nav-button" onclick="openNav()">
        <i class="fa-solid fa-filter"></i></a>

    </div>

      <div class="hamburger">
      <i class="fa-solid fa-bars" onclick="changeIcon(this)"></i>
      </div>

      <div class="nav-items">

          <a href="#" class='nav-button'><span>Random&nbsp;&nbsp;</span><i class="fa-solid fa-shuffle"></i></a>
      
         <!-- Play Search -->           
        <form class="key-search" method="post" action="index.php?page=#" enctype="multipart/form-data">

            <input class="search quicksearch" type="text" name="play_search_term" value="" required placeholder="Play">

            <button type="submit" class="submit" name="play_search">
                <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> 
            </button>

        </form>     <!-- / play search -->    

        <!-- Character Search -->           
        <form class="key-search" method="post" action="index.php?page=#" enctype="multipart/form-data">

            <input class="search quicksearch" type="text" name="character_search_term" value="" required placeholder="Character">

            <button type="submit" class="submit" name="character_search">
                <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> 
            </button>

        </form>     <!-- / character search -->    

        <!-- Death Search -->           
        <form class="key-search" method="post" action="index.php?page=#" enctype="multipart/form-data">

            <input class="search quicksearch" type="text" name="death_search_term" value="" required placeholder="Death">

            <button type="submit" class="submit" name="death_search">
                <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> 
            </button>

        </form>     <!-- / character search -->   

        <!-- Log in / logout button -->
        <a class="nav-button" href="#"><i class="fa-solid fa-right-to-bracket"></i></a>

        
    </div>    <!-- /  nav items -->

    </nav>

    <main class="common">
        Main content goes here
    </main>

    <footer class="common">
        Footer goes here
    </footer>

</div>  <!-- / wrapper -->

<!-- Javascript to make Hamburger icon change to cross -->
<script>
  const hamburger = document.querySelector('.hamburger');
  const navLinks = document.querySelector('.nav-items');
  const icon = hamburger.querySelector('i');

  hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('show');
    icon.classList.toggle('fa-xmark');
    icon.classList.toggle('fa-bars');

  });

  // // Change hamburger to cross when menu opened
  //  changeIcon = (icon) => icon.classList.toggle('fa-xmark')

  </script>

  </body>
</html>