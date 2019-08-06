<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Processing</title>
</head>
<body>
<?php
    /*
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=dbgch17133' , 'postgres', '1602');
    echo "Connect Successfully!";
    */

    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));

    //$sql = "SELECT studentname, course FROM registercourse";
    $sql = "SELECT * FROM registercourse";
    $stmt = $pdo->prepare($sql);
    // Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll();
?>
    <ul>
        <h1>Your Information:</h1>
        <?php
        foreach($resultSet as $row)
            echo '<li>Student Name: '. $row["txtName"] .'</li>';
            echo '<li>Course: '. $row["cbCourse"] .'</li>';
            echo '<li>Date of Birth: '. $row["dob"] .'</li>';
            echo '<li>Gender: '. $row["gender"] .'</li>';
            echo '<li>Favorite: '. $row["fav"] . '</li>';
        ?>
    </ul>  
</body>
</html>
