    <?php

    // Set up query
    $sql_condition = "ORDER BY RAND() LIMIT 5";
    $heading="Random";
    
    $help_text = "Press 'random' again to generate another set of characters.";

    // retrieve data
    list($find_query, $find_count) = get_query($dbconnect, $sql_condition);


    ?>
    
    <h2>Random</h2>

    <?php
    if($find_count > 0)

    {
    ?>

        <h2><?php echo $heading; ?></h2>

    <?php
while($find_rs = mysqli_fetch_assoc($find_query)) {

    ?>

    <p><b>Character: </b> <?php echo $find_rs['Character_Name']; ?><br>
    <b>Play: </b><?php echo $find_rs['Play']; ?><br>
    <b>Play Category: </b><?php echo $find_rs['Play_Cat']; ?><br>
    <b>Role: </b><?php echo $find_rs['Role']; ?><br>
    <b>Gender: </b><?php echo $find_rs['M_or_F']; ?><br>
    <b>Moral Alignment: </b><?php echo $find_rs['Alignment']; ?><br>
    <b>Trait 1: </b><?php echo $find_rs['Trait1']; ?><br>
    <b>Trait 2: </b><?php echo $find_rs['Trait2']; ?><br>
    <b>Trait 3: </b><?php echo $find_rs['Trait3']; ?><br>
    <b>COD Action: </b><?php echo $find_rs['Action']; ?><br>
    <b>COD Method: </b><?php echo $find_rs['Method']; ?><br>
    <b>Description: </b><?php echo $find_rs['Description']; ?><br>


</p>


    <?php

}   // end results while

?>


    <div class='all-cards'>


    <div class="char-details">

    <div class="character-name">Romeo</div>

    <div class="play-title">
        <a title="Tragedy" class="category" href="#"><img src="images/icons/cat_tragedy.png" alt="tragedy"></a>
        <a class="play" href="#">Romeo and Juliet</a>
    </div>

    <div class="icon-row">
            <a title="male" href="#"><img src="images/icons/gender_male_icon.png" alt="Male" ></a>
            <a title="major role" href="#"><img src="images/icons/major.png" alt="Major Role"></a>
            <a title="hero" href="#"><img src="images/icons/Moral_Hero.png" alt="Hero"></a>            
            <a title="Cause of Death - Suicide" href="#"><img src="images/icons/COD_suicide.png" alt="Cause of Death - Suicide"></a>
            <a title="Method of Death - Poison" href="#"><img src="images/icons/COD_poison.png" alt="Method of Death - Poison"></a>            
    
    </div> <!-- / icon row -->

    <div class="description">
    A young Montague deeply in love with Juliet; his impulsive actions lead to tragic consquences.
    </div>

    <div class="trait-tags">
        <a href="#" class="trait">Passionate</a>
        <a href="#" class="trait">Impulsive</a>
        <a href="#" class="trait">Romantic</a>

    </div>  <!-- / trait tags -->

    </div>  <!-- / card container -->


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