



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
  
  <div class="back-to-top"></div>

 @include('front.includes.hhheader')      
 
  <div class="page-hero bg-image overlay-dark" style="background-image: url({{$clinic -> 	photo}});">
 
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
      <span class="subhead  display-4">مرحبا بكم في عيادة / {{$clinic -> 	name}} ألصحية </span> <br><br><br>
        <span class="subhead  display-4">لنعش حياة أكثر صحة وسعادة</span>
        <br>
        <a href="" class="text display-1 text-primary">Healthy Living</a>
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
                <span class="mai-chatbubbles-outline"></span>
              </div>
              <p><span>Chat</span> with a doctors</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-shield-checkmark"></span>
              </div>
              <p><span>One</span>-Health Protection</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-accent text-white">
                <span class="mai-basket"></span>
              </div>
              <p><span>One</span>-Health Pharmacy</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->
    <div class="col-md-12 py-3 py-md-0 text-center"style="margin-top: 30px;">
    <h3>نقدم لكم أفظل الخدمات الصحية   </h3></div>
    <div class="page-section pb-0">
      <div class="container"style="width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: ;">
        <div class="row align-items-center" style="width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: ;">
          <div class="col-lg-6 py-3 wow fadeInUp" style="overflow-y:scroll;width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: 300px ;">
            <h1> خدمات ألاسعافات ألأولية   </h1> <br> 
            <?php $i = 0; ?>
            @isset($serve1)
        @foreach($serve1 as $_serve1)
        <?php $i++; ?>
                               
        <p class="text-grey mb-4"> <td>{{ $i }}</td> - {{$_serve1 -> name}}</p>
           
            <a href="{{route('cappoemintts',$_serve1->id)}}" class="btn btn-primary"> حجز</a>
            @endforeach
       @endisset
          </div>

          
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{asset('assets/front/u/assets/img/bg-doctor.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="page-section pb-0">
    <div class="container"style="margin-bottom: 5px; border-radius: 10px;box-shadow:inset 0 0 5px grey;">
        <div class="row align-items-center" style="width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: ;">
          <div class="col-lg-6 py-3 wow fadeInUp" style="overflow-y:scroll;width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: 300px ;">
            <h1>خدمات ألنساء و ألولادة </h1><br> 
            <?php $i = 0; ?>
            @isset($serve2)
        @foreach($serve2 as $_serve2)
        <?php $i++; ?>
                               
        <p class="text-grey mb-4"> <td>{{ $i }}</td> - {{$_serve2 -> name}}</p>
           
            <a href="{{route('cappoemintt2s',$_serve2->id)}}" class="btn btn-primary"> حجز</a>
            @endforeach
       @endisset
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{asset('assets/front/u/assets/img/bg-doctor.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> 
   <!-- .bg-light -->
  </div> 
  <div class="page-section pb-0">
    <div class="container"style="margin-bottom: 5px; border-radius: 10px;box-shadow:inset 0 0 5px grey;">
        <div class="row align-items-center" style="width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: ;">
          <div class="col-lg-6 py-3 wow fadeInUp" style="overflow-y:scroll;width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: 300px ;">
            <h1> خدمات ألمجارحة </h1><br> 
            <?php $i = 0; ?>
            @isset($serve3)
        @foreach($serve3 as $_serve3)
        <?php $i++; ?>
                               
        <p class="text-grey mb-4"> <td>{{ $i }}</td> - {{$_serve3 -> name}}</p>
           
            <a href="{{route('cappoemintt3s',$_serve3->id)}}" class="btn btn-primary"> حجز</a>
            @endforeach
       @endisset
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{asset('assets/front/u/assets/img/bg-doctor.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="page-section pb-0">
      <div class="container"style="width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: ;">
        <div class="row align-items-center" style="width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: ;">
          <div class="col-lg-6 py-3 wow fadeInUp" style="overflow-y:scroll;width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: 300px ;">
            <h1> خدمات ألمعالجة ألطبيعية و ألتنفسية   </h1> <br> 
            <?php $i = 0; ?>
            @isset($serve4)
        @foreach($serve4 as $_serve4)
        <?php $i++; ?>
                               
        <p class="text-grey mb-4"> <td>{{ $i }}</td> - {{$_serve4 -> name}}</p>
           
            <a href="{{route('cappoemintt4s',$_serve4->id)}}" class="btn btn-primary"> حجز</a>
            @endforeach
       @endisset
          </div>

          
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{asset('assets/front/u/assets/img/bg-doctor.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> 

    <div class="page-section pb-0">
      <div class="container"style="width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: ;">
        <div class="row align-items-center" style="width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: ;">
          <div class="col-lg-6 py-3 wow fadeInUp" style="overflow-y:scroll;width: ;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: 300px ;">
            <h1> خدمات أخرئ   </h1> <br> 
            <?php $i = 0; ?>
            @isset($serve5)
        @foreach($serve5 as $_serve5)
        <?php $i++; ?>
                               
        <p class="text-grey mb-4"> <td>{{ $i }}</td> - {{$_serve5 -> name}}</p>
           
            <a href="{{route('cappoemintt5s',$_serve5->id)}}" class="btn btn-primary"> حجز</a>
            @endforeach
       @endisset
          </div>

          
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{asset('assets/front/u/assets/img/bg-doctor.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> 
   <!-- .bg-light -->
  </div> 
 <!-- .bg-light -->

 
 
  
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
  
</body>
</html>
   

