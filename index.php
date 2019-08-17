<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <?php
        include "connect.php";
    ?>
</head>
<body>
    <form class="formCreate" action="" method="post" enctype="multipart/form-data">
    <div class="create">
        <h1>Create A New Account</h1>
        <table>
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="fullname" placeholder="eg. John Doe" require></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="Enter Username Unique" require></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="Password" name="password" placeholder="*********" require></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" placeholder="johndoe@example.com"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female</td>
            </tr>
        </table>
        <button type="submit" name="submit" >CREATE</button>
    </div>
    </form>
    <?php         
        if(!isset($_POST['submit']))
        {}
        else
        {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $sql = "INSERT INTO accounts(
                id, fullname, username, password, email, gender, avatar)
                VALUES (null, '$fullname', '$username', '$password', $email'', '$gender', null);";
            $pdo->exec($sql);
            echo 'add Sucessfully to database';
        }
    ?>
</body>
</html>