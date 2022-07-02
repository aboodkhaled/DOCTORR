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
                                    <h4 class="card-title"> تفاصيل ألمستخدم: {{$user -> name}} </h4>
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
                                                                <a href="{{route('hosbital.siks')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> رجوع</a>

                                                            </div>

															<div class="form-group">
										
                                                <div class="text-center">
                                                    <img
                                                        src="{{$user -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألمريض  ">
                                                </div>
												
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
														<li class="btn-item btn-outline-success"><a href="#tab4" class="nav-link " data-toggle="tab"> بيانات ألمستخدم</a></li>
														<li class="btn-item btn-outline-success"><a href="#tab5" class="nav-link " data-toggle="tab">تفاصيل ألمستخدم </a></li>
														<li class="btn-item btn-outline-success"><a href="#tab6" class="nav-link " data-toggle="tab">بيانات ألحجز </a></li>
														
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
												<td>{{$user -> id}}</td>
                                                <th scope="row">الاسم :</th>
												<td>{{$user -> name}}</td>
                                                <th scope="row"> الايميل :</th>
												<td>{{$user -> email}}</td>
                                                <th scope="row">رقم ألهاتف :</th>
												<td> {{$user -> mobile}}</td>
                                                   </tr>
                                                    <tr>
                                                    <th scope="row"> ألجنس :</th>
												<td> {{$user -> sex}}</td>
                                                <th scope="row"> ألحالة الاجتماعية :</th>
												<td> {{$user -> socia}}</td>
                                                <th scope="row">  ألعمر :</th>
												<td> {{$user -> age}} سنة</td>
                                                <th scope="row">  فصيلة ألدم :</th>
												<td> {{$user -> blood->blood_typ}}</td>
                                                    </tr>
                                                    <th scope="row " >  ألعنوان  :</th>
												<td style="width: 150px; height: 100px;"> {{$user -> cuontry->name}} - {{$user -> city->name}} - {{$user ->address}}</td>
                                                    <tr>

                                                    </tr>
													</tbody>
                                                   </table>

													</div>	
													</div>
													

													<div class="tab-pane" id="tab6">
													<div class="table-responsive mt-15">
													<div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
									
									<table 
                                            class="table display nowrap table-striped table-bordered scroll-horizontal text-center">
                                            <thead class="" >
                                            
										
                                            
											<tr>
                                                
                                               
												<th scope="row">#</th>
												<th scope="row"> رقم ألحجز </th>
												<th scope="row">أسم ألمريض </th>
												<th scope="row">أسم ألدكتور</th>
												<th scope="row"> ألتخصص</th>
												<th scope="row"> ألقسم </th>
												<th scope="row"> أسم الخدمة </th>
												<th scope="row"> ألسعر </th>
												
                                            </tr>
</thead>
                                            <tbody>
											<?php $i = 0; ?>
											@foreach($happoemint as $y)
											
                                                    <tr>
													<?php $i++; ?>
                                <td>{{ $i }}</td>
													<td>{{$y -> id}}</td> 
													<td>{{$y ->user-> name}}</td>
													<td>{{$y ->hdoctor-> doc_name}}</td>
													<td>{{$y ->hspecialty-> special_name}}</td>
													<td>{{$y ->hdepartment-> dept_name}}</td>
													<td>{{$y ->hserve-> serv_name}}</td>
													<td>{{$y ->hdoctor_serve-> price}}</td>
													
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
									
									</div>
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('servep_trans.add_servep') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="" method="POST">
                    @csrf
                    <div class="card-body">
                   
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                <div class="col-md-12">
                                        <input type="text" name="name" value="">
                                                        <input type="text" name="customar_id" value="">
                                        </div>
                                        <br><br>
                                    <div class="row">

                                        
<br>
                                        <div class="row col-md-12">
                                        <div class="col-md-3">
                                            <label for="year_q"
                                                class="mr-sm-2">
                                                ألكمية ألسنوية \ طن :</label>
                                            <input class="form-control" type="number" name="year_q" />
                                        </div>

                                        <div class="col-md-3">
                                            <label for="month_q"
                                                class="mr-sm-2">
                                                ألكمية ألشهرية \ طن  :</label>
                                            <input class="form-control" type="number" name="month_q" />
                                        </div>

                                        
                                        <div class="col-md-4">
                                            <label for="tasreh_q"
                                                class="mr-sm-2">
                                                ألكمية ألمسموحة لكل تصريح \ طن :</label>
                                            <input class="form-control" type="number" name="tasreh_q" />
                                        </div>
                                        </div>

                                        <div class="col-md-3">
                                <div class="form-group">
                                    <label>بداية ألاشهر  ألمسموحة بها  :</label>
                                    <input  type="date" name="months" class="form-control" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نهاية ألاشهر  ألمسموحة بها   :</label>
                                    <input  type="date" name="monthe" class="form-control" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>



                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">أسم الصنف
                                                :</label>

                                            <div class="box">
                                            <select class="fancyselect" name="item_id">
                                                    
                                                        <option value=""></option>
                                                   
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">{{ trans('servep_trans.Processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('servep_trans.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('servep_trans.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('servep_trans.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
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

