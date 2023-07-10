<?php
session_start();
$action = $_GET['action'];
$stu_id = $_GET['stu_id'];

if($action == 'Add'){
    $course_id = $_GET['course_id'];   
    include('config.php');
    // 3- Prepare Query
    $sql = "INSERT INTO courses_students VALUES ($stu_id , $course_id)" ;
    // 4- Execute Query
    $result = mysqli_query($con , $sql);
    if($result){
        $_SESSION['msg'] =  'Add Successfully';
    }else{
        $_SESSION['msg'] =  'Add Failed';
    }
  
}else if($action == 'Delete'){   
    $course_id = $_GET['course_id'];
    include('config.php');
    // 3- Prepare Query
    $sql = "DELETE FROM courses_students WHERE course_id = $course_id AND stu_id = $stu_id " ;
    // 4- Execute Query
    $result = mysqli_query($con , $sql);
    if($result){
        $_SESSION['msg'] =  'Delete Successfully';
    }else{
        $_SESSION['msg'] =  'Delete Failed';
    }
}else{  
    $stu_name = $_GET['stu_name'];
    include('config.php');
    // 3- Prepare Query
    $sql = "UPDATE students SET stu_name = '$stu_name' WHERE id = $stu_id " ;
    // 4- Execute Query
    $result = mysqli_query($con , $sql);
    if($result){
        $_SESSION['msg'] =  'Update Successfully';
    }else{
        $_SESSION['msg'] =  'Update Failed';
    }
}

header('location:view_students.php');

?>