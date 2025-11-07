    <?php

    if(isset($_POST['quick_search'])) {
        $search_term = $_REQUEST['quick_search_term'];
        $search_type = 'quick';

        // Set up heading before making it into a wildcard...
        $heading=$search_term;

        // make search term into a wildcard so we can use it with our prepared statement
        $search_term = '%'.$search_term.'%';
    }


    // default params (one search term)
    $params = [$search_term];

    $help_text = "";


    $order = " ORDER BY s.Character_Name ASC";

    if ($search_type == "quick")
    {
        $sql_condition = "
        WHERE `Play` LIKE ?
        OR `Method` LIKE ?
        OR `Action` LIKE ?
        OR `Character_Name` LIKE ?        
        "; 
    
        $params = [$search_term, $search_term, $search_term, $search_term];

    }

    // Add order
    $sql_condition .= $order;


    include("results.php");

    ?>