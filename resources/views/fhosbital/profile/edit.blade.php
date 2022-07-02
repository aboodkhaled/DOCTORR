@extends('layouts.hosbital')

@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{trans('hosb_trans.Dashbord')}}  </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{Route('doctor.dashboard')}}">{{trans('hosb_trans.Hosbitales')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('hosb_trans.Edite Hosbitale')}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('hosb_trans.Edite Hosbitale')}} </h4>
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
                                        <form class="form col-md-12 " action="{{route('hosbital.update.profile')}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$hosbitals -> id }}">
                                                <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$hosbitals -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألطبيب  ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>{{trans('hosb_trans.Hosbitale photo')}}</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('hosb_trans.Hosbitale information')}} </h4>
                                                <div class="row col-12 ">
                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{trans('hosb_trans.Hosbitale_Neme_ar')}}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$hosbitals -> name}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('hosb_trans.Email')}}
                                                            </label>
                                                            <input type="email" id="email"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$hosbitals -> email}}"
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-3 col-sm-3 py-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('hosb_trans.Mobile')}} </label>
                                                            <input type="number" value="{{$hosbitals -> mobile}}" id="name"
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
                                                            <label for="projectinput2">  {{trans('hosb_trans.Chose Cuontry')}} </label>
                                                            <select name="cuontry_id" id="cuontry_id" class="select form-control"
                                                            onchange="console.log('change is firing')"><label for="projectinput2"> أختر ألدولة </label>
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                  
                                                                        @foreach($cuontrys as $cuontry)
                                                                            <option
                                                                                value="{{$cuontry -> id }}"
                                                                                @if($hosbitals -> cuontry_id == $cuontry -> id) selected @endif
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
                                                                   value="{{$hosbitals -> address}}"
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
                                                            <label for="projectinput1">  {{trans('hosb_trans.Password')}}
                                                            </label>
                                                            <input type="password" id="password"
                                                            value="{{$hosbitals -> password}}"
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
                                                            <label for="projectinput1">  {{trans('hosb_trans.Password confirmation')}}
                                                            </label>
                                                            <input type="password" id=""
                                                            value="{{$hosbitals -> password}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>

                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> {{trans('hosb_trans.Hosbitale_Descripion_ar')}} </label>
            <textarea class="form-control" rows="2"  name="des" id="des"   value="{{$hosbitals -> des}}"  placeholder="Enter message.."></textarea>
            @error("doc_des")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                </div>
                                                

                                                   

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
                                                    <i class="ft-x"></i> {{trans('hosb_trans.Backe')}} 
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('hosb_trans.Save')}} 
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
