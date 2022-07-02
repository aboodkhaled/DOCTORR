
@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{trans('lab_trans.Laboratories')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('lab_trans.Dashbord')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('lab_trans.Laboratories')}}
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
                                    <h4 class="card-title">{{trans('lab_trans.All Laboratories')}}</h4>
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
                                <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.venlabes.create')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('lab_trans.Add Laboratory')}}</a>

                                                            </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th> # </th>
                                                <th>{{trans('lab_trans.Laboratory Neme')}}</th>
                                                <th> {{trans('lab_trans.Laboratory photo')}}</th>
                                                <th>{{trans('lab_trans.Email')}}</th>
                                                <th>{{trans('lab_trans.Mobile')}} </th>
                                                <th >{{trans('lab_trans.Address')}}  </th>
                                                <th>{{trans('lab_trans.Subscribe Date')}} </th>
                                                <th>{{trans('lab_trans.Subscribe Price')}}</th>
                                                <th> {{trans('lab_trans.The paid')}} </th>
                                                <th>{{trans('lab_trans.Time of paid')}}  </th>
                                                <th>{{trans('lab_trans.Date of paid')}} </th>
                                                <th>{{trans('lab_trans.statuse of paid')}} </th>
                                                <th> {{trans('lab_trans.statues')}} </th>
                                                <th>{{trans('lab_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($venlabe )
                                                @foreach($venlabe as $_venlabe)
                                                    <tr>
                                                    <td>{{$_venlabe -> id}}</td>
                                                        <td>{{$_venlabe -> name}}</td>
                                                        <td><img style="width: 150px; height: 100px;"
                                                                 src="{{$_venlabe -> 	photo}}"></td>
                                                        <td>{{$_venlabe -> email}}</td>
                                                        <td>
                                                        {{$_venlabe -> mobile}}
                                                        </td>
                                                        <td > {{$_venlabe ->cuontry -> name}}-{{$_venlabe ->city -> name}}-{{$_venlabe ->address}}</td>
                                                        <td >{{$_venlabe -> sup_date}}</td>
                                                        <td >{{$_venlabe -> sup_price}}</td>
                                                        <td >{{$_venlabe -> suppay_price}}</td>
                                                        <td >{{$_venlabe -> pay_time}}</td>
                                                        <td >{{$_venlabe -> pay_date}}</td>
                                                        <td >
                                                            @if ($_venlabe -> status == 0)
                                                               <span class="badge badge-pill badge-success">{{$_venlabe -> getStatus()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$_venlabe -> getStatus()}}</span>@endif
                                                        </td>
                                                       
                                                        <td>{{$_venlabe -> getActive()}}</td>
                                                        <td>
                                                        <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.venlabes.edit',$_venlabe ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('lab_trans.Edite')}}</a>


                                                                <a href="{{route('admin.venlabes.delete',$_venlabe ->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('lab_trans.Delete')}}</a>

                                                                   <a href="{{route('admin.venlabes.show',$_venlabe ->id)}}"
                                                                   class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">{{trans('lab_trans.Detailes')}}</a>



                                                               


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

@stop
