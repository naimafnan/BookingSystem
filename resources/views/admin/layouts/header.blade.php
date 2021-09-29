<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>

    <body>
        @yield('content')


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
            </div>
        </footer>
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
