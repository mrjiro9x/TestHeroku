<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
<?php
    require_once './connect.php';
    $sql = "Select * From accounts";
    $rows = query($sql);
    for($i=0; $i<count($rows); $i++)
    {
    ?>
        <a href=""><img src="<?=$rows[$i][6]?>"></a> <br>
        <p>ID: <?=$rows[$i][0]?></p>
        <p>Full Name: <?=$rows[$i][1]?></p>
        <p>Username: <?=$rows[$i][2]?></p>
        <p>Password: ********</p>
        <p>Email: <?=$rows[$i][4]?></p>
        <p>Gender: <?=$rows[$i][5]?></p>
    <?php
	}
	?>
</div>
    <input type="file" name="avatar" value="Chose">
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
        echo "Success to accounts/";
    }else{
        print_r($errors);
    }
    }
    ?>
</body>
</html>