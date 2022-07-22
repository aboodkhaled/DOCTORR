@extends('layouts.clinic')

@section('content')



    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""> ألصفحة ألرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('clinic.serve2s')}}"> خدمات ألنساء و ألولادة </a>
                                </li>
                                <li class="breadcrumb-item active">أظافة خدمة ألنساء و ألولادة
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
                                    <h4 class="card-title" id="basic-layout-form"> أظافة خدمة ألنساء و ألولادة </h4>
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
                                    <div class="card-body">
                                        <form class="form col-md-12 " action="{{route('clinic.serve2s.save')}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            
                                            

                                            

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات خدمة  ألنساء و ألولادة</h4>

                                                
                                                <div class="row col-12 ">
                                                    <div class="col-12 col-sm-12 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أسم ألخدمة </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2">مستلزمات ألخدمة </label>
            <textarea class="form-control" rows="2"  name="think" id="think"  placeholder="Enter message.."></textarea>
            @error("think")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                                </div>

                                                <div class="row col-12 ">
                                                <div class="col-3 col-sm-3 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  سعر ألخدمة بدون ألمستلزمات </label>
                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="price">
                                                            @error("price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                      <div class="col-3 col-sm-3 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> سعر المستلزمات </label>
                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="thin_price">
                                                            @error("thin_price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                   
                                                    
                                                     
                                                    <div class="col-3 col-sm-3 py-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  أجمالي الخدمة ألعام </label>
                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="total">
                                                            @error("total")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                    
                                                   


                                               
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1"> {{trans('pharmice_trans.statues')}} </label>

                                                            @error("active")
                                                            <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                 </div>

                                            </div>
                                            
               

                                            

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{trans('pharmice_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('pharmice_trans.Save')}}
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





    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> خدمات ألنساء و ألولادة  </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('clinic.dashboard')}}">ألصفحة ألرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> خدمات  ألنساء و ألولادة
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
                                    <h4 class="card-title">جميع خدمات ألنساء و ألولادة</h4>
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
                                                <th>أسم ألخدمة</th>
                                                <th>مستلزمات ألخدمة</th>
                                                <th>سعر ألخدمة بدون ألمستلزمات</th>
                                                <th>سعر ألمستلزمات </th>
                                                <th>أجمالي ألخدمة ألعام </th>
                                                <th> {{trans('pharmice_trans.statues')}} </th>
                                                <th>{{trans('pharmice_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($serve2s)
                                                @foreach($serve2s as $serve2)
                                                    <tr>
                                                        <td>{{$serve2 -> name}}</td>
                                                       
                                                        <td> {{$serve2 -> think}}</td>
                                                        <td> {{$serve2 ->price}}</td>
                                                        <td>{{$serve2 -> thin_price}}</td>
                                                        <td>{{$serve2 -> total}}</td>
                                                        <td> {{$serve2 -> getActive()}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('clinic.serve2s.edit',$serve2 ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('pharmice_trans.Edite')}}</a>


                                                                <a href="{{route('clinic.serve2s.delete',$serve2 ->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('pharmice_trans.Delete')}}</a>


                                                               


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
