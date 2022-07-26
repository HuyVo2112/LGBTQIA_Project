<!--Page Name: admin-login.php
	
    By: Ghaith Ali
    Student ID: 040930758
    Professor: Leanne Seaward
	  Client: Charlie Dazé 
    Prototype: 1
    Purpose: This page is to show a form an admin can login to do CRUD operations event.
    Functions: A form has a username, password fields for admin to enter their credentials and login.
 -->
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <script src="https://kit.fontawesome.com/00cef6843f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./admin-login.css">

<style>
      #navbarTogglerDemo03 ul #active li a{
      color: white;
      background:linear-gradient(
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
      background:linear-gradient(
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
</style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:56px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="./index.php"><img src="../assets/images/TOPlogo.gif" alt="Logo image" style="float:left;padding-top:150px;"></img></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item ">
          <a class="nav-link" href="../index.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./organization.php">Organization</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./resource.php">Resource</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about-us.php">About Us</a>
        </li>
	<div id="active">
        <li class="nav-item active">
          <a class="nav-link" href="./admin-login.php">Admin Login</a>
        </li>
	</div>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <div class="center">
        <h1>Login</h1>
        <form method="post">
          <div class="txt_field">
            <input type="text" required>
            <span></span>
            <label>Username</label>
          </div>
          <div class="txt_field">
            <input type="password" required>
            <span></span>
            <label>Password</label>
          </div>
          <div class="pass">Forgot Password?</div>
          <input type="submit" value="Login">
          <div class="signup_link">
             <a href="#"> </a>
          </div>

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