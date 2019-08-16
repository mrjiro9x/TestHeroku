<?php
$pdo = new PDO('pgsql:host=ec2-174-129-41-127.compute-1.amazonaws.com;
port=5432; dbname=d14kltdcqn8op1', 'zosmvlfgqojvhy',
 '934c84db6c7021b5fcdc7f73b33b02079f3bf8659311519d05d4841087ae4eb9');
if(!$pdo){
    echo "Fail!";
}
else {
    echo "Success!";
}
?>