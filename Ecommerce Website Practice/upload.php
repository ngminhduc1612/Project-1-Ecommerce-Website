<?php
    include('connection.php'); 

    if(isset($_POST["submit"])){
        $productname = $_POST["productname"];
        $price = $_POST["price"];
        $detail = $_POST["detail"];

        //Upload photos
        $upload_dir = "images_upload/";
        $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
        $upload_dir.$_FILES["imageUpload"]["name"];
        $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
        $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));    // detect image format
        $check = $_FILES["imageUpload"]["size"]; //detect size of image
        $upload_ok = 0;

        if(file_exists($upload_file)){
            echo '<script>alert("The file already exist")</script>';
            $upload_ok = 0;
        }else{
            $upload_ok = 1;
            if($check != false){
                $upload_ok = 1;
                if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'gif'){
                    $upload_ok = 1;
                }else{
                    echo '<script>alert("Please change the image form")</script>';
                }
            }else{
                echo '<script>alert("The photo size is 0 please change the photo ")</script>';
                $upload_ok = 0;
            }
        }

        if($upload_ok == 0){
            echo '<script>alert("Your file was not uploaded")</script>';
        }else{
            if($productname !="" && $price !=""){
                move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

                $sql = "INSERT INTO product(product_name,price,detail,product_image)
                        VALUES('$productname',$price,'$detail','$product_image')";
                
                if($con->query($sql) == TRUE){
                    echo '<script>alert("Upload successfully")</script>';
                }
            }
        }

    }
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
                <a href="./cart.php"><img class="giohang" src="./images/cart.png" alt="" width="30px" height="30px"></a>
                <img src="./images/menu.png" class="menu-icon" alt="" onclick="menutoggle()">
            </div>       
        </div>  
    </div>   
    <!-------- upload page ----------->
    
    <section id="upload-container">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="productname" id="productname" placeholder="Product Name" required> 
            <input type="number" name="price" id="price" placeholder="Product Price" required>
            <textarea name="detail" id="detail" placeholder="Product Detail" required></textarea>
            <input type="file" name="imageUpload" id="imageUpload" required hidden> 
            <button id="choose" onclick="upload()">Choose Image</button>
            <input class="btn" type="submit" value="Upload" name="submit">
        </form>
    </section>

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

    <!-------->
    <script>
        var productname = document.getElementById("productname");
        var price = document.getElementById("price");
        var detail = document.getElementById("detail");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");
        

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(productname.value == ""){
                productname.value = file.value;
            }
            choose.innerHTML = "Change ("+file.name+") picture";
        })
    </script>
</body>
</html>