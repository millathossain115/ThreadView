<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

if(isset($_SESSION['username'])){
    header("location: ".APPURL."");
}

    if (isset($_POST['submit'])) {
         if(empty($_POST["name"]) or empty($_POST["email"]) or empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["about"]) ) {
        
        echo "<script>alert('one or more input fields are empty');</script>";
        
    }else{
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $about = $_POST['about'];
        $avatar = $_FILES['avatar']['name'];

        $dir = "img/".basename($avatar);
        $insert = $conn->prepare("INSERT INTO users (name, email, username, password, about, avatar) VALUES (:name, :email, :username, :password, :about, :avatar)");

        $insert->execute([

            ":name" => $name,
            ":email" => $email,
            ":username" => $username,
            ":password" => $password,
            ":about" => $about,
            ":avatar" => $avatar,
            
        ]);

        header("location: login.php");
    }
    
    }
   


?>

<main>
    <section class="container mt-4">

    </section>

</main>

    <div class="container ">
		<div class="row "> 
			<div class=" col-lg-8">
				<div class=" main-col ">
					<div class="block shadow-lg shadow-md rounded-3 mb-3">
                        
              <h4 class="float-start mt-3 mb-0 ms-3">Register</h4>
						  <h6 class="float-end mt-3 mb-0 me-3 text-muted">A simple Forum</h6>          
						  <div class="clearfix"></div>
              <div></div>
                        
						  <hr class="mx-3">


						<form class="px-3" role="form" enctype="multipart/form-data" method="post" action="register.php">
							
              <div class="form-group ">
							<label class="fw-bold mb-2">Name*</label> <input type="text" class="form-control mb-3"
							name="name" placeholder="Enter Your Name">
							</div>

							<div class="form-group">
							<label class="fw-bold mb-2">Email Address*</label> <input type="email" class="form-control mb-3"
							name="email" placeholder="Enter Your Email Address">
							</div>

						    <div class="form-group">
					        <label class="fw-bold mb-2">Choose Username*</label> <input type="text"
							class="form-control mb-3" name="username" placeholder="Create A Username">
						    </div>

					        <div class="form-group">
					        <label class="fw-bold mb-2">Password*</label> <input type="password" class="form-control mb-3"
				            name="password" placeholder="Enter A Password">
				            </div>

				            <!-- <div class="form-group">
		                    <label class="fw-bold mb-2">Confirm Password*</label> <input type="password"
			                class="form-control mb-3" name="password2"
			                placeholder="Enter Password Again">
			                </div> -->

				            <div class="form-group">
					        <label class="fw-bold mb-2">Upload Avatar</label><br>
				            <input type="file" name="avatar">
				            <p class="help-block"></p>
					        </div>					
                
                            <div class="form-group">
					        <label class="fw-bold mb-2">About Me</label>
					        <textarea id="about" rows="3" cols="80" class="form-control mb-3"
					        name="about" placeholder="Tell us about yourself (Optional)"></textarea>
			                </div>

			
                            <!-- <button type="submit" class="btn btn-primary" name="register" value="Register" >Register</button> -->
                            <input name="submit" type="submit" class="btn btn-primary mb-3" value="submit" />

                        </form>
					</div>
				</div>
			</div>



			<!-- Sidebar counted as footer1 -->
			<!-- <div class="col-md-12 col-lg-4">
				<div class="sidebar"> -->
					<!-- <div class="block shadow"> -->


                    <?php require "../includes/footer.php";?>