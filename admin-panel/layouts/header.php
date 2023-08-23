<?php 

  session_start();
  define("ADMINURL","http://localhost/threadview/admin-panel");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin ThreadView</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link href="<?php echo ADMINURL; ?>/styles/style.css" rel="stylesheet">
  </head>
  <body>
    

<section class="container" id="wrapper">

    <nav class="navbar  fixed-top navbar-expand-lg  navbar-dark bg-dark shadow">
      <div class="container-fluid">
     
        <a class="navbar-brand" href="#">
          <img src="threadWave.png" alt="" width="38" height="38" class="ms-1" href="">
          <span class="fw-bold" style="color: #31E1F7;">Thread</span><span class="fw-bold" style="color: #0096FF;">View</span></a>
    	    </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if(isset($_SESSION['adminname'])): ?>
        <ul class="navbar-nav side-nav bg-dark text-white" >
          <li class="nav-item">
            <a class="nav-link text-light" style="margin-left: 20px;" href="<?php echo ADMINURL; ?>">Home
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo ADMINURL; ?>/admins/admins.php" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo ADMINURL; ?>/categories-admins/show-categories.php" style="margin-left: 20px;">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo ADMINURL; ?>/topics-admins/show-topics.php" style="margin-left: 20px;">Topics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo ADMINURL; ?>/replies-admins/show-replies.php" style="margin-left: 20px;">Replies</a>
          </li>
        </ul>
          <?php endif; ?>

<!-- Side Nav Ended -->

        <ul class="navbar-nav mx-auto">

    <?php if(!isset($_SESSION['adminname'])): ?>

        <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo ADMINURL; ?>/admins/login-admins.php">login
              <span class="visually-hidden">(current)</span>
            </a>
          </li>

    <?php else: ?>

          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo ADMINURL; ?>">Home
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          

          <li class="nav-item dropdown">
            <a class="nav-link text-light dropdown-toggle fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
              <?php echo $_SESSION['adminname']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item text-dark p-0 px-2" href="<?php echo ADMINURL; ?>/admins/logout.php">Logout</a>
              
          </li>
                          
        <?php endif; ?>    

        </ul>
      </div>
    </div>
    </nav>

    <!-- Navbar Ended -->