@extends('layouts.admin')
@section('content')
<style type="text/css">
.modal-dialog {
    max-width: 1200px;
    margin: 30px auto;
}
</style>
    <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.class_syllable')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.class_syllable')</li>
                        </ol>
                    </div>
                      <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">@lang('admin.current-sess'): {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor"> (
                                @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                             )
                         </h5>
                        </div>
                    </div>
                </div>
 <div class="row">
                    <div class="col-sm-12">
                        @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                      @if (session('error'))
                 <div class="alert alert-warning alert-rounded">{{ session('error') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.class_syllable')</h4>
                            <h6 class="card-subtitle">@lang('admin.get_syllable_class')</h6>

    <div class="row">
         <div class="col-md-2"></div>
                    <div class="col-sm-8">
                             <div class="form-group">
            <label for="example-email">@lang('admin.select_class') *<span class="help"></span></label>
            <input type="hidden" id="searchvalue" value="10" name="">
            <select id="classtatus" class="form-control select2">
                <option></option>
                 @foreach(\App\Course::all() as $class)
                            <option id="{{$class->id}}">{{$class->title}}</option>
                     @endforeach
            </select>
                                </div>
                              </div>
                               <div class="col-md-2"></div>
                        </div>
                        </div>
                    </div>
                </div>
                <div id="showtable"></div>
          
@endsection