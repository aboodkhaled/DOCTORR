@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> {{trans('servee_trans.Serves Doctors')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('servee_trans.Dashbord')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{trans('servee_trans.Serves Doctors')}}
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
                                    <h4 class="card-title">{{trans('servee_trans.All Serves Doctors')}}</h4>
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
                                                <th>أسم ألمريض</th>
                                                <th> أسم ألطبيب</th>
                                                <th>ألتخصص</th>
                                                <th>أسم ألخدمة</th>
                                                <th>ألسعر</th>
                                                <th>وقت ألطلب</th>
                                                <th>ألاجراءت</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($appoemints)
                                                @foreach($appoemints as $appoemint)
                                                    <tr>
                                                        <td>{{$appoemint -> User -> name}}</td>
                                                        <td>{{$appoemint -> doctor -> doc_name}}</td>
                                                        <td>{{$appoemint -> specialty -> special_name}}</td>
                                                        <td>{{$appoemint -> serve -> serv_name}}</td>
                                                        <td>{{$appoemint -> doctor_serve -> price}}</td>
                                                        <td>{{$appoemint -> created_at->diffForHumans()}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.appoemints.edit',$appoemint ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('servee_trans.Edite')}}</a>


                                                                <a href="{{route('admin.appoemints.delete',$appoemint ->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('servee_trans.Delete')}}</a>

                                                                   <a href="{{route('admin.appoemints.show',$appoemint ->id)}}"
                                                                   class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">{{trans('lab_trans.Detailes Payment')}}</a>


                                                               


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
