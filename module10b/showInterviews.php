<!DOCTYPE html>
<!-- Filename: showInterviews.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Interviews</title>
</head>
<body>

<?php

$user = "sdulaney";
$password = "p5U5TXdX";
$host = "localhost";

$DBConnect = mysqli_connect($host, $user, $password);
if ($DBConnect === FALSE) {
    echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
} else {
    $DBName = "sdulaney_module10b";
    if (!mysqli_select_db($DBConnect, $DBName)) {
        echo "<p>There are no entries in the Candidate Database!</p>";
    } else {
        $TableName = "interviews";
        $SQLstring = "SELECT * FROM $TableName";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0) {
            echo "<p>There are no entries in the Candidate Database!</p>";
        } else {
            echo "<p>The following interviews are in our Candidate Database:</p>";
            echo "<table width='100%' border='1'>";
            echo "<tr><th>Interview Date</th><th>Interviewer Name</th><th>Interviewer Position</th><th>Candidate Name</th><th>Communication Abilities</th><th>Computer Skills</th><th>Business Knowledge</th><th>Interviewer's Comments</th></tr>";
            while ($Row = mysqli_fetch_array($QueryResult)) {
                echo "<tr><td>{$Row['InterviewDate']}</td>";
                echo "<td>{$Row['InterviewerName']}</td>";
                echo "<td>{$Row['InterviewerPosition']}</td>";
                echo "<td>{$Row['CandidateName']}</td>";
                echo "<td>{$Row['CommunicationAbilities']}</td>";
                echo "<td>{$Row['ComputerSkills']}</td>";
                echo "<td>{$Row['BusinessKnowledge']}</td>";
                echo "<td>{$Row['InterviewersComments']}</td></tr>";
            }
        }
        mysqli_free_result($QueryResult);
    }
    mysqli_close($DBConnect);
}

?>

</body>
</html>