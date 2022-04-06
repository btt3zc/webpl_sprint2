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



<body class="bg-light" style="color: #073b4c !important">
<!-- nav -->
<form action="?command=delete" method="post">
    <nav>
        <a href="?command=chess">Home</a>
		<a href="search.html">Search</a>
        <a href="?command=add">Add</a>
        <a href="?command=delete">Delete</a>
        <a href="?command=mygames">My Games</a>
        <a href="?command=logout" class="btn btn-danger"  position:absolute; top:0; right:0; >logout</a>
    </nav>
	<!-- inline css rule to change text alignment and flex -->
    <div class="column" style="flex: 35%; text-align: left;">
        <div>
            <input type="text" id="delete" name="delete">
            <label for="delete"> Which game do you want to delete? </label><br>
        </div>
        <button type="submit" class="btn btn-primary">Delete</button>

       

    </div>



</body>
</form>
</html>