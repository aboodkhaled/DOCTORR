@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/front/u/assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/theme.css')}}">
@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.siks')}}">ألمرضئ </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة مريض
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> إضافة مريض </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.alert.success')
                                @include('admin.alert.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form col-md-12 " action="{{route('admin.siks.save')}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            <div class="form-group">
                                                <label> صورة ألمريض </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                           

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات ألمريض </h4>

                                                
                                                <div class="row col-12 ">
                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أسم  </label>
                                                            <input type="text" value="{{old('name')}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>
                                                        
                                                        

                                                        <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألائميل  </label>
                                                            <input type="email" value="{{old('email')}}" id="email"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألؤقم  </label>
                                                            <input type="number" value="" id="mobile"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="mobile">
                                                            @error("mobile")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('phar_trans.Password')}}
                                                            </label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('phar_trans.Password confirmation')}}
                                                            </label>
                                                            <input type="password" id=""
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput1"> ألتاريخ  </label>
                                                     <input type="date" name="sdate" class="form-control">
                                                            
                                                            @error("sdate")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>
                                                      </div>

                                                      <div class="col-6 col-sm-6 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> ألجنس </label>
                                                            <select name="sex" class="select2 form-control">
                                                                <optgroup label="أختر الجنس من فضلك ">
                                                                    <option value="male">ذكر</option>
                                                                    <option value="female">أنثئ</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('sex')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-6 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> نوع ألتسجيل </label>
                                                            <select name="sik_typ" class="select2 form-control">
                                                                <optgroup label="أختر نوع ألتسجيل من فضلك ">
                                                                    <option value="internal">داخل ألمستشفئ</option>
                                                                    <option value="external">خارجي</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('sik_typ')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  ألعمر </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="age">
                                                            @error("age")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>


                                                        <div class="col-6 col-sm-6 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألحالة ألاجتماعية </label>
                                                            <select name="socia" class="select2 form-control">
                                                                <optgroup label="أختر ألحالة ألاجتماعية من فضلك ">
                                                                    <option value="marride">متزوج</option>
                                                                    <option value="single">عازب</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('socia')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  صله ألقرابة للمرجع </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="sik_ref">
                                                            @error("sik_ref")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>

                                                        <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  أسم ألمرجع </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="ref_name">
                                                            @error("ref_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>

                                                        <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> رقم ألمرجع </label>
                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="ref_mobile">
                                                            @error("ref_mobile")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                   
                                                

                                                   <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  فصيلة ألدم </label>
                                                            <select name="blood_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($bloods && $bloods -> count() > 0)
                                                                        @foreach($bloods as $blood)
                                                                            <option
                                                                                value="{{$blood -> id }}">{{$blood -> blood_typ}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('blood_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألدولة</label>
                                                            <select name="cuontry_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($cuontrys && $cuontrys -> count() > 0)
                                                                        @foreach($cuontrys as $cuontry)
                                                                            <option
                                                                                value="{{$cuontry -> id }}">{{$cuontry -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('cuontry_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> ألمدينة </label>
                                                            <select name="city_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($citys && $citys -> count() > 0)
                                                                        @foreach($citys as $city)
                                                                            <option
                                                                                value="{{$city -> id }}">{{$city -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('city_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                     <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألعنوان </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="address">
                                                            @error("address")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                 </div>
                                                 </div>
                                            </div>
                                            
                                            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2">  ألرسالة </label>
            <textarea name="sik_des" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
            @error("sik_des")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection


<script src="{{asset('assets/front/u/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/theme.js')}}"></script>


