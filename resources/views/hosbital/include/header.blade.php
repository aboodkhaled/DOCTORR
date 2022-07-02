
<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    
    <div class="navbar-wrapper">
        
        <div class="navbar-header">
            
            <ul class="nav navbar-nav flex-row">
            <div class="col-md-12 col-s-12 text-center ">
      <a class="navbar-brand" href="#"><span class="text-primary">Tabeb</span></a>
      <img style="width: 50px;" src="{{asset('assets/front/u/assets/img/r.png')}}" alt="...">
      <a class="navbar-brand" href="#"><span class="text-primary">Bisat</span>-areeh</a>
    </div>
            </ul>
            
        </div>
        
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                <a class="dr    opdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
         <h1>لغة ألموقع</h1>
        </a>
                <span class="mr-1">
                 
                </span>

                        </a>
                        <div class="dropdown-menu ">

                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>

                                <div class="dropdown-divider"></div>
                            @endforeach
                        </div>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">{{trans('main_trans.Hello')}}
                
                  <span
                      class="user-name text-bold-600">  {{auth('hosbitall') -> user() -> name}}   </span><span class="avatar avatar-sm avatar-busy rounded-circle"><img class="brand-logo" 
                             src="{{auth('hosbitall') -> user() -> photo}}"> </span>
                            <br> {{auth('hosbitall') -> user() -> email}}                            
                </span>
                
                         </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{route('hosbital.edit.profile')}}"><i
                                    class="ft-user"></i> تعديل الملف الشحصي </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('hosbital.logout')}}"><i class="ft-power"></i> تسجيل
                                الخروج </a>
                        </div>
                    </li>

                    


                   
                     
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                            <span class="notification-counter badge badge-pill badge-default badge-danger badge-default badge-up badge-glow"
                            data-count="" ><h6 id="notifications_coun">{{auth('hosbitall')->user()->unreadNotifications->count() }}</h6></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Notifications</span>
                                </h6>
                                <span
                                    class="notification-tag badge badge-default badge-danger float-right m-0"><h6 id="notifications_cou">{{auth('hosbitall')->user()->unreadNotifications->count() }}</h6></span>
                            </li>
                            
                            <li class="scrollable-container media-list w-100">
                            <div id="unreadNotificats">
                            @foreach(auth('hosbitall')->user()->unreadNotifications as $notification)
                                <a href="{{route('hosbital.appoemints.show',$notification->data['id'])}}">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                                
                                        <div class="media-body">
                                       
                                        <a href="{{route('hosbital.appoemints.show',$notification->data['id'])}}"
                                                                   class=""> <h6 class="media-heading">{{$notification->data['titel']}}<br>{{$notification->data['user']}}</h6>
                                            </a>
                                            
                                            <p class="notification-text font-small-3 text-muted"></p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">{{$notification->created_at->diffForHumans()}}
                                                </time>
                                            </small>
                                            
                                        </div>
                                    </div>
                                </a>
                               
                                @endforeach
                               
                                
                               
                                </div>
                                
                            </li>
                           <div>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                href="{{route('hosbital.appoemints.MarkAsRead')}}"> {{trans('lab_trans.Read all notifications')}}</a>
                            </li>
                            </div>
                            
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i
                                class="ficon ft-mail"> </i></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Messages</span>
                                </h6>
                                <span
                                    class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                            </li>
                            <li class="scrollable-container media-list w-100">
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="{{asset('assets/admin/images/portrait/small/avatar-s-19.png')}}"
                               alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Margaret Govan</h6>
                                            <p class="notification-text font-small-3 text-muted">I like your portfolio,
                                                let's start.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Today
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                        <span class="avatar avatar-sm avatar-busy rounded-circle">
                          <img src="{{asset('assets/admin/images/portrait/small/avatar-s-2.png')}}" alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Bret Lezama</h6>
                                            <p class="notification-text font-small-3 text-muted">I have seen your work,
                                                there is</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Tuesday
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="{{asset('assets/admin/images/portrait/small/avatar-s-3.png')}}" alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Carie Berra</h6>
                                            <p class="notification-text font-small-3 text-muted">Can we have call in
                                                this week ?</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Friday
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                        <span class="avatar avatar-sm avatar-away rounded-circle">
                          <img src="{{asset('assets/admin/images/portrait/small/avatar-s-6.png')}}" alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Eric Alsobrook</h6>
                                            <p class="notification-text font-small-3 text-muted">We have project party
                                                this saturday.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">last month
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                href="javascript:void(0)">Read all messages</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
