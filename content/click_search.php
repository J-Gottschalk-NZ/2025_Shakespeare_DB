    <?php

    // retrieve search type
    $search_type = to_clean($_REQUEST['search_type']);
    $search_term = to_clean($_REQUEST['search_term']);

    echo "Term: ".$search_term."<br>";
    echo "type: ".$search_type;

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

    // trait search!
    else {
    $sql_condition = "WHERE 
    k1.Trait LIKE '$search_term'
    OR k2.Trait LIKE '$search_term'
    OR k3.Trait LIKE '$search_term'
    ";
    }



    // add in order by character name...
    $sql_condition = $sql_condition.$order;


    include("results.php");

    ?>