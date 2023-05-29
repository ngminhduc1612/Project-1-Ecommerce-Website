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
                    <li><a href="./product.html">Products</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="./account.html">Account</a></li>
                </ul>
            </nav>
            <a href="./cart.html"><img class="giohang" src="./images/cart.png" alt="" width="30px" height="30px"><span id="badge">3</span></a>
            <img src="./images/menu.png" class="menu-icon" alt="" onclick="menutoggle()">
        </div>
    </div> 
</body>
</html>