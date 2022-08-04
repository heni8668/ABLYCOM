<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		
		$content = $_POST['description'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE about SET name=:name, slug=:slug, content=:content WHERE id=:id");
			$stmt->execute(['name'=>$name, 'slug'=>$slug, 'content'=>$content, 'id'=>$id]);
			$_SESSION['success'] = 'About updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit About form first';
	}

	header('location: about.php');

?>