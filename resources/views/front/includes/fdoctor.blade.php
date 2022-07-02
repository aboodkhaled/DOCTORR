<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">أطباء مستشفى/{{$fhosbital -> name}}</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      @isset($fdoctor)
        @foreach($fdoctor as $f_doctor)
        <div class="item">
        
          <div class="card-doctor">
         
            <div class="header">
            <a href="{{route('fdoctor.details',$f_doctor -> id)}}"><span class="mai-person"></span>
              <img height="280px"  src="{{$f_doctor -> 	photo}}" alt="">
              </a>
              <div class="meta">
                <a href="{{route('fdoctor.details',$f_doctor -> id)}}"><span class="mai-person"></span></a>
                
              </div>
             
            </div>
           
            <div class="body">
           
              <p class="text-xl mb-0">{{$f_doctor -> 	doc_name}}</p>
            
              <span class="text-sm text-grey">{{$f_doctor -> fspecialty ->	special_name}}</span> <br>
              <span class="text-sm text-grey">{{$f_doctor -> fdepartment ->	dept_name}}</span>
            </div>
          </div>
        </div>
        @endforeach
       @endisset
       
        
      </div>
    </div>
  </div>