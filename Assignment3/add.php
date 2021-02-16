<!DOCTYPE html>

<html>
    <head>
        <title>Addition</title>
        <style>
            body {
                margin: 30px 20px;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <div>
                <label for="var1">Var 1</label>
                <input type="text" id="var1" name="var1" required onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));">
                <br><br>
            </div>
            <div>
                <label for="var2">Var 2</label>
                <input type="text" id="var2" name="var2" required onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));">
                <br><br>
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="SUBMIT">
                <br><br>
            </div>
        </form>
    </body>
</html>

<?php
    if(isset($_POST["submit"])){
        $a = $_POST["var1"];
        $b = $_POST["var2"];
        echo "Addition: ", ($a + $b);
    }
?>