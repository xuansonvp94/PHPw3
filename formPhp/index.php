<?php
    $name = $email = $website = $gender = $comment = "";
    $nameErr = $emailErr = $websiteErr = $genderErr = ""; //contain error messenger

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validate Name
        if (empty($_POST['name'])) {
            $nameErr = "Name is required";
        } else  {
            $name = checkInput($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        //Validate Email
        if (empty($_POST['email'])) {
            $emailErr = "Email is required";
        } else {
            $email = checkInput($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST['website'])) {
            $websiteErr = "Website is required";
        } else {
            $website = checkInput($_POST['website']);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL";
            }
        }

        if (empty($_POST['gender'])) {
            $genderErr = "Gender is required";
        } else {
            $name = checkInput($_POST['name']);
        }

        $comment = checkInput($_POST['comment']);
    }

    function checkInput ($data) {
        $data = trim($data); //loai bo cac ky tu khong can thiet (tab, newline, extra space)
        $data = stripcslashes($data); //loai bo dau "\"
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<html>
    <head>
        <style>
            .error {color: red;}
        </style>
    </head>
    <body>
        <h1>
            PHP FORM VALIDATION EXAMPLE
        </h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            Name: <input type="text" name="name" value="<?php echo $name;?>">  <!--value = echo name: vẫn hiển thị tên khi trên ô input khi đã submit -->
            <span class="error">* <?php echo $nameErr; ?></span><br><br>

            Email: <input type="text" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr; ?></span><br><br>

            Website: <input type="text" name="website"  value="<?php echo $website;?>">
            <span class="error">*<?php echo $websiteErr; ?></span><br><br>

            Comment: <textarea name="comment" rows="5" cols="40" value="<?php echo $comment?>"></textarea>
            <br><br>

            Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="famale">Female
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
            <span class="error">* <?php echo $nameErr; ?></span><br><br>
            <input type="submit" value="submit">
        </form>
    </body>
</html>

<?php
    echo "<h1>Your Information</h1>";
    echo "Your Name is ".$name.'<br>';
    echo "Your Email is ".$email.'<br>';
    echo "Your Website is ".$website.'<br>';
    echo "Your Comment is ".$comment.'<br>';
    echo "Your gender is ".$gender.'<br>';

?>
