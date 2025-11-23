<?php

// check user is logged in
if(isset($_SESSION['admin'])) {
    
    // check button has been pressed
    if(isset($_REQUEST['submit']))
    {

        $ID = $_REQUEST['ID'];

        // retrieve data from from...
        $character_name = $_REQUEST['character'];
        $play = $_REQUEST['play'];
        $gender = $_REQUEST['gender'];
        $role = $_REQUEST['role'];
        $alignment = $_REQUEST['alignment'];
        $COD_action = $_REQUEST['COD_action'];
        $COD_method = $_REQUEST['COD_method'];
        $description = $_REQUEST['description'];

        $featured = "";

        // get traits...
        $trait1 = $_REQUEST['Trait1'];
        $trait2 = $_REQUEST['Trait2'];
        $trait3 = $_REQUEST['Trait3'];

        // retrieve trait ID's if they exist...
        
        // Initialise IDs
        $trait_ID_1 = $trait_ID_2 = $trait_ID_3 = "";

        // replace blank ID's with n/a
        if ($trait2 == "") {
        $trait2 = "n/a";
        }

        if ($trait3 == "") {
        $trait3 = "n/a";
        }

        // check to see if subect / author is in DB, if it isn't add it.

        $traits = array($trait1, $trait2, $trait3);
        $trait_IDs = array();

        // Prepared statement to add traits (if necessary).  Note that the ? does not have speech marks!
        $stmt = $dbconnect -> prepare("INSERT INTO `key_traits` (`Trait`) VALUES (?); ");

        foreach($traits as $trait) {
            $traitID = get_search_ID($dbconnect, $trait);

            if($traitID == "no results") {
                $stmt -> bind_param("s", $trait);
                $stmt -> execute();

                // retrieve ID of trait that has been added
                $traitID = $dbconnect -> insert_id;
            }

            $trait_IDs[] = $traitID;

        } // end get trait ID 'for each'

        // retrieve Trait IDs from array
        $trait_ID_1 = $trait_IDs[0];
        $trait_ID_2 = $trait_IDs[1];
        $trait_ID_3 = $trait_IDs[2];

    }


    // Edit Entry
    $stmt = $dbconnect -> prepare("UPDATE `shake_data` SET `Character_Name` = ?, `PlayID` = ?, `RoleID` = ?, `GenderID` = ?, `Moral_AlignmentID` = ?, `Trait_1ID` = ?, `Trait_2ID` = ?, `Trait_3ID` = ?, `COD_ActionID` = ?, `COD_MethodID` = ?, `Description` = ?, `Featured` = ? WHERE `shake_data`.`ID` = ?; ");
    $stmt -> bind_param("siiiiiiiiissi", $character_name, $play, $role, $gender, $alignment, $trait_ID_1, $trait_ID_2, $trait_ID_3, $COD_action, $COD_method, $description, $featured, $ID);
    $stmt -> execute();

    $stmt -> close();

    $params = [$ID];
    $help_text = "";

    $sql_condition = "WHERE ID = ?";
    $heading = "Edit Character Success";

    include("content/results.php");

    


}

else {
    // error if users is not logged in
    $login_error = 'Please login to access this page';
    header("Location: index.php?page=admin/login&error=$login_error");

}

?>