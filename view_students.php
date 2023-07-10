<?php
    session_start();   
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $_GET['course_id'];
    }else{
        $course_id = $_SESSION['course_id'] ;
    }    
    include('config.php');
    // 3- Prepare Query
    $sql = "SELECT courses_students.stu_id , students.stu_name
            FROM courses_students , students
            WHERE courses_students.stu_id = students.id AND courses_students.course_id = $course_id" ;
    // 4- Execute Query
    $result = mysqli_query($con , $sql);
    // 5- fetch resulting rows as an array
    $students = mysqli_fetch_all($result , MYSQLI_ASSOC);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>View Students</h1>
    <table border="1">
            <tr>
                <th>ID</th>
                <th>Student Name</th>    
                <th colspan="2">Action</th>     
            </tr>
            <?php foreach($students as $student){?>
                <tr>
                    <td><?php echo $student['stu_id']?></td>
                    <td><?php echo $student['stu_name']?></td>
                    <td><a href="view_students.php?stu_id=<?php echo $student['stu_id']?>&stu_name=<?php echo $student['stu_name']?>&action=edit">Update</a></td>
                    <td><a href="CRUD_operations.php?course_id=<?php echo $course_id;?>&stu_id=<?php echo $student['stu_id']?>&action=Delete">Delete</a></td>
                </tr>
            <?php }?>
    </table>
    
    <?php if(isset($_GET['action'])){?>
        <h2>Update Student Info</h2>
        <form action="CRUD_operations.php">
        <input type="text" name="stu_id" value="<?php echo $_GET['stu_id'];?>" hidden>
        <input type="text" name="stu_name" value="<?php echo $_GET['stu_name'];?>" require><br><br>
        <input type="submit" name="action" value="Update"> <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}?>       
    </form>
    <?php }else{?>
        <h2>Add Student</h2>
        <form action="CRUD_operations.php">
        <input type="text" name="stu_id" required><br>
        <input type="text" name="course_id" value="<?php echo $course_id ;?>" hidden><br>
        <input type="submit" name="action" value="Add"> <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}?>       
    </form>
    <?php }?>
    
   <a href="view_students.php?logout=logout">Logout</a>
</body>
</html>

<?php 
    if(isset($_GET['logout'])){
        session_destroy();
        header('location:index.php');
    }
?>