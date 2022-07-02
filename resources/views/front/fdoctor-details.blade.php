@extends('layouts.site')
<link rel="stylesheet" href="{{asset('assets/front/u/assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/theme.css')}}">

@section('content')

    <div id="wrapper-site">

    <div class="page-banner overlay-dark bg-image" style="background-image: url({{$fdoctor -> photo}});">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item "><a href="{{route('homee')}}">ألصفحة لرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal text-white">  بيانات <br>  د /{{$fdoctor -> doc_name}}   </h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
  <div class="card mb-12  text-right  justify-content-center " style=" margin-top: 10px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img style="width: 200px;" src="{{$fdoctor -> photo}}" alt="...">
    </div>
    
    <div class="col-md-4">
      <div class="card-body">
        <h3 class="card-title">د / {{$fdoctor -> doc_name}}  </h3>
        <h5 class="card-text"><label class="control-label"> ألجنس :{{$fdoctor -> sex }} </label>  <h5>
        <h5 class="card-text"><label class="control-label"> قسم :{{$fdoctor ->fdepartment -> dept_name}}</label></h5>
        <h5 class="card-text"><label class="control-label"> ألتخصص : {{$fdoctor ->fspecialty -> special_name}}</label><h5>
        <h5 class="card-title"> <label class="control-label">أسم ألمستشفئ:  {{$fdoctor ->fhosbital-> name}}</label>     </h5>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title"> <label class="control-label">درجة ألتخرج :  {{$fdoctor -> doc_degry}}</label>     </h5>
        <h5 class="card-title"> <label class="control-label"> رقم ألهاتف : {{$fdoctor -> mobile}}</label>  </h5>
        <h5 class="card-title"> <label class="control-label"> تاريخ ألميلاد :  {{$fdoctor -> perth_date}}</label> </h5>
        <h5 class="card-title"> <label class="control-label"> ألعنوان : {{$fdoctor ->fcuontry -> name}}-{{$fdoctor ->fcity -> name}}-{{$fdoctor -> address}}</label>   </h5>
        
      </div>
    </div>
    <div class="col-md-12">
      <div class="card-body">
         <h5 class="card-title"> : ألوصف</h5>
        <p class="card-text">{{$fdoctor -> doc_des}}</p>
    </div>
  </div>
  
  </div>    
    

  <div class="row justify-content-center ">
<div class="btn-group text-right"  role="group"  aria-label="Basic example">
  <a href="{{route('fappoemints',$fdoctor->id)}}" class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1">حجز مع الدكتور</a>
 
      </div>
       </div> 
       
       
</div>    
@stop

