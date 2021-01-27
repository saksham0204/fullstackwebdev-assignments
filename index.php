<!DOCTYPE html>
<html>

<head>
    <title>Form</title>
    <script>
        function ValidateEmail() {
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            inputText = document.getElementById("email");
            if (inputText.value.match(mailformat))
                return true;
            else {
                alert("You have entered an invalid email address!");
                return false;
            }
        }

        function phonenumber() {
            var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
            inputtxt = document.getElementById("number");
            if (inputtxt.value.match(phoneno))
                return true;
            else {
                alert("Please enter a valid Phone Number");
                return false;
            }
        }
    </script>
</head>

<body>
    <form action="index.php" method="POST" name="form1">
        Name: <input type="text" id="name" name="name" placeholder="Your Name" required><br><br>
        E-Mail: <input type="email" id="email" name="email" placeholder="Mail@example.com" required><br><br>
        Contact: <input type="text" id="number" name="number" placeholder="Contact Number" pattern="[789][0-9]{9}"
            minlength="10" maxlength="10" required><br><br>
        City: <input type="text" id="city" name="city" placeholder="City" required><br><br>
        Course: <input type="text" id="course" name="course" placeholder="Course" required><br><br>
        Interests: <input type="text" id="interest" name="interest" placeholder="Interests" required><br><br>
        <input id="submit" type="submit" name="submit" value="SUBMIT" onclick="ValidateEmail(); phonenumber();">
    </form>

    <?php
    if (isset($_POST['submit'])) { ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>City</th>
            <th>Course</th>
            <th>Interest</th>
        </tr>
        <tr>
            <td><?php echo $_POST['name']?>
            </td>
            <td><?php echo $_POST['email']?>
            </td>
            <td><?php echo $_POST['number']?>
            </td>
            <td><?php echo $_POST['city']?>
            </td>
            <td><?php echo $_POST['course']?>
            </td>
            <td><?php echo $_POST['interest']?>
            </td>
        </tr>
    </table>
    <?php } ?>

</body>

</html>