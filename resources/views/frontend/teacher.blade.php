@extends('layouts.haris')
@section('content')
<style type="text/css">
.btn-circle {
    border-radius: 100%;
    width: 40px;
    height: 40px;
    padding: 0px;
}
.probootstrap-section {
    padding: 1em 0;
}
</style>

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                 <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate mb0">
              <h1 class="mb0">@lang('admin.our') {{\App\Frontheader::first()->teacher}}</h1>
            </div>
          </div>
          <div class="row page-titles">
                     <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">{{\App\Frontheader::first()->home}}</a></li>
                            <li class="breadcrumb-item active">{{\App\Frontheader::first()->teacher}}</li>
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
                  <h3>{{\App\Fronthome::first()->teacher_title}}</h3>
          <p>{{\App\Fronthome::first()->teacher_description}}</p>
                </div>  
              </div>
     </div>
    </div>
  </div>
  </section>
                  <section class="probootstrap-section">
        <div class="container">
          

          <div class="row">
             @if(\App\Fronttheme::first()->theme=='1')
  @foreach($teachers as $staff)
            <div class="col-md-3 col-sm-6">
              <div class="probootstrap-teacher text-center probootstrap-animate">
                <figure class="media">
          @if($staff->image!='')
                  <img src="{{url('')}}/uploads/avatars/{{$staff->image}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
          @elseif($staff->image=='')
           <img src="{{url('')}}/haris/images/5_11.png" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
           @endif
                </figure>
                <div class="text">
                  <h3>{{$staff->gname}} {{$staff->fname}}</h3>
                  <p>{{$staff->subassign}}</p>
                   @if($staff->twitter!='')
                   <a target="_blank" href="https://twitter.com/intent/user?user_id={{$staff->twitter}}" class="btn btn-circle btn-secondary"><i class="icon-twitter"></i></a>
                   @else
                   <a class="btn btn-circle btn-secondary"><i class="icon-twitter"></i></a>
                   @endif
                     @if($staff->facebook!='')
                    <a target="_blank" href="https://facebook.com/profile.php?id={{$staff->facebook}}" class="btn btn-circle btn-secondary"><i class="icon-facebook2"></i></a>
                      @else
                   <a class="btn btn-circle btn-secondary"><i class="icon-facebook2"></i></a>
                   @endif
                     @if($staff->instagram!='')
                    <a target="_blank" href="https://www.instagram.com/{{$staff->twitter}}/" class="btn btn-circle btn-secondary"><i class="icon-instagram2"></i></a>
                      @else
                   <a class="btn btn-circle btn-secondary"><i class="icon-instagram2"></i></a>
                   @endif
                     @if($staff->google!='')
                    <a target="_blank" href="{{$staff->google}}" class="btn btn-circle btn-secondary"><i class="icon-google-plus"></i></a>
                      @else
                   <a class="btn btn-circle btn-secondary"><i class="icon-google-plus"></i></a>
                   @endif
                </div>
              </div>
            </div>
    @endforeach
    @elseif(\App\Fronttheme::first()->theme=='2')
     @foreach($teachers as $staff)
  <div class="col-md-3 animate-box text-center">
          <div class="staff">
        @if($staff->image!='')
            <div class="staff-img" style="background-image: url({{url('')}}/uploads/avatars/{{$staff->image}});">
         @elseif($staff->image=='')
       <div class="staff-img" style="background-image: url({{url('')}}/haris/images/5_11.png);">
           @endif
              <ul class="fh5co-social">
                @if($staff->twitter!='')
                <li><a target="_blank" href="https://twitter.com/intent/user?user_id={{$staff->twitter}}"><i class="icon-social-twitter"></i></a></li>
                @else
                 <li><a target="_blank" href="javascript:void(0)"><i class="icon-social-twitter"></i></a></li>
                @endif
                 @if($staff->facebook!='')
                <li><a target="_blank" href="https://facebook.com/profile.php?id={{$staff->facebook}}"><i class="icon-social-facebook"></i></a></li>
                  @else
                 <li><a  href="javascript:void(0)"><i class="icon-social-facebook"></i></a></li>
                @endif
                  @if($staff->instagram!='')
                <li><a target="_blank" href="https://www.instagram.com/{{$staff->twitter}}/"><i class="icon-instagram"></i></a></li>
                  @else
                 <li><a href="javascript:void(0)"><i class="icon-instagram"></i></a></li>
                @endif
                  @if($staff->google!='')
                <li><a target="_blank" href="{{$staff->google}}"><i class="icon-google-plus"></i></a></li>
                  @else
                 <li><a href="javascript:void(0)"><i class="icon-google-plus"></i></a></li>
                @endif
              </ul>
            </div>
            <span>{{$staff->subassign}}</span>
            <h3><a href="#">{{$staff->gname}} {{$staff->fname}}</a></h3>
          </div>
        </div>
      </div>
    @endforeach
  @endif
          </div>
        </div>
      </section>
           <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
     $(function () {
        $('.nav-link').removeClass("active");
   @if(\App\Fronttheme::first()->theme=='1')
    $("#teacher").css("color","blue");
@elseif(\App\Fronttheme::first()->theme=='2')
    $(".fh5co-nav ul li a#teacher").css("color","red");
    @endif
     });
</script>
          @endsection