@extends('layouts.admin')

@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""> {{trans('doctor_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.doctors')}}">{{trans('doctor_trans.Doctors')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('doctor_trans.Edite Doctor')}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{trans('doctor_trans.Edite Doctor')}}</h4>
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
                                        <form class="form col-md-12 " action="{{route('admin.doctors.update' ,$doctor -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$doctor -> id}}">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$doctor -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألطبيب  ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>{{trans('doctor_trans.Doctor photo')}}</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            

                                                <h4 class="form-section"><i class="ft-home"></i>{{trans('doctor_trans.Doctors information')}}</h4>

                                                
                                                
                                                <div class="row col-12 ">
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{trans('doctor_trans.Doctor_Neme_ar')}}</label>
                                                            <input type="text" value="{{$doctor -> doc_name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="doc_name">
                                                            @error("doc_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                   
                                                    
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('doctor_trans.Mobile')}} </label>
                                                            <input type="number" value="{{$doctor -> mobile}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="mobile">
                                                            @error("mobile")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('doctor_trans.Email')}}
                                                            </label>
                                                            <input type="email" id="email"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$doctor -> email}}"
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="row col-12 ">
                                                    <div class="col-6 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{trans('doctor_trans.Graduation_Certificate_ar')}} </label>
                                                            <input type="text" value="{{$doctor -> doc_degry}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="doc_degry">
                                                            @error("doc_degry")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                    </div>

                                                    
                                                   
                                                    
                                                  
                                                    <div class="row col-12 ">
                                                    <div class="col-md-3 py-6">
                                                    <div class="form-group">
                                                    <label for="projectinput1"> {{trans('doctor_trans.Berth date')}}</label>
                                                     <input type="date" value="{{$doctor -> perth_date}}" name="perth_date" class="form-control">
                                                            
                                                            @error("perth_date")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>
                                                      </div>
                                                    
                                                     
                                                      <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('doctor_trans.Tayp')}} </label>
                                                            <select name="sex" class="select2 form-control">
                                                                <optgroup label="أختر الجنس من فضلك ">
                                                                <option value="male" @if($doctor ->sex == 'male' ) selected @endif>ذكر</option>
                                                                    <option value="female"@if($doctor ->sex == 'female' ) selected @endif>أنثئ</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('sex')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{trans('doctor_trans.Chose Cuontry')}}</label>
                                                            <select name="cuontry_id" id="cuontry_id" class="select form-control"
                                                            onchange="console.log('change is firing')"><label for="projectinput2"> {{trans('doctor_trans.Chose Cuontry')}}</label>
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                  
                                                                @foreach($cuontrys as $cuontry)
                                                                            <option
                                                                                value="{{$cuontry -> id }}"
                                                                                @if($doctor -> cuontry_id == $cuontry -> id) selected @endif
                                                                                {{$cuontry -> name}}>{{$cuontry -> name}}</option>
                                                                        @endforeach
                                                                   
                                                                </optgroup>
                                                            </select>
                                                            @error('cuontry_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{trans('doctor_trans.Chose City')}}  </label>
                                                            <select name="city_id" id="city_id" class="select form-control">
                                                                <optgroup label="من فضلك أختر ألمدينة ">
                                                                   
                                                                @foreach($citys as $city)
                                                                            <option
                                                                                value="{{$city -> id }}"
                                                                                @if($doctor -> city_id == $city -> id) selected @endif
                                                                                {{$city -> name}}>{{$city -> name}}</option>
                                                                        @endforeach 
                                                                       
                                                                </optgroup>
                                                            </select>
                                                            @error('city_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="row col-12 ">
                                                    <div class="col-6 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('doctor_trans.Enter_street_address_ar')}}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$doctor -> address}}"
                                                                   name="address">
                                                            @error("address")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   
                                                    </div>

                                                    <div class="row col-12 ">
                                                    <div class="col-12 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{trans('doctor_trans.Chose Department')}} </label>
                                                            <select name="department_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($departments && $departments -> count() > 0)
                                                                    @foreach($departments as $department)
                                                                            <option
                                                                                value="{{$department -> id }}"
                                                                                @if($doctor -> department_id == $department -> id) selected @endif
                                                                                {{$department -> dept_name}}>{{$department -> dept_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('department_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('doctor_trans.Chose Specialty')}}</label>
                                                            <select name="specialty_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألتخصص ">
                                                                    @if($specialtys && $specialtys -> count() > 0)
                                                                        @foreach($specialtys as $specialty)
                                                                        <option
                                                                                value="{{$specialty -> id }}"
                                                                                @if($doctor -> specialty_id == $specialty -> id) selected @endif
                                                                                {{$specialty -> special_name}}>{{$specialty -> special_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('specialty_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-12 ">
                                                       <div class="col-md-6 py-6">
                                                            <div class="form-group">
                                                                 <label for="projectinput1"> {{trans('doctor_trans.Password')}}
                                                            </label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$doctor -> password}}"
                                                                   name="password">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('doctor_trans.Password confirmation')}}
                                                            </label>
                                                            <input type="password" id=""
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$doctor -> password}}"
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> {{trans('doctor_trans.Doctor_Descripion_ar')}} </label>
            <textarea class="form-control" rows="2"  name="doc_des" id="doc_des"   value="{{$doctor -> doc_des}}"  placeholder="Enter message.."></textarea>
            @error("doc_des")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                </div>
                                                
                                                </div>




                                               
                                                



                                               
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($doctor -> active  == 1 ) checked @endif
                                                                   />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('doctor_trans.statues')}} </label>

                                                            @error("active")
                                                            <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 py-2 ">
                                                    <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{trans('doctor_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('doctor_trans.Save')}}
                                                </button>
                                            </div>
                                                </div>
                                                 </div>

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


@section('script')

   


    <script>
        $(function(){
            $(document).on('change','#cuontry_id', function(){
             populateCities();
             return false;
            });
            function  populateCities(){
                $('option', $('#city_id')).remove();
                $('#city_id').append($('<option></option>').val('').html());
                var cuontryId = $('#cuontry_id').val() != null ? $('#cuontry_id').val() : '{{old('cuontry_id')}}';
                $.get("{{Route('admin.doctors.getcity')}}",{cuontry_id: cuontryId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('city_id')}}' ? "selected" : "";
                   $('#city_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
        
            
    
       
    </script>
   


@stop