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
<body class="bg-light" onresize=imgresize()>
    <form action="?command=question" method="post">
    <!-- nav bar -->
    <nav class="nav-custom">
        <a href="?command=chess" >Home</a>
        <a href="?command=search">Search</a>
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
            <div id="imggrid" class="sect grid" onresize=imgresize()>
                <div class="container grid-item">
                 <img id="img1" src="templates/Chess.jpeg" alt="" width="400" height="400">
                </div>
                <div class="container grid-item">
                 <img id="img2" src="templates/chess2.png" alt="" width="400" height="400">
                </div>
                <div class="container grid-item">
                    <img id="img3" src="templates/chess3.jpg" alt="" width="400" height="400">
                </div>
            
            </div>
        <!-- footer  -->
        
    </div>
    <!-- footer  -->
    <footer>
        <a href="?command=chess">Home</a>
		<a href="?command=search">Search</a>
        <a href="?command=add">Add</a>
        <a href="?command=delete">Delete</a>
        <a href="?command=mygames">My Games</a>
        
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
		var imgresize = () => {
            var w = window.outerWidth;
            var h = window.outerHeight;
            if (w<1400){
                document.getElementById("img1").width = 300;
                document.getElementById("img1").height = 300;

                document.getElementById("img2").width = 300;
                document.getElementById("img2").height = 300;

                document.getElementById("img3").width = 300;
                document.getElementById("img3").height = 300;
            }
            if (w>1400){
                document.getElementById("img1").width = 400;
                document.getElementById("img1").height = 400;

                document.getElementById("img2").width = 400;
                document.getElementById("img2").height = 400;

                document.getElementById("img3").width = 400;
                document.getElementById("img3").height = 400;
            }
		}   
    </script>
</form>
</html>