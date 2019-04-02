 @extends('layouts.haris')
@section('content')
@if(\App\Fronttheme::first()->theme=='1')
<style type="text/css">
.el-element-overlay .el-card-item .el-overlay-1 .el-info > li a {
    border-color: #ffffff;
    color: #ffffff;
    padding: 15px 15px 15px;
}
.probootstrap-section {
    padding: 1em 0;
}
</style>
 <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h1 class="mb0">@lang('admin.contact')</h1>
            </div>
          </div>
        </div>
      </section>

      

      <section class="probootstrap-section probootstrap-section-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row probootstrap-gutter0">
                <div class="col-md-4" id="probootstrap-sidebar">
                  <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                    <h3>@lang('admin.page')</h3>
                    <ul class="probootstrap-side-menu">
                       <li class="nav-item"> <a class="nav-link" id="home" href="{{url('')}}">{{\App\Frontheader::first()->home}}</a> </li>
          @if(\App\Frontheader::first()->notice_id=='1')
               <li class="nav-item"> <a class="nav-link" id="notice" href="{{url('')}}/view/page.fmp?page=notice">{{\App\Frontheader::first()->notice}}</a> </li>
               @endif
        @if(\App\Frontheader::first()->event_id=='1')
                <li class="nav-item"> <a class="nav-link" id="events" href="{{url('')}}/view/page.fmp?page=event">{{\App\Frontheader::first()->event}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->teacher_id=='1')
                 <li class="nav-item"> <a class="nav-link" id="teacher" href="{{url('')}}/view/page.fmp?page=teacher">{{\App\Frontheader::first()->teacher}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->course_id=='1')
               <li class="nav-item"> <a class="nav-link" id="course" href="{{url('')}}/view/page.fmp?page=courses">{{\App\Frontheader::first()->course}}</a> </li>
      @endif
      @if(\App\Frontheader::first()->gallery_id=='1')
                  <li class="nav-item"> <a class="nav-link" id="gallery" href="{{url('')}}/view/page.fmp?page=gallery">{{\App\Frontheader::first()->gallery}}</a> </li>
      @endif
                   <li class="nav-item"> <a class="nav-link" id="about" href="{{url('')}}/view/page.fmp?page=about">{{\App\Frontheader::first()->about}}</a> </li>
              @if(\App\Frontheader::first()->future_id=='1')
                            <li class="nav-item"> <a class="nav-link" id="admission" href="{{url('')}}/view/page.fmp?page=admission">{{\App\Frontheader::first()->future}}</a> </li>
              @endif
                    </ul>
                  </div>
                </div>
                <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
                  <h2>@lang('admin.get_touch')</h2>
                  <p>@lang('admin.con_form')</p>
                  <form action="{{url('')}}/send/contact/message" id="myform" method="post" class="probootstrap-form formsubmit">
                     {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">@lang('admin.full_name')</label>
                      <input type="text" class="form-control" required id="name" name="name">
                    </div>
                    <div class="form-group">
                      <label for="email">@lang('admin.email')</label>
                      <input type="email" class="form-control" required id="email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="subject">@lang('admin.subject')</label>
                      <input type="text" class="form-control" required id="subject" name="subject">
                    </div>
                    <div class="form-group">
                      <label for="message">@lang('admin.message')</label>
                      <textarea cols="30" rows="10" required class="form-control" id="message" name="message"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="@lang('admin.send_message')">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@elseif(\App\Fronttheme::first()->theme=='2')
 <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h1 class="mb0">@lang('admin.contact')</h1>
            </div>
          </div>
        </div>
      </section>
<div id="fh5co-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-md-push-1 animate-box">
          <div class="fh5co-contact-info">
            <h3>Contact Information</h3>
            <ul>
              <li class="address">{{\App\Frontfooter::first()->con_address}}</li>
              <li class="phone"><a href="tel://1234567920">{{\App\Frontfooter::first()->con_phone}}</a></li>
              <li class="email"><a href="mailto:info@yoursite.com">{{\App\Frontfooter::first()->con_email}}</a></li>
              <li class="url"><a href="{{url('')}}">{{url('')}}</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-push-1  animate-box" id="probootstrap-content">
                  <h2>@lang('admin.get_touch')</h2>
                  <p>@lang('admin.con_form')</p>
                  <form action="{{url('')}}/send/contact/message" id="myform" method="post" class="probootstrap-form formsubmit">
                     {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">@lang('admin.full_name')</label>
                      <input type="text" class="form-control" required id="name" name="name">
                    </div>
                    <div class="form-group">
                      <label for="email">@lang('admin.email')</label>
                      <input type="email" class="form-control" required id="email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="subject">@lang('admin.subject')</label>
                      <input type="text" class="form-control" required id="subject" name="subject">
                    </div>
                    <div class="form-group">
                      <label for="message">@lang('admin.message')</label>
                      <textarea cols="30" rows="10" required class="form-control" id="message" name="message"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="@lang('admin.send_message')">
                    </div>
                  </form>
                </div>
      </div>
    </div>
  </div>

@endif
      @endsection