<div class="page-section bg-light">

    <div class="container">
      <h1 class="text-center wow fadeInUp"> جميع المستشفيات ألخارجية</h1>
     
       
      <div class="row mt-5">
      @foreach($fhosbitals  as $fhosbital)
        <div class="col-lg-4 py-1 wow-zoomIn">
        
          <div class="card-blog">
          
            <div class="header">
              <div class="post-category">
             
                <a href="{{route('fhosbitall',$fhosbital -> id)}}">{{$fhosbital -> name}}</a>
                
        
              </div>
             
         
              <a href="{{route('fhosbitall',$fhosbital -> id)}}" class="post-thumb">
                <img src="{{$fhosbital -> photo}}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title text-left"><a href="{{route('fhosbitall',$fhosbital -> id)}}">{{$fhosbital -> des}}</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="{{$fhosbital -> photo}}" alt="">
                  </div>
                  <span></span>
                </div>
                <span class="mai-time"></span> 
              </div>
            </div>
           
          </div>
         
        
        
        <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="{{route('fhosbitall',$fhosbital -> id)}}" class="btn btn-primary">Read More</a>
        </div>
      
      </div>
      @endforeach
    </div>
   
  </div> 
  </div> 