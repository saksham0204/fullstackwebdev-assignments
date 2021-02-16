<?php require_once("database.php"); ?>

<!DOCTYPE html>

<html>
    <body>
        <?php
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $city = $_POST['city'];

                $sql = "INSERT INTO users (username, email, gender, city) VALUES ('$username', '$email', '$gender', '$city')";

                if (!(mysqli_query($conn, $sql))) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        ?>
    </body>
</html>