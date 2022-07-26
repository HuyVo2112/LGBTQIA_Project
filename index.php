<!--Page Name: index.php
	
    By: Huy Vo
    Student ID: 040993746
    Professor: Leanne Seaward
	  Client: Charlie Dazé 
    Prototype: 1
    Purpose: This page is the home page of the project to welcome users.
    Functions: Page has been divided to show events. It also has a form for user to subscribe to upcoming events.
 -->


<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/00cef6843f.js" crossorigin="anonymous"></script>
  <style>
    .card-img {
      transition: opacity 0.5s;
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }

    .card:hover .card-img {
      opacity: 0.3;
    }

    .main-img {
      height: calc(30vw + 17px);
    }

    .card-img-overlay {
      opacity: 0;
      transition: opacity 0.5s;
    }

    .card:hover .card-img-overlay {
      opacity: 1;
    }
      #navbarTogglerDemo03 ul #active li a{
      color: white;
      background: linear-gradient(
        90deg,
        rgba(255, 0, 0, 1) 0%,
        rgba(255, 154, 0, 1) 10%,
        rgba(208, 222, 33, 1) 20%,
        rgba(79, 220, 74, 1) 30%,
        rgba(63, 218, 216, 1) 40%,
        rgba(47, 201, 226, 1) 50%,
        rgba(28, 127, 238, 1) 60%,
        rgba(95, 21, 242, 1) 70%,
        rgba(186, 12, 248, 1) 80%,
        rgba(251, 7, 217, 1) 90%,
        rgba(255, 0, 0, 1) 100%
    );
    }
    #navbarTogglerDemo03  ul li a{
      font: normal 20px "Open Sans";
      padding: 16px;
      padding-left:30px;
      padding-right:30px;
      color:#B01CCA;
      font-style:open sans;
      transition: all 0.2s ease;
    }
    #navbarTogglerDemo03  ul li a:hover{
      color:white;
      background: linear-gradient(
        90deg,
        rgba(255, 0, 0, 1) 0%,
        rgba(255, 154, 0, 1) 10%,
        rgba(208, 222, 33, 1) 20%,
        rgba(79, 220, 74, 1) 30%,
        rgba(63, 218, 216, 1) 40%,
        rgba(47, 201, 226, 1) 50%,
        rgba(28, 127, 238, 1) 60%,
        rgba(95, 21, 242, 1) 70%,
        rgba(186, 12, 248, 1) 80%,
        rgba(251, 7, 217, 1) 90%,
        rgba(255, 0, 0, 1) 100%
    );
    }
      #footer {
	color: white;
        background: linear-gradient(
        90deg,
        #A51D95 20%,
	#FE0C0C 80%
);
        padding: 30px;
    }
      .rainbow-box{
	border-top:3px;
	border-bottom:0px;
	border-left:0px;
	border-right:0px;
	border-style: solid;
	border-color:#DFDFDF;
	text-shadow: 2px 2px black;
	text-align:center;
	color:white;
    	width: 100%;
    	height: 200px;
    	border-radius: 5px;
    	background: linear-gradient(
        90deg,
        #A51D95 20%,
	#FE0C0C 80%
    );
}

  </style>
</head>

<body>
  <header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:56px;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
	<a class="navbar-brand" href="./index.php"><img src="./assets/images/TOPlogo.gif" alt="Logo image" style="float:left;padding-top:150px;"></img></a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	<div id="active">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php" >Home</a>
          </li>
	</div>
          <li class="nav-item ">
            <a class="nav-link" href="./src/organization.php">Organization</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./src/resource.php">Resource</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./src/about-us.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./src/admin-login.php">Admin Login</a>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

  </header>

  <main>
    <div class="rainbow-box jumbotron">
      <h1>This is a homepage!</h1>
      <p class="lead">Welcome to our website</p>
    
    <!-- <style>
      p {
        height: fit-content
      }

    </style> -->
    </div>

    <div class="container" style="width: 60%">
    
      <h2 class="text-center">Here are our upcoming events (hover to see details)</h2>
      <br>
      <?php
      // Include config file
      require_once "backend/shared/config.php";


      // Attempt select query execution
      $sql = "SELECT * FROM events ORDER BY EventDate LIMIT 3";
      if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
        
            echo '<div class="row">';
            $row = mysqli_fetch_array($result);
            echo '<div class="col-7">';

            echo '<div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)">';
            echo '<img class="card-img main-img" src="./assets/images/'.$row['EventImage'].'"alt="Event Image">';
            echo '<div class="card-img-overlay">';
            echo '<h5 class="card-title">'.$row['EventName'].'</h5>';
            echo '<p class="card-text">'.$row['EventDescription'].'</p>';
            echo '<p class="card-text">Event Date: '.$row['EventDate'].'</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            

  
            $row = mysqli_fetch_array($result);
            echo '<div class="col-5">';

            echo '<div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)/2">';
            echo '<img class="card-img" src="./assets/images/'.$row['EventImage'].'"alt="Event Image">';
            echo '<div class="card-img-overlay">';
            echo '<h5 class="card-title">'.$row['EventName'].'</h5>';
            echo '<p class="card-text">'.$row['EventDescription'].'</p>';
            echo '<p class="card-text">Event Date: '.$row['EventDate'].'</p>';
            echo '</div>';
            echo '</div>';

            $row = mysqli_fetch_array($result);
            echo '<div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)/2">';
            echo '<img class="card-img" src="./assets/images/'.$row['EventImage'].'"alt="Event Image">';
            echo '<div class="card-img-overlay">';
            echo '<h5 class="card-title">'.$row['EventName'].'</h5>';
            echo '<p class="card-text">'.$row['EventDescription'].'</p>';
            echo '<p class="card-text">Event Date: '.$row['EventDate'].'</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo "</div>";
          

          
          // Free result set
          mysqli_free_result($result);
        } else {
          echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close connection
      mysqli_close($link);
      ?>

    </div>

  </main>


 
</body>
 <footer id="footer" class="my-3">
    <div class="container">
      <p class="float-right">
        <i class="fa-brands fa-twitter-square"></i> &nbsp;
        <i class="fa-brands fa-instagram"></i> &nbsp;
        <i class="fa-brands fa-facebook-square"></i> &nbsp;
      </p>
      <p>Ten Oaks Link</p>
    </div>
  </footer>

</html>