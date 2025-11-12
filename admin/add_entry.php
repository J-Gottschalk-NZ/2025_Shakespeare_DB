<?php

// check user is logged in
if(isset($_SESSION['admin'])) {


// get Key Traits from database
$all_traits_sql = "SELECT * FROM key_traits ORDER BY Trait ASC ";
$all_traits = autocomplete_list($dbconnect, $all_traits_sql, 'Trait');

// initialise subject variables
$trait_1 = "";
$trait_2 = "";
$trait_3 = "";

// initialise trait ID's
$trait_1_ID = $trait_2_ID = $trait_3_ID = 0;

?>

<div class="big-form">

<h2>Add Entry</h2>

<form action="index.php?page=../admin/insert_entry" method="post">

<p><input name="character" placeholder = "Character Name" required/></p>

<!-- Play Drop down -->
 <select name="play" class="big-dropdown" required>
    <option value="" disabled selected>Play Name...</option>
        <?php
        get_options($dbconnect, 'play_name', 'PlayID', 'Play');
    ?>
</select>

 <select name="category" class="big-dropdown" required>
    <option value="" disabled selected>Category ...</option>
        <?php
        get_options($dbconnect, 'category', 'CategoryID', 'Play_Cat');
    ?>
</select>


<p><input class="large-submit" type="submit" name="submit" value="Submit" /></p>
</form>

</div>  <!-- / big form -->


<?php 
    } // end user logged on it

    else {
        $login_error = 'Please login to access this page';
        header("Location: index.php?page=admin/login&error=$login_error");
    }

    ob_end_flush();

?>