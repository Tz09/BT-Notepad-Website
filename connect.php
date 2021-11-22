<!--Reference: Connect register form to database and store data-->
<!--YouTube channel: Code and Coins-->
<!--How to connect HTML Register Form to MySQL Database with PHP (2020)-->
<!--https://www.youtube.com/watch?v=qm4Eih_2p-M&t=285s-->

<?php
    $title = filter_input(INPUT_POST, 'title');
    $notes = filter_input(INPUT_POST, 'notes');

    if (!empty($title)) {
        if (!empty($notes)) {
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "123";
            $dbname = "btnotepad";
            // Create connection
            $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
            if (mysqli_connect_error()) {
                die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
            }
            else {
                $sql = "INSERT INTO notes(title,notes) values ('$title','$notes')";
                if ($conn->query($sql)) {
                    //  Reference for pop up alert message box
                    //1)    How to pop an alert message box using PHP ?
                    //      https://www.geeksforgeeks.org/how-to-pop-an-alert-message-box-using-php/
                    //2)	YouTube channel: Funda of Web IT
                    //      Part 20: PHP-Admin: How to show success message on form submit using sweet alert in php
                    //      https://www.youtube.com/watch?v=C4N3sMg25fQ&t=141s
                    echo
                    '<script>
                        alert("New record is inserted successfully!");
                        window.history.go(-2);
                     </script>';
                }
                else {
                    echo
                    '<script>
                        alert("Error 404. Please try again!");
                        window.history.go(-2);
                        </script>';
                    $conn->error;
                }
                $conn->close();
            }
        }
        else {
            echo
            '<script>
                alert("Notes should not be empty!");
                window.history.back();
            </script>';
        }
    }
    else{
        echo
        '<script>
            alert("Title should not be empty!");
            window.history.back();
            </script>';
    }
?>