<?php
    
    session_start();
    define("APPURL", "http://localhost/threadView");


;?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ThreadView</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous" />
      
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
      
    <link href="css/forum.css" rel="stylesheet">
  </head>

  <body>

<!-- Header Started -->

<header class="container-lg ">
      

      <!-- Navbar Started -->

      <nav class="navbar navbar-expand-lg rounded-2 p-2 mx-1 shadow" style="background-color: #fff;">
        <div class="container-fluid">
           <a class="navbar-brand m-0 p-0" href="<?php echo APPURL; ?>">
      		<img src="threadWave.png" alt="" width="38" height="38" class="ms-1" href="">
          <span class="fw-bold" style="color: #31E1F7;">Thread</span><span class="fw-bold" style="color: #0096FF;">View</span></a>
    	    </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Option List -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

            <li class="nav-item mx-3">
                <a class="nav-link active" aria-current="page" href="<?php echo APPURL; ?>../index.php">Home</a>
              </li>

            <?php if(isset($_SESSION['username'])) : ?>
              

              <li class="nav-item mx-3">
                <a class="nav-link" href="<?php echo APPURL; ?>../topics/create.php">Create Topic</a>
              </li>

              <!-- Dropdown Started -->


              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <?php echo $_SESSION['username']; ?>
                </a>
                <ul class="dropdown-menu">
                
                  <li><a class="dropdown-item" href="<?php echo APPURL; ?>/users/profile.php?name=<?php echo $_SESSION['username']; ?>">Profile</a></li>

                  <li><a class="dropdown-item" href="<?php echo APPURL; ?>/users/edit_user.php?id=<?php echo $_SESSION['user_id']; ?>">Edit Profile</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="<?php echo APPURL; ?>/auth/logout.php">logout</a>
                  </li>


                   <?php else : ?>

                  <li class="nav-item ms-3">
                <a class="nav-link" href="<?php echo APPURL; ?>/auth/register.php">Register</a>
              </li>
                  <li class="nav-item ms-3">
                <a class="nav-link" href="<?php echo APPURL; ?>/auth/login.php">login</a>
              </li>

                </ul>
              </li>

              <?php endif; ?>

                    <!-- Dropdown Ended -->



              <!-- <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li> -->
            </ul>
            <form class="d-flex" role="search">
              <!-- <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search" /> -->
              <!-- <a class="btn btn-outline-success" type="submit" href="create.php">
                Create Topic
              </a> -->
            </form>
          </div>
        </div>
      </nav>
    </header>

<!-- Header Ended -->