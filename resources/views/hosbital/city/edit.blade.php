@extends('layouts.hosbital')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('hosbital.dashboard')}}">{{trans('city_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('hosbital.cities.index')}}"> {{trans('city_trans.Cities')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('city_trans.Edite City')}} {{$hcity -> name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('city_trans.Edite City')}}</h4>
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
                                        <form class="form" action="{{route('hosbital.cities.update', $hcity -> id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('city_trans.City information')}} </h4>
                                                  
                                                <div class="row">

                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{trans('city_trans.Chose Country name')}} </label>
                                                            <select name="hcuontry_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألدولة ">
                                                                    @if($hcuontry && $hcuontry -> count() > 0)
                                                                        @foreach($hcuontry as $_cuontry)
                                                                            <option
                                                                            value="{{$_cuontry -> id }}"
                                                                                @if($hcity -> hcuontry_id == $_cuontry -> id) selected @endif
                                                                                >{{$_cuontry -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('hcuontry_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('city_trans.City_Neme_ar')}}  </label>
                                                            <input type="text" value="{{$hcity -> name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم ألمدينة  "
                                                                   name="name">
                                                            @error('name')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   



                                                   
                                                    

                                                    
                                                </div>

                                                   

                                                </div>
                                                
                                            


                                                
                                                
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>  {{trans('city_trans.Backe')}} 
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>  {{trans('city_trans.Save')}} 
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
