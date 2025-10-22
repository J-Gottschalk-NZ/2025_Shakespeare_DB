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


    <!-- Links to javascript - use defer to prevent javascript trying to load before elements have been created -->
    <script src="js/side_bar.js" defer></script>
    
  </head>
  <body>

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
      
      <span>thing 1</span>
      <span>thing 2</span>
      <span>thing 3</span>

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