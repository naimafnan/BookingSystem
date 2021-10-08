<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Booking</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <!--for datepicker-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css\app.css') }}" rel="stylesheet">

    <!--for datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
</head>
<body>
    <div id="id">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/fomema.png" alt="" width="156" height="100">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                                {{-- contact us  --}}
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Contact Us</a>
                                </li>
                            
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            @if (Auth::user()->role->name=="patient")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/myBooking') }}">My Booking</a>
                                </li>
                            @endif
                            @if (Auth::user()->role->name=="doctor")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/appointment') }}">Appointment</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Contact Us</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role->name=="patient")
                                        <a class="dropdown-item" href="{{ url('/user-profile') }}">
                                            Profile
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>
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
    //     var dateToday = new Date();
    //   $( function() {
    //     $("#datepicker").datepicker({
    // //         onSelect: function(dateText) {
    // //     console.log("Selected date: " + dateText + "; input's current value: " + this.value);
    // // }
    //         dateFormat:"dd-mm-yy",
    //         showButtonPanel:false,
    //         numberOfMonths:1,
    //         minDate:dateToday,
    //         // dayNamesMin: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','Sun'],
    //         beforeShowDay: $.datepicker.noWeekends,
    //     });
    // });

    // $('#datepicker').datepicker({
    // onSelect: function(dateText, inst) {
    //   $("input[name='something']").val(dateText);
    // }
    // });     

    // $(document).ready(function () {
    //         $("#datepicker").datepicker({
    //             dateFormat:"dd-mm-yy",
    //             beforeShowDay: $.datepicker.noWeekends,
    //             onSelect: function (selectedDate) {
    //                 // alert(selectedDate);
    //                 // $("input[name='date']").val(selectedDate);
                    
    //             }
    //         });
    //     });

    $( function() {
        $("#datepicker").datepicker({
            dateFormat:"dd-mm-yy",
            // beforeShowDay: $.datepicker.noWeekends,
            dayNamesMin: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','Sun'],
            inline: true,
            minDate:0,
            onSelect: function(dateText) {
                display("Selected date: " + dateText + ", Current Selected Value= " + this.value);
                $(this).change();
            }
        }).on("change", function() {
                display("Change event");
            });
    
        function display(msg) {
                // $("<p>").html(msg).appendTo(document.body);
        }
    });
    
    </script>
    <style type="text/css">
/*         
        label.btn{
            padding: auto;
        }
        label.btn input{
            opacity: 0; 
            position: absolute;
        }*/
        label.btn span{ 
            display: inline-block;
            min-width: 60px;
        }  
        }
    </style>
</body>
</html>
