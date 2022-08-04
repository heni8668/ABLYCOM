<?php include 'includes/session.php'; ?>
<?php


?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	
	  <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" action="datereport.php">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                   <!-- <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">-->
				   
				   <input type="date" name="from">
				   <input type="date" name="to">
				
				   <?php
                       ?>
                    <select class="form-control input-sm" id="select_category"  name="cate">
                       <option value="0">ALL</option>
                     
<?php 
         $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();
                        foreach($stmt as $crow){
                         
                          echo "
                            <option value='".$crow['id']."'>".$crow['name']."</option>";
                        }

                        $pdo->close();
							
                      ?>
                    </select>
					
							
                  </div>

				  <button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><span class=""></span> FIND</button>
                </form>
              </div>
            </div>
			
			  <div class="box-header with-border">
       
             
            </div>
			
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
				
			 <th>Date</th>
             <th>Name</th>
             <th>Photo</th>
			    <th>Price</th>
			 <th>Location</th>
             <th>Description</th>
			 
                </thead>
                <tbody>
                  <?php
				  
				try{	
					  
    if (isset($_POST['print'])){ 

			 
                $from=date('Y-m-d',strtotime($_POST['from']));
				$to=date('Y-m-d',strtotime($_POST['to']));  
			$cate = $_POST['cate'];  
			
                	  $conn = $pdo->open();
					  $stmt = $conn->prepare("SELECT * FROM products INNER JOIN category ON products.category_id = category.id where products.date_view between '$from' and '$to' and category_id = '$cate'");      
$stmt->execute(); 
$row = $stmt->fetch();
						//$stmt = $conn->prepare("SELECT products.*,category.* FROM `products`, `category` WHERE products.category_id = category.id  and products.date_view between '$from' and '$to'");      
						
		 
		 
	
                foreach($stmt as $row){
					 
			
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                       
				    echo "
                         <tr>
						   <td class='hidden'></td>
                            <td>".date('M d, Y', strtotime($row['date_view']))."</td>
                            <td>".$row['name']."</td>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                            </td>
                            <td>Birr ".number_format($row['price'], 2)."</td>
							<td>".$row['location']."</td>
                             <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
                         </tr>
                        ";
				} } 
				}
                    
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }
                    $pdo->close()
            
				     /*   $conn = $pdo->open();

                   try{  
				   
				   $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM products $where");
                      $stmt->execute();
					  
					  
					   foreach($stmt as $row){
                        $stmt = $conn->prepare("SELECT * FROM products  LEFT JOIN category  ON products.category_id=category.id  $where");
                        $stmt->execute(['id'=>$row['id']]);
						
						$image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                       
                        echo "
                       
                          <tr>
						   <td class='hidden'></td>
                            <td>".date('M d, Y', strtotime($row['date_view']))."</td>
                            <td>".$row['name']."</td>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                            </td>
                            <td>Birr ".number_format($row['price'], 2)."</td>
							<td>".$row['location']."</td>
                           

                          </tr>
                        ";
					   } 
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  */?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/products_modal.php'; ?>
    <?php include 'includes/products_modal2.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<!-- Date Picker -->
<script>
$(function(){
  //Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
  
});
</script>
<script>
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'transact1.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.date);
        $('#transid').html(response.transaction);
        $('#detail').prepend(response.list);
        $('#total').html(response.total);
      }
    });
  });

  $("#transaction").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>






<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });


  
  

  
  

  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });
 $('#addproduct').click(function(e){
    e.preventDefault();
    getSubCategory();
  });
  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'date_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.prodname);
      $('.prodid').val(response.prodid);
      $('#edit_name').val(response.prodname);
      $('#catselected').val(response.category_id).html(response.catname);
      $('#edit_price').val(response.price);
      CKEDITOR.instances["editor2"].setData(response.description);
      getCategory();getSubCategory();
    }
  });
}
function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}



</script>





<!--

  $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'datereport.php';
    }
    else{
      window.location = 'datereport.php?category='+val;
    }
  });
-->





</body>
</html>
