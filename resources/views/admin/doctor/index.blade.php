@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> {{trans('doctor_trans.Doctors')}}  </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('doctor_trans.Dashbord')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{trans('doctor_trans.Doctors')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('doctor_trans.All Doctors')}} </h4>
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
                                            <thead class="">
                                            <tr>
                                                <th>{{trans('doctor_trans.Doctor Neme')}}</th>
                                                <th> {{trans('doctor_trans.Doctor photo')}}</th>
                                                <th>  {{trans('doctor_trans.Email')}}</th>
                                                <th>{{trans('doctor_trans.Specialty')}}</th>
                                                <th>{{trans('doctor_trans.Department')}} </th>
                                                <th>{{trans('doctor_trans.Address')}}</th>
                                                <th>{{trans('doctor_trans.Mobile')}}</th>
                                                <th> {{trans('doctor_trans.statues')}}</th>
                                                <th>{{trans('doctor_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($doctors)
                                                @foreach($doctors as $doctor)
                                                    <tr>
                                                        <td>{{$doctor -> doc_name}}</td>
                                                        <td><img style="width: 150px; height: 100px;"
                                                                 src="{{$doctor -> 	photo}}"></td>
                                                                 <td>{{$doctor -> email}}</td>
                                                        <td> {{$doctor -> 	specialty -> special_name}}</td>
                                                        <td> {{$doctor -> 	department -> dept_name}}</td>
                                                        <td >{{$doctor ->cuontry -> name}}-{{$doctor ->city -> name}}-{{$doctor ->address}}</td>
                                                        <td>{{$doctor -> mobile}}</td>
                                                        <td>  @if ($doctor -> active == 1)
                                                               <span class="badge badge-pill badge-success">{{$doctor -> getActive()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$doctor -> getActive()}}</span>@endif</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.doctors.edit',$doctor ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('doctor_trans.Edite')}}</a>


                                                                <a href="{{route('admin.doctors.delete',$doctor ->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('doctor_trans.Delete')}}</a>


                                                               


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
