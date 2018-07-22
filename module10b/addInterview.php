<?php
// Filename: addInterview.php
if (empty($_POST['interview_date']) || empty($_POST['interviewer_name']) || empty($_POST['interviewer_position']) || empty($_POST['candidate_name']) || empty($_POST['communication_abilities']) || empty($_POST['computer_skills']) || empty($_POST['business_knowledge']) || empty($_POST['interviewers_comments'])) {
    echo "<p>You must enter all form fields! Click your browser's Back button to return to the Add Interview form.</p>";
} else {
    $user = "sdulaney";
    $password = "p5U5TXdX";
    $host = "localhost";

    $DBConnect = mysqli_connect($host, $user, $password);
    if ($DBConnect === FALSE) {
        echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    } else {
        $DBName = "sdulaney_module10b";
        if (!mysqli_select_db($DBConnect, $DBName)) {
            $SQLstring = "CREATE DATABASE $DBName";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE) {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            } else {
                echo "<p>You are the first interviewer!</p>";
            }
        }
        mysqli_select_db($DBConnect, $DBName);

        $TableName = "interviews";
        $SQLstring = "SHOW TABLES LIKE '$TableName'";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);

        if (mysqli_num_rows($QueryResult) == 0) {
            $SQLstring = "CREATE TABLE $TableName (InterviewID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, InterviewDate DATE, InterviewerName VARCHAR(50), InterviewerPosition VARCHAR(50), CandidateName VARCHAR(50), CommunicationAbilities VARCHAR(100), ComputerSkills VARCHAR(100), BusinessKnowledge VARCHAR(100), InterviewersComments VARCHAR(100))";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE) {
                echo "<p>Unable to create the table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }

        $InterviewDate = stripslashes($_POST['interview_date']);
        $InterviewerName = stripslashes($_POST['interviewer_name']);
        $InterviewerPosition = stripslashes($_POST['interviewer_position']);
        $CandidateName = stripslashes($_POST['candidate_name']);
        $CommunicationAbilities = stripslashes($_POST['communication_abilities']);
        $ComputerSkills = stripslashes($_POST['computer_skills']);
        $BusinessKnowledge = stripslashes($_POST['business_knowledge']);
        $InterviewersComments = stripslashes($_POST['interviewers_comments']);
        $SQLstring = "INSERT INTO $TableName VALUES (NULL, '$InterviewDate', '$InterviewerName', '$InterviewerPosition', '$CandidateName', '$CommunicationAbilities', '$ComputerSkills', '$BusinessKnowledge', '$InterviewersComments')";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);

        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
        } else {
            echo "<h1>Thank you for using our Candidate Database!</h1>";
        }

        mysqli_close($DBConnect);
    }
}

?>