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
            case "replay":
                //$this->resetVariables();
                header("Location: ?command=question");
            case "gameover":
                $this->gameover();
                break;
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
        }
    }

    // Clear all the cookies that we've set
    private function destroyCookies() {          
        session_destroy(); 
    }
    
    private function resetVariables() {          
        if (isset($_SESSION["guess"])) { 
            unset($_SESSION["target_word"]);
            unset($_SESSION["guess"]);
            unset($_SESSION["guess_length"]);
            unset($_SESSION["letters_in_word"]);
            unset($_SESSION["correct_letter"]);
        }
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

    public function transaction() {

    }

    public function database() {
        $servername = "localhost";
        $username = "username";
        $password = "password";

    }




    // Load a question from the API
    private function loadQuestion() {
        
        $file = file("https://www.cs.virginia.edu/~jh2jf/courses/cs4640/spring2022/wordlist.txt",true);
        $wCount = count($file);
        // Return the question
        
        if (isset($_SESSION["target_word"]) == False) {
            $word =  trim($file[rand(0, $wCount - 1)]); 
            $_SESSION["target_word"] = $word;

            //$question = $_SESSION["target_word"];
        }
        return $_SESSION["target_word"];

    }
    //works
    private function addGuess() {
        if(!isset($_SESSION["guess"])) {
            $_SESSION["guess"] = array(); 
        }

        //print_r($_SESSION["guess"]); 
    }


    private function addLength() {
        if(!isset($_SESSION["guess_length"])) {
            $_SESSION["guess_length"] = array(); 
        
        }
    }


    private function in_word() {
        if(!isset($_SESSION["letters_in_word"])) {
            $_SESSION["letters_in_word"] = array(); 
        }
    }

    private function correct() {
        if(!isset($_SESSION["correct_letter"])) {
            $_SESSION["correct_letter"] = array(); 
        }
    }



    private function CheckWord($q,$a,$incrementi,$incrementj) {
        strcasecmp($q[$incrementj],$a[$incrementi]); 
            if (strcasecmp($q[$incrementj],$a[$incrementi]) == 0) {
                return 1; // in the word, somewhere
            } else {
                return 2; // not in word
            }
                        
    }


    // Display the question template (and handle question logic)
    public function question() {
        // set user information for the page from the cookie


        $this->db->query("
        CREATE TABLE IF NOT EXISTS hw5_transaction1(
            id int not null AUTO_INCREMENT, 
            Name text not null, 
            Category text not null, 
            t_date date not Null, 
            amount decimal(10,2) not null, 
            Type text not null, 
            username text not null,
            primary key(id)); ");
            
            
            if (isset($_POST["Transaction_Name"])) {
                //echo ($_POST["Amount"]); 
                if(($_POST["Type"] == "Debit" && $_POST["Amount"] > 0) || ($_POST["Type"] == "Credit"  && $_POST["Amount"] < 0  )  ) {
                    $error_msg = "Debit needs to be less than or equal to 0 and credit needs to more than or equal to 0";
                } else { // empty, no user found
                    // TODO: input validation
                    // Note: never store clear-text passwords in the database
                    //       PHP provides password_hash() and password_verify()
                    //       to provide password verification

                    $insert = $this->db->query("insert into hw5_transaction1 (Name, Category, t_date,amount,Type,username) values (?, ?, ?,?,?,?);", 
                            "ssssss", $_POST["Transaction_Name"], $_POST["Category"], $_POST["Date"], $_POST["Amount"], $_POST["Type"], $_SESSION["name"]
                            );
                    if ($insert === false) {
                        $error_msg = "Error inserting user";
                    } else {
                        echo $_POST["Transaction_Name"];
                        $_SESSION["Transaction_Name"] = $_POST["Transaction_Name"]; 
                        $_SESSION["Category"] = $_POST["Category"]; 
                        $_SESSION["Date"] = $_POST["Date"]; 
                        $_SESSION["Amount"] = $_POST["Amount"]; 
                        $_SESSION["Type"] = $_POST["Type"]; 
                        header("Location: ?command=gameover");
                    }
                }
        
            

        //include("templates/transaction.php");
        }
        include("templates/transaction.php");
        
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




    public function gameover() {
       // echo $name; 
        $name = $_SESSION["name"]; 
        //echo $name; 
        $query = "select * from hw5_transaction1 where username ='$name' order by t_date desc;"; 
        $this->db->query($query);

        $query_json = json_encode($this->db->query($query));
        print($query_json);

        $_SESSION["history"]  = $this->db->query($query);
        include("templates/history.php");
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