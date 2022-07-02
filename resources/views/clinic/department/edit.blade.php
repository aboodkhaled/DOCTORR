@extends('layouts.hosbital')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('hosbital.dashboard')}}">{{trans('dept_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('hosbital.departments')}}"> {{trans('dept_trans.Show hospitale departments')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('dept_trans.Edite departments')}} {{$hdepartment -> dept_name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('dept_trans.Edite departments')}}  </h4>
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
                                        <form class="form" action="{{route('hosbital.departments.update', $hdepartment -> id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$hdepartment -> id}}">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$hdepartment -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألقسم  ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>  {{trans('dept_trans.dept_Photo')}} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('dept_trans.departments information')}} </h4>
                                                  
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('dept_trans.dept_Neme_ar')}}   </label>
                                                            <input type="text" id="dept_name"
                                                                   class="form-control"
                                                                   placeholder=" "
                                                                   value="{{$hdepartment -> getTranslation('dept_name','ar')}}"
                                                                   name="dept_name">
                                                            @error('dept_name')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('dept_trans.dept_Neme_en')}}  </label>
                                                            <input type="text" id="dept_name_en"
                                                                   class="form-control"
                                                                   placeholder=" "
                                                                   value="{{$hdepartment -> getTranslation('dept_name','en')}}"
                                                                   name="dept_name_en">
                                                            @error('dept_name_en')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    </div>
                                                   
                                                    

                                               

                                                    <div class="col-md-12">
                                                  <div class="form-group">
                                                           <label for="dept_des">{{trans('dept_trans.dept_Description_ar')}} </label>
                                                                 <textarea class="form-control" id="dept_des" rows="3" placeholder="ادخل  ألوصف" name="dept_des"
                                                                 value="{{ $hdepartment->getTranslation('dept_des', 'ar') }}">{{ $hdepartment->getTranslation('dept_des', 'ar') }}</textarea>
                                                                 
                                                            @error('dept_des')
                                                            <span class="text-danger">هذا الحقل مطلوب </span>
                                                            @enderror
                                                   </div>
                                                </div>

                                                
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                           <label for="dept_des_en"> {{trans('dept_trans.dept_Description_en')}} </label>
                                                                 <textarea class="form-control" id="dept_des_en" rows="3" placeholder="ادخل  ألوصف" name="dept_des_en" 
                                                                 value="{{ $hdepartment->getTranslation('dept_des', 'en') }}">{{ $hdepartment->getTranslation('dept_des', 'en') }}</textarea>
                                                                 
                                                            @error('dept_des_en')
                                                            <span class="text-danger">هذا الحقل مطلوب </span>
                                                            @enderror
                                                   </div>
                                                </div>

                                                </div>
                                                
                                            


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"  value="1" name="department[0][active]"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                  @if($hdepartment -> active == 1) checked @endif/>
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
                                                    <i class="ft-x"></i>  {{trans('dept_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('dept_trans.Edite')}}
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
