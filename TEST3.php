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
        $pdo=new PDO($dsn,'root','');
        $sql="select * from dept";
        $data=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
    print_r($data);
echo '</pre>';        

    //to do
    ?>
    <table>
        <tr>
            <td>id</td>
            <td>科系碼</td>
            <td>科系</td>
        </tr>
        <?php
               foreach($data as $row){
        ?>
 
            
        
        <tr>
            <td><?=$row['id'];?></td>
            <td><?=$row['code'];?></td>
            <td><?=$row['name'];?></td>
        </tr>  
        <?php
         }//to do
        ?>    
    </table>
</body>
</html>