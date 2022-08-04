
<?php 

include_once 'includes/session.php';
?>
<!-- Description -->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<?php 
         $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();?>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Product</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>

                  <label for="category" class="col-sm-1 control-label">Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="category" name="category"  onChange="getSubcat(this.value);"  required>
                      <option value="" selected>- Select Category-</option>
					<?php   
                     foreach($stmt as $crow){
                         
                          echo "
                            <option value='".$crow['id']."'>".$crow['name']."</option>";
                        }

                      
							
                      ?>
					  
                    </select>
                  </div>
				   
                </div>
				  
                <div class="form-group">
				<label for="price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="price" name="price" required>
                  </div>
				<label for="subcategory" class="col-sm-1 control-label">Sub Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="subcategory" name="subcategory"   required>
                      <option value="" selected>- Select -</option>
                    </select>
                 
				  <br></div></div>
				  
 <div class="form-group">
                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
                   </div>
                
				 
				     <label for="location" class="col-sm-1 control-label">Location</label>
				
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="location" name="location" required>
                  </div>
				 </div>
				 
				 
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="description" rows="10" cols="80" required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="prodid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
					
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>


					  
					  
					  
					  <?php 

/*
if (isset($_POST['categoryID'])) {
		
	

		
			$output = '';

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM sub_catagory where sid=".$_POST['categoryID']);
	$stmt->execute();
		$row = $stmt->fetch();

		
	if ($row['numrows'] > 0 ) {
			echo '<option value="">Select Sub Category</option>';
		  
                      foreach($stmt as $row){
		$output .= "
			<option value='".$row['id']."'>".$row['name']."</option>
		";
	}
	}else{

		echo '<option>No Sub Category Found!</option>';
}

	$pdo->close();
	echo json_encode($output);
}
*/

?>