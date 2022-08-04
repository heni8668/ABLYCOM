<?php
	include 'includes/session.php';
			$stmt = $conn->prepare("Select * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$id]);
				$row = $stmt->fetch();
	if(isset($_POST['status'])){
	
				$id = $_POST['id'];
		$conn = $pdo->open();
	
if($row['status'] == 1)
            {
			
			$status = 3;	
			
		try{
			$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
			$stmt->execute(['status'=>$status, 'id'=>$id]);
			$_SESSION['Success'] = 'DisActive ';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		}
else if($row['status'] == 3)
            {
				
			
			$status = 1;	
			
				
		try{
				$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
			$stmt->execute(['status'=>$status, 'id'=>$id]);
			$_SESSION['Success'] = 'Active ';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		
		}
else{
	$_SESSION['error'] = 'Select user to Action first';
		}
		$pdo->close();
		}
		
		
		
	else{
		$_SESSION['error'] = 'Select user ';
	}

	header('location: users.php');
	
?>