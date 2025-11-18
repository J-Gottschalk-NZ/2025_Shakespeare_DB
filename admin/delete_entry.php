<?php

// check user is logged in
if(isset($_SESSION['admin'])) {
    $ID = $_REQUEST['ID'];

    // check item is not featured
    $stmt = $dbconnect -> prepare("SELECT * FROM `shake_data` WHERE `ID` LIKE ? ");
    $stmt -> bind_param("i", $ID);
    $stmt -> execute();
    $find_featured = mysqli_stmt_get_result($stmt);
    $find_rs = mysqli_fetch_assoc($find_featured);
    $featured = $find_rs['Featured'];

    if ($featured=="") {

    $stmt = $dbconnect -> prepare("DELETE FROM shake_data WHERE `shake_data`.`ID` = ?");
    $stmt -> bind_param("i", $ID);
    $stmt -> execute();
    $stmt -> close();

?>

<h2>Delete Success</h2>

<p>The entry has been deleted.</p>

</div>

<?php

    } // end successful deletion

// if this is a featured item, tell the user it can't be deleted.
else{
    ?>
    <h2>Oops</h2>

    <div class="error">You tried to delete a featured item.  This is not possible.</div>
        
    <?php
}
    
} // end delete else

else {
    // error if users is not logged in
    $login_error = 'Please login to access this page';
    header("Location: index.php?page=admin/login&error=$login_error");

}

?>