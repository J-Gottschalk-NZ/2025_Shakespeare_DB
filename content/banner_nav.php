    <div class="common logo-banner">
        <a href="index.php">
        <img class="logo-image" src="images/logo.png" alt="Line drawing of William Shakespear" height="75">
    </a>

        <h1>Shakespeare's People</h1>
    </div>  <!-- / logo-banner --> 



    <nav>

     <a href="index.php?page=content/random" class='nav-button' title="Displays five random characters"><i class="fa-solid fa-shuffle"></i></a>


      <?php include("filter-box.php"); ?>

        <!-- Filter button - uses Javascript... -->

        <a href="#" class="nav-button" title="Filter results based play, role etc" onclick="openNav()">
        <i class="fa-solid fa-filter"></i></a>      

    <div class="nav-combo">
      <div class="hamburger">
      <i class="fa-solid fa-search" onclick="changeIcon(this)"></i>
      </div>

      <div class="nav-items">

        <!-- Quick Search -->           
        <form class="key-search" method="post" action="index.php?page=content/quick_search" enctype="multipart/form-data">

            <input class="search quicksearch" type="text" name="quick_search_term" value="" required placeholder="Quick">

            <button type="submit" class="submit" name="quick_search">
            <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> 
            </button>

        </form>     <!-- / quick search -->   

         <!-- Play Search -->           
        <form class="key-search" method="post" action="index.php?page=content/quick_search" enctype="multipart/form-data">

            <input class="search quicksearch" type="text" name="quick_search_term" value="" required placeholder="Play">

            <button type="submit" class="submit" name="play_search">
                <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> 
            </button>

        </form>     <!-- / play search -->    

        <!-- Character Search -->           
        <form class="key-search" method="post" action="index.php?page=content/quick_search" enctype="multipart/form-data">

            <input class="search quicksearch" type="text" name="quick_search_term" value="" required placeholder="Character">

            <button type="submit" class="submit" name="character_search">
                <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> 
            </button>

        </form>     <!-- / character search -->    

        <!-- Death Search -->           
        <form class="key-search" method="post" action="index.php?page=content/quick_search" enctype="multipart/form-data">

            <input class="search quicksearch" type="text" name="quick_search_term" value="" required placeholder="Death">

            <button type="submit" class="submit" name="death_search">
                <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> 
            </button>

        </form>     <!-- / character search -->   

</div>  <!-- / nav-combo -->

      
    </div>    <!-- /  nav items -->


    </nav>

    <div class="log-in-out">
            <!-- Log in / logout button -->
            <a class="nav-button" href="#"><i class="fa-solid fa-right-to-bracket"></i></a> 


    </div>  <!-- / log-in-out -->
