<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');
$sql="SELECT students.id,
       students.school_num as sch_num,
       students.name as stname,       
       classes.name AS class_name,
       class_student.seat_num 
FROM students,classes,class_student
WHERE students.school_num=class_student.school_num && 
	  classes.code=class_student.class_code;";
$data=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
    print_r($data);
echo "</pre>";

?>

