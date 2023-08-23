<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

if(!isset($_SESSION['username'])){
    header("location: ".APPURL."");
}

//Data RETRIVING 

    if(isset($_GET['name'])){

	    	$name = $_GET['name'];

		    $select =  $conn->query("SELECT* FROM users WHERE username='$name' ");
		    $select->execute();

		    $user = $select->fetch(PDO::FETCH_OBJ);


        //Number of Topics created by User
        	$num_topics =  $conn->query("SELECT COUNT(*) AS num_topics FROM topics WHERE user_name='$name' ");
		    $num_topics->execute();

		    $all_num_topics = $num_topics->fetch(PDO::FETCH_OBJ);

        //Number of replies created by User
        $num_replies =  $conn->query("SELECT COUNT(*) AS num_replies FROM replies WHERE user_name='$name' ");
		    $num_replies->execute();

		    $all_num_replies = $num_replies->fetch(PDO::FETCH_OBJ);
}

?>

<!-- Header Ended -->
    <div class="container mt-4 mb-3">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col ">
					<div class="block shadow-lg shadow-md rounded-2 ">

						<h4 class="float-start mt-3 mb-0 ms-3"><?php echo $user->name; ?></h4>
						<h6 class="float-end mt-3 mb-0 me-3 text-muted">ThreadView</h6>
						<div class="clearfix"></div>
						<hr class="mx-3">

                    
                        <!-- Topic 1 -->

					<ul class="list-unstyled mx-4" id="topics">

					


					<li class="topic topic">
						<div class="row border-start border-bottom border-top rounded-start-3 my-2">
							<div class="col-md-4">
								<div class="user-info  my-3">
									<img class="avatar float-start mx-3 mb-3 rounded-1" src="../img/<?php echo $user->avatar; ?>"  width="75" height="75"/>
									<ul class="list-unstyled">
										<li><strong><?php echo $user->username; ?></strong></li>
										<li><?php echo $all_num_topics->num_topics; ?> Posts</li>
										<li><a href="../users/profile.php?name=<?php echo $user->username; ?>">Profile</a>
									</ul>
								</div>
							</div>
							<div class="col-md-8 bg-body-secondary ">
								<div class="topic-content float-start p-2">
									<p><?php echo $user->about; ?></p> 

									<a class="btn btn-success p-1" role="button" href="" >Number Of Topics: <?php echo $all_num_topics->num_topics; ?></a>
									<a class="btn btn-info p-1" href="" role="button">Number of Replies: <?php echo $all_num_replies->num_replies; ?></a>

								</div>
							</div>
						</div>
					</li>


                    </ul>
                    <hr class="fw-bolder text-white mx-4">

                    </div>
                </div>
             </div>       
            
    

            
<?php require "../includes/footer.php";?>