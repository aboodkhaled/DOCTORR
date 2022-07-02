@extends('layouts.h_doctor')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{Route('h_doctor.dashboard')}}">الرئيسية </a>
                                </li>

                                <li class="breadcrumb-item active"> الملف الشخصي
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل بيانات الملف الشخصي </h4>
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
                                @include('h_doctor.alert.success')
                                @include('h_doctor.alert.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('h_doctor.update.profile')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-body">

                                                <input type="hidden" name="id" value="{{$hdoctors -> id }}">
                                                <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$hdoctors -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألطبيب  ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> صورة ألطبيب </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="row col-12 ">
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{trans('doctor_trans.Doctor_Neme_ar')}}</label>
                                                            <input type="text" value="{{$hdoctors ->doc_name}}" id="name"
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
                                                            <input type="number" value="{{$hdoctors -> mobile}}" id="name"
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
                                                                   value="{{$hdoctors -> email}}"
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
                                                            <input type="text" value="{{$hdoctors ->doc_degry}}" id="name"
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
                                                     <input type="date" value="{{$hdoctors -> perth_date}}" name="perth_date" class="form-control">
                                                            
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
                                                                <option value="male" @if($hdoctors ->sex == 'male' ) selected @endif>ذكر</option>
                                                                    <option value="female"@if($hdoctors ->sex == 'female' ) selected @endif>أنثئ</option>
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
                                                            <select name="hcuontry_id" id="hcuontry_id" class="select form-control"
                                                            onchange="console.log('change is firing')"><label for="projectinput2"> {{trans('doctor_trans.Chose Cuontry')}}</label>
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                  
                                                                @foreach($hcuontrys as $hcuontry)
                                                                            <option
                                                                                value="{{$hcuontry -> id }}"
                                                                                @if($hdoctors -> hcuontry_id == $hcuontry -> id) selected @endif
                                                                                {{$hcuontry -> name}}>{{$hcuontry -> name}}</option>
                                                                        @endforeach
                                                                   
                                                                </optgroup>
                                                            </select>
                                                            @error('hcuontry_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{trans('doctor_trans.Chose City')}}  </label>
                                                            <select name="hcity_id" id="hcity_id" class="select form-control">
                                                                <optgroup label="من فضلك أختر ألمدينة ">
                                                                   
                                                                @foreach($hcitys as $hcity)
                                                                            <option
                                                                                value="{{$hcity -> id }}"
                                                                                @if($hdoctors -> hcity_id == $hcity -> id) selected @endif
                                                                                {{$hcity -> name}}>{{$hcity -> name}}</option>
                                                                        @endforeach 
                                                                       
                                                                </optgroup>
                                                            </select>
                                                            @error('hcity_id')
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
                                                                   value="{{$hdoctors -> address}}"
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
                                                            <select name="hdepartment_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($hdepartments && $hdepartments -> count() > 0)
                                                                    @foreach($hdepartments as $hdepartment)
                                                                            <option
                                                                                value="{{$hdepartment -> id }}"
                                                                                @if($hdoctors -> hdepartment_id == $hdepartment -> id) selected @endif
                                                                                {{$hdepartment -> dept_name}}>{{$hdepartment -> dept_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('hdepartment_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('doctor_trans.Chose Specialty')}}</label>
                                                            <select name="hspecialty_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألتخصص ">
                                                                    @if($hspecialtys && $hspecialtys -> count() > 0)
                                                                        @foreach($hspecialtys as $hspecialty)
                                                                        <option
                                                                                value="{{$hspecialty -> id }}"
                                                                                @if($hdoctors -> hspecialty_id == $hspecialty -> id) selected @endif
                                                                                {{$hspecialty -> special_name}}>{{$hspecialty -> special_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('hspecialty_id')
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
                                                                   value=""
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
                                                                   value=""
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> {{trans('doctor_trans.Doctor_Descripion_ar')}} </label>
            <textarea class="form-control" rows="2"  name="doc_des" id="doc_des"   value="{{$hdoctors ->doc_des}}"  placeholder="Enter message..">{{$hdoctors -> doc_des}}</textarea>
            @error("doc_des")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                </div>
                                                




                                               
                                                



                                               
                                                <div class="row">
                                                    
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


@stop
@section('script')

<script>
        $(function(){
            $(document).on('change','#hcuontry_id', function(){
             populateHcities();
             return false;
            });
            function  populateHcities(){
                $('option', $('#hcity_id')).remove();
                $('#hcity_id').append($('<option></option>').val('').html());
                var hcuontryId = $('#hcuontry_id').val() != null ? $('#hcuontry_id').val() : '{{old('hcuontry_id')}}';
                $.get("{{Route('h_doctor.doctors.getcity')}}",{hcuontry_id: hcuontryId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('hcity_id')}}' ? "selected" : "";
                   $('#hcity_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
        
            
    
       
    </script>


   
   


@stop