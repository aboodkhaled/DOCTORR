@extends('layouts.hosbital')

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
                                    <h4 class="card-title"> تفاصيل ألدفع: {{$happoemint -> id}} </h4>
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
                                                                <a href="{{route('hosbital.appoemints')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> {{trans('servee_trans.Backe')}}</a>

                                                            </div>

															<div class="form-group">
										
                                               \
												
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
														<li class="btn-item btn-outline-success"><a href="#tab4" class="nav-link  active" data-toggle="tab"> بيانات ألحجز</a></li>
														<li class="btn-item btn-outline-success"><a href="#tab5" class="nav-link " data-toggle="tab"> بيانات ألدفع</a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab7" class="nav-link " data-toggle="tab"> تحديد ألمقابلة </a></li>
														
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
											
												   <div class="tab-content">
										         	<div class="tab-pane active" id="tab4">
													<div class="table-responsive mt-15">
													<div class="card-content collapse show">
                                    
									
                                    <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
											<tr>
                                                <th>أسم ألمريض</th>
                                                <th> أسم ألطبيب</th>
                                                <th>ألتخصص</th>
                                                <th>أسم ألخدمة</th>
                                                <th>ألسعر</th>
                                                <th>وقت ألطلب</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>

                                          
                                                
                                                    <tr>
                                                        <td>{{$happoemint -> User -> name}}</td>
                                                        <td>{{$happoemint -> hdoctor -> doc_name}}</td>
                                                        <td>{{$happoemint -> hspecialty -> special_name}}</td>
                                                        <td>{{$happoemint -> hserve -> serv_name}}</td>
                                                        <td>{{$happoemint -> hdoctor_serve -> price}}</td>
                                                        <td>{{$happoemint -> created_at->diffForHumans()}}</td>
                                                        
                                                    </tr>
                                               


                                            </tbody>
                                        </table>
											
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
                                                
                                               
												
												<th scope="row"> رقم بيانات الدفع </th>
                                                <th scope="row"> أسم ألمريض </th>
												<th scope="row">رقم ألحجز </th>
												<th scope="row">رقم مرحلة التاكد</th>
												<th scope="row"> رقم مرحلة ألدفع</th>
                                                <th scope="row"> ألرد</th>
												<th scope="row"> حالة ألدفع </th>
												
												
												
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php $i = 0; ?>
											@foreach($user as $y)
											
                                                    <tr>
													<?php $i++; ?>
                                                    <td>{{ $i }}</td>
													<td>{{$y ->user-> name}}</td> 
													<td>{{$y ->happoemint_id}}</td>
													<td>{{$y ->confirm_id}}</td>
													<td>{{$y ->operation_id}}</td>
													<td>{{$y ->status}}</td>
													
													<td>  @if ($y -> active == 1)
                                                               <span class="badge badge-pill badge-success">{{$y -> getActive()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$y -> getActive()}}</span>@endif</td>
                                                        <td>
                                                    </tr>
                                                    @endforeach
													</tbody>
                                        </table>

											
									</div>
									
									</div>
									
									</div>
									</div>
									
									</div>
									<div class="tab-pane  " id="tab7">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('hosbital.appoemints.mate') }}" enctype="multipart/form-data">
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

                                                        <input type="hidden" name="hdoctor_id" value="{{$happoemint ->hdoctor->id}}">
                                                        <input type="hidden" name="happoemint_id" value="{{$happoemint ->id}}">
                                                        <input type="hidden" name="user_id" value="{{$happoemint ->user->id}}">  
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

                                           
                                                @foreach($hmates as $hmate)
                                                    <tr>
                                                        <td>{{$hmate -> User -> name}}</td>
                                                        <td>{{$hmate -> hdoctor -> doc_name}}</td>
                                                        <td>{{$hmate -> topic}}</td>
                                                        <td>{{$hmate -> start_at}}</td>
                                                        <td>{{$hmate -> duration}}</td>
                                                            <td class="text-danger"><a href="{{$hmate->start_url}}" target="_blank">انضم الان</a></td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('hosbital.meeting.edit',$hmate ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('servee_trans.Edite')}}</a>


                                                                <a href="{{route('hosbital.meeting.delete',$hmate ->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('servee_trans.Delete')}}</a>


                                                               


                                                            </div>
                                                        </td>
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

