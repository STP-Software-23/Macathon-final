<?php
echo "<script> alert('Interrupt')</script>";

//First-->
//           Check if it's an individual or team leader
//           boolean to store the data in which table in database 
//           0 for individual 1 for team lead
 if(isset($_POST['submit'])){

    // $flag = 1;
    // $userName = "Myname";
    // $Phone = "01060860770";
    // $email ="ofahmy1234@gmail.com";
    // $faculty = "foe";
    // $graduationYear = 2024;
    // $university ="ASU";
    // $whyQuestionAns = "any";
    // $experience = "ANY";
    // // Generate a unique code for each team.
    // $teamCode = mt_rand(1000000, 9999999);
    // // we should not have two teams with the same name
    // $teamName = "GO";
    // // range between min 3 to max 5
    // $teamNum =2;    
    $fileDestination = 'sadsdadada';

$flag = htmlspecialchars($_POST['role']);
$userName = htmlspecialchars($_POST['name']);
$Phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$faculty = htmlspecialchars($_POST['faculty']);
$graduationYear = htmlspecialchars($_POST['graduationYear']);
$university = htmlspecialchars($_POST['university']);
$whyQuestionAns = htmlspecialchars($_POST['whyJoin']);
$experience = htmlspecialchars($_POST['experiance']);
// Generate a unique code for each team.
$teamCode = mt_rand(1000000, 9999999);
// we should not have two teams with the same name
$teamName = htmlspecialchars($_POST['teamName']);
// range between min 3 to max 5
$teamNum = htmlspecialchars($_POST['teamNum']);

include('uploadCV.php');




if (
    empty($userName) || empty($Phone) || empty($email) ||
    empty($faculty)  || empty($graduationYear) || empty($university) ||
    empty($whyQuestionAns) || empty($experience) ||
    empty($teamCode) 

) {
    die("Please fill all  required fields!");
}
// Validate the username with min length 4 char
if (!preg_match("/^.{4,}$/", $userName)) {
    die("Enter your full name pls!.");
}

// Validate phone numbers in Egypt for the 4 major Service providers
if (!preg_match("/^01[0125][0-9]{8}$/", $Phone)) {
    die("Enter your phone number again.");
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required.");
}



try {
    function findInDatabase($con, $columnName, $email)
    {
        $sql = $con->prepare("SELECT * FROM team_lead WHERE " . $columnName . " ='" . $email . "'");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0)
            return 1;
        return 0;
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}



// Store in DB
// get sqli connection

$mysqli = require __DIR__ . "/database.php";

// Initialize prepared statement
$stmt = $mysqli->stmt_init();


if (findInDatabase($mysqli, "email", $email)) {
    die("This email is already used!.");
}


// Insert the data into db
// Assume flag =0 means individual
if($flag == 1){

   if(empty($teamName) || empty($teamNum)){
    die("Please fill all  required fields!");
   }
   // team size range 2 to 5
if ($teamNum < 2 || $teamNum > 5) {
    die("team size range from 3 to 5.");
}
try {
    $sql = "INSERT INTO team_lead (user_name, phone, email, faculty, 
graduation_year, university, why_question_ans, experience, team_code, team_name, team_num ,CV)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?)";


    if (!$stmt->prepare($sql)) {
        die("SQL error: ......................." . $mysqli->error);
    }

    $stmt->bind_param(
        "ssssssssssss",
        $userName,
        $Phone,
        $email,
        $faculty,
        $graduationYear,
        $university,
        $whyQuestionAns,
        $experience,
        $teamCode,
        $teamName,
        $teamNum,
        $fileDestination
    );
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
}else{
    try {
        $sql = "INSERT INTO individual_M (user_name, phone, email, faculty, 
    graduation_year, university, why_question_ans, experience, team_code ,CV)
            VALUES (?, ?, ?, ?, ?, ?, ?, ? ,?,?)";
    
    
        if (!$stmt->prepare($sql)) {
            die("SQL error: ......................." . $mysqli->error);
        }
    
        $stmt->bind_param(
            "ssssssssss",
            $userName,
            $Phone,
            $email,
            $faculty,
            $graduationYear,
            $university,
            $whyQuestionAns,
            $experience,
            $teamCode,
            $fileDestination
        );
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}

try {
    if ($stmt->execute()) {
        // Redirect...
        if($flag == 1) {
            include('sendMail.php');
        }

        echo 'All is good to go!<br>';
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


echo "<script> alert('All is done well Now!')</script>";
  };
?>