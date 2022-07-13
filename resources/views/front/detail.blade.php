<!DOCTYPE html>
<html lang="ar">
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
            <li class="breadcrumb-item active" aria-current="page">صفحة ألملف الطبي</li>
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

<div id="h">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title text-right"> ألملف ألطبي للمريض: {{ Auth::user()-> name}} </h4>
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
		
								

										<div class="form-group">
										
                                                <div class="text-center">
                                                    <img
                                                        src="{{ Auth::user()-> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألمريض  ">
                                               
												
                                            </div>
		<div class="breadcrumb-header justify-content-between">
		
						
					
				
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card" id="basic-alert">
							<div class="card-body">
								
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li class="btn-item btn-outline-success"><a href="#tab4" class="nav-link text-dark " data-toggle="tab"> بيانات ألمريض</a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab5" class="nav-link text-dark" data-toggle="tab">ألحجوزات </a></li>
														<li class="btn-item btn-outline-success"><a href="#tab6" class="nav-link text-dark" data-toggle="tab"> ألفحوصات </a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab7" class="nav-link text-dark" data-toggle="tab"> ألاشعة </a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab8" class="nav-link text-dark" data-toggle="tab"> ألادوية </a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab9" class="nav-link text-dark" data-toggle="tab"> تشخيص ألطبيب </a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab10" class="nav-link text-dark" data-toggle="tab">   ألانظمام للمقابلة مع ألطبيب </a></li>
														
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
												<div class="tab-content">
                                                <div class="tab-pane  " id="tab6">  
                                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th scope="col-12"  >أسم ألفحص</th>
                                                <th scope="col"  >ألسعر</th>
                                                <th scope="col" >ألاجمالي</th>
                                                <th scope="col" >بواسطة الطبيب</th>
                                                <th scope="col" > ألمستشفى</th>
                                                <th scope="col" >وقت أظافة ألفحص</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_axams as $useraxam)
                                            <?php $i = 1*$useraxam->hlabe->price; ?>
                                            
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td >{{$useraxam->hlabe->axam_name}}</td>
                                                 
                                                    <td  >{{$useraxam->hlabe->price}}</td>
                                                    <td  >{{$i}} </td>
                                                    <td  >{{$useraxam->hdoctor->doc_name}}</td>
                                                    <td>{{$useraxam ->hdoctor->hosbital -> name}}</td>
                                                    <td  >{{$useraxam->created_at}} </td>
                                                </tr>
                                              
                                            @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>

                                <div class="tab-pane  " id="tab7">  
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th scope="col-12"  >أسم ألاشعة</th>
                                                <th scope="col"  >ألسعر</th>
                                                <th scope="col" >ألاجمالي</th>
                                                <th scope="col" >بواسطة الطبيب</th>
                                                <th scope="col" > ألمستشفى</th>
                                                <th scope="col" >وقت أظافة ألاشعة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_xrays as $user_xray)
                                            <?php $i = 1*$user_xray->hx_price->price; ?>
                                            
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td >{{$user_xray->hxray->name}}</td>
                                                 
                                                    <td  >{{$user_xray->hx_price->price}}</td>
                                                    <td  >{{$i}} </td>
                                                    <td  >{{$user_xray->hdoctor->doc_name}}</td>
                                                    <td>{{$user_xray ->hdoctor->hosbital -> name}}</td>
                                                    <td  >{{$user_xray->created_at}} </td>
                                                </tr>
                                              
                                            @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane  " id="tab8">  
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal" style="overflow-ء:scroll;">
                                            <thead class="">
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <th scope="col-12"  >أسم ألدواء</th>
                                                <th scope="col"  >ألكمية</th>
                                                <th scope="col"  >طريقة ألاستخدام</th>
                                                <th scope="col"  >ألسعر</th>
                                                <th scope="col" >ألاجمالي</th>
                                                <th scope="col" >بواسطة الطبيب</th>
                                                <th scope="col" >ألمستشفى</th>
                                                <th scope="col" >وقت أظافة ألدواء</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach($user_medicens as $user_medicen)
                                            <?php $i = $user_medicen->qun*$user_medicen->hphar_price->price; ?>
                                            
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td >{{$user_medicen->hpharmice->name}}</td>
                                                    <td  >{{$user_medicen->qun}}</td>
                                                    <td  >{{$user_medicen->way_use}}</td>
                                                    <td  >{{$user_medicen->hphar_price->price}}</td>
                                                    <td  >{{$i}} </td>
                                                    <td  >{{$user_medicen->hdoctor->doc_name}}</td>
                                                    <td>{{$user_medicen ->hdoctor->hosbital -> name}}</td>
                                                    <td  >{{$user_medicen->created_at}} </td>
                                                </tr>
                                              
                                            @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                <div class="tab-pane  " id="tab9">  
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                            <th scope="col">تشخيص حالتك </th>
                                                <th scope="col">أرشادات ألطبيب</th>
                                                <th scope="col" >ألمستشفى</th>
                                                <th scope="col" >بواسطة الطبيب</th>
                                                <th scope="col" >وقت أظافة ألتشخيص</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_diagnos as $user_diagno)
                                           
                                            
                                                <tr  style='text-align:center;vertical-align:middle'>
                                                <td>{{$user_diagno->diago}}</td>
                                                    <td>{{$user_diagno->revew}}</td>
                                                    <td>{{$user_medicen ->hdoctor->hosbital -> name}}</td>
                                                    <td  >{{$user_medicen->hdoctor->doc_name}}</td>
                                                    <td  >{{$user_medicen->created_at}} </td>
                                                </tr>
                                              
                                            @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div> 

                                <div class="tab-pane  " id="tab9">  
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                            <th scope="col">تشخيص حالتك </th>
                                                <th scope="col">أرشادات ألطبيب</th>
                                                <th scope="col" >بواسطة الطبيب</th>
                                                <th scope="col" >وقت أظافة ألتشخيص</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_diagnos as $user_diagno)
                                           
                                            
                                                <tr  style='text-align:center;vertical-align:middle'>
                                                <td>{{$user_diagno->diago}}</td>
                                                    <td>{{$user_diagno->revew}}</td>
                                                    
                                                    <td  >{{$user_medicen->hdoctor->doc_name}}</td>
                                                    <td  >{{$user_medicen->created_at}} </td>
                                                </tr>
                                              
                                            @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div><div class="tab-pane  " id="tab10">  
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>أسم ألمريض</th>
                                                <th> أسم ألطبيب</th>
                                                <th> أسم ألمستشفى</th>
                                                <th>عنوان ألحجز</th>
                                                <th>تاريخ  ووقت ألمقابلة</th>
                                                <th>مدة ألمقابلة</th>
                                                <th>رابط ألانظمام للمقابلة مع ألطبيب</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>

                                           
                                            @foreach($mates as $mate)
                                                    <tr>
                                                        <td>{{$mate -> User -> name}}</td>
                                                        <td>{{$mate -> hdoctor -> doc_name}}</td>
                                                        <td>{{$mate ->hosbital -> name}}</td>
                                                        <td>{{$mate -> topic}}</td>
                                                        <td>{{$mate -> start_at}}</td>
                                                        <td>{{$mate -> duration}} دقيقة</td>
                                                            <td class="text-danger"><a href="{{$mate->join_url}}" target="_blank">أنقر هناء للانضمام للمقابلة </a></td>
                                                        
                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                
                                
                                
                               
													<div class="tab-pane active" id="tab4">
													<div class="table-responsive mt-15">
                                                    <div class="card mb-12  text-right  justify-content-center " style=" margin-top: 10px;">
  <div class="row no-gutters">
    <div class="col-md-4 text-center">
    <img
                                                        src="{{ Auth::user()-> photo}}"
                                                        class="rounded-circle  height-150" style="width: 200px;" alt="صورة ألمريض  ">
    </div>
    
    <div class="col-md-4">
      <div class="card-body">
        <h4 class="card-title"><label class="control-label">  {{ Auth::user()-> id}} </label> <label class="control-label">:   ألرقم ألطبي  </label>   </h4>
        <h5 class="card-title"> <label class="control-label">   {{ Auth::user()-> age}}</label> <label class="control-label">:  ألعمر </label>    </h5>
        <h5 class="card-title"> <label class="control-label">   {{ Auth::user()-> sex}}</label>   <label class="control-label">:  ألجنس </label>   </h5>
        <h5 class="card-title"> <label class="control-label">   {{ Auth::user()-> socia}}</label>  <label class="control-label">:  ألحالة ألأجتماعية </label>    </h5>
        <h5 class="card-title"> <label class="control-label">  {{ Auth::user()-> blood->blood_typ}}</label>  <label class="control-label">:  فصيلة ألدم  </label>    </h5>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title"> <label class="control-label">   {{ Auth::user()-> name}}</label>  <label class="control-label">:  ألاسم </label>   </h5>
        <h5 class="card-title"> <label class="control-label">  {{ Auth::user()-> mobile}}</label><label class="control-label">:   رقم ألهاتف </label>  </h5>
        <h5 class="card-title"> <label class="control-label">    {{ Auth::user()-> email}}</label> <label class="control-label">:  ألائيميل </label> </h5>
        <h5 class="card-title"> <label class="control-label">  {{ Auth::user()-> cuontry->name}} - {{ Auth::user()-> city->name}} - {{ Auth::user()->address}}</label>  <label class="control-label">:  ألعنوان </label>   </h5>
        
      </div>
    </div>
    
    
  </div>
  </div>    
													

													</div>	
													</div>
													

													<div class="tab-pane" id="tab5">
													<div class="table-responsive mt-15">
													<div class="card-content collapse show">
                                                    <div class="card-content collapse show">
                                                    <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                
                                               
												<th scope="row">#</th>
												<th scope="row"> رقم ألحجز </th>
												<th scope="row">أسم ألمريض </th>
												<th scope="row">أسم ألدكتور</th>
                                                <th scope="row">أسم ألمستشفى</th>
												<th scope="row"> ألتخصص</th>
												<th scope="row"> ألقسم </th>
												<th scope="row"> أسم الخدمة </th>
												<th scope="row"> ألسعر </th>
												
                                            </tr>
