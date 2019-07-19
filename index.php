<?php

require('db.php');

function sortCategory($category,$id_parent=null,$padding=0){
	$bool = false;
	$padding=$padding + 20;
	foreach ($category as $field) {

		if($id_parent == null && $field['parents_id']==null){
			echo '<span style="color:black; display:block;">' . $field['name'] . '</span>';
			$bool = true;
			
		}

		
		if($field['parents_id']==$id_parent && $id_parent != null && $id_parent != $field['id'] ){
			echo '<span style="padding-left:'. $padding . '; display:block;">'. $field['name'] . '</span>';
			$bool = true;
		}
		
		
		if($bool){
			$find_id = $field['id'];
			sortCategory($category,$find_id,$padding);
			$bool = false;
		}
		

	}

	return;
	
}





$connect = connectDB();
$category = getCategory($connect);
sortCategory($category);

?>