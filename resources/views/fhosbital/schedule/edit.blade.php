@extends('layouts.admin')

@section('content')

               

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{trans('sched_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.schedules')}}">{{trans('sched_trans.schedules')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('sched_trans.Edite schedules')}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{trans('sched_trans.Edite schedules')}}</h4>
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
                                        <form class="form col-md-12 " action="{{route('admin.schedules.update' ,$schedule -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                           

                                            <input type="hidden" name="id" value="{{$schedule -> id}}">

                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('sched_trans.schedule information')}}</h4>
                                                
                  </div>
               </div>


                                                
               <div class="row col-12 ">
               <div class="form-group col-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> {{trans('sched_trans.Choose Doctor Neme')}}</label>
                                                            <select name="doctor_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألطبيب ">
                                                                    @if($doctors && $doctors -> count() > 0)
                                                                        @foreach($doctors as $doctor)
                                                                            <option
                                                                            value="{{$doctor -> id }}"
                                                                                @if($schedule -> doctor_id == $doctor -> id) selected @endif
                                                                                >{{$doctor -> doc_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('doctor_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                            

                 
                                                        
                                                       


                                                    <div class="row col-12 ">   
                  <label  class="col-sm-4 col-md-4 col-form-label">
                                                        <div class="form-group row">
      <label  class="col-sm-3 col-form-label">{{trans('sched_trans.Days availabel')}}</label>
      <div class="col-sm-10">
                     <select class="form-control" name="day" id="">
                        
                        <option value="Saturday"@if($schedule ->day == 'Saturday' ) selected @endif> السبت</option>
                        <option value="sunday"@if($schedule ->day == 'sunday' ) selected @endif>ألاحد</option>
                        <option value="monday"@if($schedule ->day == 'monday' ) selected @endif>ألاثنين</option>
                        <option value="Tuesday"@if($schedule ->day == 'Tuesday' ) selected @endif>ألثلاثاء</option>
                        <option value="Wednseday"@if($schedule ->day == 'Wednseday' ) selected @endif>ألاربعاء</option>
                        <option value="Thursday"@if($schedule ->day == 'Thursday' ) selected @endif>ألخميس</option>
                        <option value="Friday"@if($schedule ->day == 'Friday' ) selected @endif>ألجمعة</option>
                       
                     </select>
                     @error('day')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                     
                  </div>
               </div>
            </label>
            <div class="col-3 col-sm-3 py-2 ">
                  <label for="projectinput1"> {{trans('sched_trans.Frome')}}</label>
                     <input type="time" class="form-control" id="" name="stime" value="{{$schedule -> stime}}">
                     @error("stime")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                  </div>
                  <div class="col-3 col-sm-3 py-2 ">
                  <label for="projectinput1"> {{trans('sched_trans.To')}}</label>
                     <input type="time" class="form-control" id="" name="etime" value="{{$schedule -> etime}}">
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
                                                                   @if($schedule -> active  == 1 ) checked @endif
                                                                   />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('sched_trans.statues')}} </label>

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



