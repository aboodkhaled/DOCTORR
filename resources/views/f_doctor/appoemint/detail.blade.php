@extends('layouts.f_doctor')

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
                                    <h4 class="card-title"> تفاصيل ألمريض: {{$appoemint->user -> name}} </h4>
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
                                                                <a href="{{route('f_doctor.sikss.index')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> رجوع</a>

                                                            </div>
                                                            @foreach($mates as $mate)
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{$mate->start_url}}"
                                                                   class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1"> بدئ ألمقابلة</a>

                                                            </div>
@endforeach
															<div class="form-group">
										
                                                <div class="text-center">
                                                    <img
                                                        src="{{$appoemint->user -> photo}}"
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
                                                        <li class="btn-item btn-outline-success"><a href="#tab5" class="nav-link text-dark" data-toggle="tab">بيانات ألحجز </a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab6" class="nav-link text-dark" data-toggle="tab">أضافة ألتشخيص للمريض </a></li>
														<li class="btn-item btn-outline-success"><a href="#tab7" class="nav-link text-dark" data-toggle="tab">أضافة ألفحوصات </a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab8" class="nav-link text-dark" data-toggle="tab">أضافة أشعة </a></li>
                                                        <li class="btn-item btn-outline-success"><a href="#tab9" class="nav-link text-dark" data-toggle="tab">أضافة دواء </a></li>
														
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
												<div class="tab-content">
                                                <div class="tab-pane  " id="tab7">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('f_doctor.sikss.upaxam' ) }}" enctype="multipart/form-data">
                                            @csrf
                                               
                                            <div class="row col-12 ">
                                                    
                                            <div class="col-md-4">
                                                        <div class="form-group">
              <label for="projectinput2"><h3> من فضلك أختر ألفحص</h3>  </label>
                 <select style="height:48px;" name="flabe_id" id="flabe_id" class="select form-control"
                   onchange="console.log('change is firing')">
                      <optgroup label="من فضلك أختر ألفحص ">
                      <option>...............</option>
                                                                    @if($labes && $labes -> count() > 0)
                                                                        @foreach($labes as $labe)
                                                                       
                                                                            <option 
                                                                                value="{{$labe -> id }}">{{$labe -> axam_name}}
                                                                              </option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('flabe_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput2"><h3>ألسعر</h3>  </label>
                                                            <select  style="height:48px;" name="flabe_price_id" id="flabe_price_id" class="select form-control">
                                                               

                                                               
                                                            </select>
                                                            @error('flabe_price_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                </div>         

                                                        <input type="hidden" name="fdoctor_id" value="{{auth('f_doctor') -> user() -> id}}">
                                                        <input type="hidden" name="fappoemint_id" value="{{$appoemint ->id}}">
                                                        <input type="hidden" name="user_id" value="{{$appoemint ->user->id}}">  
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
                                            <tr class="table-secondary">  
                                                <th scope="col">أسم ألفحص</th>
                                                <th scope="col">ألسعر</th>
                                                <th scope="col">ألاجمالي</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_axams as $useraxam)
                                            <?php $i = 1*$useraxam->flabe->price; ?>
                                                <tr style='text-align:center;vertical-align:middle'>
                                               
                                                    <td>{{$useraxam->flabe->axam_name}}</td>
                                                 
                                                    <td>{{$useraxam->flabe->price}}</td>
                                                    <td >{{$i}} </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="tab-pane " id="tab8">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('f_doctor.sikss.upxray' ) }}" enctype="multipart/form-data">
                                            @csrf
                                               
                                            <div class="row col-12 ">
                                                    
                                            <div class="col-md-4">
                                                        <div class="form-group">
              <label for="projectinput2"><h3>من فضلك أختر ألاشعة</h3>   </label>
                 <select style="height:48px;" name="fxray_id" id="fxray_id" class="select form-control"
                   onchange="console.log('change is firing')">
                      <optgroup label="من فضلك أختر ألاشعة ">
                      <option>...............</option>
                                                                    @if($xrays && $xrays -> count() > 0)
                                                                        @foreach($xrays as $xray)
                                                                       
                                                                            <option 
                                                                                value="{{$xray -> id }}">{{$xray -> name}}
                                                                              </option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('fxray_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput2"><h3>ألسعر</h3>  </label>
                                                            <select  style="height:48px;" name="fx_price_id" id="fx_price_id" class="select form-control">
                                                               

                                                               
                                                            </select>
                                                            @error('fx_price_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                </div>         

                                                        <input type="hidden" name="fdoctor_id" value="{{auth('f_doctor') -> user() -> id}}">
                                                        <input type="hidden" name="fappoemint_id" value="{{$appoemint ->id}}">
                                                        <input type="hidden" name="user_id" value="{{$appoemint ->user->id}}">  
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
                                            <tr class="table-secondary">  
                                                <th scope="col">أسم ألاشعة</th>
                                                <th scope="col">ألسعر</th>
                                                <th scope="col">ألاجمالي</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_xrays as $user_xray)
                                            <?php $i = 1*$user_xray->fxray->price; ?>
                                                <tr style='text-align:center;vertical-align:middle'>
                                               
                                                    <td>{{$user_xray->fxray->name}}</td>
                                                 
                                                    <td>{{$user_xray->fxray->price}}</td>
                                                    <td >{{$i}} </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>


                                <div class="tab-pane " id="tab9">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('f_doctor.sikss.upphar' ) }}" enctype="multipart/form-data">
                                            @csrf
                                               
                                            <div class="row col-12 ">
                                                    
                                            <div class="col-md-4">
                                                        <div class="form-group">
              <label for="projectinput2"><h3>من فضلك أختر ألدواء</h3>   </label>
                 <select style="height:48px;" name="fpharmice_id" id="fpharmice_id" class="select form-control"
                   onchange="console.log('change is firing')">
                      <optgroup label="من فضلك أختر ألدواء">
                      <option>...............</option>
                                                                    @if($pharmice && $pharmice -> count() > 0)
                                                                        @foreach($pharmice as $_pharmice)
                                                                       
                                                                            <option 
                                                                                value="{{$_pharmice -> id }}">{{$_pharmice -> name}}
                                                                              </option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('fpharmice_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput2"><h3>ألسعر</h3>  </label>
                                                            <select  style="height:48px;" name="fphar_price_id" id="fphar_price_id" class="select form-control">
                                                               

                                                               
                                                            </select>
                                                            @error('fphar_price_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                </div>        
                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألكمية </label>
                                                            <input type="number" value="" id="qun"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="qun">
                                                            @error("qun")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div> 
                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> طريقة ألاستخدام </label>
            <textarea class="form-control" rows="2"  name="way_use" id="way_use"  placeholder="Enter message.."></textarea>
            @error("way_use")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                

                                                        <input type="hidden" name="fdoctor_id" value="{{auth('f_doctor') -> user() -> id}}">
                                                        <input type="hidden" name="fappoemint_id" value="{{$appoemint ->id}}">
                                                        <input type="hidden" name="user_id" value="{{$appoemint ->user->id}}">  
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
                                            <tr class="table-secondary">  
                                                <th scope="col">أسم ألدواء</th>
                                                <th scope="col">ألكمية</th>
                                                <th scope="col">طريقة ألاستخدام</th>
                                                <th scope="col">ألسعر</th>
                                                <th scope="col">ألاجمالي</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_medicens as $user_medicen)
                                            <?php $i = $user_medicen->qun*$user_medicen->fpharmice->price; ?>
                                                <tr style='text-align:center;vertical-align:middle'>
                                               
                                                    <td>{{$user_medicen->fpharmice->name}}</td>
                                                    <td>{{$user_medicen->qun}}</td>
                                                    <td>{{$user_medicen->way_use}}</td>
                                                    <td>{{$user_medicen->fpharmice->price}}</td>
                                                    
                                                    <td >{{$i}} </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                

                                <div class="tab-pane " id="tab6">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('f_doctor.sikss.updia' ) }}" enctype="multipart/form-data">
                                            @csrf
                                               
                                            <div class="row col-12 ">
                                                    
                                            
                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> تشخيص ألحالة المرضية للمريض </label>
            <textarea class="form-control" rows="2"  name="diago" id="diago"  placeholder="Enter message.."></textarea>
            @error("way_use")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                </div>
                                                <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> أكتب  تنبية أو نصيحة للمريض </label>
            <textarea class="form-control" rows="2"  name="revew" id="revew"  placeholder="Enter message.."></textarea>
            @error("way_use")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                </div>
                                                </div>

                                                        <input type="hidden" name="fdoctor_id" value="{{auth('f_doctor') -> user() -> id}}">
                                                        <input type="hidden" name="fappoemint_id" value="{{$appoemint ->id}}">
                                                        <input type="hidden" name="user_id" value="{{$appoemint ->user->id}}">  
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
                                            <tr class="table-secondary">  
                                                <th scope="col">تشخيص حالة ألمريض</th>
                                                <th scope="col">أرشادات ألطبيب</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_diagnos as $user_diagno)
                                           
                                                <tr style='text-align:center;vertical-align:middle'>
                                               
                                                    <td>{{$user_diagno->diago}}</td>
                                                    <td>{{$user_diagno->revew}}</td>
                                                   
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                               
													<div class="tab-pane active" id="tab4">
													<div class="table-responsive mt-15">
                                                    <div class="card mb-12  text-left  justify-content-center " style=" margin-top: 10px;">
  <div class="row no-gutters">
     
  @if($user && $user -> count() > 0)
    @foreach($user as $yy)
    <div class="col-md-4 text-center">
    <img
                                                        src="{{ $yy-> photo}}"
                                                        class="rounded-circle  height-150" style="width: 200px;" alt="صورة ألمريض  ">
    </div>
    
    <div class="col-md-4">
      <div class="card-body">
        <h4 class="card-title"><label class="control-label">  {{ $yy-> id}} </label> <label class="control-label">:   ألرقم ألطبي  </label>   </h4>
        <h5 class="card-title"> <label class="control-label">   {{$yy-> age}}</label> <label class="control-label">:  ألعمر </label>    </h5>
        <h5 class="card-title"> <label class="control-label">   {{$yy-> sex}}</label>   <label class="control-label">:  ألجنس </label>   </h5>
        <h5 class="card-title"> <label class="control-label">   {{ $yy-> socia}}</label>  <label class="control-label">:  ألحالة ألأجتماعية </label>    </h5>
        <h5 class="card-title"> <label class="control-label">  {{$yy-> blood->blood_typ}}</label>  <label class="control-label">:  فصيلة ألدم  </label>    </h5>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title"> <label class="control-label">   {{ $yy-> name}}</label>  <label class="control-label">:  ألاسم </label>   </h5>
        <h5 class="card-title"> <label class="control-label">  {{$yy-> mobile}}</label><label class="control-label">:   رقم ألهاتف </label>  </h5>
        <h5 class="card-title"> <label class="control-label">    {{ $yy-> email}}</label> <label class="control-label">:  ألائيميل </label> </h5>
        <h5 class="card-title"> <label class="control-label">  {{ $yy-> cuontry->name}} - {{$yy-> city->name}} - {{$yy->address}}</label>  <label class="control-label">:  ألعنوان </label>   </h5>
        
      </div>
      @endforeach
                                                                    @endif
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
											
											
                                                    <tr>
													<?php $i++; ?>
                                <td>{{ $i }}</td>
													<td>{{$appoemint -> id}}</td> 
													<td>{{$appoemint ->user-> name}}</td>
													<td>{{$appoemint ->fdoctor-> doc_name}}</td>
													<td>{{$appoemint ->fspecialty-> special_name}}</td>
													<td>{{$appoemint ->fdepartment-> dept_name}}</td>
													<td>{{$appoemint ->fserve-> serv_name}}</td>
													<td>{{$appoemint ->fdoctor_serve-> price}}</td>
													
														
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
								
                                     
                                    
    </div>
    

									</div>
									
									
									
									
									
										
