<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: ../login.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_SESSION['user']]);
	$admin = $stmt->fetch();

	$pdo->close();

?>