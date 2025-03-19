<style>
    .logo-container {
        display: flex;
        align-items: center;
    }

    .logo {
        background: white;
        padding: 5px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .school-name {
        font-size: 20px;
        font-weight: bold;
        color: white;
        margin-left: 10px; /* Adjust spacing between logo and text */
    }

    /* Override Bootstrap's dark background */
    .navbar {
        background-color: #C5558E !important;
    }
</style>

<nav class="navbar fixed-top" style="padding:0; background-color: #A42153 !important;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-3 float-left logo-container">
  			<div class="logo">
  				<img src="assets/bacnar.png" alt="Logo" width="35" height="30">
  			</div>
  			<h1 class="school-name">Bacnar National High School</h1>
  		</div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
</nav>
