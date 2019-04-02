@extends('layouts.haris')
@section('content')
@if(\App\Fronttheme::first()->theme=='1')
<style type="text/css">
form input, form textarea, form select {
  outline: none;
  padding: 10px;
  border-radius: 5px;
  border: none; }
  form input::-webkit-input-placeholder, form textarea::-webkit-input-placeholder, form select::-webkit-input-placeholder {
    color: #656c71; }
form select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  color: #656c71; }
form textarea {
  resize: vertical; }
</style>

 
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate mb0">
              <h1 class="mb0">{{\App\Frontheader::first()->about}}</h1>
            </div>
          </div>
          <div class="row page-titles">
                     <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">{{\App\Frontheader::first()->home}}</a></li>
                            <li class="breadcrumb-item active">{{\App\Frontheader::first()->about}}</li>
                        </ol>
                    </div>
                  </div>
        </div>
      </section>
      <section class="probootstrap-section">
        <div class="container">
           <div class="row">
       <div class="col-md-12">
              <div class="service left-icon probootstrap-animate">
               
                <div class="text">
                  <h3>{{\App\Frontcategory::first()->head_tag}}</h3>
                  <p>{{\App\Frontcategory::first()->head_describe}}</p>
                </div>  
              </div>
     </div>
    </div>
  </div>
  </section>
  <section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url({{url('')}}/uploads/frontend/{{\App\Frontcategory::first()->image}})">
   
   </section>
   <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>{{\App\Frontcategory::first()->body_title}}</h2>
              <p class="lead">{{\App\Frontcategory::first()->body_describe}}</p>
            </div>
          </div>
          <div class="row">
             @foreach(\App\Frontlist::where('status','Point')->get() as $list)
            <div class="col-md-6">
              <div class="service left-icon probootstrap-animate">
                <div class="icon"><i class="icon-checkmark"></i></div>
                <div class="text">
                  <h3>{{$list->title}}</h3>
                  <p>{{$list->description}}</p>
                </div>  
              </div>
             
            </div>
            @endforeach
          </div>
          <!-- END row -->
        </div>
      </section>
       <section class="probootstrap-section">
        <div class="container">
           <div class="row">
             @foreach(\App\Frontlist::where('status','Bullet')->get() as $bullet)
       <div class="col-md-12">
              <div class="service left-icon probootstrap-animate">
                <div class="icon"><i class="icon-checkmark"></i></div>
                <div class="text">
                  <h3>{{$bullet->title}}</h3>
                  <p>{{$bullet->description}}</p>
                </div>  
              </div>
     </div>
     @endforeach
    </div>
  </div>
  </section>

 <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
	 $(function () {
	 	$('.nav-link').removeClass("active");
	$("#about").css("color","blue");
	 });
</script>
@elseif(\App\Fronttheme::first()->theme=='2')
<aside id="fh5co-hero">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url({{url('')}}/uploads/frontend/{{\App\Frontcategory::first()->image}});">
          <div class="overlay-gradient"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-center slider-text">
                <div class="slider-text-inner">
                  <h1 class="heading-section">{{\App\Frontcategory::first()->head_tag}}</h1>
                  <h2>{{\App\Frontcategory::first()->head_describe}}</h2>
                </div>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </div>
  </aside>
   <br>
  <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>{{\App\Frontcategory::first()->body_title}}</h2>
              <p class="lead">{{\App\Frontcategory::first()->body_describe}}</p>
            </div>
          </div>
          <br>
          <div class="row">
             @foreach(\App\Frontlist::where('status','Point')->get() as $list)
            <div class="col-md-6 animate-box">
              <div class="fh5co-event">
                <div class="date text-center" style="background: #5bc0de;"></div>
                <div class="text">
                  <h3>{{$list->title}}</h3>
                  <p>{{$list->description}}</p>
                </div>  
              </div>
             
            </div>
            @endforeach
          </div>
          <!-- END row -->
        </div>
      </section>
        <section class="probootstrap-section">
        <div class="container">
           <div class="row">
             @foreach(\App\Frontlist::where('status','Bullet')->get() as $bullet)
       <div class="col-md-12 animate-box">
              <div class="fh5co-event">
                <div class="date text-center"><br><i style="font-size: 30px;" class="icon-star3"></i></div>
                <div class="text">
                  <h3>{{$bullet->title}}</h3>
                  <p>{{$bullet->description}}</p>
                </div>  
              </div>
     </div>
     @endforeach
    </div>
  </div>
  </section>
<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(function () {
    $('.nav-item').removeClass("active");
 $(".fh5co-nav ul li a#about").css("color","red");
   });
</script>
@endif
@endsection