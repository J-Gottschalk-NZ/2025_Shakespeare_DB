    <?php

    // retrieve search type
    $search_type = ($_REQUEST['search_type']);
    $search_term = ($_REQUEST['search_term']);

    $help_text = "";

    $heading=$search_term;
    $order = " ORDER BY s.Character_Name ASC";

    if ($search_type == "play")
    {
    $sql_condition = "WHERE `Play` LIKE '$search_term'";    
    }

    elseif ($search_type == "category")
    {
    $sql_condition = "WHERE `Play_Cat` LIKE '$search_term'";    
    }

    elseif ($search_type == "gender")
    {
    $sql_condition = "WHERE `M_or_F` LIKE '$search_term'";    
    }

    elseif ($search_type == "role")
    {
    $sql_condition = "WHERE `Role` LIKE '$search_term'";    
    }

    elseif ($search_type == "alignment")
    {
    $sql_condition = "WHERE `Alignment` LIKE '$search_term'";    
    }

    elseif ($search_type == "action")
    {
    $sql_condition = "WHERE `Action` LIKE '$search_term'";    
    }

    elseif ($search_type == "method")
    {
    $sql_condition = "WHERE `Method` LIKE '$search_term'";    
    }



    // add in order by character name...
    $sql_condition = $sql_condition.$order;


    include("results.php");

    ?>