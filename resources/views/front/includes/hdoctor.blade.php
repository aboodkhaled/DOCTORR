<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">أطباء مستشفى/{{$hosbital -> name}}</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      @isset($hdoctor)
        @foreach($hdoctor as $_doctor)
        <div class="item">
        
          <div class="card-doctor">
         
            <div class="header">
            <a href="{{route('hdoctor.details',$_doctor -> id)}}"><span class="mai-person"></span>
              <img height="280px"  src="{{$_doctor -> 	photo}}" alt="">
              </a>
              <div class="meta">
                <a href="{{route('hdoctor.details',$_doctor -> id)}}"><span class="mai-person"></span></a>
                
              </div>
             
            </div>
           
            <div class="body">
           
              <p class="text-xl mb-0">{{$_doctor -> 	doc_name}}</p>
            
              <span class="text-sm text-grey">{{$_doctor -> hspecialty ->	special_name}}</span> <br>
              <span class="text-sm text-grey">{{$_doctor -> hdepartment ->	dept_name}}</span>
            </div>
          </div>
        </div>
        @endforeach
       @endisset
       
        
      </div>
    </div>
  </div>