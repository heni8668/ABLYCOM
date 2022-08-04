<?php
	include 'includes/session.php';
	include 'includes/slugify.php';




	if(isset($_POST['add'])){
		
		
			
			$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$subcategory = $_POST['subcategory'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$location = $_POST['location'];
		$filename = $_FILES['photo']['name'];
			$now =  date('y-m-d');
			$conn = $pdo->open();
			
			
		
	

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE slug=:slug");
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
				$stmt = $conn->prepare("INSERT INTO products (category_id, subid, name, description, slug, price, photo, date_view, location) VALUES (:category, :subid, :name, :description, :slug, :price, :photo,:date_view, :location)");
				$stmt->execute(['category'=>$category, 'subid'=>$subcategory, 'name'=>$name, 'description'=>$description, 'slug'=>$slug, 'price'=>$price, 'photo'=>$new_filename, 'date_view'=>$now,'location'=>$location]);
				$_SESSION['success'] = 'User added successfully';

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

	header('location: products.php');

?>

