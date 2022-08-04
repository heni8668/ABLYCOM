<?php include 'includes/session.php'; ?>
<h1 style="text-align:center;">Product Report</h1>
<?php $from=date('Y-m-d',strtotime($_POST['from']));
				$to=date('Y-m-d',strtotime($_POST['to']));  
			$cate = $_POST['cate'];  
			
							 

?>

<h2 style="text-align:center;">From:<?php echo " ".$from; ?><br>To:<?php echo " ".$to; ?> </h2>
			  <div class="box-header with-border">

<div class="box-body">
              <table style="width:100%;border:2px;text-align:left;" id="example1" class="table table-bordered">
                <thead>
				
			 <th>Date</th>
             <th>Category</th>
                <th>Product Name</th>
				<th>Photo</th>
			    <th>Price</th>
			 <th>Location</th>
          
			 
                </thead>
                <tbody>
                  <?php
				  
				try{	
					  
    if (isset($_POST['print'])){ 

                	  $conn = $pdo->open();
					  
					  
					  if ( $cate == '0')
			{
				  $stmt = $conn->prepare("SELECT *, category.name AS catname FROM products INNER JOIN category ON products.category_id = category.id where products.date_view between '$from' and '$to' ORDER BY date_view DESC");      
$stmt->execute(); 
$row = $stmt->fetch();
    foreach($stmt as $row){
					 
			
			
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                       
				    echo "
                         <tr>
						  
                            <td>".date('M d, Y', strtotime($row['date_view']))."</td>
                            <td>".$row['catname']."</td>							
							<td>".$row['slug']."</td>

                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                            </td>
                            <td>Birr ".number_format($row['price'], 2)."</td>
							<td>".$row['location']."</td>
                         </tr>
                        ";
	}


			}
			else{
					  $stmt = $conn->prepare("SELECT *, category.name AS catname FROM products INNER JOIN category ON products.category_id = category.id where products.date_view between '$from' and '$to' and category_id = '$cate' ORDER BY date_view DESC");      
$stmt->execute(); 
$row = $stmt->fetch();
						//$stmt = $conn->prepare("SELECT products.*,category.* FROM `products`, `category` WHERE products.category_id = category.id  and products.date_view between '$from' and '$to'");      
					
		 
		 
	
                foreach($stmt as $row){
					 
			
			
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                       
				    echo "
                         <tr>
						 
                            <td>".date('M d, Y', strtotime($row['date_view']))."</td>
                            <td>".$row['catname']."</td>							
							<td>".$row['slug']."</td>

                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                            </td>
                            <td>Birr ".number_format($row['price'], 2)."</td>
							<td>".$row['location']."</td>
                         </tr>
                        ";
	} } }
				}
                    
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }
                    $pdo->close()
            
				    ?>
                </tbody>
					  
              </table>
			  <button type="submit" class="btn btn-primary btn-flat"  onclick="window.print()" ><i class="fa fa-save"></i>Print</button>				  												

		
            </div>     </div>