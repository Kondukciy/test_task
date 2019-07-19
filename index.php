<?php

require('db.php');
$connect = connectDB();
function sortCategory($category,$id_parent=null,$padding=0){
	$bool = false;
	$padding=$padding + 20;
	foreach ($category as $field) {

		if($id_parent == null && $field['parents_id']==null){
			echo '<h1 style="color:black;">' . $field['name'] . '</h1>';

			$bool = true;
			
		}

		
		if($field['parents_id']==$id_parent && $id_parent != null && $id_parent != $field['id'] ){
			echo '<h2 style="color:red;padding-left:'. $padding . ';">'. $field['name'] . '</h2>';
			
			$bool = true;
		}
		
		/*if($id_parent == null){
			$find_id = $field['id'];
			sortCategory($category,$find_id);
		}*/
		if($bool){
			$find_id = $field['id'];
			
			sortCategory($category,$find_id,$padding);
			$bool = false;
		}
		

	}
	return;
	
}

var_dump(getCategory($connect));
$category = getCategory($connect);
sortCategory($category);
//echo count($category);

?>