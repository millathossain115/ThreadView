<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

    if(isset($_GET['name'])){

        $name = $_GET['name'];
        $topics = $conn->query("SELECT* FROM topics WHERE category = '$name'");

	    $topics->execute();
	    $allTopics = $topics->fetchAll(PDO::FETCH_OBJ);
    }else {
		header("location: ".APPURL."/404.php");
	}

	

?>

<main>
    <section class="container mt-4">

    </section>

</main>


<div class="container">
	<div class="row"> 
		<div class="col-lg-8">
			<div class=" main-col ">
				<div class="block  shadow">
						
					<!-- <div class="block"> -->

              			<h4 class="float-start mt-3 mb-0 ms-3">Welcome to ThreadView</h4>
						<h6 class="float-end mt-3 mb-0 me-3 text-muted">A simple Forum</h6>
            			<div class="clearfix"></div>
						<div></div>

						<hr class="fw-bolder text-dark mx-3">



						<!--================== Topic 0 ==================-->
						
						<ul class="list-unstyled" id="topics">
							<?php foreach($allTopics as $topic) : ?>

							<li class="topic">
							<div class="row  h-25  mx-3 rounded-3 border my-2">

							<div class="col-md-2 ">
								
								<img class="avatar pull-left h-75 w-75 mx-3 mt-2 rounded-circle p-2" src="../img/<?php echo $topic->user_image ; ?>" />
							</div>

							<div class="col-md-10 ">
								<div class="">
									<h5 class="mt-3 mb-0"><a class="text-decoration-none" href="../topics/topic.php?id=<?php echo $topic->id; ?>" > <?php echo $topic->title; ?></a></h5>

									<div class="topic-info">
										<a class="text-decoration-none" href="<?php echo APPURL; ?>../categories/show.php?name=<?php echo $topic->category; ?>"><?php echo $topic->category; ?></a> >> 
										<a class="text-decoration-none" href="<?php echo APPURL; ?>/users/profile.php?name=<?php echo $topic->user_name ; ?>"><?php echo $topic->user_name ; ?></a> >> Posted on: <?php echo $topic->created_at ; ?> 
										

									</div>

								</div>
							</div>
						</div>
							</li>
							<?php endforeach;?>
							
							<!--================== Topic 1 ==================-->						
							<!--================== Topic 2 ==================-->						
							<!--================== Topic 3 ==================-->				
							<!--================== Topic 4 ==================-->
			
						</ul>
						<hr class="fw-bolder text-white mx-4">

					</div>
				</div>
			</div>

<?php require "../includes/footer.php"; ?>