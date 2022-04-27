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



<body class="bg-light" style=" onload color: #073b4c !important" onresize=recolor()>
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
    <div id="tableid"class="column" style="background-color:white;">

            <?php

                        echo "<table border='1'>

                            <tr>
                            
                                <th>GameID   </th>
                            
                                <th>Time Increment   </th>
                            
                                <th>Opening Name   </th>
                            
                                <th>Opening Eco   </th>

                                <th>Black ID   </th>

                                <th>Black Rating   </th>

                                <th>White ID   </th>

                                <th>White Rating  </th>

                                <th>Move List  </th>

                                <th>Number of Turns   </th>

                                <th>Start Time   </th>

                                <th>End Time   </th>

                                <th>Winner   </th>

                                <th>Victory Status   </th>

                                <th>Rated   </th>
                            
                            </tr>";
                            $numbers = array(); 
                            for ($i = 0; $i < count($_SESSION["mygames"]); $i++) {
                                echo "<tr> "; 
                                    echo "<td>".$_SESSION["mygames"][$i]["id"]."</td>"; 
			                        echo "<td>".$_SESSION["mygames"][$i]["Time_increment"]."</td>"; 
                                    echo "<td>".$_SESSION["mygames"][$i]["opening_name"]."</td>"; 
                                    echo "<td>".$_SESSION["mygames"][$i]["opening_eco"]."</td>"; 
                                    echo "<td>". $_SESSION["mygames"][$i]["black_id"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["black_rating"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["white_id"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["white_rating"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["move_list"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["turn_number"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["start_time"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["end_time"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["winner"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["victory_status"] ."</td>";
                                    echo "<td>". $_SESSION["mygames"][$i]["rated"] ."</td>";
                                echo "</tr>";
                            } 

            ?>

    </div>

    <div id="jsondiv">
        
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        {% comment %} anonymous function {% endcomment %}
		var recolor = function() {
            var w = window.outerWidth;
            var h = window.outerHeight;
            if (w<1400){
               document.getElementById("tableid").style="background-color:powderblue;";
            }
            if (w>1400){
                document.getElementById("tableid").style="background-color:white;";
            }
		}
        
        var games=null;
        function mygames(){
            var req = new XMLHttpRequest();
            req.open("Get", "?command=mygames", true);
            ajax.responseType = "json";
            ajax.send(null);

            ajax.addEventListener("load", function() {
                if (this.status == 200) { // worked 
                    games = this.response;
                    game1 = game[0];
                    document.getElementById("jsondiv").innerHTML+=game1["id"];
                    document.getElementById("jsondiv").innerHTML+=game1["Time_increment"];
                    document.getElementById("jsondiv").innerHTML+=game1["opening_name"];
                    document.getElementById("jsondiv").innerHTML+=game1["opening_eco"];
                    document.getElementById("jsondiv").innerHTML+=game1["black_id"];
                    document.getElementById("jsondiv").innerHTML+=game1["black_rating"];
                    document.getElementById("jsondiv").innerHTML+=game1["white_id"];
                    document.getElementById("jsondiv").innerHTML+=game1["white_rating"];
                    document.getElementById("jsondiv").innerHTML+=game1["move_list"];
                    document.getElementById("jsondiv").innerHTML+=game1["turn_number"];
                    document.getElementById("jsondiv").innerHTML+=game1["start_time"];
                    document.getElementById("jsondiv").innerHTML+=game1["end_time"];
                    document.getElementById("jsondiv").innerHTML+=game1["winner"];
                    document.getElementById("jsondiv").innerHTML+=game1["victory_status"];
                    document.getElementById("jsondiv").innerHTML+=game1["rated"];
                }
            });

            // What happens on error
            ajax.addEventListener("error", function() {
                document.getElementById("message").innerHTML = 
                    "<div class='alert alert-danger'>An Error Occurred</div>";
            });
        }

        mygames();
        
    </script>
</html>