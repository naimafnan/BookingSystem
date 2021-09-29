<!DOCTYPE html>
<html>
<title>Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/img/user1.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome</span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="{{ route('admin.index') }}" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="{{ route('admin.create') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  A</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  B</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  C</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  D</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  E</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  F</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  G</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  H</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="page-footer font-small stylish-color-dark pt-4 " >
            <div class="container text-center text-md-left">
            <div class="row hide-for-small">
                <div class="col medium-6 small-12 large-6"  >
                <div class="col-inner"  >
                    <p>Copyright 2021 © <strong>FOMEMA Sdn. Bhd. </strong>All Rights Reserved.</p>
                </div>
                </div>
                <div class="col medium-6 small-12 large-6"  >
                <div class="col-inner text-right"  >
                    <p><a href="https://www.fomema2u.com.my/privacy-policy/">Privacy Policy</a> | <a href="https://www.fomema2u.com.my/information-security-policy/">Information Security Policy</a> | <a href="https://www.fomema2u.com.my/terms-condition/">Terms &amp; Condition</a></p>
                </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
    }

    // Close the sidebar with the close button
    function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
    }
    </script>

</body>
</html>