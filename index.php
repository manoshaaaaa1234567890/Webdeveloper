<?php
    session_start();
    if(isset($_POST['login'])){        
        $email = $_POST['email'];
        $password = $_POST['password'];
        include('config.php');
        // 3- Prepare Query
        $sql = " SELECT id , instructor_name
                FROM instructors
                WHERE email = '$email'
                AND password = '$password'" ;
        // 4- Execute Query
        $result = mysqli_query($con , $sql);       
        if(mysqli_num_rows($result) == 1){
            header('location:view_courses.php');
            $instructors = mysqli_fetch_all($result , MYSQLI_ASSOC);
            $_SESSION['instructor_id'] = $instructors[0]['id'];  //set                     
            $_SESSION['instructor_name'] = $instructors[0]['instructor_name'];  //set                            
        }else{
            echo 'Incorrect Email or Password';
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <input type="email" name="email" required>
        <input type="password" name="password" required>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>

