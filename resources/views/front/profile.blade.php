



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
 <div class="page-banner overlay-dark bg-image" style="background-image: url({{$user->photo}});">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item "><a href="{{route('homee')}}">ألصفحة لرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">ألملف ألشخصي</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal ">  </h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
   <!-- .page-banner -->
  <div class="topbar bg-black ">

   
 

        
   <!-- .container -->
  <!-- .page-section -->
 
  <div class="page-section">
 
            <form class="form" action="{{route('update.profile')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-body">
                                            <input type="hidden" name="id" value="{{$user -> id }}">
                                                <div class="text-center">
                                                   
                                                    <img
                                                        src="  {{$user -> photo}} "
                                                        class="rounded-circle  height-150" >
                                                       
                                                </div>
                                            
                                            <div class="form-group">
                                                <label> صورة ألمستخدم </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                              
                                            </div>

                                            

                                               
                                                <div class="row col-12 ">
                                                    <div class="col-3 col-sm-3 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أسم  </label>
                                                            <input type="text" value="{{$user->name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="name">
                                                           
                                                        </div>
                                                        </div>
                                                        
                                                        

                                                        <div class="col-3 col-sm-3 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألائميل  </label>
                                                            <input type="email" value="{{$user->email}}" id="email"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="email">
                                                           
                                                        </div>
                                                        </div>
                                                        <div class="col-3 col-sm-3 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألرقم  </label>
                                                            <input type="number" value="{{$user->mobile}}" id="mobile"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="mobile">
                                                           
                                                        </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  كلمة ألسر ألجديدة 
                                                            </label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                   value=""
                                                                   placeholder="  "
                                                                   name="password">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  تاكيد كلمة السر
                                                            </label>
                                                            <input type="password" id=""
                                                            value=""
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>
                                               

                                                      

                                                      <div class="col-3 col-sm-3 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> ألجنس </label>
                                                            <select  style="height:48px;" name="sex" class="select2 form-control">
                                                                <optgroup label="أختر الجنس من فضلك ">
                                                                <option value="male">ذكر</option>
                                                                    <option value="female">أنثئ</option>
                                                                </optgroup>
                                                            </select>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="col-3 col-sm-3 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> نوع ألتسجيل </label>
                                                            <select  style="height:48px;" name="sik_typ" class="select2 form-control">
                                                                <optgroup label="أختر نوع ألتسجيل من فضلك ">
                                                                <option value="internal">داخل ألمستشفئ</option>
                                                                    <option value="external">خارجي</option>
                                                                </optgroup>
                                                            </select>
                                                           
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="col-3 col-sm-3 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  ألعمر </label>
                                                            <input type="text" value="{{$user -> age}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="age">
                                                           
                                                        </div>
                                                        </div>


                                                        <div class="col-3 col-sm-3 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألحالة ألاجتماعية </label>
                                                            <select  style="height:48px;" name="socia" class="select2 form-control">
                                                                <optgroup label="أختر ألحالة ألاجتماعية من فضلك ">
                                                                <option value="marride">متزوج</option>
                                                                    <option value="single">عازب</option>
                                                                </optgroup>
                                                            </select>
                                                           
                                                        </div>
                                                    </div>

                                                   

                                                       

                                                       

                                                   
                                                

                                                <div class="col-3 col-sm-3 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  فصيلة ألدم </label>
                                                            <select  style="height:48px;" name="blood_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($bloods && $bloods -> count() > 0)
                                                                        @foreach($bloods as $blood)
                                                                            <option
                                                                            value="{{$blood -> id }}"
                                                                                @if($user -> blood_id == $blood -> id) selected @endif>{{$blood -> blood_typ}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="col-3 col-sm-3 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألدولة </label>
                                                            <select  style="height:48px;" name="cuontry_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($cuontrys && $cuontrys -> count() > 0)
                                                                        @foreach($cuontrys as $cuontry)
                                                                            <option
                                                                            value="{{$cuontry -> id }}"
                                                                                @if($user -> cuontry_id == $cuontry -> id) selected @endif>{{$cuontry -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-sm-3 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألمدينة </label>
                                                            <select  style="height:48px;" name="city_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($citys && $citys -> count() > 0)
                                                                        @foreach($citys as $city)
                                                                            <option
                                                                            value="{{$city -> id }}"
                                                                                @if($user -> city_id == $city -> id) selected @endif>{{$city -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>


                                                    

                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألعنوان </label>
                                                            <input type="text" value="{{$user -> address}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="address">
                                                          
                                                        </div>
                                                    </div>

                                                 </div>
                                                 </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>

                                        </form>
     
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
  
  <script src="{{asset('assets/front/u/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/theme.js')}}"></script>
 

@toastr_js
@toastr_render

 




    


</body>
</html>
   

