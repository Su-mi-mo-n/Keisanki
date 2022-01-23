<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keisanki</title>
</head>
<body>
<form action="page1.php" method="post"> 
数式を入力してください<br>
<input type="text" name="shiki"><br>
<input type="submit" value="数式を構築する"><br>
</body>
</html>
<?php
session_start();
$re = 0;
$_SESSION["re"] = $re;
?>