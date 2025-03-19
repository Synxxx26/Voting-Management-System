<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Voting System</title>
  
  <?php include('./header.php'); ?>
  <?php 
  session_start();
  if(isset($_SESSION['login_id']))
  header("location:index.php?page=home");
  ?>

  <!-- Bootstrap and FontAwesome for styling -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<style>
  body {
    width: 100%;
    height: 100vh;
  }
  
  main#main {
    width: 100%;
    height: 100vh;
    background: white;
  }
  
  #login-right {
    position: absolute;
    right: 0;
    width: 40%;
    height: 100%;
    background: white;
    display: flex;
    align-items: center;
  }

  #login-left {
    position: absolute;
    left: 0;
    width: 60%;
    height: 100%;
    background: url('assets/img/bnhs.png') no-repeat center center;
    background-size: cover;
  }

  #login-right .card {
    margin: auto;
  }
  .input-group-text {
    background: white;
    border-right: none;
  }
  .form-control {
    border-left: none;
  }
</style>

<body>

  <main id="main" class="alert-info">
    <div id="login-left"></div>
    <div id="login-right">
      <div class="card col-md-8">
        <div class="card-body">
          <form id="login-form">
            <div class="form-group mb-3">
              <label for="username" class="control-label">Username</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter username">
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="password" class="control-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                  <i class="fas fa-eye"></i>
                </span>
              </div>
            </div>
            <center><button class="btn btn-primary btn-sm btn-block col-md-4">Login</button></center>
          </form>
        </div>
      </div>
    </div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
<script>

$('#login-form').submit(function(e){
    e.preventDefault();
    $('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error: err => {
        console.log(err);
        $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
      },
      success: function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        } else if(resp == 2){
          location.href ='voting.php';
        } else {
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
          $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
        }
      }
    })
  });

    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordField = document.getElementById('password');
        var icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
  </script>

</body>
</html>
