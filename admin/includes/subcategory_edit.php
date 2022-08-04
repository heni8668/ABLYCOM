<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$sid = $_POST['sid'];
		$name = $_POST['name'];

		try{
			$stmt = $conn->prepare("UPDATE sub_catagory SET name=:name, sid=:sid WHERE id=:id");
			$stmt->execute(['name'=>$name, 'sid'=>$sid]);
			$_SESSION['success'] = 'Sub Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit sub category form first';
	}

	header('location: subcategory.php');

?>