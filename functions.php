<?php

function get_query($dbconnect, $sql_condition)
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

    $find_sql = "SELECT 
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

	"
    ;

	

    // Add where / random / recent condition
	$find_sql .= $sql_condition;

    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_count = mysqli_num_rows($find_query);	

    // returns query and number of results
    return array($find_query, $find_count);

}

function to_clean($data) {
	$data = trim($data);	
	$data = htmlspecialchars($data); //  needed for correct special character rendering
	return $data;
}

?>