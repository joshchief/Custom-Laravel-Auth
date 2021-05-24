<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Register</title>
</head>
<body>
    <form action="" method="POST">
        <div class="card">
            <div class="card-header">
              <h2>Login</h2>
            </div>
            <div class="card-body">
        
                <label for="email"> <strong>Email Address</strong> :</label>
                <input
                  type="text"
                  id="email"
                  name="email"
                  placeholder="Enter email"
                  
                />
                <label for="password"> <strong>Password</strong> :</label>
                <input
                  type="password"
                  id="password"
                  name="password"
                  placeholder="Enter password"
                  required
                />
    
    
              <input type="button" class="btn btn-primary"  id="reg-btn" value="L o g i n">
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
              <span class="psw float-right">Forgot <a href="#">password?</a></span>
              <div class="container signin">
                <p>Don't have an account? <a href="#">Sign up</a>.</p>
              </div>
            </div>
          </div>

    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>