<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="get">
        <input type="text" name="name1">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
<?php
echo isset($_GET["name1"]) ? $_GET["name1"] : '';
?>
