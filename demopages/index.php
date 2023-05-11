<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <form action="login.php" method="POST" role="form">
                    <legend>Login Form</legend>
                
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="" placeholder="Input Username" name="username">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="" name="password">
                    </div>
                    
                
                    <button type="submit" class="btn btn-primary">Log in</button>
                </form>
                
        
            </div>
        </div>
    </div>
</body>
</html>