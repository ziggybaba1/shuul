 @extends('layouts.student')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\App\Work::find($id)->title}}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('')}}/student/page.fmp?page=14">Enrolled-Courses</a></li>
                            <li class="breadcrumb-item active">{{\App\Work::find($id)->title}}</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">Current Session: {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor">  ({{\App\Session::latest()->first()->terms}} Term)</h5>
                        </div>
                    </div>
                </div>

<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                    <div class="card-body p-t-0">
                                        <div class="embed-responsive embed-responsive-21by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
</div>
                                    </div>
                            </div>
                        </div>
                    </div>
</div>

@endsection