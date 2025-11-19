<?php

function get_query($dbconnect, $sql_condition, $params = [])
{

    // s ==> shake_data table
    // c ==> category table
    // a ==> cod_action
	// m ==> cod_method
	// g ==> gender
	// k ==> k1, k2, and k3 are key_traits
	// ma ==> moral_alignment
	// r ==> role
	// p ==> play_name

    $find_sql = "
        SELECT 
            s.*,
            p.*,
            r.*,
            g.*,
            c.*,
            ma.*,
            a.*,
            m.*,

            -- 'Trait' is the COLUMN name with the 'word'
            k1.Trait AS Trait1,
            k2.Trait AS Trait2,
            k3.Trait AS Trait3

        FROM shake_data s

        JOIN play_name p ON p.PlayID = s.PlayID
        JOIN ms_role r ON r.RoleID = s.RoleID
        JOIN gender g ON g.GenderID = s.GenderID
        JOIN category c ON c.CategoryID = p.CategoryID
        JOIN moral_alignment ma ON ma.Moral_AlignmentID = s.Moral_AlignmentID
        JOIN key_traits k1 ON s.Trait_1ID = k1.TraitID
        JOIN key_traits k2 ON s.Trait_2ID = k2.TraitID
        JOIN key_traits k3 ON s.Trait_3ID = k3.TraitID
        JOIN cod_action a ON s.COD_ActionID = a.COD_ActionID
        JOIN cod_method m ON s.COD_MethodID = m.COD_MethodID
        
        -- Adds additional sql condition
        $sql_condition
    ";

    // Prepare statement (OO-style)
    $stmt = $dbconnect->prepare($find_sql);
    if (!$stmt) {
        die("Prepare failed: " . $dbconnect->error);
    }

    // Bind parameters if provided
    if (!empty($params)) {
        $types = str_repeat('s', count($params));  // all params treated as strings

        // bind_param requires references
        $bind_values = [];
        foreach ($params as $key => $value) {
            $bind_values[$key] = &$params[$key];
        }

        array_unshift($bind_values, $types);

        call_user_func_array([$stmt, 'bind_param'], $bind_values);
    }

    // Execute
    $stmt->execute();

    // Get result
    $find_query = $stmt->get_result();
    $find_count = $find_query->num_rows;

    // Close statement
    $stmt->close();

    return [$find_query, $find_count];
}


function to_clean($data) {
	$data = trim($data);	
	return $data;
}

// generate drop down menu based on table
function get_options($dbconnect, $table, $idField, $valueField) {

    // get options from database table
    // $dropdownSql = "SELECT * FROM `$table` ORDER BY `$orderBy` ASC";
    $dropdownSql = "SELECT * FROM `$table` ORDER BY `$table`.`$valueField` ASC ";
    
    $dropdownQuery = mysqli_query($dbconnect, $dropdownSql);

    	// iterate through DB to create options
        while ($dropdownRs = mysqli_fetch_assoc($dropdownQuery)) 
		{
        echo '<option value="' . $dropdownRs[$idField] . '">' . $dropdownRs[$valueField] . '</option>';
		}

}

// entity is trait (ie: thing that needs to be autocompleted)
function autocomplete_list($dbconnect, $item_sql, $entity)    
{
// Get entity / topic list from database
$all_items_query = mysqli_query($dbconnect, $item_sql);
    
// Make item arrays for autocomplete functionality...
while($row=mysqli_fetch_array($all_items_query))
{
  $item=$row[$entity];
  $items[] = $item;
}

$all_items=json_encode($items);
return $all_items;
    
}


// get search ID
function get_search_ID($dbconnect, $search_term)
{
	$find_sql = "SELECT * FROM key_traits WHERE Trait LIKE '$search_term'";
	$find_query = mysqli_query($dbconnect, $find_sql);
	$find_rs = mysqli_fetch_assoc($find_query);

	// count results
	$find_count = mysqli_num_rows($find_query);

	if($find_count == 1) {
	return $find_rs['TraitID'];
	}
	else {
		return "no results";
	}
}


?>