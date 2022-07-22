<div class="page-section bg-lieght  ">

    <div class="container text-center">
      <h1 class="align-items-center wow fadeInUp"> بساط الريح طبيب لجميع الخدمات الصحية و العلاج الطبيعي</h1>
     
       
      <div class="row mt-5 text-center">
      @foreach($clinics  as $clinic)
        <div class="col-lg-4 py-1 wow-zoomIn">
        
          <div class="card-blog">
          
            <div class="header">
              <div class="post-category">
             
                <a href="{{route('hosbitall',$clinic -> id)}}">{{$clinic -> name}}</a>
                
        
              </div>
             
         
              <a href="{{route('clinicc',$clinic -> id)}}" class="post-thumb">
                <img src="{{$clinic -> photo}}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title text-left"><a href="{{route('hosbitall',$clinic -> id)}}">{{$clinic -> plase-> name}} - {{$clinic -> address}}</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="{{$clinic -> photo}}" alt="">
                  </div>
                  <span></span>
                </div>
                <span class="mai-time"></span> 
              </div>
            </div>
           
          </div>
         
        
        
        <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="{{route('clinicc',$clinic -> id)}}" class="btn btn-primary">Read More</a>
        </div>
      
      </div>
      @endforeach
    </div>
   
  </div> 
  </div> 