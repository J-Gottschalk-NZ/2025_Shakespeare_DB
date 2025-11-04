    <?php

    // Set up query
    $sql_condition = "ORDER BY RAND() LIMIT 5";
    $heading="Random";
    
    $help_text = "Press 'random' again to generate another set of characters.";

    include("results.php");

    ?>