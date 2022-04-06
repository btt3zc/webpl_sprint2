<?php
// 
class ChessController {

    private $command;

    public function __construct($command) {
        $this->command = $command;
        $this->db = new Database();
    }

    public function run() {
        switch($this->command) {
            case "chess":
                // $this->resetVariables();
                $this->chess();
                break;
            case "logout":
                $this->destroyCookies();
                header("Location: ?command=login");
            case "login":
            default:
                $this->login();
                break;
            case "add": 
                $this->add(); 
                break; 
            case "delete":
                $this->delete();
                break;
            case "mygames": 
                $this->mygames(); 
                break;  
        }
    }

    // Clear all the cookies that we've set
    private function destroyCookies() {          
        session_destroy(); 
    }

    // Display the login page (and handle login logic)


private function login() {
    $this->db->query("
        CREATE TABLE IF NOT EXISTS user(
        id int not null AUTO_INCREMENT, 
        email text not null, 
        name text not null, 
        password text not null, 
        primary key(id)); "); 

    
    if (isset($_POST["email"]) && ($this->validateEmail($_POST["email"]) == TRUE)) {
        $data = $this->db->query("select * from user where email = ?;", "s", $_POST["email"]);
        if ($data === false) {
            $error_msg = "Error checking for user";
        } else if (!empty($data)) {
            if (password_verify($_POST["password"], $data[0]["password"])) {
                $_SESSION["email"] = $_POST["email"]; 
                $_SESSION["name"] = $_POST["name"]; 
                $_SESSION["password"] = $_POST["password"];
                header("Location: ?command=chess");
            } else {
                $error_msg = "Wrong password";
            }
        } else { // empty, no user found
            // TODO: input validation
            // Note: never store clear-text passwords in the database
            //       PHP provides password_hash() and password_verify()
            //       to provide password verification
            $insert = $this->db->query("insert into user (email, name, password) values (?, ?, ?);", 
                    "sss", $_POST["email"], $_POST["name"], 
                    password_hash($_POST["password"], PASSWORD_DEFAULT));
            if ($insert === false) {
                $error_msg = "Error inserting user";
            } else {
                $_SESSION["email"] = $_POST["email"]; 
                $_SESSION["name"] = $_POST["name"]; 
                $_SESSION["password"] = $_POST["password"];
                header("Location: ?command=chess");
            }
        }
    } else {
        if (isset($_POST["email"]) == TRUE && $this->validateEmail($_POST["email"]) == FALSE) {
            $error_msg = "invalid email";
        }
    } 
    include("templates/login.php");
}

    public function database() {
        $servername = "localhost";
        $username = "username";
        $password = "password";

    }
    
    public function chess(){

        include("templates/chess.php");

    }


    public function add(){
        $this->db->query("
        CREATE TABLE IF NOT EXISTS chess_games(
            id varchar(64) not null,
            Time_increment text not null, 
            opening_name text not null, 
            opening_eco text not null, 
            black_id text not null, 
            black_rating text not null, 
            white_id text not null, 
            white_rating text not null, 
            move_list text not null, 
            turn_number text not null, 
            start_time text not null, 
            end_time text not null,
            winner text not null, 
            victory_status text not null, 
            rated text not null, 
            primary key(id)); ");

            if (isset($_POST["gameID"])) {
                $insert = $this->db->query("insert into chess_games(id,Time_increment,opening_name,opening_eco,black_id,black_rating,white_id,white_rating,move_list,turn_number,start_time,end_time,winner,victory_status,rated) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);", 
                            "sssssssssssssss", $_POST["gameID"],$_POST["time_increment"],$_POST["opening_name"],$_POST["opening_eco"], $_POST["black_ID"], $_POST["black_rating"],$_POST["white_ID"], $_POST["white_rating"],$_POST["move_list"], $_POST["Number_of_Turns"], $_POST["StartTime"], $_POST["EndTime"],$_POST["Winner"], $_POST["VictoryStatus"],$_POST["rated"] 
                            );
                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    header("Location: ?command=add");
                }
                
            } else {
                $error_msg = "Game_ID must be set";
            } 
            include("templates/add.php");
    }

    public function delete(){
        if (isset($_POST["delete"])) {
           $delete = $_POST["delete"]; 

           $query = "Delete from chess_games WHERE id ='$delete'"; 
           $delete =  $this->db->query($query); 
           header("Location: ?command=delete");
        } else {
            $error_msg = "must enter game_ID ";
        }
        include("templates/delete.php");
    }

    public function mygames(){
        $name = $_SESSION["name"]; 
        $query = "select * from chess_games where black_id ='$name' OR white_id = '$name' ";
        $games =  $this->db->query($query); 
        $_SESSION["mygames"] = $this->db->query($query);
        include("templates/mygames.php");
    }

    public function validateEmail($email, $input_regex =  "/.*/") {
        if(preg_match($input_regex, $email) and preg_match("/^[^.][A-Za-z0-9.\-\_\+]+[^.]@[A-Za-z0-9\.\-]+\.[A-Za-z\.\-]+/", $email) ){
            return true; 
        
        } else {
            return false;
        }
        return false; 
    }
}