    <?php

    // retrieve search type
    $search_type = to_clean($_REQUEST['search_type']);
    $search_term = to_clean($_REQUEST['search_term']);

    // default params (one search term)
    $params = [$search_term];

    $help_text = "";

    $heading=$search_term;
    $order = " ORDER BY s.Character_Name ASC";


    if ($search_type == "play")
    {
    $sql_condition = "WHERE `Play` LIKE ?";    
    }

    elseif ($search_type == "category")
    {
    $sql_condition = "WHERE `Play_Cat` LIKE ?";    
    }

    elseif ($search_type == "gender")
    {
    $sql_condition = "WHERE `M_or_F` LIKE ?";    
    }

    elseif ($search_type == "role")
    {
    $sql_condition = "WHERE `Role` LIKE ?";    
    }

    elseif ($search_type == "alignment")
    {
    $sql_condition = "WHERE `Alignment` LIKE ?";    
    }

    elseif ($search_type == "action")
    {
    $sql_condition = "WHERE `Action` LIKE ?";    
    }

    elseif ($search_type == "method")
    {
    $sql_condition = "WHERE `Method` LIKE ?";    
    }

    // trait search!
    else {
    $sql_condition = "WHERE 
    k1.Trait LIKE ?
    OR k2.Trait LIKE ?
    OR k3.Trait LIKE ?
    ";
    $params = [$search_term, $search_term, $search_term];  // repeat for each placeholder
    }

    // add in order by character name...
    $sql_condition = $sql_condition.$order;


    include("results.php");

    ?>