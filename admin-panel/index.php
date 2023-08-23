<?php require "../admin-panel/layouts/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 

if(!isset($_SESSION['adminname'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
}

// Showing Topics Stats
  $topics =  $conn->query("SELECT COUNT(*) AS count_topics FROM topics");
	$topics->execute();
	$allTopics = $topics->fetch(PDO::FETCH_OBJ);

  // Showing category Stats
  $categories =  $conn->query("SELECT COUNT(*) AS count_categories FROM categories");
	$categories->execute();
	$allCategories = $categories->fetch(PDO::FETCH_OBJ);

  // Showing Admin Stats
  $admins =  $conn->query("SELECT COUNT(*) AS count_admins FROM admins");
	$admins->execute();
	$allAdmins = $admins->fetch(PDO::FETCH_OBJ);

  // Showing Replies Stats
  $replies =  $conn->query("SELECT COUNT(*) AS count_replies FROM replies");
	$replies->execute();
	$allReplies = $replies->fetch(PDO::FETCH_OBJ);

?>


    <div class="container-fluid  mx-auto ms-lg-5">
            
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col col-lg-3 col-md-6">
          <div class="card shadow mb-3 h-100">
            <div class="card-body">
              <h5 class="card-title fw-bold">Topics</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">Total Topics: <span class="fw-bold"><?php echo $allTopics->count_topics; ?></span></p>
             
            </div>
          </div>
        </div>

        <div class="col col-lg-3 col-md-6">
          <div class="card shadow mb-3 h-100">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">Total Categories: <span class="fw-bold"><?php echo $allCategories->count_categories; ?></span></p>
              
            </div>
          </div>
        </div>

        <div class="col col-lg-3 col-md-6">
          <div class="card shadow mb-3 h-100">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">Total Admins: <span class="fw-bold"><?php echo $allAdmins->count_admins; ?></span></p>
              
            </div>
          </div>
        </div>
        <div class="col col-lg-3 col-md-6">
          <div class="card shadow mb-3 h-100">
            <div class="card-body">
              <h5 class="card-title">Replies</h5>
              
              <p class="card-text">Total Replies: <span class="fw-bold"><?php echo $allReplies->count_replies; ?></span></p>
              
             </div>
          </div>
        </div>
      </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require "../admin-panel/layouts/footer.php"; ?>
