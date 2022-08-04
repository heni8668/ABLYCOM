
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$sid = $_POST['id'];
		$name = $_POST['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM sub_catagory WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Sub Category already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO sub_catagory (sid ,name) VALUES (:sid,:name)");
				
				$stmt->execute(['sid'=>$sid, 'name'=>$name]);
				$_SESSION['success'] = 'Sub Category added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up sub category form first';
	}

	header('location: subcategory.php');

?>