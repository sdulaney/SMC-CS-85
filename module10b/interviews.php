<!DOCTYPE html>
<!-- Filename: interviews.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Candidates Database</title>
</head>
<body>

    <form action="addInterview.php" method="post">
        <h1>Add Interview Form</h1>
        <fieldset>
            <p>
                <label for="interview_date">
                    Interview Date
                </label>
                <input type="date" id="interview_date" name="interview_date" />
            </p>
        </fieldset>
        <fieldset>
            <legend>Interviewer Info</legend>
            <p>
                <label for="interviewer_name">
                    Interviewer Name
                </label>
                <input type="text" id="interviewer_name" name="interviewer_name" />
            </p>
            <p>
                <label for="interviewer_position">
                    Interviewer Position
                </label>
                <input type="text" id="interviewer_position" name="interviewer_position" />
            </p>
        </fieldset>
        <fieldset>
            <legend>Candidate Info</legend>
            <p>
                <label for="candidate_name">
                    Candidate Name
                </label>
                <input type="text" id="candidate_name" name="candidate_name" />
            </p>
            <p>
                <label for="communication_abilities">
                    Communication Abilities
                </label>
                <input type="text" id="communication_abilities" name="communication_abilities" />
            </p>
            <p>
                <label for="computer_skills">
                    Computer Skills
                </label>
                <input type="text" id="computer_skills" name="computer_skills" />
            </p>
            <p>
                <label for="business_knowledge">
                    Business Knowledge
                </label>
                <input type="text" id="business_knowledge" name="business_knowledge" />
            </p>
            <p>
                <label for="interviewers_comments">
                    Interviewer's Comments
                </label>
                <input type="text" id="interviewers_comments" name="interviewers_comments" />
            </p>
        </fieldset>
        <p>
            <button type="submit">
                Submit
            </button>
        </p>
    </form>

    <p><a href="showInterviews.php">Show Interviews</a></p>

</body>
</html>