<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Sorted</title>
</head>
<body>

    <h1>Song Organizer</h1>

<?php

    // Comment: What does this if statement check for exactly?
    // This if statement checks if the key "action" is set in the superglobal array $_GET.
    if (isset($_GET['action'])) {
        if ((file_exists("SongOrganizer/songs.txt")) && (filesize("SongOrganizer/songs.txt") != 0)) {
            $SongArray = file("SongOrganizer/songs.txt");

            // Comment: Explain line 16 - 27 (23 - 34)
            // This switch statement executes different functions based on the value for the key "action" in the
            // superglobal array $_GET. This removes duplicate songs, sorts the songs in ascending order, or shuffles
            // the songs, depending on which option was selected.
            switch ($_GET['action']) {
                case 'Remove Duplicates':
                    $SongArray = array_unique($SongArray);
                    $SongArray = array_values($SongArray);
                    break;
                case 'Sort Ascending':
                    sort($SongArray);
                    break;
                case 'Shuffle':
                    shuffle($SongArray);
                    break;
            }

            // Comment: What does this if statement do?
            // This if statement checks if the number of elements in the array $SongArray is greater than 0.
            if (count($SongArray) > 0) {
                $NewSongs = implode($SongArray);
                $SongStore = fopen("SongOrganizer/songs.txt", "wb");
                if ($SongStore === false) {
                    echo "There was an error updating the song file.\n";
                } else {
                    fwrite($SongStore, $NewSongs);
                    fclose($SongStore);
                }
            } else {
                unlink("SongOrganizer/songs.txt");
            }
        }
    }

    // Comment: Explain line 47 (55)
    // This if statement checks if the key "submit" is set in the superglobal array $_POST.
    if (isset($_POST['submit'])) {
        $SongToAdd = stripslashes($_POST['SongName']) . "\n";
        $ExistingSongs = array();

        // Comment: Explain line 51 - 69 (64 - 80)
        // If the file songs.txt exists and contains data, read the file into an array. If the song we're trying
        // to add is in the array, display a message to the user explaining the song was not added to the list.
        // Otherwise, write the song to the file, close the file pointer, and display a message indicating the
        // song has been added to the list. Display an error message if fopen reports an error.
        if (file_exists("SongOrganizer/songs.txt") && filesize("SongOrganizer/songs.txt") > 0) {
            $ExistingSongs = file("SongOrganizer/songs.txt");

            if (in_array($SongToAdd, $ExistingSongs)) {
                echo "<p>The song you entered already exists!<br />\n";
                echo "Your song was not added to the list.</p>";
            } else {
                $SongFile = fopen("SongOrganizer/songs.txt", "ab");
                if ($SongFile === false) {
                    echo "There was an error saving your message!\n";
                } else {
                    fwrite($SongFile, $SongToAdd);
                    fclose($SongFile);
                    echo "Your song has been added to the list.\n";
                }
            }
        }
    }

    // Comment: Explain line 73 - 84 (87 - 98)
    // If the file songs.txt does not exist or the file is empty, display a message indicating there are no songs in
    // the list. Otherwise, read the file into an array. Loop over the array and display each song as a row in a HTML
    // table element.
    if ((!file_exists("SongOrganizer/songs.txt")) || (filesize("SongOrganizer/songs.txt") == 0)) {
        echo "<p>There are no songs in the list.</p>\n";
    } else {
        $SongArray = file("SongOrganizer/songs.txt");
        echo "<table border=\"1\" width=\"100%\" style = \"background-color:lightgray\">\n";
        foreach ($SongArray as $Song) {
            echo "<tr>\n";
            echo "<td>" . htmlentities($Song) . "</td>";
            echo "</tr>\n";
        }
        echo "</table>\n";
    }

?>

    <p>
        <a href="SongOrganizer.php?action=Sort%20Ascending">Sort Song List</a><br />
        <a href="SongOrganizer.php?action=Remove%20Duplicates">Remove Duplicate Songs</a><br />
        <a href="SongOrganizer.php?action=Shuffle">Randomize Song List</a><br />
    </p>

    <form action="SongOrganizer.php" method="post">
        <p>Add a New Song</p>
        <p>Song Name: <input type="text" name="SongName" /></p>
        <p>
            <input type="submit" name="submit" value="Add Song to List" />
            <input type="reset" name="reset" value="Reset Song Name" />
        </p>
    </form>

</body>
</html>