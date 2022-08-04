<?php
	include 'includes/session.php';
	include 'includes/slugify.php';




	if(isset($_POST['add'])){
		
		
			
			$name = $_POST['name'];
		$slug = slugify($name);
	
		$description = $_POST['description'];

		$filename = $_FILES['photo']['name'];
		
			$conn = $pdo->open();
			
			
		
	

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM project WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Product already exist';
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
				$stmt = $conn->prepare("INSERT INTO project (name, photo, slug, description) VALUES (:name, :photo, :slug, :description)");
				$stmt->execute(['name'=>$name,'photo'=>$new_filename, 'slug'=>$slug, 'description'=>$description]);
				$_SESSION['success'] = 'Project added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Project form first';
	}

	header('location: project.php');

?>

