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
                    <li><a href="./account.php">Account</a></li>
                </ul>
            </nav>
            <a href="./cart.php"><img class="giohang" src="./images/cart.png" alt="" width="30px" height="30px"></a>
            <img src="./images/menu.png" class="menu-icon" alt="" onclick="menutoggle()">
        </div>       
    </div>   

    <!---------- account-page -------->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="./images/image1.png" alt="" width="100%">
                </div>

                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>

                        <form action = "authentication.php" id="LoginForm" onsubmit = "return validation()" method = "POST">
                            <input type="text" id="user" name  = "user" placeholder="Username" required>
                            <input type="password" id ="pass" name  = "pass"  placeholder="Password" required>
                            <button type="submit" class="btn">Login</button>
                            <a href="">Forgot password</a>
                        </form>

                        <form action="register.php" id="RegForm" method="POST">
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <input type="text" name="user"  placeholder="Username">
                            <input type="email" name="email"  placeholder="Email">
                            <input type="password" name="pass" placeholder="Password">
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
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

    <!-- js for toggle form -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm")
        var Indicator = document.getElementById("Indicator")
            function register(){
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }

            function login(){
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
    </script>
    <!----check login---->
    <script>  
        function validation()  
        {  
            var id=document.f1.user.value;  
            var ps=document.f1.pass.value;  
            if(id.length=="" && ps.length=="") {  
                alert("User Name and Password fields are empty");  
                return false;  
            }  
            else  
            {  
                if(id.length=="") {  
                    alert("User Name is empty");  
                    return false;  
                }   
                if (ps.length=="") {  
                alert("Password field is empty");  
                return false;  
                }  
            }                             
        }  
    </script>  
</body>
</html>