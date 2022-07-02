@extends('layouts.hosbital')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{trans('user_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">
                                {{trans('user_trans.Users')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{trans('user_trans.Add Users')}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('user_trans.Add Users')}} </h4>
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
                                @include('hosbital.alert.success')
                                @include('hosbital.alert.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('hosbital.users.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>{{trans('user_trans.Users PHoto')}} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" value="{{old('photo')}}" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('user_trans.Users information')}}</h4>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('user_trans.User_Neme_ar')}}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('user_trans.User_Neme_en')}}
                                                            </label>
                                                            <input type="text" id="name_en"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="name_en">
                                                            @error("name_en")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('user_trans.Email')}}
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
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('hosb_trans.Mobile')}} </label>
                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="mobile">
                                                            @error("mobile")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                   

                                                </div>

                                                <div class="row">
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('user_trans.Chose permesin')}}
                                                            </label>
                                                            <select name="role_id" class="select2 form-control" >
                                                                <optgroup label="من فضلك أختر الصلاحية ">
                                                                    @if($roles && $roles -> count() > 0)
                                                                        @foreach($roles as $role)
                                                                            <option
                                                                                value="{{$role -> id }}">{{$role -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('role_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('user_trans.Password')}}
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
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('user_trans.Password confirmation')}}
                                                            </label>
                                                            <input type="password" id=""
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>

                                                    <div class="row col-12 ">
                                                    <div class="col-4 col-sm-4 py-6">
                                                    <div class="form-group">
                                                    <label for="projectinput1">ألتاريخ </label>
                                                     <input type="date" name="sup_date" class="form-control">
                                                            
                                                            @error("sup_date")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>
                                                      </div>
                                                      
                                                    </div>

                                                    
                                                      
                                                     
                                                     
                                                    </div>
                                                    <div class="row col-12 ">
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('hosb_trans.Chose Cuontry')}} </label>
                                                            <select name="cuontry_id" id="cuontry_id" class="select form-control"
                                                            onchange="console.log('change is firing')"><label for="projectinput2"> أختر ألدولة </label>
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                  
                                                                        @foreach($cuontrys as $cuontry)
                                                                            <option
                                                                                value="{{$cuontry -> id }}">{{$cuontry -> name}}</option>
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
                                                            <label for="projectinput2"> {{trans('hosb_trans.Chose City')}} </label>
                                                            <select name="city_id" id="city_id" class="select form-control">
                                                                <optgroup label="من فضلك أختر ألمدينة ">
                                                                   
                                                                        
                                                                       
                                                                </optgroup>
                                                            </select>
                                                            @error('city_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('hosb_trans.Enter_street_address_ar')}}
                                                            </label>
                                                            <input type="text" id="address"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value=""
                                                                   name="address">
                                                            @error("address")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('hosb_trans.Enter_street_address_en')}}
                                                            </label>
                                                            <input type="text" id="address_en"
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

                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{trans('user_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('user_trans.Save')}}
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
        $('input:radio[name="type"]').change(
            function () {
                if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                    $('#cats_list').removeClass('hidden');

                } else {
                    $('#cats_list').addClass('hidden');
                }
            });
    </script>

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
                $.get("{{Route('hosbital.hosbitals.getcity')}}",{cuontry_id: cuontryId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('city_id')}}' ? "selected" : "";
                   $('#city_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
        
            
    
       
    </script>
   
@stop
