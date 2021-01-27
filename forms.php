<!DOCTYPE html>

<html>

    <head>
        <title>Form</title>

        <style>
            body {
                margin: 10px;
                padding: 10px;
            }

            th, td, table {
                border: 1px solid black;
            }

            table {
                width: 75%;
                text-align: center;
                margin: auto;
                padding: auto;
                border-collapse: collapse;
            }
        </style>

        <script>
            function validateForm() {
                var a = document.forms["form1"]["name"].value;
                var b = document.forms["form1"]["email"].value;
                var c = document.forms["form1"]["number"].value;
                var d = document.forms["form1"]["city"].value;
                var e = document.forms["form1"]["course"].value;
                var f = document.forms["form1"]["interest"].value;
                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == "", f == null || f == "") {
                    alert("Please Fill All Required Field");
                    return false;
                }
                return true;
            }

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

            function validateInterest() {
                var options = document.getElementById('interest').options,
                    n = 0;
                for (var i = 0; i < options.length; i++) {
                    if (options[i].selected)
                        n++;
                }
                if (n < 3) {
                    alert("Please select at least 3 field of interests");
                    return false;
                } else if (n > 5) {
                    alert("Please select at most 5 field of interests");
                    return false;
                } else
                    return true;
            }
        </script>

    </head>

    <body>
        <form action="index.php" method="POST" name="form1">
            Name: <input type="text" id="name" name="name" placeholder="Your Name" required><br><br>
            E-Mail: <input type="email" id="email" name="email" placeholder="Mail@example.com" required><br><br>
            Contact: <input type="text" id="number" name="number" placeholder="Contact Number" minlength="10" maxlength="10" required onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"><br><br>
            City: <input type="text" id="city" name="city" placeholder="City" required><br><br>
            Course: <input type="text" id="course" name="course" placeholder="Course" required><br><br>
            Interests: <br><br>
            <select name="interest[]" id="interest" multiple>
                <option value="Blogging">Blogging</option>
                <option value="Sports">Sports</option>
                <option value="Art">Art</option>
                <option value="Gaming">Gaming</option>
                <option value="Traveling">Traveling</option>
                <option value="Music">Music</option>
                <option value="Cooking">Cooking</option>
                <option value="Reading">Reading</option>
            </select>
            <br><br>
            <input id="submit" type="submit" name="submit" value="SUBMIT" onclick="if( !(validateForm() && ValidateEmail() && phonenumber() && validateInterest())){
                    event.preventDefault();
                }">
            <br><br><br><br>
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
                <td><?php echo $_POST['name']?></td>
                <td><?php echo $_POST['email']?></td>
                <td><?php echo $_POST['number']?></td>
                <td><?php echo $_POST['city']?></td>
                <td><?php echo $_POST['course']?></td>
                <td><?php echo join(", ", $_POST['interest']) ?></td>
            </tr>
        </table>
        <?php } ?>

    </body>

</html>