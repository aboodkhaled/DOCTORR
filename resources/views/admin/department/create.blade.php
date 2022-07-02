@extends('layouts.admin')
@section('style')
    @toastr_css
@STOP

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('dept_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.departments')}}">{{trans('dept_trans.hospitale departments')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('dept_trans.Add departments')}} 
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('dept_trans.Add departments')}}  </h4>
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
                                        <form class="form" action="{{route('admin.departments.save')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label> {{trans('dept_trans.dept_Photo')}} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('dept_trans.departments information')}}  </h4>
                                                   
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label    for="dept_name"> {{trans('dept_trans.dept_Neme_ar')}}  </label>
                                                            <input type="text" value="" id="dept_name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم ألقسم  "
                                                                   name="dept_name">
                                                            @error('dept_name')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                   
                                                    

                                                   
                                                </div>

                                                    <div class="col-md-12">
                                                  <div class="form-group">
                                                           <label for="dept_des">{{trans('dept_trans.dept_Description_ar')}} </label>
                                                                 <textarea class="form-control" id="dept_des" rows="3" placeholder="ادخل  ألوصف" name="dept_des"></textarea>
                                                                 
                                                            @error('dept_des')
                                                            <span class="text-danger">هذا الحقل مطلوب </span>
                                                            @enderror
                                                   </div>
                                                </div>

                                                
                                               

                                                </div>
                                                
                                            


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"  value="1" name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('dept_trans.statues')}} </label>

                                                            @error('active')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{trans('dept_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('dept_trans.Save')}}
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
    
    @toastr_js
    @toastr_render
@endsection