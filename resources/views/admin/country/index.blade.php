@extends('layouts.admin')

@section('content')


   



    <div class="app-content content">
        
        <div class="content-wrapper">
            <div class="content-header row">
                
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">  {{trans('cuontry_trans.Cuontries')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"> {{trans('cuontry_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item active"> <a href="">{{trans('cuontry_trans.Cuontries')}}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
            <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('cuontry_trans.Add Cuontry')}} </h4>
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
                                        <form class="form" action="{{route('admin.cuontries.store')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('cuontry_trans.Cuontry information')}}</h4>
                                                  
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('cuontry_trans.Cuontry_Neme_ar')}}   </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم ألدولة بالعربي  "
                                                                   name="name">
                                                            @error('name')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('cuontry_trans.Cuontry_Neme_en')}}   </label>
                                                            <input type="text" value="" id="name_en"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم ألدولة بالانجليزي  "
                                                                   name="name_en">
                                                            @error('name_en')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row col-12 ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">       </label>
                                                            <input type="hidden" value="YE" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل كود ألدولة  "
                                                                   name="code">
                                                            @error('code')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">   {{trans('cuontry_trans.Country key')}}     </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل مفتاح ألدوبة  "
                                                                   name="key">
                                                            @error('key')
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
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                
                            <div class="card-header">
                                    <h4 class="card-title">{{trans('cuontry_trans.All Cuontries')}} </h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                            <tr>
                                                <th width="5px">#</th>
                                                <th width="25px"> {{trans('cuontry_trans.Cuontry Neme')}}</th>
                                              <!--  <th width="25px">{{trans('cuontry_trans.Country code')}}</th> -->
                                                <th width="25px"> {{trans('cuontry_trans.Country key')}}</th>
                                                
                                                
                                                <th> {{trans('cuontry_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($cuontrys)
                                                @foreach($cuontrys as $cuontry)
                                                    <tr>
                                                        <td width="5px">{{$cuontry -> id}}</td>
                                                        <td width="25px">{{$cuontry -> name}}</td>
                                                        
                                                     <!--   <td width="10px">{{$cuontry -> code}}</td> -->
                                                        <td width="25px">{{$cuontry -> key}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.cuontries.edit',$cuontry -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('cuontry_trans.Edite')}}</a>


                                                                <a href="{{route('admin.cuontries.delete',$cuontry -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('cuontry_trans.Delete')}}</a>



                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
