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
// $sql="select *,count(*) as 人數 
// from class_student,classes,students
// where 
// students.school_num = class_student.school_num 
// && classes.code = class_student.class_code
// ";

$sql="select `class_student`.
	   `class_code`,
       classes.name,
       count(*) as 人數 ,
       min(`student_scores`.`score`) as 最低分,
       max(`student_scores`.`score`) as 最高分,
        AVG(`student_scores`.`score`) AS '班級平均',
        (SELECT AVG(`student_scores`.`score`) FROM `student_scores`) AS '總平均',
        rank() over (order by 班級平均 DESC) as 班級排名,
        CASE 
            WHEN (SELECT AVG(score) FROM student_scores) <= AVG(student_scores.score) THEN '表現良好'
            WHEN (SELECT AVG(score) FROM student_scores) > AVG(student_scores.score) THEN '有待加強'
        END AS '評語'
        
from class_student
join student_scores
on class_student.school_num = student_scores.school_num
join classes
on class_student.class_code=classes.code
GROUP BY `class_code`
order by 班級平均 DESC



";
$data=$pdo->query($sql)->Fetchall(pdo::FETCH_ASSOC);
echo "<pre>";
    print_r($data);
echo "</pre>";
?>    
</body>
</html>

