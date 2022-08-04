<?php
	include 'includes/session.php';
	include 'includes/slugify.php';




	if(isset($_POST['add'])){
		
		
			
			$name = $_POST['name'];
		$slug = slugify($name);
		
		$description = $_POST['description'];
		
		$filename = $_FILES['photo']['name'];
		
			$conn = $pdo->open();
			
			
		
	

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM training WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Training already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO training (name, description, slug, photo) VALUES ( :name, :description, :slug, :photo)");
				$stmt->execute(['name'=>$name, 'description'=>$description, 'slug'=>$slug, 'photo'=>$new_filename]);
				$_SESSION['success'] = 'Training added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: training.php');

?>

