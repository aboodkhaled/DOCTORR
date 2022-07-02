@extends('layouts.doctor')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{Route('doctor.dashboard')}}">الرئيسية </a>
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
                                @include('doctor.alert.success')
                                @include('doctor.alert.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('doctor.update.profile')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-body">

                                                <input type="hidden" name="id" value="{{$doctors -> id }}">
                                                <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$doctors -> photo}}"
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

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الاسم </label>
                                                            <input type="text" value="{{$doctors -> doc_name  }}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="doc_name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> البريد  </label>
                                                            <input type="text" value="{{$doctors -> email  }}" id=""
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  كلمة المرور الجديده </label>
                                                            <input type="password" value="" id=""
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> تاكيد كلمة المرور   </label>
                                                            <input type="password" value="" id=""
                                                                   class="form-control"
                                                                   placeholder=" "
                                                                   name="password_confirmation">

                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> شهادات التخرج </label>
                                                            <input type="text" value="{{$doctors -> doc_degry}}" id="name"
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
                                                            <label for="projectinput1"> ألرقم </label>
                                                            <input type="number" value="{{$doctors -> mobile}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="mobile">
                                                            @error("mobile")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6 py-6 wow fadeInLeft" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput1"> تاريخ الميلاد </label>
                                                     <input type="date" value="{{$doctors -> perth_date}}" name="perth_date" class="form-control">
                                                            
                                                            @error("perth_date")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>
                                                      </div>
                                                    
                                                     
                                                    <div class="col-6 col-sm-6 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> ألجنس </label>
                                                            <select name="sex" class="select2 form-control">
                                                                <optgroup label="أختر الجنس من فضلك ">
                                                                <option value="male" @if($doctors ->sex == 'male' ) selected @endif>ذكر</option>
                                                                    <option value="female"@if($doctors ->sex == 'female' ) selected @endif>أنثئ</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('sex')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> أختر ألدولة </label>
                                                            <select name="cuontry_id" id="cuontry_id" class="select form-control"
                                                            onchange="console.log('change is firing')"><label for="projectinput2"> أختر ألدولة </label>
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                  
                                                                @foreach($cuontrys as $cuontry)
                                                                            <option
                                                                                value="{{$cuontry -> id }}"
                                                                                @if($doctors -> cuontry_id == $cuontry -> id) selected @endif
                                                                                {{$cuontry -> name}}>{{$cuontry -> name}}</option>
                                                                        @endforeach
                                                                   
                                                                </optgroup>
                                                            </select>
                                                            @error('cuontry_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> أختر ألمدينة </label>
                                                            <select name="city_id" id="city_id" class="select form-control">
                                                                <optgroup label="من فضلك أختر ألمدينة ">
                                                                   
                                                                @foreach($citys as $city)
                                                                            <option
                                                                                value="{{$city -> id }}"
                                                                                @if($doctors -> city_id == $city -> id) selected @endif
                                                                                {{$city -> name}}>{{$city -> name}}</option>
                                                                        @endforeach 
                                                                       
                                                                </optgroup>
                                                            </select>
                                                            @error('city_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أسم ألحي او ألشارع
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$doctors -> address}}"
                                                                   name="address">
                                                            @error("address")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> أختر القسم </label>
                                                            <select name="department_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($departments && $departments -> count() > 0)
                                                                    @foreach($departments as $department)
                                                                            <option
                                                                                value="{{$department -> id }}"
                                                                                @if($doctors -> department_id == $department -> id) selected @endif
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
                                                            <label for="projectinput2"> أختر ألتخصص </label>
                                                            <select name="specialty_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألتخصص ">
                                                                    @if($specialtys && $specialtys -> count() > 0)
                                                                        @foreach($specialtys as $specialty)
                                                                        <option
                                                                                value="{{$specialty -> id }}"
                                                                                @if($doctors -> specialty_id == $specialty -> id) selected @endif
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
                                                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> وصف الطبيب </label>
            <textarea class="form-control" rows="3" value="{{$doctors -> doc_des}}"  name="doc_des" id=""  placeholder=""></textarea>
            @error("doc_des")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                </div>


                                                </div>


                                            </div>

                                            <div class="form-actions">

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
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
            $(document).on('change','#cuontry_id', function(){
             populateCities();
             return false;
            });
            function  populateCities(){
                $('option', $('#city_id')).remove();
                $('#city_id').append($('<option></option>').val('').html());
                var cuontryId = $('#cuontry_id').val() != null ? $('#cuontry_id').val() : '{{old('cuontry_id')}}';
                $.get("{{Route('doctor.doctors.getcity')}}",{cuontry_id: cuontryId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('city_id')}}' ? "selected" : "";
                   $('#city_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
        
            
    
       
    </script>
   


@stop