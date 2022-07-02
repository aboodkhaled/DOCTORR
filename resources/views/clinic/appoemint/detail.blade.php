@extends('layouts.clinic')

<!---Internal  Prism css-->
<link href="{{asset('assets/admin/u/assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link  href="{{asset('assets/admin/u/assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link  href="{{asset('assets/admin/u/assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">

@section('content')
@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>{{session()->get('delete')}}</strong>
    <button type="button" class="close" date-dismiss="alert" aria-lable="Close">
		<span aria-hidden="true">&times;</span>
</button>
</div>

@endif
<div class="app-content content">
<div class="content-wrapper">

<div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">  </h4>
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
		
								<div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('clinic.appoemints')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> {{trans('servee_trans.Backe')}}</a>

                                                            </div>

															<div class="form-group">
										
                                              
												
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
														<li class="btn-item btn-outline-success"><a href="#tab4" class="nav-link  active" data-toggle="tab"> بيانات ألمريض</a></li>
														<li class="btn-item btn-outline-success"><a href="#tab5" class="nav-link " data-toggle="tab"> بيانات ألحجز</a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab7" class="nav-link " data-toggle="tab"> تحديد ألمقابلة </a></li>
														
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
											
												   <div class="tab-content">
										         	<div class="tab-pane active" id="tab4">
													<div class="table-responsive mt-15">
													<div class="card-content collapse show">

                                                    <div class="card mb-12  text-right  justify-content-center " style=" margin-top: 10px;">
  <div class="row no-gutters">
    <div class="col-md-4 text-center">
    <img
                                                        src="{{ $appoemint1->user-> photo}}"
                                                        class="rounded-circle  height-150" style="width: 200px;" alt="صورة ألمريض  ">
    </div>
    
    <div class="col-md-4">
      <div class="card-body">
        <h4 class="card-title"><label class="control-label">  {{  $appoemint1->user->  id}} </label> <label class="control-label">:   ألرقم ألطبي  </label>   </h4>
        <h5 class="card-title"> <label class="control-label">   {{ $appoemint1->user->  age}}</label> <label class="control-label">:  ألعمر </label>    </h5>
        <h5 class="card-title"> <label class="control-label">   {{ $appoemint1->user->  sex}}</label>   <label class="control-label">:  ألجنس </label>   </h5>
        <h5 class="card-title"> <label class="control-label">   {{  $appoemint1->user->  socia}}</label>  <label class="control-label">:  ألحالة ألأجتماعية </label>    </h5>
        <h5 class="card-title"> <label class="control-label">  {{ $appoemint1->user->  blood->blood_typ}}</label>  <label class="control-label">:  فصيلة ألدم  </label>    </h5>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title"> <label class="control-label">   {{  $appoemint1->user->  name}}</label>  <label class="control-label">:  ألاسم </label>   </h5>
        <h5 class="card-title"> <label class="control-label">  {{  $appoemint1->user->  mobile}}</label><label class="control-label">:   رقم ألهاتف </label>  </h5>
        <h5 class="card-title"> <label class="control-label">    {{  $appoemint1->user->  email}}</label> <label class="control-label">:  ألائيميل </label> </h5>
        <h5 class="card-title"> <label class="control-label">  {{ $appoemint1->user->  cuontry->name}} - {{ $appoemint1->user->  city->name}} - {{ $appoemint1->user-> address}}</label>  <label class="control-label">:  ألعنوان </label>   </h5>
        
      </div>
    </div>
    </div>
    </div>
    
                                    
									
                                    <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        
											
									</div>
									
									</div>
									
									</div>
                                    </div>
									</div>
                                   

									

													

													<div class="tab-pane" id="tab5">
													<div class="table-responsive mt-15">
													<div class="card-content collapse show">
                                    
									
                                                    <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>أسم ألمريض</th>
                                                <th> أسم ألعيادة</th>
                                                <th>أسم ألخدمة</th>
                                                <th> سعر ألخدمة بدون ألمستلزمات</th>
                                                <th>مستلزمات ألخدمة</th>
                                                <th>سعر مستلزمات ألخدمة</th>
                                                <th>أجمالي ألخدمة ألعام </th>
                                                <th>وقت ألحجز</th>
                                                <th>وصف حالة ألمريض</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                          
                                                    <tr>
                                                        <td>{{$appoemint1 -> User -> name}}</td>
                                                        <td>{{$appoemint1 -> clinic -> name}}</td>
                                                        <td>{{$appoemint1 -> serve1 -> name}}</td>
                                                        <td>{{$appoemint1 -> serve1_price -> price}}</td>
                                                        <td>{{$appoemint1 -> serve1_thin -> think}}</td>
                                                        <td>{{$appoemint1 -> serve1_tprice -> thin_price}}</td>
                                                        <td>{{$appoemint1 -> serve1_total -> total}}</td>
                                                        <td>{{$appoemint1 -> created_at->diffForHumans()}}</td>
                                                        <td>
                                                        {{$appoemint1 -> reson}}
                                                        </td>
                                                    </tr>
                                               


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
									
									</div>
									</div>
									</div>
                                    </div>
									</div>
                                    

									<div class="tab-pane  " id="tab7">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('clinic.appoemints.mate') }}" enctype="multipart/form-data">
                                            @csrf
                                               
                                            <div class="row col-12 ">
                                                    
                                            <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  عنوان ألحصة </label>
                                                            <input type="text" value="" id="topic"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="topic">
                                                            @error("topic")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-12 col-sm-4 py-2 wow fadeInLeft text-center" data-wow-delay="300ms">
          <label for="projectinput2"><h3> ألتاريخ</h3></label>
            <input type="datetime-local" name="start_at" class="form-control">
          </div>

                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> مدة  ألمقابلة بالدقائق</label>
                                                            <input type="text" value="" id="duration"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="duration">
                                                            @error("duration")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                </div>         

                                                        <input type="hidden" name="hdoctor_id" value="">
                                                        <input type="hidden" name="happoemint_id" value="">
                                                        <input type="hidden" name="user_id" value="">  
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       تاكيد
                                                </button>   
                                            </form>
                                        </div>

                                    <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>أسم ألمريض</th>
                                                <th> أسم ألطبيب</th>
                                                <th>عنوان ألحجز</th>
                                                <th>تاريخ ألبداية</th>
                                                <th>وقت ألمقابلة</th>
                                                <th>رابط ألمقابلة</th>
                                                <th>ألاجراءت</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                           
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>
									</div>
                                    </div>
									

       
									
									
									
									
									
										
<!-- Prism Code -->





		<!-- main-content closed -->
@endsection


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

