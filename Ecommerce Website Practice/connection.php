<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "javatpoint";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }else{
        // echo "Ket noi thanh cong";
    }

    if(isset($_GET["id"])){
        $product_id = $_GET["id"];
        $sql = "SELECT * FROM cart WHERE product_id = $product_id";
        $result = $con->query($sql);
        $total_cart = "SELECT * FROM cart";
        $total_cart_result = $con->query($total_cart);
        $cart_num = mysqli_num_rows($total_cart_result);

        if(mysqli_num_rows($result) > 0){
            $in_cart = "already In cart";

            echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
        }else{
            $insert = "INSERT INTO cart(product_id) VALUES($product_id)";
            if($con->query($insert) === true){
                $in_cart = "added into cart";
                echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
            }else{
                echo "<script>alert(It doesn't insert)</script>";
            }
        }
    }

    if(isset($_GET["cart_id"])){
        $product_id = $_GET["cart_id"];
        $sql = "DELETE FROM cart WHERE product_id=".$product_id;

        if($con->query($sql) === TRUE){
            echo "Removed from cart";
        }
    }

    if(isset($_GET["product_admin_id"])){
        $product_id = $_GET["product_admin_id"];
        $sql = "DELETE FROM product WHERE product_id=".$product_id;

        if($con->query($sql) === TRUE){
            echo "Removed from product";
        }
    }
?>  