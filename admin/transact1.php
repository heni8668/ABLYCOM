<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

		$stmt = $conn->prepare("SELECT *, products.id AS prodid, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['name'] = $row['name'];
		$output['date_view'] = date('M d, Y', strtotime($row['date_view']));
	
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['name']."</td>
				<td>Birr ".number_format($row['price'], 2)."</td>
				
			</tr>
		";
	}

	
	$pdo->close();
	echo json_encode($output);

?>