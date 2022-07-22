@extends('layouts.clinic')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> حجوزات من ألدرجة ألثانية</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('clinic.dashboard')}}">{{trans('servee_trans.Dashbord')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> حجوزات من ألدرجة ألثانية
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
                                    <h4 class="card-title">جميع ألحجوزات من ألدرجة ألثانية</h4>
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

                                @include('clinic.alert.success')
                                @include('clinic.alert.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>أسم ألمريض</th>
                                                <th> أسم ألعيادة</th>
                                                <th>أسم ألخدمة</th>
                                                <th> سعر ألخدمة بدون ألمستلزمات</th>
                                                <th>مستلزمات ألخدمة</th>
                                                <th>سعر مستلزمات ألخدمة</th>
                                                <th>أجمالي ألخدمة ألعام </th>
                                                <th>وقت ألحجز</th>
                                                <th>ألاجراءت</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($appoemint2s)
                                                @foreach($appoemint2s as $appoemint2)
                                                    <tr>
                                                        <td>{{$appoemint2 -> User -> name}}</td>
                                                        <td>{{$appoemint2 -> clinic -> name}}</td>
                                                        <td>{{$appoemint2 -> serve2 -> name}}</td>
                                                        <td>{{$appoemint2 -> serve2_price -> price}}</td>
                                                        <td>{{$appoemint2 -> serve2_thin -> think}}</td>
                                                        <td>{{$appoemint2 -> serve2_tprice -> thin_price}}</td>
                                                        <td>{{$appoemint2 -> serve2_total -> total}}</td>
                                                        <td>{{$appoemint2 -> created_at->diffForHumans()}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('clinic.appoemint2s.edit',$appoemint2 ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('servee_trans.Edite')}}</a>


                                                                <a href="{{route('clinic.appoemint2s.delete',$appoemint2 ->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('servee_trans.Delete')}}</a>

                                                                   <a href="{{route('clinic.appoemint2s.show',$appoemint2 ->id)}}"
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
