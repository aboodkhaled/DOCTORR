@extends('layouts.admin')

@section('content')


<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-10 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-10">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""> {{trans('sched_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.schedules')}}"> {{trans('sched_trans.schedules')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('sched_trans.Add schedules')}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('sched_trans.Add schedules')}}</h4>
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
                                    <div class="card-body">
                                        <form class="form col-md-12 " action="{{route('admin.schedules.save')}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            
                                            

                                            

                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('sched_trans.schedule information')}}</h4>

                                                
                                                <div class="row col-12 ">
                                                <div class="form-group col-6">
                                                            <label for="projectinput2"> {{trans('sched_trans.Choose Doctor Neme')}} </label>
                                                            <select name="doctor_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألطبيب ">
                                                                    @if($doctors && $doctors -> count() > 0)
                                                                        @foreach($doctors as $doctor)
                                                                            <option
                                                                                value="{{$doctor -> id }}">{{$doctor -> doc_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('doctor_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>

                            

                 
                                                        
                                                       


                                                    <div class="row col-12 ">   
                  <label  class="col-sm-4 col-md-4 col-form-label">
                                                        <div class="form-group row">
      <label  class="col-sm- col-form-label">{{trans('sched_trans.Days availabel')}}</label>
                  <div class="col-sm-10">
                     <select class="form-control" name="day" id="">
                      
                        <option value="Saturday"> السبت</option>
                        <option value="sunday">ألاحد</option>
                        <option value="monday">ألاثنين</option>
                        <option value="Tuesday">ألثلاثاء</option>
                        <option value="Wednseday">ألاربعاء</option>
                        <option value="Thursday">ألخميس</option>
                        <option value="Friday">ألجمعة</option>
                       
                     </select>
                     @error('day')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                     
                  </div>
               </div>
            </label>
                  <div class="col-3 col-sm-3 py-2 ">
                  <label for="projectinput1">  {{trans('sched_trans.Frome')}} </label>
                     <input type="time" class="form-control" id="" name="stime" value="">
                     @error("stime")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                  </div>
                  <div class="col-3 col-sm-3 py-2 ">
                  <label for="projectinput1">  {{trans('sched_trans.To')}} </label>
                     <input type="time" class="form-control" id="" name="etime" value="">
                     @error("etime")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
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
                                                                   class="card-title ml-1"> {{trans('sched_trans.statues')}} </label>

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
                                                    <i class="ft-x"></i> {{trans('sched_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('sched_trans.Save')}}
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


