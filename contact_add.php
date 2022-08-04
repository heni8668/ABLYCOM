<?php

 include 'includes/session.php'; 



	if(isset($_POST['send'])){
		
		
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$subject = $_POST['subject'];
			

		$message = $_POST['message'];
		
			$conn = $pdo->open();
	
			try{
				$stmt = $conn->prepare("INSERT INTO contact (name, email, phone, subject, message) VALUES (:name, :email, :phone, :subject, :message)");
				$stmt->execute(['name'=>$name, 'email'=>$email, 'phone'=>$phone, 'subject'=>$subject, 'message'=>$message]);
				$_SESSION['success'] = 'Sent';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Contact form first';
	}

	header('location: contact.php');

?>

