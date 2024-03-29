



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
  @toastr_css
 
</head>
<body >

  <!-- Back to top button -->
  <div class="back-to-top"></div>

 @include('front.includes.header')      
  
 


  <div class="page-hero bg-image overlay-dark" style="background-image: url({{asset('asseTts/front/u/assets/img/bg_image_1.jpg')}});">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make your life happier</span>
        <h1 class="display-4">Healthy Living</h1>
        <a href="#" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
      
        <div  class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-chatbubbles-outlineث"></span>
              </div>
              <p><span>مستشفيات</span> محلية</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-phrasing"></span>
              </div>
              <p><span>مستشفيات</span>   خارجية</p>
            </div>
          </div>
         
        </div>
      </div>
    </div> <!-- .page-section -->
  
    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
         <!--   <h1>مرحبا بك في نظام بساط الريح طبيب <br> عزيزي المشترك لكي تتم حجوزاتك الطبية ويصلك كل أشعار يجب ان يكون لديك حساب في محفظة كاش ويكون لديك تطبيق ألزوم <b></h1>
            <p class="text-grey mb-4"></p> 
           
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{asset('assets/front/u/assets/img/bg-doctor.png')}}" alt="">
            </div>
          </div>-->
        </div>
      </div>
    </div> 
   <!-- .bg-light -->
  </div> <!-- .bg-light -->

 
 
 
  <!--@include('front.includes.hosbital')
 @include('front.includes.fhosbital') -->
 @include('front.includes.clinic')
  
  <!-- .page-section -->

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
          <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="{{asset('assets/front/u/assets/img/app_store.svg')}}" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  @include('front.includes.footer')

<script src="{{asset('assets/front/u/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/theme.js')}}"></script>
<script>
    setInterval(function()  {
        $("#notifications_coun").load(window.location + " #notifications_coun");
        $("#notifications_cou").load(window.location + " #notifications_cou");
        $("#unreadNotificats").load(window.location + " #unreadNotificats");
        $("#unreadNotificat").load(window.location + " #unreadNotificat");
        
    }, 50000);
</script>


@toastr_js
@toastr_render

</body>
</html>
   

