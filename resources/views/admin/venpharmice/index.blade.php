
@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{trans('phar_trans.Pharmacies')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('phar_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('phar_trans.Pharmacies')}} 
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
                                    <h4 class="card-title"> {{trans('phar_trans.All Pharmacies')}}</h4>
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
                                                                <a href="{{route('admin.venpharmices.create')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> {{trans('phar_trans.Add Pharmacies')}}</a>

                                                            </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        
                                        <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th> # </th>
                                                <th>{{trans('phar_trans.Pharmacy Neme')}}</th>
                                                <th> {{trans('phar_trans.Pharmacy photo')}}</th>
                                                <th>{{trans('phar_trans.Email')}}</th>
                                                <th>{{trans('phar_trans.Mobile')}} </th>
                                                <th >{{trans('phar_trans.Address')}}  </th>
                                                <th>{{trans('phar_trans.Subscribe Date')}}</th>
                                                <th>{{trans('phar_trans.Subscribe Price')}}</th>
                                                <th> {{trans('phar_trans.The paid')}} </th>
                                                <th>{{trans('phar_trans.Time of paid')}} </th>
                                                <th>{{trans('phar_trans.Date of paid')}} </th>
                                                <th>{{trans('phar_trans.statuse of paid')}}</th>
                                                <th> {{trans('phar_trans.statues')}} </th>
                                                <th>{{trans('phar_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($venpharmices )
                                                @foreach($venpharmices as $venpharmice)
                                                    <tr>
                                                    <td>{{$venpharmice -> id}}</td>
                                                        <td>{{$venpharmice -> name}}</td>
                                                        <td><img style="width: 150px; height: 100px;"
                                                                 src="{{$venpharmice -> 	photo}}"></td>
                                                        <td>{{$venpharmice -> email}}</td>
                                                        <td>
                                                        {{$venpharmice -> mobile}}
                                                        </td>
                                                        <td > {{$venpharmice ->cuontry -> name}}-{{$venpharmice ->city -> name}}-{{$venpharmice ->address}}</td>
                                                        <td >{{$venpharmice -> sup_date}}</td>
                                                        <td >{{$venpharmice -> sup_price}}</td>
                                                        <td >{{$venpharmice -> suppay_price}}</td>
                                                        <td >{{$venpharmice -> pay_time}}</td>
                                                        <td >{{$venpharmice -> pay_date}}</td>
                                                        <td >
                                                            @if ($venpharmice -> status == 0)
                                                               <span class="badge badge-pill badge-success">{{$venpharmice -> getStatus()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$venpharmice -> getStatus()}}</span>@endif
                                                        </td>
                                                       
                                                        <td>{{$venpharmice -> getActive()}}</td>
                                                        <td>
                                                        <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.venpharmices.edit',$venpharmice ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('phar_trans.Edite')}}</a>


                                                                <a href="{{route('admin.venpharmices.delete',$venpharmice ->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('phar_trans.Delete')}}</a>

                                                                   <a href="{{route('admin.venpharmices.show',$venpharmice ->id)}}"
                                                                   class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">{{trans('phar_trans.Detailes')}}</a>

                                                                   <a href="{{route('admin.venpharmices.print',$venpharmice ->id)}}"
                                                                   class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">{{trans('phar_trans.Print')}}</a>




                                                               


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
