@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.schoolin-fee')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.schoolin-fee')</li>
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
                    <div class="col-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.edit_school_fee')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
        <table  class="display nowrap table  table-bordered customed" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.class')</th>
                                                <th>@lang('admin.class_teacher')</th>
                                                <th>@lang('admin.number_student')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.class')</th>
                                                <th>@lang('admin.class_teacher')</th>
                                                <th>@lang('admin.number_student')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @forelse(\App\Course::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->title}}</td>
        @if(count(\App\Teacher::where('assign',$class->id)->get())>0)
                <td>{{\App\Teacher::where('assign',$class->id)->first()->gname}} {{\App\Teacher::where('assign',$class->id)->first()->fname}}</td>
    @else
    <td>@lang('admin.nill')</td>
    @endif
                    <td>{{count(\App\Student::where('class',$class->id)->get())}}</td>
                     <td><button onclick="showAjaxModal('{{url('')}}/add/fee/class/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.edit_school_fee')</button></td>
                                            </tr>
                        @empty
                        <tr><td colspan="6">@lang('admin.no-entry')</td></tr>
                        @endforelse
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>          

@endsection