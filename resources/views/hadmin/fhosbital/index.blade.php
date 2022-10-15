
@extends('layouts.hadmin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{trans('hosb_trans.Hosbitales')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('hadmin.dashboard')}}">{{trans('hosb_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('hosb_trans.Hosbitales')}} 
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
                                    <h4 class="card-title"> {{trans('hosb_trans.All Hosbitales')}}</h4>
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

                                @include('hadmin.alert.success')
                                @include('hadmin.alert.errors')
                                <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('hadmin.fhosbitals.create')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> {{trans('hosb_trans.Add Hosbitale')}}</a>

                                                            </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th> # </th>
                                                <th>{{trans('hosb_trans.Hosbitale Neme')}}</th>
                                                <th> {{trans('hosb_trans.Hosbitale photo')}}</th>
                                                <th>{{trans('hosb_trans.Email')}}</th>
                                                <th>{{trans('hosb_trans.Mobile')}} </th>
                                                <th >{{trans('hosb_trans.Address')}}  </th>
                                                <th>{{trans('hosb_trans.Subscribe Date')}}</th>
                                                <th>{{trans('hosb_trans.Subscribe Price')}}</th>
                                                <th> {{trans('hosb_trans.The paid')}} </th>
                                                <th>{{trans('hosb_trans.Time of paid')}} </th>
                                                <th>{{trans('hosb_trans.Date of paid')}} </th>
                                                <th>{{trans('hosb_trans.statuse of paid')}}</th>
                                                <th> {{trans('hosb_trans.statues')}} </th>
                                                <th>{{trans('hosb_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($hosbital )
                                                @foreach($hosbital as $_hosbital)
                                                    <tr>
                                                    <td>{{$_hosbital -> id}}</td>
                                                        <td>{{$_hosbital -> name}}</td>
                                                        <td><img style="width: 150px; height: 100px;"
                                                                 src="{{$_hosbital -> 	photo}}"></td>
                                                        <td>{{$_hosbital -> email}}</td>
                                                        <td>
                                                        {{$_hosbital -> mobile}}
                                                        </td>
                                                        <td > {{$_hosbital ->cuontry -> name}}-{{$_hosbital ->city -> name}}-{{$_hosbital ->address}}</td>
                                                        <td >{{$_hosbital -> sup_date}}</td>
                                                        <td >{{$_hosbital -> sup_price}}</td>
                                                        <td >{{$_hosbital -> suppay_price}}</td>
                                                        <td >{{$_hosbital -> pay_time}}</td>
                                                        <td >{{$_hosbital -> pay_date}}</td>
                                                        <td >
                                                            @if ($_hosbital -> status == 0)
                                                               <span class="badge badge-pill badge-success">{{$_hosbital -> getStatus()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$_hosbital -> getStatus()}}</span>@endif
                                                        </td>

                                                        <td >
                                                            @if ($_hosbital -> active == 1)
                                                               <span class="badge badge-pill badge-success">{{$_hosbital -> getActive()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$_hosbital -> getActive()}}</span>@endif
                                                        </td>
                                                       
                                                    
                                                        <td>
                                                        <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('hadmin.fhosbitals.edit',$_hosbital ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('hosb_trans.Edite')}}</a>


                                                                <a href="{{route('hadmin.fhosbitals.delete',$_hosbital ->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('hosb_trans.Delete')}}</a>

                                                                   <a href="{{route('hadmin.fhosbitals.show',$_hosbital ->id)}}"
                                                                   class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">{{trans('hosb_trans.Detailes')}}</a>

                                                                  

                                                               


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
