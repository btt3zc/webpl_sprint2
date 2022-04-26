<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>search</title>
	<meta name="author" content="Jason Nguyen, Brian Tran">
	<meta name="description" content="WebPL Project">
    <link rel="stylesheet" type="text/css" href="styles/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="index.html"/>
</head>
<body onload = "create()" class="bg-light" style=" color: #073b4c !important">
    <form action="?command=search" method="post" id="form1">
    <!-- nav -->
    <nav>
        <a href="?command=chess">Home</a>
		<a href="?command=search">Search</a>
        <a href="?command=add">Add</a>
        <a href="?command=delete">Delete</a>
        <a href="?command=mygames">My Games</a>
        <a href="?command=logout" class="btn btn-danger"  position:absolute; top:0; right:0; >logout</a>
    </nav>
	<!-- inline css rule to change text alignment and flex -->
    <div  id="div1" class="column" style="flex: 35%; text-align: left;">
    </div>
    <button type="submit" class="btn btn-primary"   >Submit</button>
</body>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
		function create() {
            const newDiv = document.createElement("div");
            const currentDiv = document.getElementById("div1");
			var textfield = document.createElement("input");
            textfield.type = "text";
            textfield.id = "searchbar";
            textfield.name = "searchbar";
            newDiv.appendChild(textfield);
            div1.append(newDiv);
		}   

        
        
        

    </script>

</html>