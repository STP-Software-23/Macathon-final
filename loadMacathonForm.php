<?php
//First-->
//           Check if it's an individual or team leader
//           boolean to store the data in which table in database 
//           0 for individual 1 for team lead
$flag = 0;
$userName = "NourEldin Ahmed";
$Phone = "01011111111";
$email = "example00@gmail.com";
$faculty = "my faculty";
$graduationYear = "2023";
$university = "abc University";
$whyQuestionAns = "because bla bla bla!";
$experience = "First time!!!";
// Generate a unique code for each team.
$teamCode = mt_rand(1000000, 9999999);
// we should not have two teams with the same name
$teamName = "Go";
// range between min 3 to max 5
$teamNum = 5;


if (
    empty($userName) || empty($Phone) || empty($email) ||
    empty($faculty)  || empty($graduationYear) || empty($university) ||
    empty($whyQuestionAns) || empty($experience) ||
    empty($teamCode) || empty($teamName) || empty($teamNum)

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

// team size range 2 to 5
if ($teamNum < 3 || $teamNum > 5) {
    die("team size range from 3 to 5.");
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
try {
    $sql = "INSERT INTO team_lead (user_name, phone, email, faculty, 
graduation_year, university, why_question_ans, experience, team_code, team_name, team_num)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


    if (!$stmt->prepare($sql)) {
        die("SQL error: ......................." . $mysqli->error);
    }

    $stmt->bind_param(
        "sssssssssss",
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
        $teamNum
    );
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


try {
    if ($stmt->execute()) {
        // Redirect...
        echo 'All is good to go!<br>';
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


//Sending Email for the team leader.

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$teamLeaderEmail = 'example@gmail.com';

$mail = new PHPMailer(true);

try {
    //set up php mailer settings
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'macathon4.0@gmail.com';
    $mail->Password = 'hqupflszfoaimbob';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // set up sender and receiver
    $mail->setFrom('macathon4.0@gmail.com', 'Macathon4.0');
    $mail->addAddress($teamLeaderEmail);

    //send email subject and body
    $mail->isHTML(true);
    $mail->Subject = 'Macathon team code';
    $mail->Body = "<h5> Hello " . $userName . " </h5><br> 
    Hope all is well with you. <br>
    Thank you for registration, your team code is <b> " . $teamCode . "</b><br>
    Send form <a href='https://www.w3schools.com'>Link!</a> for your members.<br>
    Have a nice day! ";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!<br>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
echo 'All is done well Now!<br>';
