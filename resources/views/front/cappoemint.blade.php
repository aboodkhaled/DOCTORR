



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

 @include('front.includes.hhheader')      
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
  
    <div class="container">
    @foreach($clinic as $_clinic)
      <h1 class="text-center wow fadeInUp">حجز خدمة من الدرجة الأولئ  <br> في عيادة / {{$_clinic -> name}} </h1>
     
      <h1 class="text-center wow fadeInUp"> <br>  </h1>
      <div class="col-md-12 text-center ">
      
                        
      <img style="width: 200px;" src="{{$_clinic -> photo}}" alt="...">
      @endforeach
                                                                  
      
    </div>

      <form class="form col-md-12 " action="{{route('cappoemintts.save')}}" method="POST"
        enctype="multipart/form-data">
         @csrf
         <div class="row mt-5 ">
        <div class="row col-12 ">
        <div class="col-4 col-sm-4   py-2 wow fadeInLeft text-right">
        
         
          
            <input type="hidden"name="user_id" value="{{(auth::user()->id)}}" > <h1></h1>
          </div>
          
         
          </div>
          <div class="row col-12 ">
          

          <div class="col-6 col-sm-6   py-2 wow fadeInLeft text-center"> <label for="projectinput2"></label> 
            <input type="hidden" name="clinic_id" value="{{$serve1ss ->clinic-> id}}" class="form-control" placeholder="Full name" ><h1> </h1>
          </div>
          </div>
          
          

         
         
          <div class="col-12 col-sm-4 py-2 wow fadeInLeft text-center"  data-wow-delay="300ms">
          <div class="form-group">
          <label for="projectinput2"><h3> ألتاريخ</h3></label>
            <input style="height:50px;"  type="date" name="date" class="form-control">
          </div>
          </div>
          
          <div class="col-12 col-sm-8 py-2 text-center">
            <div class="form-group">
              <label for="projectinput2"><h3>{{trans('servee_trans.Choose serve name')}}</h3>   </label>
                 <select style="height:48px;" name="serve1_id" id="serve1_id" class="select form-control"
                   onchange="console.log('change is firing')">
                      <optgroup  class="text-center" label="من فضلك أختر ألخدمة ">
                      <option class="text-center">..............................................................</option>
                      <?php $i = 0; ?>
                       @if($serve1s && $serve1s -> count() > 0)
                         @foreach($serve1s as $serve1)
                         <?php $i++; ?>
                         <br>
                        <option class="text-center"
                               value="{{$serve1 -> id }}">    {{$serve1 -> name}} 
                                 </option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('serve1_id')
                                                            <span class="text-danger"> {{trans('messages.serve1_total_id.exists')}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 py-2 text-center">
                                                        <div class="form-group">
                                                            <label for="projectinput2"><h3>مستلزمات الخدمة</h3>  </label>
                                                            <select  style="height:48px;" name="serve1_thin_id" id="serve1_thin_id" class="select form-control">
                                                               

                                                               
                                                            </select>
                                                            @error('serve1_thin_id')
                                                            <span class="text-danger"> {{trans('messages.serve1_total_id.exists')}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-12 col-sm-4 py-2 text-center">
                                                        <div class="form-group">
                                                            <label for="projectinput2"><h3>سعر الخدمة بدون المستلزمات</h3>  </label>
                                                            <select  style="height:48px;" name="serve1_price_id" id="serve1_price_id" class="select form-control">
                                                               

                                                               
                                                            </select>
                                                            @error('serve1_price_id')
                                                            <span class="text-danger"> {{trans('messages.serve1_total_id.exists')}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4 py-2 text-center">
                                                        <div class="form-group">
                                                            <label for="projectinput2"><h3>سعر المستلزمات</h3>  </label>
                                                            <select  style="height:48px;" name="serve1_tprice_id" id="serve1_tprice_id" class="select form-control">
                                                               

                                                               
                                                            </select>
                                                            @error('serve1_tprice_id')
                                                            <span class="text-danger"> {{trans('messages.serve1_total_id.exists')}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="col-12 col-sm-4 py-2 text-center">
                                                        <div class="form-group">
                                                            <label for="projectinput2"><h3>اجمالي الخدمة العام</h3>  </label>
                                                            <select  style="height:48px;" name="serve1_total_id" id="serve1_total_id" class="select form-control">
                                                               

                                                               
                                                            </select>
                                                            @error('serve1_total_id')
                                                            <span class="text-danger"> {{trans('messages.serve1_total_id.exists')}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                      
                                   
                                                   
          
          <div class="col-12 py-2 wow fadeInUp text-center" data-wow-delay="300ms">
          <label for="projectinput2"><h3> أترك رسالة </h3></label>
            <textarea name="reson" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
            @error('reson')
                                                            <span class="text-danger"> {{trans('messages.serve1_total_id.exists')}}</span>
                                                            @enderror
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
            $(document).on('change','#serve1_id', function(){
                populateServe1_thin();
             return false;
            });
            function  populateServe1_thin(){
                $('option', $('#serve1_thin_id')).remove();
                $('#serve1_thin_id').append($('<option></option>').val('').html());
                var serveId = $('#serve1_id').val() != null ? $('#serve1_id').val() : '{{old('serve1_id')}}';
                $.get("{{Route('gethprice')}}",{serve1_id: serveId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('serve1_thin_id')}}' ? "selected" : "";
                   $('#serve1_thin_id').append($('<option class="text-center  "'+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
    </script>

    <script>
        $(function(){
            $(document).on('change','#serve1_id', function(){
                populateServe1_price();
             return false;
            });
            function  populateServe1_price(){
                $('option', $('#serve1_price_id')).remove();
                $('#serve1_price_id').append($('<option></option>').val('').html());
                var serveId = $('#serve1_id').val() != null ? $('#serve1_id').val() : '{{old('serve1_id')}}';
                $.get("{{Route('getpprice')}}",{serve1_id: serveId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('serve1_price_id')}}' ? "selected" : "";
                   $('#serve1_price_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
    </script>

<script>
        $(function(){
            $(document).on('change','#serve1_id', function(){
                populateServe1_tprice();
             return false;
            });
            function  populateServe1_tprice(){
                $('option', $('#serve1_tprice_id')).remove();
                $('#serve1_tprice_id').append($('<option></option>').val('').html());
                var serveId = $('#serve1_id').val() != null ? $('#serve1_id').val() : '{{old('serve1_id')}}';
                $.get("{{Route('gettprice')}}",{serve1_id: serveId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('serve1_tprice_id')}}' ? "selected" : "";
                   $('#serve1_tprice_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
    </script>
<script>
        $(function(){
            $(document).on('change','#serve1_id', function(){
                populateServe1_total();
             return false;
            });
            function  populateServe1_total(){
                $('option', $('#serve1_total_id')).remove();
                $('#serve1_total_id').append($('<option></option>').val('').html());
                var serveId = $('#serve1_id').val() != null ? $('#serve1_id').val() : '{{old('serve1_id')}}';
                $.get("{{Route('getoprice')}}",{serve1_id: serveId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('serve1_total_id')}}' ? "selected" : "";
                   $('#serve1_total_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
    </script>



   





</body>
</html>
   

