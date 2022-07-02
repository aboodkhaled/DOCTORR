@extends('layouts.hosbital')

@section('content')


   



    <div class="app-content content">
        
        <div class="content-wrapper">
            <div class="content-header row">
                
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">  {{trans('city_trans.Cities')}}  </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('hosbital.dashboard')}}">{{trans('city_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item active"> <a href=""> {{trans('city_trans.Cities')}}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
        
                <!-- // Basic form layout section end -->
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                
                            <div class="card-header">
                                    <h4 class="card-title"> {{trans('city_trans.All Cities')}} </h4>
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
                                <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('hosbital.cities.create')}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('city_trans.Add City')}}</a>


                                                                



                                                            </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                            <tr>
                                                <th width="5px"> # </th>
                                                <th width="25px"> {{trans('city_trans.City Neme')}}</th>
                                                <th width="25px">  {{trans('city_trans.Country name')}}</th>
                                                
                                                
                                                
                                                <th> {{trans('city_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($hcitys)
                                                @foreach($hcitys as $hcity)
                                                    <tr>
                                                        <td width="5px">{{$hcity -> id}}</td>
                                                        <td width="25px">{{$hcity -> name}}</td>
                                                        
                                                        <td width="25px">  {{$hcity -> 	hcuontry -> name}}</td>
                                                        
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('hosbital.cities.edit',$hcity -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('city_trans.Edite')}}</a>


                                                                <a href="{{route('hosbital.cities.delete',$hcity -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('city_trans.Delete')}}</a>



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