</thead>
                                            <tbody>
											<?php $i = 0; ?>
											@foreach($appoemints as $appoemint)
											
                                                    <tr>
													<?php $i++; ?>
                                <td>{{ $i }}</td>
													<td>{{$appoemint -> id}}</td> 
													<td>{{$appoemint ->user-> name}}</td>
													<td>{{$appoemint ->hdoctor -> doc_name}}</td>
                                                    <td>{{$appoemint ->hosbital -> name}}</td>
													<td>{{$appoemint ->hspecialty-> special_name}}</td>
													<td>{{$appoemint ->hdepartment-> dept_name}}</td>
													<td>{{$appoemint ->hserve-> serv_name}}</td>
													<td>{{$appoemint ->hdoctor_serve-> price}}</td>
													
														
                                                    </tr>
                                                    @endforeach
													</tbody>
                                        </table>

													</div>
													</div>
													</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
                                    </div>
									
									</div>
									</div>
									</div>
									
									</div>
								
                                     
                                    
    </div>
    
    
									</div>
									
									
									
									
									
										
<!-- Prism Code -->





		<!-- main-content closed -->
        @include('front.includes.footer')

<script src="{{asset('assets/front/u/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/front/u/assets/js/theme.js')}}"></script>
<script src="{{asset('assets/front/u/assets/js/toastr.js') }}"></script>

