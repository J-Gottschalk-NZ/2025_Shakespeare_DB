    <?php

    // Set up query
    $sql_condition = "ORDER BY RAND() LIMIT 5";
    $heading="Random";
    
    $help_text = "Press 'random' again to generate another set of characters.";

    // retrieve data
    list($find_query, $find_count) = get_query($dbconnect, $sql_condition);


    if($find_count > 0)

    {
    ?>

        <h2 class="search-heading"><?php echo $heading; ?></h2>




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

    ?>


</p>

<div class="char-details">

    <div class="character-name"><?php echo $character; ?></div>

    <div class="play-title">
        <a title="<?php echo $category; ?>" class="category" href="#"><img src="<?php echo $category_icon; ?>" alt="<?php echo $category; ?>"></a>
        <a class="play" href="#"><?php echo $play; ?></a>
    </div>

    <div class="icon-row">
            <a title="<?php echo $gender; ?>" href="#"><img src="<?php echo $gender_icon; ?>" alt="<?php echo $gender; ?>" ></a>
            <a title="<?php echo $role; ?>" href="#"><img src="<?php echo $role_icon; ?>" alt="<?php echo $role_icon; ?>"></a>
            <a title="<?php echo $alignment_icon; ?>" href="#"><img src="<?php echo $alignment_icon; ?>" alt="<?php echo $alignment?>"></a>            
            <a title="<?php echo $action; ?>" href="#"><img src="<?php echo $action_icon; ?>" alt="<?php echo $action; ?>"></a>
            <a title="<?php echo $method; ?>" href="#"><img src="<?php echo $method_icon; ?>" alt="<?php echo $method; ?>"></a>            
    
    </div> <!-- / icon row -->

    <div class="description">
    <?php echo $find_rs['Description']; ?>
    </div>

    <div class="trait-tags">
        <a href="#" class="trait"><?php echo $triat1; ?></a>
        <a href="#" class="trait"><?php echo $triat2; ?></a>
        <a href="#" class="trait"><?php echo $triat3; ?></a>

    </div>  <!-- / trait tags -->

    </div>  <!-- / card container -->





    <?php

}   // end results while

?>


    </div>  <!-- / all-cards -->

<?php

    } // end more than 0 results

// if there are no results...
else {

    ?>

   <h2>No Results</h2>

   <div class="no-results-message">

    <div class='center-image'>
    <img class='error-image' src="images/no_results.png" alt="No results image" >
    </div>  <!-- / center-image -->

    <p>&nbsp;</p>

    <div class="error all">

   <p>
        Sorry!  There are no results for your search.
    </p>

    <p>
        Please try another search term / user fewer characters in the 'quick search' box.
    </p>

    </div>  <!--  / error box -->

</div>  <!-- / no results message -->

    <?php

} // end no results else

?>

<p>&nbsp;</p>