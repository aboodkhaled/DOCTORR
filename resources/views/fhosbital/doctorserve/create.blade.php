@extends('layouts.fhosbital')

@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{trans('servee_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('fhosbital.doctorserves')}}">{{trans('servee_trans.Serves Doctors')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('servee_trans.Add Serves Doctors')}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('servee_trans.Add Serves Doctors')}}</h4>
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
                                        <form class="form col-md-12 " action="{{route('fhosbital.doctorserves.save')}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                           

                                            

                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('servee_trans.Serves Doctors information')}}</h4>

                                                
                                                <div class="row col-12 ">
                                                   
                                                    
                                                    
                                                    
                                                <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{trans('servee_trans.Choose doctor name')}} </label>
                                                            <select name="fdoctor_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألطبيب ">
                                                                    @if($hdoctors && $hdoctors -> count() > 0)
                                                                        @foreach($hdoctors as $hdoctor)
                                                                            <option
                                                                                value="{{$hdoctor -> id }}">{{$hdoctor -> doc_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('fdoctor_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>

                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('servee_trans.Choose serve name')}} </label>
                                                            <select name="fserve_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألخدمة ">
                                                                    @if($hserves && $hserves -> count() > 0)
                                                                        @foreach($hserves as $hserve)
                                                                            <option
                                                                                value="{{$hserve -> id }}">{{$hserve -> serv_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('fserve_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                        <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('servee_trans.Price')}} </label>
                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="price">
                                                            @error("price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    

                                               
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('servee_trans.statues')}} </label>

                                                            @error("active")
                                                            <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                 </div>

                                            </div>
                                            
               

                                            

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{trans('servee_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('servee_trans.Save')}}
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




