<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse:collapse;
        }
        td{
            text-align:center;
            border:1px solid black;
        }
    </style>
</head>
<body>
    <?php
        $dsn="mysql:host=localhost;charset=utf8;dbname=school";
        $pdo=new pdo($dsn,'root','');
        $class_id=$_GET['id'];
        $sql="
        select *
        from classes
        where id='$class_id'
        limit 1
        ";
        $data=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        echo "<pre>";
            print_r($data);
        echo "</pre>";

        
        echo $data['code'];
        // $sql="select school_num,seat_num from class_student where class_code=";
  
        // $sql="select school_num,seat_num from class_student where class_code='{$data['code']}'";  
        $sql="select school_num,seat_num from class_student where class_code='".$data['code']."'";  
        $members=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<pre>";
        print_r($members);
        echo "</pre>";

    ?>
    <table>
        <tr>
            <td>學號</td>
            <td>座號</td>
            <td>姓名</td>
            <td>學號</td>
            <td>座號</td>
            <td>姓名</td>
            <td>學號</td>
            <td>座號</td>
            <td>姓名</td>                        
        </tr>

<?php
       foreach($members as $idx => $row)
       {
        $sql="
        select name 
        from students 
        where students.school_num=".$row['school_num'];
        $name=$pdo->query($sql)->fetch(pdo::FETCH_ASSOC);
        if($idx%3==0)
        echo "<tr>";


?>



        
        
            
            <td><?=$row['school_num'];?></td>
            <td><?=$row['seat_num'];?></td>            
            <td><?=$name['name'];?></td> 
        
        <?php
        if($idx%3==2)
        echo "</tr>";
          }
        ?>
    </table>
</body>
</html>