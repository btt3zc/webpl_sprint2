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
        <a href="?command=chess">Home</a>
        <a href="search.html">Search</a>
        <a href="?command=add">Add</a>
        <a href="?command=delete">Delete</a>
        <a href="?command=mygames">My Games</a>
        <a href="?command=logout" class="btn btn-danger"  position:absolute; top:0; right:0; >logout</a>
    </nav>
     <!-- inline css rule  -->

    

    <!-- menu to other pages  -->
    <div>
        <a href="search.html" class="list-group-item list-group-item-primary">Search Games </a>
           
        <div class="column" >
            <a href="?command=add" class="list-group-item list-group-item-secondary">Add Game </a>
        </div>
        <div class="column" >
            <a href="?command=delete" class="list-group-item list-group-item-danger">Delete Game </a>
        </div>
        <div class="column" >
            <a href="mygames.html" class="list-group-item list-group-item-warning">My Games</a>
        </div>
    
        <br>
        <!-- grid container -->
            <div class="sect grid">
                <div class="container grid-item">
                 <img src="templates/Chess.jpeg" alt="" width="400" height="400">
                </div>
                <div class="container grid-item">
                 <img src="templates/chess2.png" alt="" width="400" height="400">
                </div>
            <div class="container grid-item">
                <img src="templates/chess3.jpg" alt="" width="400" height="400">
            </div>
            
            </div>
        <!-- footer  -->
        
    </div>
    <!-- footer  -->
    <footer>
        <a href="?command=chess">Home</a>
		<a href="search.html">Search</a>
        <a href="?command=add">Add</a>
        <a href="?command=delete">Delete</a>
        <a href="?command=mygames">My Games</a>
        
    </footer>
</body>
</form>
</html>