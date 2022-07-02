@extends('layouts.admin')

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
                                    <h4 class="card-title"> تفاصيل صيدليه: {{$clinic -> name}} </h4>
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
                                                                <a href="{{route('admin.clinics.index')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> رجوع</a>

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
														<li class="btn-item btn-outline-success"><a href="#tab4" class="nav-link active" data-toggle="tab"> تفاصيل ألعيادة</a></li>
														<li class="btn-item btn-outline-success"><a href="#tab5" class="nav-link" data-toggle="tab"> جميع حجوزات ألعيادة من ألدرجة ألاولئ </a></li>
														<li class="btn-item btn-outline-success"><a href="#tab6" class="nav-link" data-toggle="tab"> جميع حجوزات ألعيادة من ألدرجة ألثانية </a></li>
														
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab4">
													<div class="table-responsive mt-15">
													<table
                                        class="table  table-striped " style="text-align:center">
                                            
                                           
                                            <tbody>
											<tr>
                                                <th scope="row"> رقم : </th>
												<td>{{$clinic -> id}}</td>
                                                <th scope="row">الاسم :</th>
												<td>{{$clinic -> name}}</td>
                                                
                                                <th scope="row"> الايميل :</th>
												<td>{{$clinic -> email}}</td>
                                                <th scope="row">رقم ألهاتف :</th>
												<td>
                                                        {{$clinic -> mobile}}
                                                        </td>
														<th scope="row"  >ألعنوان :  </th>
                                                        <td style="text-align">{{$clinic ->plase -> name}} - {{$clinic ->address}}</td>
                                                
                                                
                                               
                                               
                                                
                                               
                                                <th scope="row"> ألحالة: </th>
												<td>{{$clinic -> getActive()}}</td>
                                               
                                            </tr>
											
                                            

                                           
                                                    <tr>
                                                    
                                                        
                                                        
													

                                                        <td >{{$clinic -> pay_date}}</td>
														<th scope="row">حالة  ألدفع :</th>
                                                        <td >
                                                            @if ($clinic -> status == 0)
                                                               <span class="badge badge-pill badge-success">{{$clinic -> getStatus()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$clinic -> getStatus()}}</span>@endif
                                                        </td>
                                                       
                                                        
                                      
                                                    </tr>
													</tbody>
                                        </table>

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
                                                <th>ألاجراءت</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($appoemint1s)
                                                @foreach($appoemint1s as $appoemint1)
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
                                                           
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
													
												</div>
											</div>
												
											</div>
											</div>

											<div class="tab-pane" id="tab6">
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
                                                <th>ألاجراءت</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($appoemint2s)
                                                @foreach($appoemint2s as $appoemint2)
                                                    <tr>
                                                        <td>{{$appoemint2 -> User -> name}}</td>
                                                        <td>{{$appoemint2 -> clinic -> name}}</td>
                                                        <td>{{$appoemint2 -> serve2 -> name}}</td>
                                                        <td>{{$appoemint2 -> serve2_price -> price}}</td>
                                                        <td>{{$appoemint2 -> serve2_thin -> think}}</td>
                                                        <td>{{$appoemint2 -> serve2_tprice -> thin_price}}</td>
                                                        <td>{{$appoemint2 -> serve2_total -> total}}</td>
                                                        <td>{{$appoemint2 -> created_at->diffForHumans()}}</td>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

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

