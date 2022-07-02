@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('cuontry_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.plases.index')}}"> {{trans('cuontry_trans.Cuontries')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('cuontry_trans.Edite Cuontry')}}   {{$plase -> name}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{trans('cuontry_trans.Edite Cuontry')}} </h4>
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
                                        <form class="form" action="{{route('admin.plases.update', $plase -> id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('cuontry_trans.Cuontry information')}}</h4>
                                                  
                                                <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('cuontry_trans.Cuontry_Neme_ar')}}   </label>
                                                            <input type="text" value="{{$plase -> name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم ألدولة بالعربي "
                                                                   name="name">
                                                            @error('name')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   


                                                    <div class="row col-12 ">
                                                   

                                                   
                                                    

                                                    
                                                </div>

                                                   

                                                </div>
                                                
                                            


                                                
                                                
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>  {{trans('cuontry_trans.Backe')}} 
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>  {{trans('cuontry_trans.Save')}} 
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
