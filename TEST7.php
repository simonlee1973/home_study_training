<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dsn="mysql:host=localhost;dbname=school;charset=utf8";
    $pdo=new pdo($dsn,'root','');
    $sql="
    select * 
    from classes
    where 1
    ";

    $data=$pdo->query($sql)->fetchAll(pdo::FETCH_ASSOC);
    echo "<pre>";
        print_r($data);
    echo "</pre>";
    ?>
    <table>
        <tr>
            <td>序號</td>
            <td>班級</td>
            <td>老師</td>
        </tr>
        <?php
         
         foreach ($data as $row ) {
            
        ?>

        <tr>
            <td><?=$row['id'];?></td>
            <td>   
                
                <a href="class_detail.php?id=<?=$row['id'];?>"> <?=$row['name'];?></a>
            </td>
            <td><?=$row['tutor'];?></td>
   
        </tr>        
        <?php
        } //to do
        ?>
    </table>
     //to do
    
</body>
</html>