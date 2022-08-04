<?php 
include_once 'includes/session.php';

if (isset($_POST['categoryID'])) {
	$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM sub_catagory where sid=".$_POST['categoryID']);
		$stmt->execute();
		$row = $stmt->fetch();
		

		
	if ($row['numrows'] > 0 ) {
			echo '<option value="">Select Sub Category</option>';
		  
                        foreach($stmt as $row){
                         
                          echo "
                            <option value='".$row['id']."'>".$row['name']."</option>";
                        }
	}else{

		echo '<option>No State Found!</option>';
}
$pdo->close();

}


?>