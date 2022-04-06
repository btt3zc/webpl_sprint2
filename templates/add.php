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
    <form action="?command=add" method="post">
	<nav>
        <a href="?command=chess">Home</a>
		<a href="search.html">Search</a>
        <a href="?command=add">Add</a>
        <a href="?command=delete">Delete</a>
        <a href="?command=mygames">My Games</a>
        <a href="?command=logout" class="btn btn-danger"  position:absolute; top:0; right:0; >logout</a>
    </nav>
	
    <div>
		<!-- code for taking in user input  -->
       
			<div>
				<input type="text" id= "gameID" name="gameID">
				<label for="gameID">Game_ID</label><br>
			</div>

			<div>
				<input type="text" id= "j" name="time_increment">
				<label for="time_increment">Time Increment</label><br>
			</div>

			<div>
				<input type="text" id= "opening_name" name="opening_name">  
				<label for="opening_name"> Opening Name</label><br>
			</div>

			<div>
				<input type="text" id= "opening_eco" name="opening_eco">
				<label for="opening_eco"> Opening Eco</label><br>
			</div>

			<div>
				<input type="text" id= "black_ID" name="black_ID">
				<label for="black_ID">Black ID</label><br>
			</div>

			<div>
				<input type="text" id= "black_rating" name="black_rating">
				<label for="black_rating">Black Rating</label><br>
			</div>

			<div>
				<input type="text" id= "white_ID" name="white_ID">
				<label for="white_ID">White ID</label><br>
			</div>

			<div>
				<input type="text" id= "white_rating" name="white_rating">
				<label for="white_rating">White Rating</label><br>
			</div>

			<div>
				<input type="text" id= "move_list" name="move_list"> 
				<label for="move_list">Move List</label><br>
			</div>

			<div>
				<input type="text" id= "Number_of_Turns" name="Number_of_Turns">
				<label for="Number_of_Turns">Number of Turns</label><br>
			</div>

			<div>
				<input type="text" id= "StartTime" name="StartTime"> 
				<label for="StartTime">Start Time</label><br>
			</div>
			
			<div>
				<input type="text" id= "EndTime" name="EndTime">
				<label for="EndTime">End Time</label><br>
			</div>
			
			<select class = "dynamicAlign" name="Winner" id="Winner">
					<option value="white">White</option>
					<option value="black">Black</option>
					<option value="draw">Draw</option>
			</select>
			<label for="Winner">Winner</label><br>
			<!-- html code for adding the status using option -->
			<select class = "dynamicAlign" name="VictoryStatus" id="VictoryStatus">
				<option value="mate">Checkmate</option>
				<option value="resign">Resign</option>
				<option value="outoftime">Out of Time</option>
				<option value="draw">Draw</option>
			</select> 
			<label for="VictoryStatus"> Victory Status </label><br>

			<select class="dynamicAlign" name="rated" id="rated">
				<option value="1">Rated</option>
				<option value="0">Unrated</option>
			</select> 
			<label for="rated">Rated</label><br> 
			<br>
			<button type="submit" class="btn btn-primary">Submit</button>
		

    </div>



</body>
</form>
</html>