<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 

if(!isset($_SESSION['username'])){
    header("location: ".APPURL."");
}

//Data RETRIVING 

    if(isset($_GET['id'])){

	    	$id = $_GET['id'];

		    $select =  $conn->query("SELECT* FROM users WHERE id='$id' ");
		    $select->execute();

		    $user = $select->fetch(PDO::FETCH_OBJ);

            if($user->id !== $_SESSION['user_id']){
                header("location: ".APPURL."");
            }
            
}


    if (isset($_POST['submit'])) {
         if(empty($_POST["email"]) or empty($_POST["about"]) ) {
        
        echo "<script>alert('one or more input fields are empty');</script>";
        
    }else{
        
        $email = $_POST['email'];
        $about = $_POST['about'];
        // $body = $_POST['body'];
        // $user_name = $_SESSION['name'];


        // $dir = "img/".basename($avatar);

        $update = $conn->prepare("UPDATE users SET email =:email, about=:about WHERE id='$id'");

        $update->execute([

            ":email" => $email,
            ":about" => $about,
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

						<h4 class="float-start mt-3 mb-0 ms-3">Edit Profile</h4>
						<h6 class="float-end mt-3 mb-0 me-3 text-muted">ThreadView</h6>
                        
						<div class="clearfix"></div>
                        <div></div>
                        
						<hr class="mx-3 mb-3">


						<form class="px-3" role="form" method="POST" action="edit_user.php?id=<?php echo $id; ?>">
							<div class="form-group">
								<label  class="fw-bold mb-2 mt-2">Email</label>
								<input type="text" value="<?php echo $user->email; ?>" class="form-control mb-3" name="email" placeholder="Enter email">
							</div>
							
								<div class="form-group">
									<label  class="fw-bold mb-2 mt-2">About</label>
                                    
                                    <!-- =======CK Editor======= -->
									
                                    <!-- <textarea id="body" rows="10" cols="80" class="form-control mb-3" name="body"></textarea> -->
                                    <textarea  name="about" placeholder="" class="form-control mb-3" rows="6" cols="50"><?php echo $user->about; ?></textarea>
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

