@extends('layouts.hosbital')

@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{trans('servee_trans.Dashbord')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('hosbital.appoemints')}}">{{trans('servee_trans.Serves Doctors')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('servee_trans.Add Serves Doctors')}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('servee_trans.Add Serves Doctors')}}</h4>
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form col-md-12 " action="{{route('hosbital.appoemints.save')}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                           

                                            

                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('servee_trans.Serves Doctors information')}}</h4>

                                                
                                                <div class="row col-12 ">
                                                   
                                                    
                                                    
                                                    
                                                <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> ألمريض </label>
                                                            <select name="user_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألخدمة ">
                                                                    @if($users && $users -> count() > 0)
                                                                        @foreach($users as $user)
                                                                            <option
                                                                                value="{{$user -> id }}">{{$user -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('user_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6 py-2 ">
                                                    <div class="form-group">
                                                            <label for="projectinput2"> {{trans('servee_trans.Choose doctor name')}} </label>
                                                            <select name="hdoctor_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألطبيب ">
                                                                    @if($hdoctors && $hdoctors -> count() > 0)
                                                                        @foreach($hdoctors as $hdoctor)
                                                                            <option
                                                                                value="{{$hdoctor -> id }}">{{$hdoctor -> doc_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('hdoctor_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>

                                                        <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألقسم </label>
                                                            <select name="hdepartment_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألخدمة ">
                                                                    @if($hdepartments && $hdepartments -> count() > 0)
                                                                        @foreach($hdepartments as $hdepartment)
                                                                            <option
                                                                                value="{{$hdepartment -> id }}">{{$hdepartment -> dept_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('hdepartment_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> ألتخصص</label>
                                                            <select name="hspecialty_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر ألخدمة ">
                                                                    @if($hspecialtys && $hspecialtys -> count() > 0)
                                                                        @foreach($hspecialtys as $hspecialty)
                                                                            <option
                                                                                value="{{$hspecialty -> id }}">{{$hspecialty -> special_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('hspecialty_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  {{trans('servee_trans.Choose serve name')}} </label>
                                                            <select name="hserve_id" id="hserve_id" class="select form-control"
                                                            onchange="console.log('change is firing')">
                                                                <optgroup label="من فضلك أختر ألخدمة ">
                                                                    @if($hserves && $hserves -> count() > 0)
                                                                        @foreach($hserves as $hserve)
                                                                        <option>...............</option>
                                                                            <option
                                                                                value="{{$hserve -> id }}">{{$hserve -> serv_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('hserve_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألسعر</label>
                                                            <select name="hdoctor_serve_id" id="hdoctor_serve_id" class="select form-control">
                                                                <optgroup label="من فضلك أختر ألخدمة ">
                                                                    

                                                                </optgroup>
                                                            </select>
                                                            @error('hdoctor_serve_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                        
                                                        <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألتاريخ </label>
                                                            <input type="date" value="" id="adate"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="adate">
                                                            @error("adate")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    

                                               
                                                    <div class="col-12 py-12 wow fadeInUp" data-wow-delay="300ms">
                                                    <div class="form-group">
                                                    <label for="projectinput2"> ألسبب</label>
            <textarea class="form-control" rows="2"  name="reson" id="reson"  placeholder="Enter message.."></textarea>
            @error("reson")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
          </div>
                                                    
                                                </div>
                                            </div>
                                            
               

                                            

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{trans('servee_trans.Backe')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{trans('servee_trans.Save')}}
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


@section('script')

   


    <script>
        $(function(){
            $(document).on('change','#hserve_id', function(){
                populateHdoctor_serves();
             return false;
            });
            function  populateHdoctor_serves(){
                $('option', $('#hdoctor_serve_id')).remove();
                $('#hdoctor_serve_id').append($('<option></option>').val('').html());
                var serveId = $('#hserve_id').val() != null ? $('#hserve_id').val() : '{{old('hserve_id')}}';
                $.get("{{Route('hosbital.appoemints.getprice')}}",{hserve_id: serveId }, function(data){
               $.each(data, function(val, text){
                   var selectedVal = val == '{{old('hdoctor_serve_id')}}' ? "selected" : "";
                   $('#hdoctor_serve_id').append($('<option '+selectedVal+'></option>').val(val).html(text));
               })
                }, "json");
            }
        });
        
            
    
       
    </script>
   


@stop


