<!DOCTYPE html>
<!--
	Delex by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8"/>

  <!-- Site Title-->
  <title>{{config('app.name','PMIS')}}</title>

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

  <!-- Google-fonts -->
  <link href='http://fonts.googleapis.com/css?family=Signika+Negative:300,400,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}"/>
  <!-- Fonts-style -->
  <link rel="stylesheet" href="{{asset('client/css/styles.css')}}"/>
  <!-- Fonts-style -->
  <link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}"/>
  <!-- Modal-Effect -->
  <link href="{{asset('client/css/component.css')}}" rel="stylesheet">
  <!-- owl-carousel -->
  <link href="{{asset('client/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="screen">
  <link href="{{asset('client/css/owl.theme.css')}}" rel="stylesheet" type="text/css" media="screen">
  <!-- Template Styles-->
  <link rel="stylesheet" href="{{asset('client/css/style.css')}}"/>
  <!-- Template Color-->
  <link rel="stylesheet" type="text/css" href="{{asset('client/css/green.css')}}" media="screen" id="color-opt" />
  <style>
            /*! normalize.vertical-align:middlecss v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>


</head>

<body data-spy="scroll" data-offset="80">

  <!-- Preloader -->
  <div class="animationload">
    <div class="loader">
        Please Wait....
    </div>
  </div> 
  <!-- End Preloader -->


  <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">{{config('app.name','PMIS')}}</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#home">Home</a></li>
          <li><a href="#services">samples</a></li>
          <li><a href="#twitter_tweet">Testimonials</a></li>
          <li><a href="#contact">contact us</a></li>

         

        
          @auth
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          @else
         
          <li><a href="{{ route('login') }}">login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>

          @endauth

         
        
        </ul>
       
      </div><!-- /.navbar-collapse -->
      <input type="search" name="project" id="" placeholder="search here" class="border-2 border-gray-800 px-2 inline-block ">
    </div><!-- /.container -->
  </nav>


    <!-- /HOME -->
    <section class="main-home" id="home">
      <div class="home-page-photo object-cover overflow-hidden"></div> <!-- Background image -->
      <div class="home__header-content">
        <div id="main-home-carousel" class="owl-carousel">
        @forelse ($projects as $project )
        <div>
            <h1 class="intro-title">{{$project->name}}</h1>
            <p class="intro-text">{{substr($project->desc,0,200)}}<br/>  author {{$project->user->name}}</p>
            <a class="btn btn-custom" href="{{route('projects.show',$project->id)}}">Read More</a>
          </div><!--slide item like paragraph-->
        @empty
        <div>
            <h1 class="intro-title">Project management information System For Meru University of SCience & Technology</h1>
            <p class="intro-text">Useful for managing student final year project information</p>
            <a class="btn btn-custom" href="#">Get started</a>
          </div><!--slide item like paragraph-->
          
        @endforelse

         

         
        </div>
      </div>
    </section>
    <!-- /End HOME -->

    <!-- / SERVICES -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Sample projects</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
        
        <div class="row">
           @forelse ($projects as  $project)
           
             <div class="col-sm-4"> <!-- Service-item -->
               <div class="text-center services-item">
                 <div class="col-wrapper">
                   <div class="icon-border"> 
                     <i class="icon-speech-streamline-talk-user color-l-yellow"></i> 
                   </div>
                   <h5>{{$project->name}}</h5>
                   <p>{{substr($project->desc,0,75)}}...</p>
                   <a href="{{route('projects.show',$project->id)}}">Read More</a>
                 </div>
               </div>
             </div>
               
             
           @empty
             
           @endforelse


        </div> <!--/.row -->
 
        {{$projects->links()}}
      
      </div> <!--/.container -->
    </section>
    <!-- / End services-->


    <!-- TWITTER TWEET -->
    <section class="twitter_tweet parallax" id="twitter_tweet" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <div id="testi-carousel" class="owl-carousel owl-spaced">
              <div>
                <i class="fa fa-twitter"></i>
                <h5>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, dolorum, fugiat, eligendi magni quibusdam iure cupiditate ex voluptas unde Lorem ipsum dolor sit amet..
                </h5>
                <p>- Jonathan Deo</p>
              </div><!--testimonials item like paragraph-->
              <div>
                <i class="fa fa-twitter"></i>
                <h5>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, dolorum, fugiat, eligendi magni quibusdam iure cupiditate ex voluptas unde Lorem ipsum dolor sit amet..
                </h5>
                <p>- Jonathan Deo</p>
              </div><!--testimonials item like paragraph-->
              <div>
                <i class="fa fa-twitter"></i>
                <h5>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, dolorum, fugiat, eligendi magni quibusdam iure cupiditate ex voluptas unde Lorem ipsum dolor sit amet..
                </h5>
                <p>- Jonathan Deo</p>
              </div><!--testimonials item like paragraph-->
            </div>
          </div> <!-- end col-md-8 -->
        </div> <!-- end row -->
      </div> <!-- container -->
    </section>
    <!-- End TWITTER TWEET -->

    <!-- CONTACT -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Contact us</h3>
            <div class="titleHR"><span></span></div>

            <form role="form" name="ajax-form" id="ajax-form" action="php/contact.php" method="post" class="form-main">
              <div class="col-xs-12">
                <div class="row">            
                  <div class="form-group col-xs-6">
                    <label for="name2">Name</label>
                    <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='Name'" onfocus="if(this.value == 'Name') this.value=''" type="text" value="Name">
                    <div class="error" id="err-name" style="display: none;">Please enter name</div>
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="email2">Email</label>
                    <input class="form-control" id="email2" name="email" type="text" onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" value="E-mail">
                    <div class="error" id="err-emailvld" style="display: none;">E-mail is not a valid format</div> 
                  </div>
                </div>
                <div class="row">            
                  <div class="form-group col-xs-12">
                    <label for="message2">Message</label>
                    <textarea class="form-control" id="message2" name="message" onblur="if(this.value == '') this.value='Message'" onfocus="if(this.value == 'Message') this.value=''">Message</textarea>
                    <div class="error" id="err-message" style="display: none;">Please enter message</div>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <p class="text-center con_sub_text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren.</p>
                  </div>
                </div>
                <div class="row">            
                  <div class="col-xs-12 text-center">
                    <div id="ajaxsuccess">E-mail was successfully sent.</div>
                    <div class="error" id="err-form" style="display: none;">There was a problem validating the form please check!</div>
                    <div class="error" id="err-timedout">The connection to the server timed out!</div>
                    <div class="error" id="err-state"></div>
                    <button type="submit" class="btn btn-custom" id="send">Submit</button>
                  </div>
                </div>
              </div>  
            </form>
          </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
      </div> <!-- container -->
    </section>
    <!-- End CONTACT -->

    <!-- FOOTER begings -->
    <footer id="footer">    
      <div class="footer-widgets-wrap">
        <div class="container text-center">    
          <div class="row">
            <div class="col-sm-4 col-md-4">
              <div class="footer-content">
                <h4>KEEP IN TOUCH</h4>
                <div class="footer-socials">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
              </div> <!-- end footer-content -->
            </div> <!-- end col-sm-4 -->
            <div class="col-sm-4 col-md-4">
              <div class="footer-content">
                <h4>ADDRESS</h4>
                <p>Po Box 303<br>
               Kerugoya</p>
                <p>+2540792021601<br>
                <a href="#">www.domain.com</a><br>
               cyrus5078@gmail.com</p>
              </div> <!-- end footer-content -->
            </div> <!-- end col-sm-4 -->
            <div class="col-sm-4 col-md-4">
              <div class="footer-content">
                <h4>SUPPORT</h4>
                <p>You need support? Visit our support forum and open tickets for you questions.</p>
                <p><button type="button" class="btn btn-custom-sm">forum</button></p>
              </div>  <!-- end footer-content -->   
            </div> <!-- end col-sm-4 -->
          </div> <!-- end row -->
        </div> <!-- container -->
      </div>
      <div class="footer-bottom text-center"> <!-- Footer-copyright -->
        <p>©2022 Project Management Information System   <a href="#">Powered Cyrus Muchiri Warue</a></p>
      </div>
    </footer>
    <!-- End footer begings -->


    <!-- Scroll top -->
    <a href="#" class="back-to-top"> <i class="fa fa-chevron-up"> </i> </a>


    


    <!-- JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <!-- initialize jQuery Library -->
     <script src="{{asset('client/js/jquery.min.js')}}"></script>
     <!-- jquery easing -->
     <script src="{{asset('client/js/jquery.easing.min.js')}}"></script>
     <!-- Bootstrap -->
     <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
     <!-- modal-effect -->
     <script src="{{asset('client/js/classie.js')}}"></script>
     <script src="{{asset('client/js/modalEffects.js')}}"></script>
     <!-- Counter-up -->
     <script src="{{asset('client/js/waypoints.min.js')}}" type="text/javascript"></script>
     <script src="{{asset('client/js/jquery.counterup.min.js')}}" type="text/javascript"></script>
     <!-- SmoothScroll -->
     <script src="{{asset('client/js/SmoothScroll.js')}}"></script>
     <!-- Parallax -->
     <script src="{{asset('client/js/jquery.stellar.min.js')}}"></script>
     <!-- Jquery-Nav -->
     <script src="{{asset('client/js/jquery.nav.js')}}"></script>
     <!-- Owl carousel -->                                                      
     <script type="text/javascript" src="{{asset('client/js/owl.carousel.min.js')}}"></script>
     <!-- App JS -->
     <script src="{{asset('client/js/app.js')}}"></script>

     <!-- Switcher script for demo only -->
    <script type="text/javascript" src="js/switcher.js')}}"></script>


  </body>
</html>
