<?php
ob_start();
include "index.php";

if (isset($_POST['update'])) {

    $user_id = $_POST['user_id'];

    $name = $_POST['name'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record updated successfully.";
        header("Location:read.php");
        
    } else {

        echo "Error updating the record :" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];

            $name = $row['name'];

            $email = $row['email'];

            $password = $row['password'];
        }

?>
        <html>

        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        </head>

        <body>
            <h2>User Update Form</h2>

            <form action="" method="post">

                <fieldset>

                    <legend>Personal information:</legend>

                    Name:<br>

                    <input type="text" name="name" value="<?php echo $name; ?>">

                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                    <br>

                    Email:<br>

                    <input type="email" name="email" value="<?php echo $email; ?>">

                    <br>

                    Password:<br>

                    <input type="password" name="password" value="<?php echo $password; ?>">

                    <br>

                    <br>

                    <input type="submit" value="Update" name="update" class="btn btn-primary">

                </fieldset>

            </form>

        </body>

        </html>

<?php

    } else {
    }
}
?>