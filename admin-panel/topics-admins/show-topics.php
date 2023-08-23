<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 


    if(!isset($_SESSION['adminname'])){
        header("location: ".ADMINURL."/admins/login-admins.php");
    }
  
    $topics =  $conn->query("SELECT* FROM topics");
	  $topics->execute();
	  $allTopics = $topics->fetchAll(PDO::FETCH_OBJ);
 
?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline mt-3">Topics</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">category</th>
                    <th scope="col">user</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($allTopics as $topic): ?>
                  <tr>
                    <th scope="row"><?php echo $topic->id; ?></th>
                    <td><?php echo $topic->title; ?></td>
                    <td><?php echo $topic->category; ?></td>
                    <td><?php echo $topic->user_name; ?></td>
                     <td><a href="delete-topic.php?id=<?php echo $topic->id; ?>" class="btn btn-danger  text-center p-1">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                  <!-- <tr>
                    <th scope="row">2</th>
                    <td>post two</td>
                    <td>tv</td>
                    <td>jack</td>
                    <td><a href="delete-posts.html" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                 <tr>
                    <th scope="row">3</th>
                    <td>post three</td>
                    <td>tech</td>
                    <td>mohamed</td>
                    <td><a href="delete-posts.html" class="btn btn-danger  text-center ">delete</a></td>
                  </tr> -->
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
    </div>


<?php require "../layouts/footer.php"; ?>