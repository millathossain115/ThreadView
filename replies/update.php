<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 

if(!isset($_SESSION['username'])){
    header("location: ".APPURL."");
}

//Data RETRIVING 

    if(isset($_GET['id'])){

	    	$id = $_GET['id'];

		    $select =  $conn->query("SELECT* FROM replies WHERE id='$id' ");
		    $select->execute();

		    $reply = $select->fetch(PDO::FETCH_OBJ);

            if($reply->user_id !== $_SESSION['user_id']){
                header("location: ".APPURL."");
            }
            
}


    if (isset($_POST['submit'])) {
         if(empty($_POST["reply"]) ) {
        
        echo "<script>alert('one or more input fields are empty');</script>";
        
    }else{
        
        $reply = $_POST['reply'];
        // $category = $_POST['category'];
        // $body = $_POST['body'];
        // $user_name = $_SESSION['name'];


        // $dir = "img/".basename($avatar);

        $update = $conn->prepare("UPDATE replies SET reply =:reply WHERE id='$id' ");

        $update->execute([

            ":reply" => $reply,
            // ":category" => $category,
            // ":body" => $body,
            // ":user_name" => $user_name,

            
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

						<h4 class="float-start mt-3 mb-0 ms-3">Reply to Topic</h4>
						<h6 class="float-end mt-3 mb-0 me-3 text-muted">A simple Forum</h6>
                        
						<div class="clearfix"></div>
                        <div></div>
                        
						<hr class="mx-3 mb-3">


						<form class="px-3" role="form" method="POST" action="update.php?id=<?php echo $id; ?>">
							<div class="form-group">
								<label  mb-3class="fw-bold mb-2 mt-2">Reply</label>
								<input type="text" value="<?php echo $reply->reply; ?>" class="form-control mb-3" name="reply" placeholder="Make a Reply">
							</div>
							
								
							<button type="submit" name="submit" class="btn btn-primary mb-3 mt-4">Update</button>
						</form>
					</div>
				</div>
			</div>




<?php require "../includes/footer.php";?>

