<!DOCTYPE html>
<?php
	include 'includes/session.php'; 
?>
<html lang="en">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	</style>
	</head>
<body>
	<h2>Sourcecodester</h2>
	<br /> <br /> <br /> <br />
	<b style="color:blue;">Date Prepared:</b>
	<?php
		$date = date("Y-m-d", strtotime("+6 HOURS"));
		echo $date;
	?>
	<br /><br />
	<table class="table table-striped">
		<thead>
			<tr>
				<th> Name</th>
				<th>Price</th>
				<th>location</th>
				<th>description</th>
			</tr>
		</thead>
		<tbody>
			<?php
					include 'includes/session.php'; 
					
					$conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM product");
                        $stmt->execute();
                        foreach($stmt as $fetch){
						
				?>
				
				<tr>
					
					<td><?php echo $fetch['name']?></td>
					<td><?php echo $fetch['price']?></td>
					<td><?php echo $fetch['location']?></td>
						
					
					
				</tr>
				
				<?php
					}
					 $pdo->close();
				?>
		</tbody>
	</table>
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>
</html>


