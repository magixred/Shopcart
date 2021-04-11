<?php
    session_start();
    $prodID = $_POST['prod_id'];
    $prodqty = $_POST['quantity'];
    $cartid = $_SESSION['cart_id'];
    echo $prodID;
    echo $prodqty;
    echo $cartid;

    $conn = mysqli_connect("localhost", "root", "", "cart_db");

    $query = mysqli_query($conn, "SELECT * from cart_items WHERE cart_id='".$cartid."' AND product_id='".$prodID."' ");
    $squery = mysqli_query($conn, "SELECT * from products WHERE product_id='".$prodID."' ");

    $rw = mysqli_fetch_array($query);
    $srw = mysqli_fetch_array($squery);
    $checkqty = $prodqty+$rw['qty'];
    echo $srw['product_stock'];
    echo $checkqty;



    if($checkqty>$srw['product_stock']){
        echo "<script>alert('You cannot add more!')</script>";
        echo "<script>location.href='product.php?pid=$prodID'</script>";

    }else{
        if($rw['cart_id']==$cartid && $rw['product_id']== $prodID){
            $total = $rw['qty']+$prodqty;
    
            $sql = "UPDATE cart_items SET qty='".$total."' WHERE product_id='".$prodID."' AND cart_id='".$cartid."' ";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Added to cart!')</script>";
                echo "<script>location.href='cart.php'</script>";
            }
    
        }else{
            $sql = "INSERT INTO cart_items(cart_id, product_id, qty) VALUES('$cartid', '$prodID', '$prodqty')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Added to cart!')</script>";
                echo "<script>location.href='cart.php'</script>";
            }
    
        }
    }
    


?>