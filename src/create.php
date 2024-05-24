<?php
ob_start();
require 'index.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "New record created successfully.";
        header("Location:read.php");
        exit;
     } else {
         echo "Error:" . $sql . "<br>" . $conn->error;
     }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Personal Information</h2>

    <form action="" method="POST">
        <fieldset>
            <legend>Personal information:</legend>

            Name:<br>
            <input type="text" name="name" required><br>

            Email:<br>
            <input type="email" name="email" required><br>

            Password:<br>
            <input type="password" name="password" required><br><br>

            <input type="submit" name="submit" value="save">

            <input type="reset" value="reset">
        </fieldset>
    </form>

</body>

</html>