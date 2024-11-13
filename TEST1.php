<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo= new PDO($dsn,'root','');
    $sql="select * from classes";
    $class_data=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($class_data);
    echo "</pre>";
  
    //to do
    ?>
    <table>
        <tr>
            <td>學號</td>
            <td>班級</td>
            <td>中文班級</td>
            <td>老師名字</td>
        </tr>
        <?php
 //to do
 foreach($class_data as $row)
 {
?>
        <tr>
            <td><?=$row['id'];?></td>
            <td><?=$row['code'];?></td>
            <td><?=$row['name'];?></td>
            <td><?=$row['tutor'];?></td>
        </tr>
<?php
}
?>        
    </table>
</body>
</html>