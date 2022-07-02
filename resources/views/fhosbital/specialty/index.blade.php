@extends('layouts.fhosbital')

@section('content')


   



    <div class="app-content content">
        
        <div class="content-wrapper">
            <div class="content-header row">
                
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{trans('spechial_trans.hospitale specialties')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('fhosbital.dashboard')}}">{{trans('spechial_trans.Dashbord')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> <a href="">{{trans('spechial_trans.Main hospitale specialties')}}</a>
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('spechial_trans.Add specialty')}} </h4>
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
                                        <form class="form" action="{{route('fhosbital.specialtys.save')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>{{trans('spechial_trans.specialty information')}}  </h4>
                                                  
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('spechial_trans.specialty_Neme_ar')}}   </label>
                                                            <input type="text" value="" id="special_name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم ألتخصص  "
                                                                   name="special_name">
                                                            @error('special_name')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('spechial_trans.specialty_Neme_en')}}   </label>
                                                            <input type="text" value="" id="special_name_en"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم ألتخصص  "
                                                                   name="special_name_en">
                                                            @error('special_name_en')
                                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
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
                                                                   class="card-title ml-1">{{trans('spechial_trans.statues')}} </label>

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
                                                    <i class="ft-x"></i> {{trans('spechial_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('spechial_trans.Save')}}
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
                                    <h4 class="card-title">{{trans('spechial_trans.All hospitale specialties')}}</h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                            <tr>
                                                <th width="5px">{{trans('spechial_trans.specialty_number')}} </th>
                                                <th width="25px">{{trans('spechial_trans.specialty_Neme')}}</th>
                                             
                                                <th width="10px">{{trans('spechial_trans.statues')}}</th>
                                                
                                                <th>{{trans('spechial_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @isset($hspecialtys)
                                                @foreach($hspecialtys as $hspecialty)
                                                    <tr>
                                                    <?php $i++; ?>
                                <td>{{ $i }}</td>
                                                        <td width="25px">{{$hspecialty -> special_name}}</td>
                                                        
                                                        <td width="10px">{{$hspecialty -> getActive()}}</td>
                                                       
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('fhosbital.specialtys.edit',$hspecialty -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('spechial_trans.Edite')}}</a>


                                                                <a href="{{route('fhosbital.specialtys.delete',$hspecialty -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('spechial_trans.Delete')}}</a>


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
