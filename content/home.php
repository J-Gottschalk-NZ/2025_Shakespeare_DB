    <?php 
    // Retrieve featured items...
    // Wild card 'search term' to return all results so that we can choose five random results and still use a prepared statement
    $search_term = "%%";
    $params = [$search_term];


    // Set up query
    // $sql_condition = "ORDER BY RAND() LIMIT 5";
    
    $sql_condition = "WHERE `Featured` LIKE ? AND `Featured` !='' ORDER BY `Featured` ASC";    
    list($find_query, $find_count) = get_query($dbconnect, $sql_condition, $params);

    
    ?>
    
    <h2>Welcome</h2>

    <p>Use the random / filter / search tools above to explore the characters in Shakespeare's plays.  Here are some featured characters to get you started.
    </p>

    <p>
        Please hover over the images below to learn more about each character.
    </p>

    <p>&nbsp;</p>


    <div class='all-cards'>


    <?php

    while($find_rs = mysqli_fetch_assoc($find_query)) {


    // Search term / Text setup (retrieve text and save as variables for easy reference)
    // This is mostly to make searching / clickable links easy
    $character = $find_rs['Character_Name'];
    $play = $find_rs['Play'];
    $category = $find_rs['Play_Cat'];
    $gender = $find_rs['M_or_F'];
    $role = $find_rs['Role'];
    $alignment = $find_rs['Alignment'];   
    $action = $find_rs['Action'];    
    $method = $find_rs['Method'];    

    $triat1 = $find_rs['Trait1'];
    $triat2 = $find_rs['Trait2'];
    $triat3 = $find_rs['Trait3'];

    // Image and icon set up...
    $category_icon = "images/icons/".$find_rs['Category_Icon'];
    $gender_icon = "images/icons/".$find_rs['Gender_Icon'];
    $role_icon = "images/icons/".$find_rs['Role_Icon'];
    $alignment_icon = "images/icons/".$find_rs['Moral_Icon'];
    $action_icon = "images/icons/".$find_rs['Action_Icon'];
    $method_icon = "images/icons/".$find_rs['Method_Icon'];

    $avatar = "images/avatars/".$find_rs['Featured'];

    // URL helpers
    $click_type = "index.php?page=content/click_search&search_type=";
    $click_term = "&search_term=";

    ?>


    <div class="container">

    <img src="<?= $avatar; ?>" alt="<?= $character; ?>" class="featured-image"> 


    <div class="overlay">

    <div class="char-details">

    <div class="character-name"><?=  $character; ?></div>

    <div class="play-title">
        <a title="<?=  $category; ?>" class="category" 
        href="<?=  $click_type?>category<?=  $click_term.$category; ?>">
            <img src="<?=  $category_icon; ?>" alt="<?=  $category; ?>">
        </a>
        <a class="play" href="index.php?page=content/click_search&search_type=play&search_term=<?=  $play; ?>"><?=  $play; ?></a>
    </div>

    <?php

    // list to hold icons to easily generate 'icon row'
    // Title (and alt) | URL | icon     

    $all_icons = [

        [$gender, $click_type."gender".$click_term.$gender, $gender_icon],
        [$role, $click_type."role".$click_term.$role, $role_icon],
        [$alignment, $click_type."alignment".$click_term.$alignment, $alignment_icon],
        [$action, $click_type."action".$click_term.$action, $action_icon],
        [$method, $click_type."method".$click_term.$method, $method_icon]

    ];

    ?>

    <div class="icon-row">

    <?php foreach($all_icons as $item): ?>
            <a title="<?= $item[0]; ?>" href="<?= $item[1]; ?>"><img src="<?= $item[2]; ?>" alt="<?= $item[0]; ?>" ></a>  
            
    <?php endforeach; ?>
    
    </div> <!-- / icon row -->

    <div class="description">
    <?=  $find_rs['Description']; ?>
    </div>

    <div class="trait-tags">
        <a href="<?=  $click_type?>trait<?=  $click_term.$triat1; ?>" class="trait"><?=  $triat1; ?></a>
        <a href="<?=  $click_type?>trait<?=  $click_term.$triat2; ?>" class="trait"><?=  $triat2; ?></a>
        <a href="<?=  $click_type?>trait<?=  $click_term.$triat3; ?>" class="trait"><?=  $triat3; ?></a>

    </div>  <!-- / trait tags -->

    </div>  <!-- / character details -->

</div>  <!-- / overlay -->

</div>  <!-- / container -->

<?php 
    } // end results while
?>



</div>  <!-- / all-cards -->