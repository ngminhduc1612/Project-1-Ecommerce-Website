<?php
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "javatpoint";

    $conn = new mysqli($host,$user,$password,$db_name);

    if ($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    else{
        // echo "Ket noi thanh cong";
    }

    $sql = "SELECT * FROM product";
    $all_product = $conn->query($sql);


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
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="./index.html"><img src="./images/logo.png" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItem"> 
                    <li><a href="./index.html">Home</a></li>
                    <li><a href="./product.php">Products</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Account</a></li>
                </ul>
            </nav>
            <a href="./cart.php"><img class="giohang" src="./images/cart.png" alt="" width="30px" height="30px"></a>
            <img src="./images/menu.png" class="menu-icon" alt="" onclick="menutoggle()">
        </div>
    </div>   

    <div class="small_container">

        <div class="row row-2">
            <h2>All Products</h2>
            <select>
                <Option>Default Shorting</Option>
                <Option>Short by price</Option>
                <Option>Short by popularity</Option>
                <Option>Short by rating</Option>
                <Option>Short by sale</Option>
            </select>
        </div>

        <div class="row">
            <?php
                while($row = mysqli_fetch_assoc($all_product)){
            ?>
            <div class="col-4"> 
                <div class="card">
                    <a href="./product-detail.html"><img src="<?php echo $row["product_image"]; ?>" alt=""></a>
                    <h4><?php echo $row["product_name"] ?></h4>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$<?php echo $row["price"] ?>.00</p>
                    <button class="btn add" data-id="<?php echo $row["product_id"]; ?>">Add to cart</button>
                </div>         
            </div>   
            <?php
                }
            ?>        
        </div>
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594</span>
        </div>
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
            <p class="Copyright">Copyright 2020 - From Nguyen Minh Duc</p>
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

    <script>
        var product_id = document.getElementsByClassName("add");
        for(var i = 0; i<product_id.length; i++){
            product_id[i].addEventListener("click",function(event){
                var target = event.target;
                var id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        var data = JSON.parse(this.responseText);
                        target.innerHTML = data.in_cart;
                    }
                }
                xml.open("GET","connection.php?id="+id,true);
                xml.send();
            })
        }
        </script>
</body>
</html>