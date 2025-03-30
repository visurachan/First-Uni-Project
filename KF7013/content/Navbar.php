<?php

    include 'session_config.php';
?>
<header>
  <nav class="topnav">
    <a href="index.php">
      <div class="logo-container">
        <img src="../assets/images/Navbar/Cl.png" alt="Company Logo" class="logo"> <!-- Created by Canva -->
        <img src="../assets/images/Navbar/companyName.png" alt="Company name" class="companynamelogo"> <!-- Created by Canva -->
      </div>
    </a>

    
   

    <!-- Navigation Links -->
    <ul class="nav-links">
      <li><a href="All_experiences_page.php" accesskey="e">Experiences</a></li>
      <li><a href="Explore_page.php" accesskey="x">Explore</a></li>
      <li><a href="AboutUs.php" accesskey="a">About us</a></li>
      <li><a href="Wireframes.html" accesskey="w">WFs&Refs</a></li>
      <!--check whether the user loged in to display thier name on nav bar-->
      <li><?php if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']==true): ?>
        
        <li class="dropdown-profile">
        <span class="dropdown-profile-toggle">Hello, <?php echo htmlspecialchars($_SESSION['User_fname']); ?>!</span>
        <ul class="dropdown-profile-menu">
          <li><a href="Profile.php">Profile</a></li>
          <li><a href="Signout.php">Sign Out</a></li>
        </ul>
        </li>

        <?php else: ?>
          <a href="Login.php" accesskey="r">Register/Login</a></li>
        <?php endif; ?>
    </ul>
    <div class="toggle_btn">
      <i class="fa-solid fa-bars"></i>
    </div>
    <!--For small screens doenst fully implemeted-->
    <!--ATTENTION !!! complete dynamic-->
    <div class = "dropdown_menu">
      <li><a href="underconstruction.php" accesskey="e">Experiences</a></li>
      <li><a href="underconstruction.php" accesskey="x">Explore</a></li>
      <li><a href="AboutUs.php" accesskey="a">About us</a></li>
      <li><a href="Wireframes.html" accesskey="w">WFs&Refs</a></li>
      <li><a href="underconstruction.php" accesskey="r">Register/Login</a></li>

    </div>

  </nav>
   

 

</header>
