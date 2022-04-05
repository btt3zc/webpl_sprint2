
<!-- https://cs4640.cs.virginia.edu/jmn8gf/sprint2/ -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>standard</title>
	<meta name="author" content="Jason Nguyen, Brian Tran">
	<meta name="description" content="WebPL Project">
    <link rel="stylesheet" type="text/css" href="styles/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
    crossorigin="anonymous">
</head>

<body class="bg-light" >
    <form action="?command=question" method="post">
    <!-- nav bar -->
    <nav class="nav-custom">
        <a href="index.html">Home</a>
        <a href="search.html">Search</a>
        <a href="?command=add">Add</a>
        <a href="delete.html">Delete</a>
        <a href="mygames.html">My Games</a>
    </nav>
     <!-- inline css rule  -->
     
    <img src="login.jpeg" alt="login" style = "position: absolute;
    right: 0;
    top: 0;
    display: block;
    height: 60px;
    width: 60px;">

    <!-- menu to other pages  -->
    <div>
        <a href="search.html" class="list-group-item list-group-item-primary">Search Games </a>
           

        <div class="column" >
            <a href="?command=add" class="list-group-item list-group-item-secondary">Add Game </a>
        </div>

        <div class="column" >
            <a href="delete.html" class="list-group-item list-group-item-danger">Delete Game </a>
        </div>

        <div class="column" >
            <a href="mygames.html" class="list-group-item list-group-item-warning">My Games</a>
        </div>
    
        <br>
        <!-- grid container -->
            <div class="sect grid">
                <div class="container grid-item">

                 <img src="Chess.jpeg" alt="" width="400" height="400">
                </div>
                <div class="container grid-item">

                 <img src="chess2.png" alt="" width="400" height="400">
                </div>
            <div class="container grid-item">
                <img src="chess3.jpg" alt="" width="400" height="400">
            </div>
            
            </div>
        <!-- footer  -->
        
    </div>
    <!-- footer  -->
    <footer>
        <a href="index.html">Home</a>
        <a href="search.html">Search</a>
        <a href="?command=add">Add</a>
        <a href="delete.html">Delete</a>
        <a href="mygames.html">My Games</a>
    </footer>

</body>
</form>
</html>