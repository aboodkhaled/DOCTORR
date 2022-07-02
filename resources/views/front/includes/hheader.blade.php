@if (App::getLocale() == 'ar')
    <link href="{{ asset('assets/front/u/assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ asset('assets/front/u/assets/css/rtl.css') }}" rel="stylesheet">
   
@endif
<link rel="stylesheet" href="{{asset('assets/front/u/assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/theme.css')}}">
  <link rel="stylesheet" href="{{asset('assets/front/u/assets/css/toastr.css')}}">
<header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-6  col-sm-1 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
              <a class="dr opdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <a class="nav-link dropdown-toggle  text-primary  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
         لغة ألموقع
        </a>
                
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
        
    
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    
                   


    <div class="container" style="margin: 10px;">

           <a class="navbar-brand" href="#"><span class="text-primary">Bisat</span>-areeh</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        
          

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
         
            <li class="nav-item active">
              <a class="nav-link" href="{{route('homee')}}">ألصفحة ألرئيسية</a>
            </li>
         
            
           

            <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل ألدخول') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('أنشاء حساب') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
              <a class="nav-link" href="{{route('edit.profile')}}"> تعديل ألملف ألشخصي</a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         أقسام ألمستشفى
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @isset($hdepartments)
        @foreach($hdepartment  as $_department)
          <a class="dropdown-item" href="{{route('department',$_department -> id)}}">{{$_department -> dept_name}}</a>
          @endforeach
          @endisset
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ألمستشفيات 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @isset($hosbitals)
        @foreach($hosbitals  as $hosbital)
          <a class="dropdown-item" href="{{route('hosbitall',$hosbital -> id)}}">{{$hosbital -> name}}</a>
          @endforeach
          @endisset
        </div>
      </li>


      <li class="nav-item">
              <a class="nav-link" href="{{route('show')}}">ألملف ألطبي</a>
            </li>

      
      
      
            
                            <li class="nav-item dropdown">
                            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">  <span class="mr-1">مرحبا:
                  <span
                      class="user-name text-bold-600">  {{ Auth::user()->name }}  </span>
                        <img src="  {{ Auth::user()->photo }} " class="rounded-circle" style="width:80px;">
                       
                    </a>
                   
                  
                  
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                
                            <li class=" nav-item dropdown ">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><span class="mai-  text-dark text-center">ألأاشعارات<br></span>
                            <span class="notification-counter badge badge-pill badge-default badge-danger badge-default badge-up badge-glow"
                            data-count="" ><h6 id="notifications_coun">{{auth('')->user()->unreadNotifications->count() }}</h6><span class="mai-mail  text-black text-center  grey darken-2">----------  <br></span></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Notifications</span> <span
                                    class="notification-tag badge badge-default badge-danger float-center m-0"><h6 id="notifications_cou">{{auth('')->user()->unreadNotifications->count() }}</h6></span>
                                </h6>
   
                            </li>
                            <div>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-dark text-center"
                                                                href="{{route('MarkAsRead')}}"> {{trans('lab_trans.Read all notifications')}}</a>
                            </li>
                            </div>
                            
                            
                            <li class="scrollable-container bg-primary media-list w-100 " style="overflow-x:scroll;width: 250px;border-radius: 10px;box-shadow:inset 0 0 5px grey; height: 300px;">
                            <div id="unreadNotificats" class="">
                            <?php $i = 0; ?>
                            @foreach(auth('')->user()->unreadNotifications as $notification)
                                <a href="{{route('show')}}">
                                    <div class="media" >
                                        <div class="media-left align-self-center text-dark"><span class="mai-logo-twitter "></span></div>
                                                
                                        <div class="media-body text-center py-3 "style="width: 200px;">
                                        <?php $i++; ?>
                                
                                       
                                        <a href="{{route('show')}}"
                                                                   class="badge badge-pill badge-dark "><span class="badge badge-pill badge-danger"> <td>-- {{ $i }} --</td></span><h6 class="media-heading text-light">{{$notification->data['titel']}}<br>{{$notification->data['user']}}</h6>
                                            </a>
                                            
                                            <small>
                                                <time class="media-meta text-dark"
                                                      datetime="2015-06-11T18:29:20+08:00">{{$notification->created_at->diffForHumans()}}
                                                </time>
                                            </small>
                                            
                                        </div>
                                    </div>
                                </a>
                                
                               
                                @endforeach
                               
                                
                               
                                </div>
                        @endguest
                          </li>
                    </ul>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
    
  </header>
  