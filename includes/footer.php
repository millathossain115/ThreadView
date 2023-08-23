<?php 

	$topics = $conn->query("SELECT COUNT(*) AS all_topics FROM topics");
	$topics->execute();

	$allTopics = $topics->fetch(PDO::FETCH_OBJ);


	//fetch number of category according to topic
	$categories= $conn->query("SELECT categories.id AS id, categories.name AS name, COUNT(topics.category) AS count_category FROM categories LEFT JOIN topics ON categories.name = topics.category GROUP BY (topics.category)");

	$categories->execute();
	$allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

	//Forum statistics

	//Number of users
	$users = $conn->query("SELECT COUNT(*) AS count_users FROM users");
	$users->execute();
	$allUsers = $users->fetch(PDO::FETCH_OBJ);
	
	//Number of topics
	$topics_count = $conn->query("SELECT COUNT(*) AS topics_count FROM topics");
	$topics_count->execute();
	$allTopics_count = $topics_count->fetch(PDO::FETCH_OBJ);
	
	//Number of categories
	$categories_count = $conn->query("SELECT COUNT(*) AS categories_count FROM categories");
	$categories_count->execute();
	$allCategories_count = $categories_count->fetch(PDO::FETCH_OBJ);

?>


<!-- Sidebar counted as footer1 -->
			<div class="col-md-12 col-lg-4">
			<div class="sidebar">		
					
				<div class="block shadow rounded-2">
					<h5 class="ms-3 pt-3">Categories</h5>
                    <hr class="fw-bolder text-dark mx-2">

					<div class="list-group block ">
						<a href="#" class="list-group-item active mx-1 rounded-2">All Topics <span class="badge float-end bg-white text-dark rounded-pill fw-bolder"><?php echo $allTopics->all_topics;?></span></a> 

						<?php foreach($allCategories as $category ): ?>
						<a href="<?php echo APPURL; ?>/categories/show.php?name=<?php echo $category->name; ?>" class="list-group-item"><?php echo $category->name; ?><span class="badge float-end rounded-pill bg-primary text-white me-2"><?php echo $category->count_category; ?></span></a>
						<?php endforeach; ?>

						
					</div>
				</div>

					<div class="block shadow mt-3 rounded-2" >

						<h5 class="pt-2 ms-3">Forum Statistics</h5>

            <!-- <hr class="fw-bolder text-dark mx-4"> -->

						<div class="list-group">
							<a href="#" class="list-group-item">Total Number of Users:<span class="badge float-end rounded-pill bg-primary text-white me-2"><?php echo $allUsers->count_users;?></span></a>
							<a href="#" class="list-group-item">Total Number of Topics:<span class="badge float-end rounded-pill bg-primary text-white me-2"><?php echo $allTopics_count->topics_count;?></span></a>
							<a href="#" class="list-group-item">Total Number of Categories: <span class="badge float-end rounded-pill bg-primary text-white me-2"><?php echo $allCategories_count->categories_count;?></span></a>
							
						</div>
				    </div>

			</div>	
			</div>
		</div>
	</div>
</div><!-- /.container -->
   
 </section>       
</main>


<!-- main ended -->

    <footer>
      <!-- <h2>Reserved By FYDP team-UIU</h2> -->
    </footer>
	<script src="https://kit.fontawesome.com/3e6a4f7f52.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"></script>
	  
  </body>
</html>
