<?php
    session_start();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($firstname)&&!empty($lastname)&&!empty($email)&&!empty($password)){
        $conn = mysqli_connect("localhost", "root", "", "cart_db");

        $sql = mysqli_query($conn, "SELECT count(*) as total from customers 
        where email='".$email."'") or die(mysqli_errot($conn));
        $rw = mysqli_fetch_array($sql);

        if($rw['total']>0){
            echo "<script>alert('Email is already taken')</script>"; 
            echo "<script>location.href='register.php'</script>";
        }else{
            $sql = "INSERT INTO customers(first_name, last_name, email, password) VALUES('$firstname', '$lastname', '$email', '$password')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Registered Successfully')</script>";
                echo "<script>location.href='index.php'</script>";

            }
        }

    }else{
        echo "<script>alert('Complete The Form')</script>";
        echo "<script>location.href='register.php'</script>";
    }

?>