<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 

if(!isset($_SESSION['username'])){
    header("location: ".APPURL."");
}

//Data RETRIVING 

    if(isset($_GET['id'])){

	    	$id = $_GET['id'];

		    $select =  $conn->query("SELECT* FROM topics WHERE id='$id' ");
		    $select->execute();

		    $topic = $select->fetch(PDO::FETCH_OBJ);

            if($topic->user_name !== $_SESSION['username']){
                header("location: ".APPURL."");
            }
            
}


    if (isset($_POST['submit'])) {
         if(empty($_POST["title"]) or empty($_POST["category"]) or empty($_POST["body"]) ) {
        
        echo "<script>alert('one or more input fields are empty');</script>";
        
    }else{
        
        $title = $_POST['title'];
        $category = $_POST['category'];
        $body = $_POST['body'];
        $user_name = $_SESSION['name'];


        // $dir = "img/".basename($avatar);

        $update = $conn->prepare("UPDATE topics SET title =:title, category=:category,body=:body,user_name=:user_name ");

        $update->execute([

            ":title" => $title,
            ":category" => $category,
            ":body" => $body,
            ":user_name" => $user_name,

            
        ]);

        header("location: ".APPURL."");
    }
    
    }

?>


    <!-- Main Started -->

    <div class="container mt-4">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block shadow-lg shadow-md rounded-2">

						<h4 class="float-start mt-3 mb-0 ms-3">Create a Topic</h4>
						<h6 class="float-end mt-3 mb-0 me-3 text-muted">A simple Forum</h6>
                        
						<div class="clearfix"></div>
                        <div></div>
                        
						<hr class="mx-3 mb-3">


						<form class="px-3" role="form" method="POST" action="../topics/update.php?id=<?php echo $id; ?>">
							<div class="form-group">
								<label  class="fw-bold mb-2 mt-2">Topic Title</label>
								<input type="text" value="<?php echo $topic->title; ?>" class="form-control mb-3" name="title" placeholder="Enter Post Title">
							</div>
							<div class="form-group">
								<label  class="fw-bold mb-2 mt-2">Category</label>
								<select class="form-control mb-3" name="category">
									<option value="Search">Search</option>
									<option value="New Arrival">New Arrival</option>
									<option value="Repair & Modify">Repair & Modify</option>
									<option value="Business & Marketing">Business & Marketing</option>
									<option value="Off Topic">Off Topic</option>
							</select>
							</div>
								<div class="form-group">
									<label  class="fw-bold mb-2 mt-2">Topic Body</label>
                                    
                                    <!-- =======CK Editor======= -->
									
                                    <!-- <textarea id="body" rows="10" cols="80" class="form-control mb-3" name="body"></textarea> -->
                                    <textarea  name="body" placeholder="" class="form-control mb-3" rows="12" cols="50"><?php echo $topic->body; ?></textarea>
									<!-- <script>CKEDITOR.replace('body');</script> -->
                                    <script>
                                        window.onload = function() {
                                        CKEDITOR.replace('body');
                                        };
                                    </script>

								</div>
							<button type="submit" name="submit" class="btn btn-primary mb-3 mt-4">Update</button>
						</form>
					</div>
				</div>
			</div>




<?php require "../includes/footer.php";?>

