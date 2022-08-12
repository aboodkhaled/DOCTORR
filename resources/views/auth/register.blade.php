@extends('layouts.site')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>برنامج بساط ألريح  ألطبي</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
   
    @toastr_css
    @section('content')

    <div class="wrapper">

        <!--=================================
 preloader -->

 <div id="pre-loader" >
 <a class="navbar-brand" href="#"><span class="text-primary">Tabeb</span></a>
            <img style="width: 200px;" src="{{asset('assets/front/u/assets/img/r.png')}}" alt="">
            <a class="navbar-brand" href="#"><span class="text-primary">Bisat</span>-areeh</a>
        </div>

        <!--=================================
 preloader -->

        <!--=================================
 login-->

        <section class="height-10vh d-flex align-items-center page-section-ptb login"
            style="background-image: ;">
            <div class="container"><div class="container">
      <h1 class="text-center wow fadeInUp"></h1>
      <div class="col-md-12 text-center ">
      <a class="navbar-brand" href="#"><span class="text-primary">Tabeb</span></a>
      <img style="width: 200px;" src="{{asset('assets/front/u/assets/img/r.png')}}" alt="...">
      <a class="navbar-brand" href="#"><span class="text-primary">Bisat</span>-areeh</a>
    </div>
                <div class="row justify-content-center  vertical-align">
                    <div class="col-lg-4 col-md-6 login-fancy-bg bg  text-white"
                    style="background-image: url({{asset('assets/front/u/assets/img/bg_image_1.jpg')}});">
                        <div class="login-fancy">
                        <div class="col-md-12 text-center ">
      <img style="width: 150px;" src="{{asset('assets/front/u/assets/img/r.png')}}" alt="...">
      
    </div>
                            <p class="mb-20 text-white" >Create tailor-cut websites with the exclusive multi-purpose
                                responsive template along with powerful features.</p>
                            <ul class="list-unstyled  pos-bot pb-30">
                                <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                                <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 class="mb-30">أنشاء حساب</h3>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                               
                               

                                <div class="section-field mb-10">
                                    <label class="mb-10" for="name">ألأسم*</label>
                                    <input id="mobile" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                              
                                <div class="section-field mb-10">
                                  
                                    <input id="mobile" 
                                        class="form-control" name="email"
                                        type="hidden"   value="BISATAREEH@GMAIL.COM" >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">رقم الهاتف*</label>
                                    <input id="mobile" type="mobile"
                                        class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                        value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">كلمة المرور * </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">تاكيد كلمة المرور * </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                        required autocomplete="current-password_confirmation">

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
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

                                                    <div class="section-field mb-20">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> نوع ألتسجيل </label>
                                                            <select  style="height:48px;" name="sik_typ" class="select2 form-control">
                                                                <optgroup label="أختر نوع ألتسجيل من فضلك ">
                                                                <option value="internal">داخل ألمستشفئ</option>
                                                                    <option value="external">عبر ألموقع</option>
                                                                </optgroup>
                                                            </select>
                                                           
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="section-field mb-20">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  ألعمر </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="age">

                                                                   @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                                           
                                                        </div>
                                                        </div>


                                                        <div class="section-field mb-20">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألحالة ألاجتماعية </label>
                                                            <select  style="height:48px;" name="socia" class="select2 form-control">
                                                                <optgroup label="أختر ألحالة ألاجتماعية من فضلك ">
                                                                <option value="marride">متزوج</option>
                                                                    <option value="single">عازب</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('socia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="section-field mb-20">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  فصيلة ألدم </label>
                                                            <select  style="height:48px;" name="blood_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر نوع فصيلة ألدم ">
                                                                <option>...................</option>
                                                                    @if($bloods && $bloods -> count() > 0)
                                                                        @foreach($bloods as $blood)
                                                                       
                                                                            
                                                                            <option
                                                                                value="{{$blood -> id }}">{{$blood -> blood_typ}}</option>
                                                                        @endforeach
                                                                           
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('blood_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                                        </div>
                                                    </div>


                                                    <div class="section-field mb-20">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألدولة </label>
                                                            <select  style="height:48px;" name="cuontry_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                <option>...................</option>
                                                                    @if($cuontrys && $cuontrys -> count() > 0)
                                                                        @foreach($cuontrys as $cuontry)
                                                                           
                                                                            <option
                                                                                value="{{$cuontry -> id }}">{{$cuontry -> name}}</option>
                                                                        @endforeach
                                                                           
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('cuontry_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                                        </div>
                                                    </div>
                                                    <div class="section-field mb-20">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألمدينة </label>
                                                            <select  style="height:48px;" name="city_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألمحافظة ">
                                                                <option>...................</option>
                                                                    @if($citys && $citys -> count() > 0)
                                                                        @foreach($citys as $city)
                                                                       
                                                                            
                                                                            <option
                                                                                value="{{$city -> id }}">{{$city -> name}}</option>
                                                                        @endforeach
                                                                           
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('city_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                                        </div>
                                                    </div>

                                                  
                                                    <div class="section-field mb-20">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألعنوان </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="address">
                                                                   @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                                          
                                                        </div>
                                                    </div>

                                                   

                                                       

                                                       

                                                   
                                                

                                               

                               
                                <button class="btn btn-primary" data-link-action="sign-in" type="submit"
                                                    class="form-control-submit">
                                                Sign up
                                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>
    @stop
    @toastr_js
@toastr_render
    <!-- jquery -->
    <script src="{{ URL::asset('assets/admin/d/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{URL::asset('assets/admin/d/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';

    </script>

    <!-- chart -->
    <script src="{{ URL::asset('assets/admin/d/js/chart-init.js') }}"></script>
    <!-- calendar -->
    <script src="{{ URL::asset('assets/admin/d/js/calendar.init.js') }}"></script>
    <!-- charts sparkline -->
    <script src="{{ URL::asset('assets/admin/d/js/sparkline.init.js') }}"></script>
    <!-- charts morris -->
    <script src="{{ URL::asset('assets/admin/d/js/morris.init.js') }}"></script>
    <!-- datepicker -->
    <script src="{{URL::asset('assets/admin/d/js/datepicker.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ URL::asset('assets/admin/d/js/sweetalert2.js') }}"></script>
    <!-- toastr -->
    @yield('js')
    <script src="{{ URL::asset('assets/admin/d/js/toastr.js') }}"></script>
    <!-- validation -->
    <script src="{{ URL::asset('assets/admin/d/js/validation.js') }}"></script>
    <!-- lobilist -->
    <script src="{{URL::asset('assets/admin/d/js/lobilist.js') }}"></script>
    <!-- custom -->
    <script src="{{ URL::asset('assets/admin/d/js/custom.js') }}"></script>

</body>

</html>