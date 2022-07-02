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
                                <li class="breadcrumb-item"><a href="{{route('clinic.serve2s')}}">خدمة من ألدرجة ألاولئ </a>
                                </li>
                                <li class="breadcrumb-item active">تعديل خدمة من ألدرجة ألثانية
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل خدمة من ألدرجة ألثانية </h4>
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
                                        <form class="form col-md-12 " action="{{route('clinic.serve2s.update' ,$serve2 -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                           

                                            <input type="hidden" name="id" value="{{$serve2 -> id}}">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات ألخدمة من ألدرجة ألثانية </h4>
                                                
                                             

                                                <div class="row col-12 ">
                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  أسم ألخدمة </label>
                                                            <input type="text"
                                                             value="{{$serve2 -> name}}" 
                                                             id="name"
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
            <textarea class="form-control" rows="2"  name="think" id="think"  value="{{$serve2 -> think}}"  placeholder="Enter message..">{{$serve2 -> think}}</textarea>
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
                                                            <input type="number" value="{{$serve2 -> price}}" id="name"
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
                                                            <label for="projectinput1">  سعر ألمستلزمات </label>
                                                            <input type="number" value="{{$serve2 -> thin_price}}" id="name"
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
                                                            <label for="projectinput1">  أجمالي ألخدمة ألعام </label>
                                                            <input type="number" value="{{$serve2 -> total}}" id="name"
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
                                                                   @if($serve2 -> active  == 1 ) checked @endif
                                                                   />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('pharmice_trans.statues')}} </label>

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

@endsection



