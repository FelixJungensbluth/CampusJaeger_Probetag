<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
     .center {font-size: 40pt;}
    </style>
</head>
<body>

    <div class="center">

    <?php
    error_reporting(0);
    $pdo = new PDO('mysql:host=localhost;dbname=eagle', 'root', '1234');
    $sql = "SELECT price,info,model FROM camera ORDER BY id DESC LIMIT 1";
        foreach ($pdo->query($sql) as $row) {
         echo "Price: ".$row['model']."<br>"."Name: ".$row['info']."<br>". "Description: " .$row['price']."<br>";
        }
    ?>
    </div>

</body>
</html>