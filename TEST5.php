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
    $pdo=new pdo($dsn,'root','');
    $sql="select * 
    from students,classes,class_student
    where  classes.code= class_student.class_code && 
     students.school_num=class_student.school_num  
    ";

    $data=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    
    //to do
    ?>
</body>
</html>