<?php

// check user is logged in
if(isset($_SESSION['admin'])) {

// get ID for quote to be edited
$ID = $_REQUEST['ID'];

// retrieve contents of quote
$get_entry_sql = ("WHERE ID LIKE ? ");
$params = [$ID];

// use our function but just get the query, not the number of results.
$get_entry_query = get_query($dbconnect, $get_entry_sql, $params)[0];
$get_entry_rs = mysqli_fetch_assoc($get_entry_query);

// retrieve existing data to populate form...
$character_name = $get_entry_rs['Character_Name'];
$PlayID = $get_entry_rs['PlayID'];
$Play = $get_entry_rs['Play'];
$GenderID = $get_entry_rs['GenderID'];
$M_or_F = $get_entry_rs['M_or_F'];
// add the rest of the existing data?

// get Key Traits from database
$all_traits_sql = "SELECT * FROM key_traits ORDER BY Trait ASC ";
$all_traits = autocomplete_list($dbconnect, $all_traits_sql, 'Trait');

// initialise subject variables
$trait_1 = "";
$trait_2 = "";
$trait_3 = "";

// initialise trait ID's
$trait_1_ID = $trait_2_ID = $trait_3_ID = 0;

// set up dropdown array...

        // retrieval name | table | ID | Value | Placeholder
        $dropdown_details = [
        ['play', 'play_name', 'PlayID', 'Play', 'Play Name...'],
        ['gender', 'gender', 'GenderID', 'M_or_F', 'Gender...'],
        ['role', 'ms_role', 'RoleID', 'Role', 'Role...'],
        ['alignment', 'moral_alignment', 'Moral_AlignmentID', 'Alignment', 'Moral Alignment...'],
        ['COD_action', 'cod_action', 'COD_ActionID', 'Action', 'Cause of Death (action)...'],
        ['COD_method', 'cod_method', 'COD_MethodID', 'Method', 'Cause of Death (method)...'],

        ];

?>

<div class="big-form">

<h2>Edit Entry</h2>

<form action="index.php?page=admin/edit_entry&ID=<?= $ID; ?>" method="post">

<p><input name="character" placeholder = "<?= $character_name; ?>" required/></p>

<!-- Dropdown boxes are generated below... -->
 <?php
        // Loop through dropdown details
        foreach ($dropdown_details as $drop) {
            list($name, $table, $id_field, $label_field, $placeholder) = $drop;

            echo '<select name="' . htmlspecialchars($name) . '" class="big-dropdown" required>';
            echo '<option value="" disabled selected>' . htmlspecialchars($placeholder) . '</option>';
            get_options($dbconnect, $table, $id_field, $label_field);
            echo '</select>';
        }
        ?>

    <p>
        <textarea name="description" placeholder="Character Description" required></textarea>
    </p>

    <div class="autocomplete">
            <input name="Trait1" id="Trait1" placeholder="Trait 1 (reqiured)" required />
        </div>

        <div class="autocomplete">
            <input name="Trait2" id="Trait2" placeholder="Trait 2" />
        </div>


        <div class="autocomplete">
            <input name="Trait3" id="Trait3" placeholder="Trait 3" />
        </div>

        <br /><br />



<p><input class="large-submit" type="submit" name="submit" value="Submit" /></p>
</form>

</div>  <!-- / big form -->


    <script>
        <?php include("autocomplete.php"); ?>  

        /* Arrays containing lists. */
        var all_traits = <?php print("$all_traits")?>;
        autocomplete(document.getElementById("Trait1"), all_traits);
        autocomplete(document.getElementById("Trait2"), all_traits);
        autocomplete(document.getElementById("Trait3"), all_traits);


    </script>


<?php 
    } // end user logged on it

    else {
        $login_error = 'Please login to access this page';
        header("Location: index.php?page=admin/login&error=$login_error");
    }

    ob_end_flush();

?>