<div class="main-menu menu-fixed menu-light menu-accordion col-s-12   menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content" id="nreadNotificat">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('clinic.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

           

            <li class="nav-item"><a href="{{route('clinic.appoemints')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> حجوزات ألأاسعافات ألأولية </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\clinic\appoemint1::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.appoemints')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة حجوزات ألأاسعافات ألاولية   </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.appoemints.create')}}" data-i18n="nav.dash.crypto">
                    أظافة حجز ألأاسعافات ألأولية  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="{{route('clinic.appoemint2s')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> حجوزات ألنساء و ألولادة </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\clinic\appoemint2::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.appoemint2s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة حجوزات ألنساء و ألولادة   </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.appoemint2s.create')}}" data-i18n="nav.dash.crypto">
                    أظافة حجز ألنساء و ألولادة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="{{route('clinic.appoemint3s')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> حجوزات ألمجارحة </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\clinic\appoemint3::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.appoemint3s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة حجوزات ألمجارحة   </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.appoemint3s.create')}}" data-i18n="nav.dash.crypto">
                    أظافة حجز مجارحة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="{{route('clinic.appoemint4s')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> حجوزات ألمعالجة ألطبيعية و ألتنفسية </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\clinic\appoemint4::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.appoemint4s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة حجوزات ألمعالجة ألطبيعية و ألتنفسية   </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.appoemint4s.create')}}" data-i18n="nav.dash.crypto">
                    أظافة حجز معالجة طبيعية و تنفسية  </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href="{{route('clinic.appoemint5s')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> حجوزات ألخدمات ألاخرئ </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\model\clinic\appoemint5::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.appoemint5s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة حجوزات ألخدمات ألاخرئ   </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.appoemint5s.create')}}" data-i18n="nav.dash.crypto">
                    أظافة حجز خدمات أخرئ  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">خدمات ألأاسعافات ألاولية  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\clinic\serve1::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.serve1s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة خدمات ألأاسعافات ألاولية  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.serve1s.create')}}" data-i18n="nav.dash.crypto">
                   أظافة خدمة ألأاسعافات ألأولية  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">خدمات ألنساء و ألولادة  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\clinic\serve2::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.serve2s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة خدمات ألنساء و ألولادة  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.serve2s.create')}}" data-i18n="nav.dash.crypto">
                   أظافة خدمة ألنساء و ألولادة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">خدمات ألمجارحة  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\clinic\serve3::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.serve3s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة خدمات ألمجارحة  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.serve3s.create')}}" data-i18n="nav.dash.crypto">
                   أظافة خدمة مجارحة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">خدمات ألمعالجة ألطبيعية و ألتنفسية  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\clinic\serve4::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.serve4s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة خدمات ألمعالجة ألطبيعية و ألتنفسية  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.serve4s.create')}}" data-i18n="nav.dash.crypto">
                   أظافة خدمة معالجة طبيعية و تنفسية  </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">خدمات أخرئ  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\clinic\serve5::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('clinic.serve5s')}}"
                                          data-i18n="nav.dash.ecommerce"> قائمة ألخدمات ألاخرئ  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('clinic.serve5s.create')}}" data-i18n="nav.dash.crypto">
                   أظافة خدمة أخرئ  </a>
                    </li>
                </ul>
            </li>

           



          
             



            
            
           

           
           
        </ul>
    </div>
</div>
