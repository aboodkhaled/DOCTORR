@extends('layouts.clinic')

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
                                <li class="breadcrumb-item"><a href="{{Route('clinic.dashboard')}}">{{trans('phar_trans.Pharmacies')}} </a>
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
                                @include('clinic.alert.success')
                                @include('clinic.alert.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form col-md-12 " action="{{route('clinic.update.profile')}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$clinics -> id }}">
                                                <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$clinics -> photo}}"
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
                                                                   value="{{$clinics -> getTranslation('name','ar')}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{trans('phar_trans.Pharmacy_Neme_en')}}
                                                            </label>
                                                            <input type="text" id="name_en"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$clinics -> getTranslation('name','en')}}"
                                                                   name="name_en">
                                                            @error("name_en")
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
                                                                   value="{{$clinics -> email}}"
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('phar_trans.Mobile')}} </label>
                                                            <input type="number" value="{{$clinics -> mobile}}" id="name"
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
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('phar_trans.Chose Cuontry')}} </label>
                                                            <select name="plase_id" id="plase_id" class="select form-control"
                                                            onchange="console.log('change is firing')"><label for="projectinput2"> أختر ألدولة </label>
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                  
                                                                        @foreach($plases as $plase)
                                                                            <option
                                                                                value="{{$plase -> id }}"
                                                                                @if($clinics -> plase_id == $plase -> id) selected @endif
                                                                                {{$plase -> name}}>{{$plase -> name}}</option>
                                                                        @endforeach
                                                                   
                                                                </optgroup>
                                                            </select>
                                                            @error('plase_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('phar_trans.Enter_street_address_ar')}}
                                                            </label>
                                                            <input type="text" id="address"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$clinics -> getTranslation('address','ar')}}"
                                                                   name="address">
                                                            @error("address")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('phar_trans.Enter_street_address_en')}}
                                                            </label>
                                                            <input type="text" id="address_en"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$clinics -> getTranslation('address','en')}}"
                                                                   name="address_en">
                                                            @error("address_en")
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
                                                            value="{{$clinics -> password}}"
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
                                                            value="{{$clinics -> password}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation" >
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
