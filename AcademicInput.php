<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Academic Records</title>
    <!--This will connect the page with bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<?php

//These are variables which will store the user data
$courseName = $_POST['courseName'];
$studentNumber = $_POST['studentNumber'];
$name = $_POST['name'];
$work = $_POST['work'];
$grade = $_POST['grade'];


//This is validation from the server side
$yes = true;
 if(empty($courseName))
 {
     echo "Please enter the course name.</br>";
     $yes= false;
 }

if(empty($studentNumber))
{
    echo "Please enter the student number.</br>";
    $yes= false;
}

if(empty($name))
{
    echo "Please enter the name.</br>";
    $yes= false;
}

if(empty($work))
{
    echo "Please give the work details.</br>";
    $yes= false;
}

if(empty($grade))
{
    echo "Please select a grade.</br>";
    $yes= false;
}

//If everything is filled than it will connects to the database
if($yes) {
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395834', 'gc200395834', 'RfOMQChbzO');

//This will store the user input into the table in database
    $sql = "INSERT INTO academic (courseName, studentNumber, name, work, grade) 
    VALUES (:courseName, :studentNumber, :name, :work, :grade)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':courseName', $courseName, PDO::PARAM_STR, 100);
    $cmd->bindParam(':studentNumber', $studentNumber, PDO::PARAM_STR, 100);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $cmd->bindParam(':work', $work, PDO::PARAM_STR, 100);
    $cmd->bindParam(':grade', $grade, PDO::PARAM_STR, 100);

    $cmd->execute();


// disconnect from the database
    $db = null;

    echo "Saved</br>";
    echo '<h3><a href="AcademicRecords.php">Add New Student Record</a></h3>';
}



?>

</body>
</html>

