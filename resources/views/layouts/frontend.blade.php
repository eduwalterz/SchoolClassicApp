<html>
    <head>
        <title>Home Stepwise</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="shortcut icon" type="image/jpg" href="{{asset('images/logo.jfif')}}"/>

                    <!-- Smartsupp Live Chat script -->
            <script type="text/javascript">
            var _smartsupp = _smartsupp || {};
            _smartsupp.key = '7c7dbca9f728b91e48fb91f74b8e8fab87a16838';
            window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
            })(document);
            </script>
                    <!-- Smartsupp Live Chat script -->
    </head>

    <body>
<div>
        
            <nav class="navbar navbar-expand-lg navbar-light bg-white menu">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('images/logo.jfif')}}" height="60px" width="60px">
                        Zalego Academy
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigationBar">
                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navigationBar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="{{url('/')}}" class="nav-link px-3">Home</a>

                        </li>                

                        <li class="nav-item dropdown px-3">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About Us</a>
                            <div class=dropdown-menu>
                                <a class="dropdown-item" href="{{route('pages.history_mission_vission')}}"><i class="far fa-paper-plane"></i> &nbsp; History/Mission/Vission</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{route('pages.staffs')}}"><i class="far fa-paper-plane"></i>&nbsp; School Staff</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{route('pages.accomplishment')}}"><i class="far fa-paper-plane"></i>&nbsp; Accomplishment</a>
                                
                            </div>

                        </li>

                        <li class="nav-item dropdown px-3">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Department</a>
                            <div class=dropdown-menu>
                                <a class="dropdown-item" href="{{route('pages.ict')}}"><i class="far fa-paper-plane"></i>&nbsp; ICT</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{route('pages.bigdata')}}"><i class="far fa-paper-plane"></i>&nbsp; Big Data</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{route('pages.finance')}}"><i class="far fa-paper-plane"></i>&nbsp; Finance</a>
                                

                            </div>

                        </li>

                        <li class="nav-item dropdown px-3">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>
                            <div class=dropdown-menu>
                                <a class="dropdown-item" href="{{route('pages.news_and_events')}}"><i class="far fa-paper-plane"></i>&nbsp; News & Events</a>
                                

                            </div>

                        </li>
                        <!--

                        <li class="nav-item">
                            <a href="#" class="nav-link px-3">Careers</a>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link px-3">Products</a>

                        </li>

                         -->

                        <li class="nav-item">
                            <a href="{{route('pages.contact_us')}}" class="nav-link px-3">Contact Us</a>

                        </li>

                        

                        <li class="nav-item lr">
                            <a class="nav-link" href="{{route('login')}}">
                                <button class="btn btn-default lr-btn">
                                <i class="fa fa-lock">Login</i>
                                </button>
                            </a> 

                            <a class="nav-link" href="{{route('register')}}">
                                <button class="btn btn-default lr-btn">
                                    <i class="fa fa-user-plus">Register</i>
                                </button>
                            </a> 

                        </li>





                    </ul>

                    
                </div>
               


            </nav>
            
        <!--widget-->
        <section class="iconsSection">
            <div class="icons-bar">
                <a href="#">
                    <i class="fa fa-address-book"></i>
                    <br>
                    Enrol
                </a>

                <a href="#">
                    <i class="fa fa-plus"></i>
                    <br>
                    Apply
                </a>

                <a href="#">
                    <i class="fa fa-file-signature"></i>
                    <br>
                    Join Us
                </a>
            </div>
            <div class="icons-social">
                <a href="#" style="background-color: #4267b2;" title="Facebook">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>

                <a href="#" style="background-color: #1da1f2;" title="Twitter">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>

                <a href="#" style="background-color: #ff0000;" tittle="Instagram">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
            </div>
        </section>
        <!--end of widget-->
        <section>
            @yield('content') 
        </section>
        <!--footer-->
        <footer style="background-image:url('{{asset('images/links.png')}}');" class="bgimg">
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <!--column 1-->
                        <div class="col-md-4">
                                <div class="footer-widget">
                                    <h4>Get In Touch</h4>
                                    <p>Monday-Friday : 08:00am-05:00pm</p>
                                    <p>Surtaday : <span> 08:00am-02:00pm</span></p>
                                    <p>Sunday : <span>Closed</span></p>
                                        <div class="footer-top-box">
                                            <p>Follow Us</p>
                                            <span> 
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                       <i class="fab fa-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            </span>
                                        </div>
                            
                        </div>
                     </div>
                        <!--end of column 1-->

                        <!--column 2-->
                        <div class="col-md-4">
                            <div class="footer-link">
                                <h4>QUICK LINKS</h4>
                                <ul>
                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>

                                    <li>
                                        <a href="#">Apply</a>
                                    </li>

                                    <li>
                                        <a href="#">Business Portfolio</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end of column 2-->

                        <!--column 3-->
                        <div class="col-md-4">
                            <div class="footer-link-contact">
                                <h4>CONTACT US</h4>
                                <ul>
                                    <li>
                                        <p>
                                            <i class="fas fa-map-marker"> &nbsp; Home, Ground Floor</i>
                                        </p>
                                    </li>

                                    <li>
                                        <p>
                                            <i class="fas fa-phone-square"> &nbsp; Phone: +254 723 456 78</i>
                                        </p>
                                    </li>

                                    <li>
                                        <p>
                                            <i class="fas fa-envelope"> &nbsp; Email: info@zalegoacademy.ac.ke</i>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end of column 3-->
                    </div>
                </div>
            </div>

            </footer>
            <!--end of footer-->


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </body>
</html>