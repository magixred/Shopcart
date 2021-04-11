<?php
session_start();
    $conn = mysqli_connect("localhost", "root", "", "cart_db");
        $email = $_POST['email'];
        $pword = $_POST['pword'];

        if(!empty($email)&&!empty($pword)){
            if(isset($_POST['submit'])){
                $sql = mysqli_query($conn, "SELECT * from customers 
                where email='".$email."' AND password='".$pword."'") or die(mysqli_errot($conn));

                $rw = mysqli_fetch_array($sql);
                if($rw['email']==$email && $rw['password']==$pword){
                    $_SESSION['uname'] = $email;
                    $_SESSION['name'] = $rw['first_name'];
                    $_SESSION['lname'] = $rw['last_name'];
                    $_SESSION['id'] = $rw['customer_id'];
                    echo "<script>alert('Welcome ".$_SESSION['name']." ".$_SESSION['lname']."')</script>";
                    echo "<script>location.href='index.php'</script>";
                }else{
                    echo "<script>alert ('Account does not exist')</script>";
                    echo "<script>location.href='login.php'</script>";
                }

            }
        }else{
            echo "<script>alert('Complete The Form')</script>";
            echo "<script>location.href='login.php'</script>";

        }
        ?>