<?php
    session_start();
    include('config.php');
    // 3- Prepare Query
    $sql = "SELECT id , course_name , room_id
            FROM courses
            WHERE instructor_id =" . $_SESSION['instructor_id'] ;
    // 4- Execute Query
    $result = mysqli_query($con , $sql);
    // 5- fetch resulting rows as an array
    $courses = mysqli_fetch_all($result , MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses</title>
</head>
<body>
    <h1>View Courses</h1>
    <h2>Welcome <?php echo $_SESSION['instructor_name'];?></h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Room</th>
            <th>Action</th>
        </tr>
        <?php foreach($courses as $course){?>
            <tr>
                <td><?php echo $course['id']?></td>
                <td><?php echo $course['course_name']?></td>
                <td><?php echo $course['room_id']?></td>
                <td><a href="view_students.php?course_id=<?php echo $course['id']?>">Show Students</a></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>