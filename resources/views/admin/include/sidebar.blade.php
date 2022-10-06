<div class="main-menu menu-fixed menu-light menu-accordion col-md-12   menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content" id="nreadNotificat">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item @if(Request::is('admin/associations*')) open @endif hidden">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main" >لغات الموقع </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{App\model\language::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.languages')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.languages.create')}}" data-i18n="nav.dash.crypto">أضافة
                            لغة جديده </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{trans('main_trans.patients')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\User::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.siks')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_patients')}}  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.siks.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_patients')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="{{route('admin.appoemints')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{trans('main_trans.appoemints')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\appoemint::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.appoemints')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_appoemint')}}  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.appoemints.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_appoemint')}} </a>
                    </li>
                </ul>
            </li>

            @can('departments')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.hospitale departments')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\department::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.departments')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_departments')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.departments.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_departments')}} </a>
                    </li>
                </ul>
            </li>
            @endcan

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{trans('main_trans.specialties')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\Specialty::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.specialtys')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_specialties')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.specialtys.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_specialties')}} </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Blood Types')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\blood::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.bloods')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Blood_Types')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.bloods.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Blood_Type')}} </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Serves')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\serve::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.serves')}}"
                                          data-i18n="nav.dash.ecommerce">  {{trans('main_trans.list_of_Serves')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.serves.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Serve')}} </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Cuontries')}}    </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\cuontry::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.cuontries.index')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_Cuontries')}} </a>
                    
                </ul>
               
            </li>
            <li class="nav-item">
            <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.cities.index')}}"
                                          data-i18n="nav.dash.ecommerce"> <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\city::count()}}</span>  {{trans('main_trans.list_of_Cities')}}</a>
                        
                    </li>
                </ul>

                <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.plases')}}    </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\plase::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.plases.index')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_plases')}} </a>
                    
                </ul>
               
            </li>

            <li class="nav-item"><a href="{{route('admin.meeting')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{trans('main_trans.meeting')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\mate::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.meeting')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_meeting')}}  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.meeting.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_meeting')}} </a>
                    </li>
                </ul>
            </li>

        
            

            

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{trans('main_trans.Doctor schedules')}} </span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\model\schedule::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.schedules')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_schedules')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.schedules.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_schedules')}}  </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Doctors')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\doctor::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.doctors')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Doctors')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.doctors.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Doctor')}} </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Medicines')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\pharmice::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.pharmices')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Medicines')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.pharmices.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Medicine')}} </a>
                    </li>
                </ul>
            </li>

            
             
             

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Tests')}}   </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\labe::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.labes')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_Tests')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.labes.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Test')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="{{route('admin.x_rays')}}"><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.X-rays')}}   </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\xray::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.x_rays')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_X-rays')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.x_rays.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_X-ray')}} </a>
                    </li>
                </ul>
            </li>

           
            
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Serves Doctors')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\doctor_serve::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.doctorserves')}}"
                                          data-i18n="nav.dash.ecommerce">  {{trans('main_trans.list_of_Serves Doctors')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.doctorserves.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Serve Doctor')}}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Permesions')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\Role::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.roles.index')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Permesions')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.roles.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Permesion')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Users')}}   </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\admin::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.users.index')}}"
                                          data-i18n="nav.dash.ecommerce">  {{trans('main_trans.list_of_Users')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.users.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_User')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Hospitals Common')}}</span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.hosbitals.index')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Hospitals')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.hosbitals.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Hospital')}} </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">ألمستشفيات الخارجية ألمشتركة</span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\fhosbital::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.fhosbitals.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض كل المستشفيات الخارجية</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.fhosbitals.create')}}" data-i18n="nav.dash.crypto">
                   أضافة مستشفئ خارجي </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">ألعملاء ألخارجين ألمشتركين</span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hadmin::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.hadmins')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض كل ألعملاء ألخارجين</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.hadmins.create')}}" data-i18n="nav.dash.crypto">
                   أضافة عميل خارجي </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.clinics Common')}}</span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\clinic::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.clinics.index')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_clinics')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.clinics.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_clinic')}} </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Laboratory Common')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\venlabe::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.venlabes.index')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_Laboratory')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.venlabes.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Laboratory')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Pharmacies Common')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\venpharmice::count()}}</span>
                        
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.venpharmices.index')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_Pharmacies')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.venpharmices.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Pharmacy')}} </a>
                    </li>
                </ul>
            </li>

           
</li>
           

           
           
        </ul>
    </div>
</div>
