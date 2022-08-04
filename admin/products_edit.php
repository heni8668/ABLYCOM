<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$subid = $_POST['subcategory'];
		$price = $_POST['price'];
		$location = $_POST['location'];
		$description = $_POST['description'];
	$now =  date('y-m-d');
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE products SET name=:name, slug=:slug, category_id=:category, subid=:subcategory, price=:price, description=:description, date_view=:date_view,location=:location WHERE id=:id");
			$stmt->execute(['name'=>$name, 'slug'=>$slug, 'category'=>$category,'subcategory'=>$subid, 'price'=>$price, 'description'=>$description,  'date_view'=>$now,'location'=>$location, 'id'=>$id]);
			$_SESSION['success'] = 'Product updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products.php');

?>