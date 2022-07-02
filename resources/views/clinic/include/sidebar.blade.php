<div class="main-menu menu-fixed menu-light menu-accordion col-s-12   menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content" id="nreadNotificat">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('clinic.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

           

            <li class="nav-item"><a href="{{route('clinic.appoemints')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> حجوزات من ألدرجة ألاولئ </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\clinic\appoemint1::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.appoemints')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة حجوزات من ألدرجة ألاولئ   </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.appoemints.create')}}" data-i18n="nav.dash.crypto">
                    أظافة حجز من ألدرجة ألاولئ  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="{{route('clinic.appoemint2s')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> حجوزات من ألدرجة ألثانية </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\clinic\appoemint2::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.appoemint2s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة حجوزات من ألدرجة ألثانية   </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.appoemint2s.create')}}" data-i18n="nav.dash.crypto">
                    أظافة حجز من ألدرجة ألثانية  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">ألخدمات من الدرجة ألاولئ  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\clinic\serve1::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.serve1s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة ألخدمات من الدرجة ألاولئ  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.serve1s.create')}}" data-i18n="nav.dash.crypto">
                   أظافة خدمة من الدرجة ألاولئ  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">ألخدمات من الدرجة ألثانية  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\clinic\serve2::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.serve2s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة ألخدمات من الدرجة ألثانية  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.serve2s.create')}}" data-i18n="nav.dash.crypto">
                   أظافة خدمة من الدرجة ألثانية  </a>
                    </li>
                </ul>
            </li>

           



          
             



            
            
           

           
           
        </ul>
    </div>
</div>
