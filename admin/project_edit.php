<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
	
		$description = $_POST['description'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE project SET name=:name, description=:description, slug=:slug  WHERE id=:id");
			$stmt->execute(['name'=>$name, 'description'=>$description,  'slug'=>$slug,  'id'=>$id]);
			$_SESSION['success'] = 'project updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit project form first';
	}

	header('location: project.php');

?>