@extends('layouts.admin')

@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{trans('phar_trans.Dashbord')}}  </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.fhosbitals.index')}}">{{trans('phar_trans.Pharmacies')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('phar_trans.Edite Pharmacy')}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('phar_trans.Edite Pharmacy')}} </h4>
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
                                        <form class="form col-md-12 " action="{{route('admin.fhosbitals.update' ,$hosbital -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$hosbital -> id}}">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$hosbital -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألصيدلية  ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> {{trans('phar_trans.Pharmacy photo')}}</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" value="" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('phar_trans.Pharmacy information')}} </h4>
                                                <div class="row col-12 ">
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{trans('phar_trans.Pharmacy_Neme_ar')}}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$hosbital -> name}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('phar_trans.Email')}}
                                                            </label>
                                                            <input type="email" id="email"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$hosbital -> email}}"
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('phar_trans.Mobile')}} </label>
                                                            <input type="number" value="{{$hosbital -> mobile}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="mobile">
                                                            @error("mobile")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="row col-12 ">
                                                    <div class="col-4 col-sm-4 py-6">
                                                    <div class="form-group">
                                                    <label for="projectinput1"> {{trans('phar_trans.Subscribe Date')}} </label>
                                                     <input type="date"value="{{$hosbital -> sup_date}}" name="sup_date" class="form-control">
                                                            
                                                            @error("sup_date")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>
                                                      </div>

                                                      <div class="col-4 col-sm-4 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('phar_trans.Subscribe Price')}}</label>
                                                            <input type="number" value="{{$hosbital -> sup_price}}" id="sup_price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="sup_price">
                                                            @error("sup_price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-4 col-sm-4 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('phar_trans.The paid')}} </label>
                                                            <input type="number" value="{{$hosbital -> suppay_price}}" id="suppay_price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="suppay_price">
                                                            @error("suppay_price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="row col-12 ">
                                                    <div class="col-6 col-sm-6 py-6">
                  <label for="projectinput1">  {{trans('phar_trans.Time of paid')}} </label>
                     <input type="time" value="{{$hosbital -> pay_time}}" class="form-control" id="pay_time" name="pay_time" value="">
                     @error("pay_time")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                  </div>
                  <div class="col-6 col-sm-6 py-6">
                                                    <div class="form-group">
                                                    <label for="projectinput1"> {{trans('phar_trans.Date of paid')}} </label>
                                                     <input type="date" value="{{$hosbital -> pay_date}}" name="pay_date" class="form-control">
                                                            
                                                            @error("pay_date")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>
                                                      </div>
                                                      </div>

                                                      <div class="row col-12 ">
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('phar_trans.Chose Cuontry')}} </label>
                                                            <select name="cuontry_id" id="cuontry_id" class="select form-control"
                                                            onchange="console.log('change is firing')"><label for="projectinput2"> أختر ألدولة </label>
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                  
                                                                        @foreach($cuontrys as $cuontry)
                                                                            <option
                                                                                value="{{$cuontry -> id }}"
                                                                                @if($hosbital -> cuontry_id == $cuontry -> id) selected @endif
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
                                                            <label for="projectinput2"> {{trans('phar_trans.Chose City')}} </label>
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
                                                            <label for="projectinput1">  {{trans('phar_trans.Enter_street_address_ar')}}
                                                            </label>
                                                            <input type="text" id="address"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$hosbital -> address}}"
                                                                   name="address">
                                                            @error("address")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   
                                                    </div>

                                                    
                                                </div>

                                                <div class="row">

                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('phar_trans.Password')}}
                                                            </label>
                                                            <input type="password" id="password"
                                                            value="{{$hosbital -> password}}"
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
                                                            <label for="projectinput1">  {{trans('phar_trans.Password confirmation')}}
                                                            </label>
                                                            <input type="password" id=""
                                                            value="{{$hosbital -> password}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>

                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> {{trans('doctor_trans.Doctor_Descripion_ar')}} </label>
            <textarea class="form-control" rows="2"  name="des" id="des"   value="{{$hosbital -> des}}"  placeholder="Enter message.."></textarea>
            @error("doc_des")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                </div>
                                                
                                                </div>


                                                    <div class="col-6 col-sm-6 py-6 ">
                                                    <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('phar_trans.statues')}} </label>
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($hosbital -> active  == 1 ) checked @endif
                                                                   />
                                                           
                                                            @error("active")
                                                            <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-6 py-6 ">
                                                <label for="switcheryColor4"
                                                                   class="card-title ">{{trans('phar_trans.statuse of paid')}}  </label>
                                                        <div class="form-group mt-1">
                                                            <input type="radio" value="0"
                                                                   name="status"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   unchecked
                                                                   @if($hosbital -> status  == 0 ) unchecked @endif
                                                                   />
                                                           

                                                            @error("status")
                                                            <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{trans('phar_trans.Backe')}} 
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('phar_trans.Save')}} 
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
                $.get("{{Route('admin.fhosbitals.getcity')}}",{cuontry_id: cuontryId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('city_id')}}' ? "selected" : "";
                   $('#city_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
        
            
    
       
    </script>
   


@stop
