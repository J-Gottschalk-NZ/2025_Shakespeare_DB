<!DOCTYPE HTML>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="Database of Shakespeare's characters">
    <meta name="keywords" content="Shakespeare, comedy, tragedy, history, play, characters">

    <title>Shakespeare's People</title>

    <!-- Link to make font Awesome work -->
    <script src="https://kit.fontawesome.com/37c3bd2981.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/shake_style.css">
    <link rel="stylesheet" href="css/side_panel.css">
    <link rel="stylesheet" href="css/forms.css">


    <!-- Links to javascript - use defer to prevent javascript trying to load before elements have been created -->
    <script src="js/shake_script.js" defer></script>
    
  </head>
  <body>


  <div class="wrapper">

    <div class="common logo-banner">
        <img class="logo-image" src="images/logo.png" alt="Line drawing of William Shakespear" height="75">

        <h1>Shakespeare's People</h1>
    </div>  <!-- / logo-banner --> 



    <nav>

     <a href="#" class='nav-button' title="Displays five random characters"><i class="fa-solid fa-shuffle"></i></a>


      <?php include("filter-box.php"); ?>

        <!-- Filter button - uses Javascript... -->

        <a href="#" class="nav-button" title="Filter results based play, role etc" onclick="openNav()">
        <i class="fa-solid fa-filter"></i></a>      

      <div class="hamburger">
      <i class="fa-solid fa-search" onclick="changeIcon(this)"></i>
      </div>

      <div class="nav-items">

        <!-- Quick Search -->           
        <form class="key-search" method="post" action="index.php?page=#" enctype="multipart/form-data">

            <input class="search quicksearch" type="text" name="quick_search_term" value="" required placeholder="Quick">

            <button type="submit" class="submit" name="quick_search">
            <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> 
            </button>

        </form>     <!-- / quick search -->   

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

      
    </div>    <!-- /  nav items -->


    </nav>

    <div class="log-in-out">
            <!-- Log in / logout button -->
            <a class="nav-button" href="#"><i class="fa-solid fa-right-to-bracket"></i></a> 


    </div>  <!-- / log-in-out -->

    <main class="common">

    <h2>Welcome</h2>

    <p>Use the random / filter / search tools above to explore the characters in Shakespeare's plays.  Here are some featured characters to get you started.

    </main>

    <footer class="common">
        <div class="footer-left-text">
            <a href="#">Icon Legends</a>
            <a href="#">Credits / Attribution</a>

        </div>      <!-- left footer -->

        <span>CC Miss Gottschalk</span>


    </footer>

</div>  <!-- / wrapper -->


  </body>
</html>