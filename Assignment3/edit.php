<?php include("database.php"); ?>

<!DOCTYPE html>

<?php
    $sql = "SELECT * FROM users WHERE id = {$_REQUEST['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['update'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];

        $sql = "UPDATE users SET username='$username', email='$email', gender='$gender', city='$city' WHERE id={$_POST["id"]}";

        if((mysqli_query($conn, $sql)))
            echo "<script> location.href='details.php'; </script>";
        else
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>

<html>
    <head>
        <title>Form</title>

        <style>
            #form2 {
                margin: 50px 30px;
                padding: auto;
            }
        </style>
    </head>

    <body>
        <form action="" method="POST" name="form2" id="form2">
            <div>
                <label for="username">Username: </label>
                <input type="text" id="username" name="username" value='<?php echo $row["username"]; ?>' required>
                <br><br>
            </div>
            <div>
                <label for="email">E-Mail: </label>
                <input type="email" id="email" name="email" value='<?php echo $row["email"]; ?>' pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*" required>
                <br><br>
            </div>
            <div>
                <span>Gender: </span>
                <input type="radio" id="male" name="gender" value="Male" <?php if($row["gender"] == "Male"){echo "checked";}?> required>
                <label for="male"> Male </label>
                <input type="radio" id="female" name="gender" value="Female" <?php if($row["gender"] == "Female"){echo "checked";}?> >
                <label for="female"> Female </label>
                <input type="radio" id="other" name="gender" value="Other" <?php if($row["gender"] == "Other"){echo "checked";}?> >
                <label for="other"> Other </label>
                <br><br>
            </div>
            <div>
                <label for="city">City:</label>
                <select name="city" id="city" required>
                <option value="Baghpat" <?php if($row["city"] == "Baghpat"){echo "selected";}?> >Baghpat</option>
                    <option value="Banglore" <?php if($row["city"] == "Banglore"){echo "selected";}?> >Banglore</option>
                    <option value="Bareilly" <?php if($row["city"] == "Bareilly"){echo "selected";}?> >Bareilly</option>
                    <option value="Dehradun" <?php if($row["city"] == "Dehradun"){echo "selected";}?> >Dehradun</option>
                    <option value="Delhi" <?php if($row["city"] == "Delhi"){echo "selected";}?> >Delhi</option>
                    <option value="Jammu" <?php if($row["city"] == "Jammu"){echo "selected";}?> >Jammu</option>
                    <option value="Lucknow" <?php if($row["city"] == "Lucknow"){echo "selected";}?> >Lucknow</option>
                    <option value="Meerut" <?php if($row["city"] == "Meerut"){echo "selected";}?> >Meerut</option>
                    <option value="Saharanpur" <?php if($row["city"] == "Saharanpur"){echo "selected";}?> >Saharanpur</option>
                    <option value="Varanasi" <?php if($row["city"] == "Varanasi"){echo "selected";}?> >Varanasi</option>
                </select>
                <br><br>
            </div>
            <div>
                <input type="hidden" name="id" value='<?php echo $row["id"] ?>'> <input type="submit" name="update" id="update" value="UPDATE">
            <div>
        </form>
    </body>
</html>