@toastr_js
@toastr_render

<script src="{{asset('assets/admin/d/js/toastr.js') }}"></script>
  
<!--script src="//js.pusher.com/3.1/pusher.min.js"></script>
 < !---- BEGIN VENDOR JS-->
 

<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/tables/datatable/datatables.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>

<script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('assets/admin/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/core/app.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('assets/admin/js/scripts/pages/dashboard-crypto.js')}}" type="text/javascript"></script>


<script src="{{asset('assets/admin/js/scripts/tables/datatables/datatable-basic.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/ui/prism.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/pages/email-application.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{asset('assets/admin/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>


 
 

<!--Internal  Datepicker js -->
<script src="{{asset('assets/admin/u/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{asset('assets/admin/u/assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{asset('assets/admin/u/assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}" ></script>
<!-- Internal Input tags js-->
<script src="{{asset('assets/admin/u/assets/plugins/inputtags/inputtags.js')}}"></script>
<!--- Tabs JS-->
<script src="{{asset('assets/admin/u/assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}" ></script>
<script src="{{asset('assets/admin/u/assets/js/tabs.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{asset('assets/admin/u/assets/plugins/clipboard/clipboard.min.js')}}" ></script>
<script src="{{asset('assets/admin/u/assets/plugins/clipboard/clipboard.js')}}" ></script>
<!-- Internal Prism js-->
<script src="{{asset('assets/admin/u/assets/plugins/prism/prism.js')}}" ></script>




</body>
</html>


<script>
    setInterval(function()  {
        $("#h").load(window.location + " #h");
        
        
    }, 55000);
</script>