<!-- Prism Code -->





		<!-- main-content closed -->
@endsection
@section('script')

<script>
        $(function(){
            $(document).on('change','#fpharmice_id', function(){
                populatePhar_prices();
             return false;
            });
            function  populatePhar_prices(){
                $('option', $('#fphar_price_id')).remove();
                $('#fphar_price_id').append($('<option></option>').val('').html());
                var pId = $('#fpharmice_id').val() != null ? $('#fpharmice_id').val() : '{{old('fpharmice_id')}}';
                $.get("{{Route('f_doctor.sikss.pprice')}}",{fpharmice_id: pId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('fphar_price_id')}}' ? "selected" : "";
                   $('#fphar_price_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
    </script>

<script>
        $(function(){
            $(document).on('change','#flabe_id', function(){
                populateLab_prices();
             return false;
            });
            function  populateLab_prices(){
                $('option', $('#flabe_price_id')).remove();
                $('#flabe_price_id').append($('<option></option>').val('').html());
                var labeId = $('#flabe_id').val() != null ? $('#flabe_id').val() : '{{old('flabe_id')}}';
                $.get("{{Route('f_doctor.sikss.getprice')}}",{flabe_id: labeId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('flabe_price_id')}}' ? "selected" : "";
                   $('#flabe_price_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
    </script>

<script>
        $(function(){
            $(document).on('change','#fxray_id', function(){
                populateXray_prices();
             return false;
            });
            function  populateXray_prices(){
                $('option', $('#fx_price_id')).remove();
                $('#fx_price_id').append($('<option></option>').val('').html());
                var xId = $('#fxray_id').val() != null ? $('#fxray_id').val() : '{{old('fxray_id')}}';
                $.get("{{Route('f_doctor.sikss.xprice')}}",{fxray_id: xId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('fx_price_id')}}' ? "selected" : "";
                   $('#fx_price_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
    </script>



    


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

@stop