@extends('layouts.fhosbital')

@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{trans('doctor_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('fhosbital.doctors')}}">{{trans('doctor_trans.Doctors')}}  </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('doctor_trans.Add Doctor')}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{trans('doctor_trans.Add Doctor')}} </h4>
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
                                @include('fhosbital.alert.success')
                                @include('fhosbital.alert.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form col-md-12 " action="{{route('fhosbital.doctors.save')}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label> {{trans('doctor_trans.Doctor photo')}} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" value="{{old('photo')}}" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            

                                                <h4 class="form-section"><i class="ft-home"></i>  {{trans('doctor_trans.Doctors information')}}</h4>

                                                
                                                <div class="row col-12 ">
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{trans('doctor_trans.Doctor_Neme_ar')}}</label>
                                                            <input type="text" value="{{old('doc_name')}}" id="name"
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
                                                            <label for="projectinput1">{{trans('doctor_trans.Doctor_Neme_en')}}</label>
                                                            <input type="text" value="{{old('doc_name')}}" id="name_en"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="doc_name_en">
                                                            @error("doc_name_en")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-sm-3 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('doctor_trans.Mobile')}} </label>
                                                            <input type="number" value="{{old('mobile')}}" id="name"
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
                                                                   value="{{old('email')}}"
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
                                                            <input type="text" value="{{old('doc_degry')}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="doc_degry">
                                                            @error("doc_degry")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-6 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{trans('doctor_trans.Graduation_Certificate_en')}} </label>
                                                            <input type="text" value="{{old('doc_degry')}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="doc_degry_en">
                                                            @error("doc_degry_en")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    </div>


                                                   
                                                    
                                                    <div class="row col-12 ">
                                                    <div class="col-md-3 py-6">
                                                    <div class="form-group">
                                                    <label for="projectinput1"> {{trans('doctor_trans.Berth date')}} </label>
                                                     <input type="date" name="perth_date" class="form-control">
                                                            
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
                                                                    <option value="male">ذكر</option>
                                                                    <option value="female">أنثئ</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('sex')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{trans('doctor_trans.Chose Cuontry')}} </label>
                                                            <select name="fcuontry_id" id="fcuontry_id" class="select form-control"
                                                            onchange="console.log('change is firing')"><label for="projectinput2"> {{trans('doctor_trans.Chose Cuontry')}} </label>
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                  
                                                                        @foreach($hcuontrys as $hcuontry)
                                                                            <option
                                                                                value="{{$hcuontry -> id }}">{{$hcuontry -> name}}</option>
                                                                        @endforeach
                                                                   
                                                                </optgroup>
                                                            </select>
                                                            @error('fcuontry_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{trans('doctor_trans.Chose City')}} </label>
                                                            <select name="fcity_id" id="fcity_id" class="select form-control">
                                                                <optgroup label="من فضلك أختر ألمدينة ">
                                                                   
                                                                        
                                                                       
                                                                </optgroup>
                                                            </select>
                                                            @error('fcity_id')
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
                                                                   value=""
                                                                   name="address">
                                                            @error("address")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('doctor_trans.Enter_street_address_en')}}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value=""
                                                                   name="address_en">
                                                            @error("address_en")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="row col-12 ">
                                                    <div class="col-12 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{trans('doctor_trans.Chose Department')}} </label>
                                                            <select name="fdepartment_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($hdepartments && $hdepartments -> count() > 0)
                                                                        @foreach($hdepartments as $hdepartment)
                                                                            <option
                                                                                value="{{$hdepartment -> id }}">{{$hdepartment -> dept_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('fdepartment_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('doctor_trans.Chose Specialty')}}</label>
                                                            <select name="fspecialty_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألتخصص ">
                                                                    @if($hspecialtys && $hspecialtys -> count() > 0)
                                                                        @foreach($hspecialtys as $hspecialty)
                                                                            <option
                                                                                value="{{$hspecialty -> id }}">{{$hspecialty -> special_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('fspecialty_id')
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
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> {{trans('doctor_trans.Doctor_Descripion_ar')}} </label>
            <textarea class="form-control" rows="2"  name="doc_des" id="doc_des"  placeholder="Enter message.."></textarea>
            @error("doc_des")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                </div>
                                                <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> {{trans('doctor_trans.Doctor_Descripion_en')}} </label>
            <textarea class="form-control" rows="2"  name="doc_des_en" id="doc_des_en"  placeholder="Enter message.."></textarea>
            @error("doc_des_en")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                </div>



                                               
                                                

                                                   <div class="row col-12 ">

                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
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
            $(document).on('change','#fcuontry_id', function(){
             populateFcities();
             return false;
            });
            function  populateFcities(){
                $('option', $('#fcity_id')).remove();
                $('#fcity_id').append($('<option></option>').val('').html());
                var hcuontryId = $('#fcuontry_id').val() != null ? $('#fcuontry_id').val() : '{{old('fcuontry_id')}}';
                $.get("{{Route('fhosbital.doctors.getcity')}}",{fcuontry_id: hcuontryId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('fcity_id')}}' ? "selected" : "";
                   $('#fcity_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
        
            
    
       
    </script>
   


@stop
