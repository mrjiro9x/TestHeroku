<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
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
            <tr>
                <td>Avatar</td>
                <td><input type="file" name="avatar" value="Chose"></td>
            </tr>
        </table>
        <button type="submit" name="submit" >CREATE</button>
    </div>
    <?php
        if(isset($_FILES['avatar'])){
            $errors= array();
            $file_name = $_FILES['avatar']['name'];
            $file_size = $_FILES['avatar']['size'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $file_type = $_FILES['avatar']['type'];
            $tmp = end(explode('.',$_FILES['avatar']['name']));
            $file_ext = strtolower($tmp);
            
            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
                $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
            }

            if($file_size > 5000000) {
                $errors[]='Kích thước file không được lớn hơn 5MB';
            }

            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"accounts/".$file_name);
                echo "Success";
            }else{
                print_r($errors);
            }
        }
    ?>

        </form>
        <?php
        include_once "connect.php"; 
        if(!isset($_POST['submit']))
        {
        }
        else
        {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $avatar = $_POST['avatar'];
            $sql = "INSERT INTO accounts(
                id, fullname, username, password, email, gender, avatar)
                VALUES (null, '$fullname', '$username', '$password', $email'', '$gender', '$avatar');";
            $pdo->exec($sql);
            echo 'add Sucessfully';
        }
    ?>
</body>
</html>