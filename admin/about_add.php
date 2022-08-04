<?php
	include 'includes/session.php';
	include 'includes/slugify.php';




	if(isset($_POST['add'])){
		
		
			
			$name = $_POST['name'];
				$slug = slugify($name);

		$content = $_POST['description'];
		
			$conn = $pdo->open();
			
			
		
	
	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM about WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		
		

			try{
				$stmt = $conn->prepare("INSERT INTO about (name, slug, content) VALUES (:name, :slug, :content)");
				$stmt->execute(['name'=>$name, 'slug'=>$slug, 'content'=>$content]);
				$_SESSION['success'] = 'About added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up About form first';
	}

	header('location: about.php');

?>

