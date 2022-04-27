<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Jason Nguyen" content="CS4640">
        <meta name="description" content="CS4640 Wordle Login Page">  
        <title>ChessManage Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    </head>
    <body>
        <div class="container" style="margin-top: 15px;">
            <div class="row col-xs-8">
                <h1>ChessManage Login</h1>
                <p> Welcome to our Wordle game!  To get started, enter a username and password.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                <?php
                    if (!empty($error_msg)) {
                        echo "<div class='alert alert-danger'>$error_msg</div>";
                    }
                ?>
                <form action="?command=login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"/>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"/>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password"/>
                    </div>

                    <div class="text-center">                
                    <button type="submit" class="btn btn-primary" onclick = "return check()">Login</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"
	            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	            crossorigin="anonymous"></script>
        <script>
            
            
            function check() {
                var x = $("#name").val();
                if (!isNaN(x)) {
                    alert("Must input a string that represents a name");
                       return false;
                }
            }
            
    
        </script>
    </body>
</html>