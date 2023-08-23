<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

if(isset($_SESSION['username'])){
    header("location: ".APPURL."");
}

if (isset($_POST['submit'])) {
         if(empty($_POST["email"]) or empty($_POST["password"])) {
        
        echo "<script>alert('one or more input fields are empty');</script>";
        
    }else{

        // get the data here
         $email = $_POST['email'];
        // $username = $_POST['username'];
        $password = $_POST['password'];
        
        $login = $conn->query("SELECT* FROM users WHERE email = '$email'");
        $login->execute();
        
        $fetch = $login->fetch(PDO::FETCH_ASSOC);
        
        if ($login->rowCount()>0) {
          
          if (password_verify($password, $fetch['password'])) {

            $_SESSION['username'] = $fetch['username'];
            $_SESSION['name'] = $fetch['name'];
            $_SESSION['user_id'] = $fetch['id'];
            $_SESSION['email'] = $fetch['email'];
            $_SESSION['user_image'] = $fetch['avatar'];
            // $_SESSION['username'] = $fetch['username'];

            header("location: ".APPURL."");
            
            // echo "<script>alert('LOGGED IN');</script>";
          }else {
            echo "<script>alert('email or password is wrong');</script>";
          }
          
        }
      
    }
  }


?>


    <!-- Main Started -->

    <div class="container mt-4">
		<div class="row">
			<div class="col-lg-8">
				<div class="main-col">
					<div class="block shadow-lg shadow-md rounded-2 mb-3">

						<h4 class="float-start mt-3 mb-0 ms-3">Login</h4>
						<h6 class="float-end mt-3 mb-0 me-3 text-muted">A simple Forum</h6>
                        
						<div class="clearfix"></div>
                        <div></div>
                        
						<hr class="mx-3 mb-3">


						<form class="px-3" role="form"  method="post" action="login.php">
							
							<div class="form-group">
							<label  class="fw-bold mb-2 mt-2">Email Address*</label> <input type="email" class="form-control mb-3"
							name="email" placeholder="Enter Your Email Address">
							</div>
					
					<div class="form-group">
                        <label  class="fw-bold mb-2">Password*</label> <input type="password" class="form-control mb-3"
                    name="password" placeholder="Enter A Password">
                    </div>
	
			        <input name="submit" type="submit" class="btn btn-primary mb-3" value="Login" />
        </form>
					</div>
				</div>
			</div>





                <?php require "../includes/footer.php";?>