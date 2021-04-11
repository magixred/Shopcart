
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php
    require_once ('php/header.php');
    

?>

    <?php
    
        session_start();
        if(isset($_GET['id'])){
            $prodID = $_GET['id'];
            $conn = mysqli_connect("localhost", "root", "", "cart_db");
            $sql = mysqli_query($conn, "SELECT * from producttb where product_id='".$prodID."'");
            

            while($rw = mysqli_fetch_array($sql)){
                $prod_name['prod_name'] = $rw['product_name'];
                $prod_price['prod_price'] = $rw['product_price'];
                $prod_desc['prod_desc'] = $rw['product_desc'];
                $prod_weight['prod_weight'] = $rw['product_weight'];
                $prod_image['prod_image'] = $rw['product_image'];
                $prod_stock['prod_stock'] = $rw['product_stock'];
                $id = $rw['product_id'];
                $out = 1;

                

                echo "<h2>".$prod_name['prod_name']."</h2>";
                echo "<h3>$".$prod_price['prod_price']."</h3>";
                echo "<p>".$prod_desc['prod_desc']."</p>";
                echo "<h4>".$prod_weight['prod_weight']."kg</h4>";
                if($prod_stock['prod_stock']==0){
                    $out = 0;
                    echo "<h4>Stock Available : Out of Stock</h4>";
                }else{
                    ?>
                    <form action="cart.php" method="POST">
                    <?php 
                        echo "<input type=hidden name=prod_id value=$prodID>";
                        echo "<h4>Stock Available : ".$prod_stock['prod_stock']."</h4>";

                        echo "<input type=number value=$out id=quantity name=quantity  min=$out max=".$prod_stock['prod_stock']."> "
                        ?>
                        <input type=submit value='Add to cart'></a>
                        
                    <?php
                    function component($productname, $productprice, $productimg, $productid){
                        $element = "
                        
                <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                <input type='hidden' name='product_id' value='$productid'>
           </div>
           </div>
           </form>
       </div>
                    ";
                    echo $element;   
                    }
            
                
                echo '<br><img src ="data:image;base64,'.base64_encode($rw['thumbnail']).'" alt="Photo" style="width:500px; 500px;">';
                echo "</br></br>";
                
            }
        }
        }
    ?>
    
    
</body>
</html>