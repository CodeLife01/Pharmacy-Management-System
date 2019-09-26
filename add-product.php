<?php

include_once 'dbconnect.php';
if(isset($_POST['upload'])){
	$file=$_FILES['pic'];
	$filename=$_FILES['pic']['name'];
  $filetmpname=$_FILES['pic']['tmp_name'];
  $filesize=$_FILES['pic']['size'];
  $fileerror=$_FILES['pic']['error'];

	$description = mysqli_real_escape_string($con, $_POST['description']);
	$category = mysqli_real_escape_string($con, $_POST['category']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
  if($description==""){
    $description = "No Description";
	}

	$temp=explode('.',$filename);
	$fileext=strtolower(end($temp));
	if($fileerror === 0){
  	if($filesize < 100000){
      $filenewname = uniqid('',true).".".$fileext;
      if(!is_dir('uploads/'.$category)) {
      	mkdir('uploads/'.$category, 0777, true);
      }
      $path = 'uploads/'.$category.'/'.$filenewname;
      if(move_uploaded_file($filetmpname,$path)){
      	if(mysqli_query($con,"INSERT INTO products(name,cname,description,price,image) VALUES('" . $name . "', '" . $category . "', '" . $description . "', '" . $price . "', '" . $path . "')")){
					$pmsg = "Product added successfully";
				}
      }
    }
    else {
    	$errormsg = "Your file size is greater than 100K";
    }
  }
  else {
  	$errormsg = "Error uploading file.Inconvenience regretted.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AddProduct|Admin</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<style type="text/css">
	.bs-example{
		margin: 20px;
	}
</style>

<style>
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=back] {
    background-color: blue;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	text-align:center;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.containerr {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	margin-top: 37px;
}
</style>

</head>
<body background="img/medicine.png">
</div>
<div style="margin-top:10px">
    <div style="margin-top: 42px;margin-left: 200px;margin-right: 200px;">
        <div id="sectionA" class="tab-pane fade in active">
			   <div class="containerr">
  					<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="requeststatus" enctype="multipart/form-data">
						<h2 style="text-align:center;">ADD PRODUCT</h2>
						<label for="name">Product Name</label>
						<input type="text" id="name" name="name" placeholder="Product Name.." required>
						<label for="price">Product Price</label>
						<br>
	    				<input style="padding: 8px;border-radius: 4px;margin-top: 7px;" type="number" id="price" name="price" placeholder="Product Price.." required>
						<br>
						<label style="    margin-top: 15px;" for="cat">Category</label>
    					<select id="cat" name="category">
								<?php

									$sql = mysqli_query($con, "SELECT * FROM category");
									$row = mysqli_num_rows($sql);
									while ($row = mysqli_fetch_array($sql)){
									echo 	'<option value="'.$row['cname'].'"><i class="fa fa-arrow-right" aria-hidden="true"></i>'.$row['cname'].'</option>';
								}
								?>
    					</select>
						<label for="subject">Description</label>
						<textarea id="subject" name="description" placeholder="Write something.." style="height:200px" required></textarea>
						<label for="pic">Product Image</label>
						<input style="margin-bottom: 25px;" id="pic" type="file" name="pic" accept="image/*" required>
						<input type="submit" value="Submit" name="upload">
						<a href="./Admin/mng-med-index.php"><input type="back" value="Back" name="bank"></a>
  					</form>
				   <span><?php if (isset($pmsg)) { echo $pmsg; } ?></span>
			   	</div>
		   </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
