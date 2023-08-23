<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 


if(!isset($_SESSION['adminname'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
}

    $categories =  $conn->query("SELECT* FROM categories");
	$categories->execute();
	$allCategories = $categories->fetchAll(PDO::FETCH_OBJ);
 
?>

    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="<?php echo ADMINURL; ?>/categories-admins/create-category.php" class="btn btn-primary mb-4 text-center float-end py-1">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($allCategories as $category): ?>
                  <tr>
                    <th scope="row"><?php echo $category->id;?></th>
                    <td><?php echo $category->name;?></td>
                    <td><a  href="update-category.php?id=<?php echo $category->id;?>" class="btn btn-warning text-white text-center p-1">Update</a></td>
                    <td><a href="delete-category.php?id=<?php echo $category->id;?>" class="btn btn-danger  text-center p-1">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>

                  <!-- <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td><a  href="update-category.html" class="btn btn-warning text-white text-center">Update Categories</a></td>
                    <td><a href="delete-category.html" class="btn btn-danger  text-center ">Delete Categories</a></td>
                  </tr> -->
                  <!-- <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                     <td><a  href="update-category.html" class="btn btn-warning text-white text-center ">Update Categories</a></td>
                    <td><a href="delete-category.html" class="btn btn-danger text-center">Delete Categories</a></td>
                  </tr> -->
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  </div>
<?php require "../layouts/footer.php"; ?>
