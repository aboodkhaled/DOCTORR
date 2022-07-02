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
                                    <h4 class="card-title"> تفاصيل مختبرات: {{$venlabe -> name}} </h4>
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
                                                                <a href="{{route('admin.venlabes.index')}}"
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
														<li class="btn-item btn-outline-success"><a href="#tab4" class="nav-link active" data-toggle="tab"> تفاصيل ألمختبر</a></li>
														<li class="btn-item btn-outline-success"><a href="#tab5" class="nav-link" data-toggle="tab">حالات ألدفع </a></li>
														
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
												<td>{{$venlabe -> id}}</td>
                                                <th scope="row">الاسم :</th>
												<td>{{$venlabe -> name}}</td>
                                                
                                                <th scope="row"> الايميل :</th>
												<td>{{$venlabe -> email}}</td>
                                                <th scope="row">رقم ألهاتف :</th>
												<td>
                                                        {{$venlabe -> mobile}}
                                                        </td>
														<th scope="row"  >ألعنوان :  </th>
                                                        <td style="text-align"> {{$venlabe ->cuontry -> name}} - {{$venlabe ->city -> name}} - {{$venlabe ->address}}</td>
                                                
                                                
                                               
                                               
                                                
                                               
                                                <th scope="row"> ألحالة: </th>
												<td>{{$venlabe -> getActive()}}</td>
                                               
                                            </tr>
											
                                            

                                           
                                                    <tr>
                                                    
                                                        
                                                        
													<th scope="row">تاريخ الاشتراك  :</th>
												<td >{{$venlabe -> sup_date}}</td>
                                                
                                                       
												<th scope="row">قيمة  الاشتراك : </th>
                                                        <td >{{$venlabe -> sup_price}}</td>
														<th scope="row"> ألمدفوع :</th>
                                                        <td >{{$venlabe -> suppay_price}}</td>
														<th scope="row">وقت دفع الاشتراك :</th>
                                                        <td >{{$venlabe -> pay_time}}</td>
														<th scope="row">تاريخ دفع الاشتراك :</th>

                                                        <td >{{$venlabe -> pay_date}}</td>
														<th scope="row">حالة  ألدفع :</th>
                                                        <td >
                                                            @if ($venlabe -> status == 0)
                                                               <span class="badge badge-pill badge-success">{{$venlabe -> getStatus()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$venlabe -> getStatus()}}</span>@endif
                                                        </td>
                                                       
                                                        
                                      
                                                    </tr>
													</tbody>
                                        </table>

													</div>	
													</div>
													<div class="tab-pane" id="tab5">
													<div class="table-responsive mt-15">
													<table
                                        class="table  table-striped " style="text-align:center">
                                            
                                           
                                            <tbody>
											<tr>
                                                <th scope="row"> رقم  </th>
                                                <th scope="row">الاسم </th>
                                               
												<th scope="row">قيمة  الاشتراك  </th>
												<th scope="row"> ألمدفوع </th>
												<th scope="row">وقت دفع الاشتراك </th>
												<th scope="row">تاريخ دفع الاشتراك </th>
												
												
												
												<th scope="row">حالة  ألدفع </th>
												<th scope="row">  أسم ألموظف </th>
                                            </tr>
											@foreach($detail as $d)
                                                    <tr>
													<td>{{$d -> venlabe_id}}</td> 
													<td>{{$venlabe -> name}}</td>
                                                        <td >{{$venlabe -> sup_price}}</td>
                                                        <td >{{$venlabe -> suppay_price}}</td>
                                                        <td >{{$venlabe -> pay_time}}</td>
                                                        <td >{{$venlabe -> pay_date}}</td>
                                                        <td >
                                                            @if ($venlabe -> status == 1)
                                                               <span class="badge badge-pill badge-danger">{{$venlabe -> getStatus()}}</span>
                                                               @else <span class="badge badge-pill badge-success">{{$venlabe -> getStatus()}}</span>@endif
                                                        </td>
														<td >{{$d -> admin}}</td>
														@endforeach
                                                    </tr>
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

