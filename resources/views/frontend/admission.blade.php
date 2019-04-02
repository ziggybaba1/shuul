@extends('layouts.haris')
@section('content')
@if(\App\Fronttheme::first()->theme=='1')
<style type="text/css">
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
              <h1 class="mb0">{{\App\Frontheader::first()->future}}</h1>
            </div>
          </div>
          <div class="row page-titles">
                     <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">{{\App\Frontheader::first()->home}}</a></li>
                            <li class="breadcrumb-item active">{{\App\Frontheader::first()->future}}</li>
                        </ol>
                    </div>
                  </div>
        </div>
      </section>
      <section class="probootstrap-section">
       
  </section>
      <section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="height: 250px; background-image: url({{url('')}}/uploads/frontend/{{\App\Fronthome::first()->feature_back}})">
          
   </section>
     <section class="probootstrap-section">
        <div class="container">
           <div class="row">
       <div class="col-md-12">
              <div class="service left-icon probootstrap-animate">
               
                <div class="text">
                  <h4>{{\App\Fronthome::first()->feature_body_title}}</h4>
          <p>{{\App\Fronthome::first()->feature_body_content}}</p>
                </div>  
              </div>
     </div>
    </div>
  </div>
  </section>
      <section class="probootstrap-section">
        <div class="container">
         <div class="row">
                    <div class="col-md-12">
                                        <div style="margin-bottom: 50px;" id="content-main">
                                <div class="row">
                    <div class="col-sm-12">
                    <div class="pull-left w-50">
             <b>
                            <font face="Arial Black">{{\App\Provider::first()->name}}<br></font>
                        </b>
                <small>{{\App\Provider::first()->address}}<br>
                </small>
                <small>{{\App\Provider::first()->phone1}}, {{\App\Provider::first()->phone2}}<br>
                </small>
               
                    </div>
                    <div class="pull-right w-50">
                        <div class="text-center">
                        <div class="student-img">
                                       <p>@lang('admin.student') @lang('admin.photo')</p>
                                   </div>
                               </div>
                </div>
            </div>
        </div>
                   <div class="row">
                       <div class="col-md-12">
                           <div class="form-body">
                                <div class="block-title text-center">
                                    <h4>@lang('admin.student-info')</h4>
                                </div>
                                <div class="clearfix s-row"> <div class="input-title">@lang('admin.student') @lang('admin.address') :</div> <div class="form-field"></div> </div>
                                <div class="clearfix s-row"> <div class="input-title">@lang('admin.home') @lang('admin.address') :</div> <div class="form-field"></div> </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title">@lang('admin.gender') :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title">@lang('admin.birthday') :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title">@lang('admin.faname') :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title">@lang('admin.mobile') @lang('admin.number') :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title">@lang('admin.maname') :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title">@lang('admin.mobile') @lang('admin.number') :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title">@lang('admin.religion') :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title">@lang('admin.nationality') :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row"> <div class="input-title">@lang('admin.educ_back') :</div> <div class="form-field"></div> </div>
                           </div>
                           <label><em>{{\App\Fronthome::first()->feature_print_info}}</em></label>
                       </div>
                   </div>
                 </div>
                  <div class="row">
                      <div class="col-md-4"></div>
                       <div class="col-md-4">
                           <button onclick="printpage()" class="btn btn-info btn-md btn-block"><i class="fa fa-print"></i> @lang('admin.print')</button>
                       </div>
                        <div class="col-md-4"></div>
                  </div>
                                      </div>
                            </div>

</div>
</section>

          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="lead">{{\App\Provider::first()->name}}</p>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                      <div class="modal-body">
                                         <div class="card card-body">
                 
                    </div>
            </div>
          </div>
        </div>
      </div>
            <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
     $(function () {
        $('.nav-link').removeClass("active");
    $("#admission").css("color","blue");
     });
</script>
@elseif(\App\Fronttheme::first()->theme=='2')
<style type="text/css">

</style>
<aside id="fh5co-hero">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url({{url('')}}/uploads/frontend/{{\App\Fronthome::first()->feature_back}});">
          <div class="overlay-gradient"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-center slider-text">
                <div class="slider-text-inner">
                  <h1 class="heading-section">{{\App\Fronthome::first()->feature_body_title}}</h1>
                  <h2>{{\App\Fronthome::first()->feature_body_content}}</h2>
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
                    <div class="col-md-12">
                                        <div style="margin-bottom: 50px;" id="content-main">
                                <div class="row">
                    <div class="col-sm-12">
                    <div class="pull-left w-50">
             <b>
                            <font face="Arial Black">{{\App\Provider::first()->name}}<br></font>
                        </b>
                <small>{{\App\Provider::first()->address}}<br>
                </small>
                <small>{{\App\Provider::first()->phone1}}, {{\App\Provider::first()->phone2}}<br>
                </small>
               
                    </div>
                    <div class="pull-right w-50">
                        <div class="text-center">
                        <div class="student-img">
                                       <p>@lang('admin.student') @lang('admin.photo')</p>
                                   </div>
                               </div>
                </div>
            </div>
        </div>
                   <div class="row">
                       <div class="col-md-12">
                           <div class="form-body">
                                <div class="block-title text-center">
                                    <h4>@lang('admin.student-info')</h4>
                                </div>
                                <div class="clearfix s-row"> <div class="input-title">@lang('admin.student') @lang('admin.address') :</div> <div class="form-field"></div> </div>
                                <div class="clearfix s-row"> <div class="input-title">@lang('admin.home') @lang('admin.address') :</div> <div class="form-field"></div> </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title">@lang('admin.gender') :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title">@lang('admin.birthday') :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title">@lang('admin.faname') :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title">@lang('admin.mobile') @lang('admin.number') :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title">@lang('admin.maname') :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title">@lang('admin.mobile') @lang('admin.number') :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title">@lang('admin.religion') :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title">@lang('admin.nationality') :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row"> <div class="input-title">@lang('admin.educ_back') :</div> <div class="form-field"></div> </div>
                           </div>
                           <label><em>{{\App\Fronthome::first()->feature_print_info}}</em></label>
                       </div>
                   </div>
                 </div>
                  <div class="row">
                      <div class="col-md-4"></div>
                       <div class="col-md-4">
                           <button onclick="printpage()" class="btn btn-info btn-md btn-block"><i class="fa fa-print"></i> @lang('admin.print')</button>
                       </div>
                        <div class="col-md-4"></div>
                  </div>
                                      </div>
                            </div>

</div>
</section>

<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(function () {
    $('.nav-item').removeClass("active");
 $(".fh5co-nav ul li a#admission").css("color","red");
   });
</script>
@endif
          @endsection