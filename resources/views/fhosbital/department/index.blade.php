@extends('layouts.fhosbital')
@section('style')
    @toastr_css
@STOP
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{trans('dept_trans.hospitale departments')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('fhosbital.dashboard')}}">{{trans('dept_trans.Dashbord')}}</a>
                                </li>
                                <li class="breadcrumb-item active"> <a href="">{{trans('dept_trans.Main hospitale departments')}}</a>
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
                                    <h4 class="card-title">{{trans('dept_trans.All hospitale departments')}}</h4>
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

                                @include('fhosbital.alert.success')
                                @include('fhosbital.alert.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                            <tr>
                                                <th width="5px"> {{trans('dept_trans.dept_number')}}</th>
                                                <th width="25px"> {{trans('dept_trans.dept_Neme')}}</th>
                                                <th width="10px">{{trans('dept_trans.dept_Photo')}}</th>
                                                <th width="10px">{{trans('dept_trans.statues')}}</th>
                                                <th width="400px">{{trans('dept_trans.Description')}}</th>
                                                <th>{{trans('dept_trans.Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @isset($hdepartments)
                                                @foreach($hdepartments as $hdepartment)
                                                    <tr>
                                                    <?php $i++; ?>
                                <td>{{ $i }}</td>
                                                        <td width="25px">{{$hdepartment -> dept_name}}
                                                       
    

  
                                                        </td>
                                                        <td><img style="width: 150px; height: 100px;"
                                                                 src="{{$hdepartment -> 	photo}}"></td>
                                                        <td width="10px">{{$hdepartment -> getActive()}}</td>
                                                        <td width="400px">{{$hdepartment -> dept_des}}</td>
                                                        <td>
                                                            
                                                            
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('fhosbital.departments.edit',$hdepartment -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('dept_trans.Edite')}}</a>


                                                                <a href="{{route('fhosbital.departments.delete',$hdepartment -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{trans('dept_trans.Delete')}}</a>
                                                                   


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
@section('script')
        
<script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
  <script type="text/javascript">
    $('.target').on('change',function(){
          var target = $(this).val();
          $.ajax({
              url:"{{route('setTarget')}}",
              type:"POST",
              dataType:'json',
              data:{"_token": "{{ csrf_token() }}","target":target},
              success: function(data) {
                location.reload();
              },
              error: function(e) {

              }
          });
      });
  </script>
    @toastr_js
    @toastr_render

    
@endsection