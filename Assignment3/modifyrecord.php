<?php include("database.php"); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>User Details</title>

        <script type="text/javascript">
            function ConfirmDeletion(userId){
                if(confirm("Are you sure?")){
                    location.href = "delete.php?id=" + userId;             
                }
                else{
                    location.href = "details.php";
                }
            }
        </script>

        <style>
            body {
                margin: 30px;
                padding: auto;
            }

            div {
                display: inline;
            }

            th, td, table {
                border: 1px solid black;
            }

            table {
                width: 75%;
                text-align: center;
                margin: 20px auto;
                padding: auto;
                border-collapse: collapse;
            }
        </style>
    </head>

    <body>
        <form action="" method="POST">
            <div>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" placeholder="Enter Username" required>
            </div>
            <div>
                <input type="submit" name="details" id="details" value="SHOW DETAILS">
            </div>
            <br><br><br><br>
        </form>

        <?php
            if(isset($_POST["details"])){
                $username = $_POST["username"];

                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);

                if ((mysqli_num_rows($result) > 0)) { 
                    $row = mysqli_fetch_assoc($result);?>
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["username"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["gender"] ?></td>
                                <td><?php echo $row["city"] ?></td>
                                <td><a href="edit.php?id=<?php echo $row['id']?> "> <input type="button" name="edit" value="EDIT"></a> <input type="button" name="delete" value="DELETE" onclick="ConfirmDeletion('<?php echo $row['id']?>');"></td>    
                            </tr>
                        </tbody>
                    </table>   
                <?php } else {
                    echo "No data found";
                }
            }
        ?>
    </body>
</html>