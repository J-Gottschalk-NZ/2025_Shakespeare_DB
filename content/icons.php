<h2>Icons</h2>
<i class="fa-solid fa-circle-info"></i> Click on any of the icons below to see characters with that feature / characteristic.

<?php


    // URL helpers
    $click_type = "index.php?page=content/click_search&search_type=";
    $click_term = "&search_term=";

    // retrieve data...
    $category_sql = "SELECT * FROM `category` ORDER BY `category`.`Play_Cat` ASC ";
    $category_query = mysqli_query($dbconnect, $category_sql);

    $gender_sql = "SELECT * FROM `gender` ORDER BY `gender`.`M_or_F` ASC ";
    $gender_query = mysqli_query($dbconnect, $gender_sql);

?>

<div class='all-cards'>

<!-- Start of Category box -->

<div class="icon-list">
    <div class="character-name">Category</div>

    <?php



    while($category_rs = mysqli_fetch_assoc($category_query)) {

    ?>
    
    <div class="row">

    <?php
        
    $category = $category_rs['Play_Cat'];
    $category_icon = "images/icons/".$category_rs['Category_Icon'];

        ?>

        <a 
        title="<?=  $category; ?>" 
        class="legend" 
        href="<?=  $click_type?>category<?=  $click_term.$category; ?>"
         alt="<?=  $category; ?>">
         <img class="icon" src="<?= $category_icon ?>">
         <?= $category ?>
     </a>


    </div>  <!-- / row --> 
 
    <?php

    } // end category while


    ?>


    </div>  <!-- / icon list -->



<!-- starg gender -->
<div class="icon-list">
    <div class="character-name">Gender</div>

    <?php

    while($gender_rs = mysqli_fetch_assoc($gender_query)) {

    ?>
    
    <div class="row">

    <?php
        
    $gender = $gender_rs['M_or_F'];
    $gender_icon = "images/icons/".$gender_rs['Gender_Icon'];



        ?>

        <a 
        title="<?=  $gender; ?>" 
        class="legend" 
        href="<?=  $click_type?>gender<?=  $click_term.$gender; ?>"
         alt="<?=  $gender; ?>">
         <img class="icon" src="<?= $gender_icon ?>">
         <?= $gender ?>
     </a>


    </div>  <!-- / row --> 
 
    <?php

    } // end gender while


    ?>


    </div>  <!-- / icon list -->
<!-- end gender -->


</div>

</div>