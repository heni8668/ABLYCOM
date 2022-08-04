<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['transaction'] = $row['name'];
		$output['date'] = date('M d, Y', strtotime($row['date_view']));
		$subtotal = $row['price'];
		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['name']."</td>
				<td>Birr ".number_format($row['price'], 2)."</td>
				
				<td>Birr ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}

	
	$output['total'] = '<b>Birr '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>