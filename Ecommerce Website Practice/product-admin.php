<?php
    include('connection.php');

    $sql_cart = "SELECT * FROM product";
    $all_cart = $con->query($sql_cart);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All products - RedStore</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="./index.html"><img src="./images/logo.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItem"> 
                        <li><a href="./upload.php">Upload</a></li>
                        <li><a href="./product-admin.php">Product</a></li>
                    </ul>
                </nav>
                <img class="giohang" src="./images/cart.png" alt="" width="30px" height="30px">
                <img src="./images/menu.png" class="menu-icon" alt="" onclick="menutoggle()">
            </div>       
        </div>   
    </div>

    <!------- cart items details -------->
    <div class="small_container cart-page">

        <table>
            <tr>
                <th>Product</th>
                <th>Detail</th>
                <th>Price</th>
            </tr>
            <?php
                while($row_cart = mysqli_fetch_assoc($all_cart)){
                    $sql = "SELECT * FROM product where product_id=".$row_cart["product_id"];
                    $all_product = $con->query($sql);
                    while($row = mysqli_fetch_assoc($all_product)){
            ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo $row["product_image"]; ?>" alt="cart-info">
                        <div>
                            <p class="product_name"><?php echo $row["product_name"]; ?></p>
                            <a href="" class="remove" data-id="<?php echo $row["product_id"]; ?>">Remove</a>
                        </div>
                    </div>
                </td>
                <td><?php echo $row["detail"]; ?></td>
                <td>$<?php echo $row["price"]; ?>.00</td>
            </tr>
            <?php
                    }
                }
            ?>  
        </table>
    </div>
    <!-------- footer ----------->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone</p>
                    <div class="app-logo">
                        <a href="https://play.google.com/store/" target="_blank"><img src="./images/play-store.png" alt=""></a>
                        <a href="https://www.apple.com/app-store/" target="_blank"><img src="./images/app-store.png" alt=""></a>
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="./images/logo-white.png" alt="">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and
                    Benefits of Sports Accessible to the Many. 
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <a href="https://www.facebook.com/nggminh.duc/"><li>Facebook</li></a>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="Copyright">Copyright 2022 - From Nguyen Minh Duc</p>
        </div>
    </div>
    <!-- js for toggle menu -->
    <script>
        var MenuItem = document.getElementById("MenuItem");

        MenuItem.style.maxHeight = "0px";

        function menutoggle(){
            if(MenuItem.style.maxHeight == "0px")
                {
                    MenuItem.style.maxHeight = "200px";
                }
            else
                {
                    MenuItem.style.maxHeight = "0px";
                }   

        }
    </script>
    <!------script for cart------>
        <script>
            var remove = document.getElementsByClassName("remove");
            for(var i = 0; i<remove.length; i++){
                remove[i].addEventListener("click",function(event){
                    var target = event.target;
                    var product_id = target.getAttribute("data-id");
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            target.innerHTML = this.responseText;
                            target.style.opacity = .5;
                        }            
                    }

                    xml.open("GET","connection.php?product_admin_id="+product_id,true);
                    xml.send();
                })
            }
        </script>
</body>
</html>