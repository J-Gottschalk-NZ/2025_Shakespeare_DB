    <?php

    // default search order and help text
    $order = " ORDER BY s.Character_Name ASC";
    $help_text = "";


    // retrieve search type and search term...
    
    if(isset($_POST['quick_search'])) {
        $search_type = 'quick';
    }

    elseif(isset($_POST['play_search'])) {
    $search_type = 'play';
    }

    $search_term = $_REQUEST['quick_search_term'];



    // Set up heading before making it into a wildcard...
    $heading=$search_term;

    // make search term into a wildcard so we can use it with our prepared statement
    $search_term = '%'.$search_term.'%';

    // Dictionary containing 'single' searches and columns
    $search_columns = [
    "play"      => "Play",
    "category"  => "Play_Cat",
    ];

// Query for play / character (single column)
if (array_key_exists($search_type, $search_columns)) {
    $column = $search_columns[$search_type];
    $sql_condition = "WHERE `$column` LIKE ?";
    $params = [$search_term];

}

// Quick Search
elseif ($search_type == "quick")
{
    $sql_condition = "
    WHERE `Play` LIKE ?
    OR `Method` LIKE ?
    OR `Action` LIKE ?
    OR `Character_Name` LIKE ?        
    "; 

    $params = [$search_term, $search_term, $search_term, $search_term];

    $help_text = "Results are based on play name, character name and cause of death.";

}

    // Add order
    $sql_condition .= $order;


    include("results.php");

    ?>