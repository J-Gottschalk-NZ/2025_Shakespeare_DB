    <?php

    // retrieve search type
    $search_type = ($_REQUEST['search_type']);
    $search_term = ($_REQUEST['search_term']);

    $heading=$search_term;

    if ($search_type == "play")
    {

    $sql_condition = "WHERE `Play` LIKE '$search_term'";    
    $help_text = "";

    }

    elseif ($search_type == "category")
        
    {
    $sql_condition = "WHERE `Play_Cat` LIKE '$search_term'";    
    $help_text = "";
    }



    include("results.php");

    ?>