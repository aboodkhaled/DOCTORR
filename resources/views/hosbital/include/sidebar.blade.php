<div class="main-menu menu-fixed menu-light menu-accordion col-s-12   menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content" id="nreadNotificat">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('hosbital.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item @if(Request::is('admin/associations*')) open @endif hidden">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main" >لغات الموقع </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{App\model\language::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.languages')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.languages.create')}}" data-i18n="nav.dash.crypto">أضافة
                            لغة جديده </a>
                    </li>
                </ul>
            </li>

           

            <li class="nav-item"><a href="{{route('hosbital.appoemints')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{trans('main_trans.appoemints')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\hosbital\happoemint::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.appoemints')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_appoemint')}}  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.appoemints.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_appoemint')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Blood Types')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hblood::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.bloods')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Blood_Types')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.bloods.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Blood_Type')}} </a>
                    </li>
                </ul>
            </li>

           

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.hospitale departments')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\hosbital\hdepartment::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.departments')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_departments')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.departments.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_departments')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{trans('main_trans.specialties')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\hosbital\hSpecialty::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.specialtys')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_specialties')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.specialtys.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_specialties')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Serves')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hserve::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.serves')}}"
                                          data-i18n="nav.dash.ecommerce">  {{trans('main_trans.list_of_Serves')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.serves.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Serve')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title " data-i18n="nav.dash.main">{{trans('main_trans.Cuontries')}}    </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hcuontry::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.cuontries.index')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_Cuontries')}} </a>
                    
                </ul>
               
            </li>
            <li class="nav-item">
            <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.cities.index')}}"
                                          data-i18n="nav.dash.ecommerce"> <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hcity::count()}}</span>  {{trans('main_trans.list_of_Cities')}}</a>
                        
                    </li>
                </ul>
</li>
           


            


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Doctors')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hdoctor::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.doctors')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Doctors')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.doctors.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Doctor')}} </a>
                    </li>
                </ul>
            </li>

          
            
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Serves Doctors')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hdoctor_serve::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.doctorserves')}}"
                                          data-i18n="nav.dash.ecommerce">  {{trans('main_trans.list_of_Serves Doctors')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.doctorserves.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Serve Doctor')}}</a>
                    </li>
                </ul>
            </li>



            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Medicines')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hpharmice::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.pharmices')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Medicines')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.pharmices.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Medicine')}} </a>
                    </li>
                </ul>
            </li>

          
             
             

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Tests')}}   </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hlabe::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.labes')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_Tests')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.labes.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Test')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="{{route('hosbital.x_rays')}}"><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.X-rays')}}   </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital\hxray::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.x_rays')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_X-rays')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.x_rays.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_X-ray')}} </a>
                    </li>
                </ul>
            </li>

            
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Permesions')}}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\Role::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.roles.index')}}"
                                          data-i18n="nav.dash.ecommerce"> {{trans('main_trans.list_of_Permesions')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.roles.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_Permesion')}} </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Users')}}   </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\hosbital::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hosbital.users.index')}}"
                                          data-i18n="nav.dash.ecommerce">  {{trans('main_trans.list_of_Users')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('hosbital.users.create')}}" data-i18n="nav.dash.crypto">
                    {{trans('main_trans.Add_new_User')}} </a>
                    </li>
                </ul>
            </li>


           
           
           
        </ul>
    </div>
</div>
