<?php require "../threadview/includes/header.php"; ?>
<?php require "../threadview/config/config.php"; ?>

<?php 

	$topics = $conn->query("SELECT topics.id AS id, topics.title AS title, topics.category AS category,
	topics.user_name AS user_name,
	topics.user_image AS user_image,
	topics.created_at AS created_at,
	COUNT(replies.topic_id) AS count_replies FROM topics LEFT JOIN replies ON
	topics.id = replies.topic_id GROUP BY(replies.topic_id)");

	$topics->execute();
	$a11Topics = $topics->fetchAll(PDO::FETCH_OBJ);

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
							<?php foreach($a11Topics as $topic) : ?>

							<li class="topic">
							<div class="row  h-25  mx-3 rounded-3 border my-2" id="topicBox">

							<div class="col-md-2 ">
								
								<img class="avatar pull-left h-75 w-75 mx-3 mt-2 rounded-circle p-2" src="../threadview/img/<?php echo $topic->user_image ; ?>" />
							</div>

							<div class="col-md-10 ">
								<div class="">
									<h5 class="mt-3 mb-0"><a class="text-decoration-none" href="../threadview/topics/topic.php?id=<?php echo $topic->id; ?>" > <?php echo $topic->title; ?></a></h5>

									<div class="topic-info">
										<a class="text-decoration-none" href="<?php echo APPURL; ?>../categories/show.php?name=<?php echo $topic->category; ?>"> <?php echo $topic->category; ?></a> >> 
										
										<a class="text-decoration-none" href="../threadview/404.php"><?php echo $topic->user_name ; ?></a> >> Posted on: <?php echo $topic->created_at ; ?> 
										<span class="badge rounded-pill text-bg-primary float-end me-4"><?php echo $topic->count_replies ; ?></span>
									</div>

								</div>
							</div>
						</div>
							</li>
							<?php endforeach;?>
			
						</ul>
						<hr class="fw-bolder text-white mx-4">

					</div>
				</div>
			</div>

<?php require "includes/footer.php"; ?>