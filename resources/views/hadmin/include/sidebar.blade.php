<div class="main-menu menu-fixed menu-light menu-accordion col-md-12   menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content" id="nreadNotificat">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('hadmin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

           

           

           

           

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{trans('main_trans.Cuontries')}}    </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\cuontry::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hadmin.cuontries.index')}}"
                                          data-i18n="nav.dash.ecommerce">   {{trans('main_trans.list_of_Cuontries')}} </a>
                    
                </ul>
               
            </li>
            <li class="nav-item">
            <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hadmin.cities.index')}}"
                                          data-i18n="nav.dash.ecommerce"> <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\city::count()}}</span>  {{trans('main_trans.list_of_Cities')}}</a>
                        
                    </li>
                </ul>

               


        
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">ألمستشفيات الخارجية ألمشتركة</span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\model\fhosbital::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('hadmin.fhosbitals.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض كل المستشفيات الخارجية</a>
                    </li>
                    <li><a class="menu-item" href="{{route('hadmin.fhosbitals.create')}}" data-i18n="nav.dash.crypto">
                   أضافة مستشفئ خارجي </a>
                    </li>
                </ul>
            </li>

          


           

           

           
</li>
           

           
           
        </ul>
    </div>
</div>
