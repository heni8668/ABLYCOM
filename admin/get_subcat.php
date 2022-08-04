<?php
include_once 'includes/session.php';

if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
 
 $conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM sub_catagory WHERE sid=$id");
	$stmt->execute();
	
		
 foreach($stmt as $row){
                         
                          echo "
                            <option value='".$row['id']."'>".$row['name']."</option>";
                        }
}

?>