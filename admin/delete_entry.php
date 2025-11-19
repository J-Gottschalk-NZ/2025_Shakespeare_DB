<?php

// check user is logged in
if(isset($_SESSION['admin'])) {
    $ID = $_REQUEST['ID'];

// check item is not featured...

// Prepared statement so we know if the item is featured or not
$stmt_select = $dbconnect -> prepare("SELECT * FROM `shake_data` WHERE `ID` = ? LIMIT 1");
$stmt_select -> bind_param("i", $ID);
$stmt_select -> execute();

$result = $stmt_select -> get_result();
$find_rs = $result -> fetch_assoc();
$stmt_select -> close();

// Retrieve whether or not the item is featured
$featured = $find_rs['Featured'];

// If the item is not featured, delete it
if ($featured == "") {

    // Second prepared statement: Delete the row
    $stmt_delete = $dbconnect->prepare("DELETE FROM `shake_data` WHERE `ID` = ?");
    $stmt_delete->bind_param("i", $ID);
    $stmt_delete->execute();
    $stmt_delete->close();



?>

<h2>Delete Success</h2>

<p>The entry has been deleted.</p>

</div>

<?php

    } // end successful deletion

// if the item is a featured item, output an error message (and don't delete it)
else{
    ?>
    <h2>Oops</h2>

    <div class="error">You tried to delete a featured item.  This is not possible.</div>
        
    <?php
}
    
} // end delete featured item else

else {
    // error if users is not logged in
    $login_error = 'Please login to access this page';
    header("Location: index.php?page=admin/login&error=$login_error");

}

?>