



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
            <li class="breadcrumb-item active" aria-current="page">صفحة ألحجز</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal ">  </h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
  <div class="topbar bg-black ">

   
 

        
   <!-- .container -->
  <!-- .page-section -->
 
  <div class="page-section">
  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <div class="container">
      <h1 class="text-center wow fadeInUp">أحجز ألان</h1>
      <div class="col-md-12 text-center ">
      <img style="width: 200px;" src="{{$doctors -> photo}}" alt="...">
      
    </div>

      <form class="form col-md-12 " action="{{route('appoemintts.save')}}" method="POST"
        enctype="multipart/form-data">
         @csrf
        <div class="row mt-5 ">
        <div class="row col-12 ">
        <div class="col-3 col-sm-3   py-2 wow fadeInLeft text-right">
        
          <label for="projectinput2"><h3>ألاسم / {{(auth::user()  ->name)}}</h3></label>
          
            <input type="hidden"name="user_id" value="{{(auth::user()->id)}}" > <h1></h1>
          </div>
          
          <div class="col-3 col-sm-3   py-2 wow fadeInLeft text-center">
          <label for="projectinput2"><h3>ألقسم / {{$doctors ->department-> dept_name}}</h3></label>
            <input type="hidden" name="department_id" class="form-control" value="{{$doctors ->department-> id}}" > <h1></h1>
          </div>
          <div class="col-3 col-sm-3   py-2 wow fadeInLeft text-left">
          <label for="projectinput2"><h3>ألتخصص /  {{$doctors ->specialty-> special_name}}</h3></label>
            <input type="hidden" name="specialty_id" class="form-control" value="{{$doctors ->specialty-> id}}" > <h1></h1>
          </div>
          <div class="col-3 col-sm-3   py-2 wow fadeInLeft text-center">
          <label for="projectinput2"><h3>أسم ألطبيب / {{$doctors -> doc_name}}</h3></label> 
      
            <input type="hidden" name="doctor_id" value="{{$doctors -> id}}" class="form-control" placeholder="Full name" ><h1> </h1>
          </div>
          </div>
          
          

         
         
          <div class="col-12 col-sm-4 py-2 wow fadeInLeft text-center" data-wow-delay="300ms">
          <label for="projectinput2"><h3> ألتاريخ</h3></label>
            <input type="date" name="adate" class="form-control">
          </div>
          
          <div class="col-12 col-sm-4 py-2 text-center">
            <div class="form-group">
              <label for="projectinput2"><h3>{{trans('servee_trans.Choose serve name')}}</h3>   </label>
                 <select style="height:48px;" name="serve_id" id="serve_id" class="select form-control"
                   onchange="console.log('change is firing')">
                      <optgroup label="من فضلك أختر ألخدمة ">
                      <option>...............</option>
                      
                       @if($serves && $serves -> count() > 0)
                         @foreach($serves as $serve)
                             <option 
                               value="{{$serve -> id }}">{{$serve -> serv_name}}
                                 </option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('serve_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4 py-2 text-center">
                                                        <div class="form-group">
                                                            <label for="projectinput2"><h3>ألسعر</h3>  </label>
                                                            <select  style="height:48px;" name="doctor_serve_id" id="doctor_serve_id" class="select form-control">
                                                               

                                                               
                                                            </select>
                                                            @error('doctor_serve_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                      
                                   
                                                   
          
          <div class="col-12 py-2 wow fadeInUp text-center" data-wow-delay="300ms">
          <label for="projectinput2"><h3> أترك رسالة </h3></label>
            <textarea name="reson" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

       <div class="row col-12 ">
        <div class="col-4 col-sm-4   py-2 wow fadeInLeft text-center">
                                    <label for="projectinput2"><h3> أختر العملة</h3></label>
                                  <div class="d-block my-1">
                                <div class="custom-radio">
                                    <input  name="CurrencyId" type="radio"  value="2" class="" checked="" required="">
                                    <label class="" for="credit">ريال</label>
                                </div>
                                <div class="custom-radio">
                                    <input name="CurrencyId" type="radio" value="5"  class="" required="">
                                    <label class="" for="debit">سعودي</label>
                                </div>
                                <div class="custom-radio">
                                    <input name="CurrencyId" type="radio" value="4" class="" required="">
                                    <label class="" for="paypal">دولار</label>
                                </div>
                                
                            </div>
                           
                            </div>

            <div class="col-4 col-sm-4 py-1 wow fadeInLeft text-center" data-wow-delay="300ms">
          <label for="projectinput2"><h3>رقم الهاتف</h3></label>
            <input type="number" name="SpId" class="form-control">
          </div>

          <div class="col-4 col-sm-4 py-1 wow fadeInLeft text-center" data-wow-delay="300ms">
          <label for="projectinput2"><h3> كود كاش باي</h3></label>
            <input type="number" name="CustomerCashPayCode" class="form-control">
          </div>
         
          </div>

                                              

        <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{trans('servee_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('servee_trans.Save')}}
                                                </button>
                                            </div>

      </form>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
  

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
  @include('front.includes.footer')

  <script src="{{asset('assets/front/u/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/theme.js')}}"></script>
<script src="{{asset('assets/front/u/assets/js/toastr.js') }}"></script>

@toastr_js
@toastr_render


    <script>
        $(function(){
            $(document).on('change','#serve_id', function(){
                populateDoctor_serves();
             return false;
            });
            function  populateDoctor_serves(){
                $('option', $('#doctor_serve_id')).remove();
                $('#doctor_serve_id').append($('<option></option>').val('').html());
                var serveId = $('#serve_id').val() != null ? $('#serve_id').val() : '{{old('serve_id')}}';
                $.get("{{Route('getprice')}}",{serve_id: serveId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('doctor_serve_id')}}' ? "selected" : "";
                   $('#doctor_serve_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
    </script>
   





</body>
</html>
   

