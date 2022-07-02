



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/theme.css')}}">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top bg-info"></div>

 @include('front.includes.header')      
 <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('assets/front/u/assets/img/bg_image_1.jpg')}});">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item "><a href="{{route('homee')}}">ألصفحة لرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal ">   <br> {{$hdepartment -> dept_name}}</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
  <div class="topbar bg-light ">
      <div class="container">
  <div class="page-section">
    <div class="container">
       <h1 class="text-center mb-5 wow fadeInUp">جميع أطباء   <br> {{$hdepartment -> dept_name}} </h1>
     
     

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      @isset($hdoctor)
                  @foreach($hdoctor  as $doctors)  
        <div class="item">
        
          <div class="card-doctor">
         
            <div class="header">

            <a href="{{route('hdoctor.details',$doctors -> id)}}"><span class="mai-person"></span>
              <img height="280px"  src="{{$doctors -> photo}}" alt=""></a>
              
              <div class="meta">
                <a href="{{route('hdoctor.details',$doctors -> id)}}"><span class="mai-person"></span></a>
               
              </div>
             
            </div>
           
            <div class="body">
           
              <p class="text-xl mb-0">ألاسم : {{$doctors -> doc_name}}</p>
            
              <span class="text-sm text-grey"></span><br>
                  <span class="text-sm text-grey"> {{$doctors -> hspecialty -> special_name}} :  ألتخصص  </span><br>
                  <span class="text-sm text-grey">{{$hdepartment -> dept_name}}  :  ألقسم</span>
            </div>
          </div>
        </div>
       
       
      
      @endforeach
           @endisset
    </div>
     
    
  </div>
 
  </div>
  </div>

   
 

        
   <!-- .container -->
  <!-- .page-section -->
 
  
  <div class="page-section banner-home bg-image" style="background-image: url({{asset('assets/front/u/assets/img/banner-pattern.svg')}});">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="{{asset('assets/front/u/assets/img/mobile_app.png')}}" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="{{asset('assets/front/u/assets/img/google_play.svg')}}" alt=""></a>
          <a href="#" class="ml-2"><img src="{{asset('assets/front/u/assets/img/app_store.svg')}}" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->
 

  <script src="{{asset('assets/front/u/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/theme.js')}}"></script>
  
</body>
</html>
   

