<?php
	include 'includes/session.php';

	if(isset($_POST['activate'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();
		
		$stmt = $conn->prepare("select * from users WHERE id=:id");
			$stmt->execute(['id'=>$id]);
			$row = $stmt->fetch();
		
if ($row['status'] == 3){
		try{
			$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
			$stmt->execute(['status'=>1, 'id'=>$id]);
			$_SESSION['success'] = 'User activated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	
else if ($row['status'] == 1){
		try{
			$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
			$stmt->execute(['status'=>3, 'id'=>$id]);
			$_SESSION['success'] = 'User Diactivated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
else{

$_SESSION['error'] = 'Select user ';

}	
	
	
	}
	else{
		$_SESSION['error'] = 'Select user to activate first';
	}

	header('location: users.php');
?>