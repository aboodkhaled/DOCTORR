<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('doctor.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> ألحجوزات </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{auth('doctorr')->user()->unreadNotifications->count() }}</span>
                </a>
                <ul class="menu-content">
               
                    <li class="active">
                   
                                               
                        <a class="menu-item" href="{{route('doctor.sikss.index' )}}"
                                          data-i18n="nav.dash.ecommerce"> عرض كل ألحجوزات </a>
                                       
                                          
                    </li>
                 
                    <li><a class="menu-item" href="{{route('doctor.sikss.create')}}" data-i18n="nav.dash.crypto">أضافة
                              جديد </a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</div>
