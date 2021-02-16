<?php include("database.php"); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>User Details</title>
    </head>

    <body>
        <?php 
            $sql = "DELETE FROM users WHERE id = {$_REQUEST['id']}";

            if (mysqli_query($conn, $sql)) {
                echo "Records Deleted <br><br>";
            }
            else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        ?>
    </body>
</html>