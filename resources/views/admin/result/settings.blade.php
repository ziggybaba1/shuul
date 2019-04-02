@extends('layouts.admin')
@section('content')
 <div class="row page-titles">
     <div class="col-md-6 col-6 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.result') @lang('admin.sheet') @lang('admin.setting')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.result') @lang('admin.sheet') @lang('admin.setting')</li>
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
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                         <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">@lang('admin.result') @lang('admin.config')</a> </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">@lang('admin.edit') @lang('admin.result') @lang('admin.config')</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                      <hr>
                        <h4 class="card-title">@lang('admin.result') @lang('admin.config')</h4>
                         <h6 class="card-subtitle"></h6>
                        <hr>
                        <form method="post" action="{{url('')}}/admin/result/configuration">
                             {{ csrf_field() }}
                             <div class="row">
        <div class="col-md-3">
                        <div class="form-group">
               <label>{{\App\Resultphrase::first()->mid_term}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->test_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="test_percent">
                        </div> 
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                      <label>{{\App\Resultphrase::first()->project}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->project_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="project_percent">
            </div>
        </div>
         <div class="col-md-3">
                        <div class="form-group">
                 <label>{{\App\Resultphrase::first()->exam}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->exam_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="exam_percent">
            </div>
        </div>
        
    </div>
                        <div class="form-group">
                          <div class="input-group">
                <input type="text" value="{{\App\Resultconfig::first()->dis_val}}" placeholder="" class="form-control col-md-12 col-xs-12" name="dis_val">
                <input type="text" value="{{\App\Resultconfig::first()->dis_att}}" placeholder="" class="form-control col-md-12 col-xs-12" name="dis_att">
                <input type="number" value="{{\App\Resultconfig::first()->dis_start}}" placeholder="Start Range" class="form-control col-md-12 col-xs-12" name="dis_start">
                 <input type="number" value="{{\App\Resultconfig::first()->dis_end}}" placeholder="End Range" class="form-control col-md-12 col-xs-12" name="dis_end">
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="input-group">
                <input type="text" value="{{\App\Resultconfig::first()->vg_val}}" placeholder="" class="form-control col-md-12 col-xs-12" name="vg_val">
                <input type="text" value="{{\App\Resultconfig::first()->vg_att}}" placeholder="" class="form-control col-md-12 col-xs-12" name="vg_att">
                <input type="number" value="{{\App\Resultconfig::first()->vg_start}}" placeholder="Start Range" class="form-control col-md-12 col-xs-12" name="vg_start">
                 <input type="number" value="{{\App\Resultconfig::first()->vg_end}}" placeholder="End Range" class="form-control col-md-12 col-xs-12" name="vg_end">
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="input-group">
                <input type="text" value="{{\App\Resultconfig::first()->good_val}}" placeholder="" class="form-control col-md-12 col-xs-12" name="good_val">
                <input type="text" value="{{\App\Resultconfig::first()->good_att}}" placeholder="" class="form-control col-md-12 col-xs-12" name="good_att">
                <input type="number" value="{{\App\Resultconfig::first()->good_start}}" placeholder="Start Range" class="form-control col-md-12 col-xs-12" name="good_start">
                 <input type="number" value="{{\App\Resultconfig::first()->good_end}}" placeholder="End Range" class="form-control col-md-12 col-xs-12" name="good_end">
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="input-group">
                <input type="text" value="{{\App\Resultconfig::first()->fg_val}}" placeholder="" class="form-control col-md-12 col-xs-12" name="fg_val">
                <input type="text" value="{{\App\Resultconfig::first()->fg_att}}" placeholder="" class="form-control col-md-12 col-xs-12" name="fg_att">
                <input type="number" value="{{\App\Resultconfig::first()->fg_start}}" placeholder="Start Range" class="form-control col-md-12 col-xs-12" name="fg_start">
                 <input type="number" value="{{\App\Resultconfig::first()->fg_end}}" placeholder="End Range" class="form-control col-md-12 col-xs-12" name="fg_end">
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="input-group">
                <input type="text" value="{{\App\Resultconfig::first()->av_val}}" placeholder="" class="form-control col-md-12 col-xs-12" name="av_val">
                <input type="text" value="{{\App\Resultconfig::first()->av_att}}" placeholder="" class="form-control col-md-12 col-xs-12" name="av_att">
                <input type="number" value="{{\App\Resultconfig::first()->av_start}}" placeholder="Start Range" class="form-control col-md-12 col-xs-12" name="av_start">
                 <input type="number" value="{{\App\Resultconfig::first()->av_end}}" placeholder="End Range" class="form-control col-md-12 col-xs-12" name="av_end">
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="input-group">
                <input type="text" value="{{\App\Resultconfig::first()->weak_val}}" placeholder="" class="form-control col-md-12 col-xs-12" name="weak_val">
                <input type="text" value="{{\App\Resultconfig::first()->weak_att}}" placeholder="" class="form-control col-md-12 col-xs-12" name="weak_att">
                <input type="number" value="{{\App\Resultconfig::first()->weak_start}}" placeholder="Start Range" class="form-control col-md-12 col-xs-12" name="weak_start">
                 <input type="number" value="{{\App\Resultconfig::first()->weak_end}}" placeholder="End Range" class="form-control col-md-12 col-xs-12" name="weak_end">
                          </div>
                        </div>  
                         <div class="form-group">
                          <div class="input-group">
                <input type="text" value="{{\App\Resultconfig::first()->vw_val}}" placeholder="" class="form-control col-md-12 col-xs-12" name="vw_val">
                <input type="text" value="{{\App\Resultconfig::first()->vw_att}}" placeholder="" class="form-control col-md-12 col-xs-12" name="vw_att">
                <input type="number" value="{{\App\Resultconfig::first()->vw_start}}" placeholder="Start Range" class="form-control col-md-12 col-xs-12" name="vw_start">
                 <input type="number" value="{{\App\Resultconfig::first()->vw_end}}" placeholder="End Range" class="form-control col-md-12 col-xs-12" name="vw_end">
                          </div>
                        </div> 

                        <div class="row">
                                      <div class="col-md-3">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="Update Configuration" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
                                 <div class="col-md-3">
                                      </div>
                            </div>   
                        </form>
                                </div>
                                 <div class="tab-pane" id="settings" role="tabpanel">
          <hr>
                        <h4 class="card-title">Change Result Phrases</h4>
                         <h6 class="card-subtitle">change to your preffered language</h6>
                        <hr>
    <form method="post" action="{{url('')}}/admin/result/phrases">
                             {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>Result Sheet</label>
                    <input type="text" value="{{\App\Resultphrase::first()->result_sheet}}" class="form-control" name="result_sheet">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{\App\Resultphrase::first()->name}}" class="form-control" name="name">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Sex</label>
                    <input type="text" value="{{\App\Resultphrase::first()->sex}}" class="form-control" name="sex">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Age</label>
                    <input type="text" value="{{\App\Resultphrase::first()->age}}" class="form-control" name="sex">   
                    </div> 
                    </div>  
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Term</label>
                    <input type="text" value="{{\App\Resultphrase::first()->term}}" class="form-control" name="term">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Year</label>
                    <input type="text" value="{{\App\Resultphrase::first()->year}}" class="form-control" name="year">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Class</label>
                    <input type="text" value="CLASS" class="form-control" name="class">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Number in Class</label>
                    <input type="text" value="{{\App\Resultphrase::first()->number_class}}" class="form-control" name="number_class">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Number of Time School Opened</label>
                    <input type="text" value="{{\App\Resultphrase::first()->time_open}}" class="form-control" name="number_class">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Number of Time Present</label>
                    <input type="text" value="{{\App\Resultphrase::first()->time_present}}" class="form-control" name="number_class">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Next Term Begin</label>
                    <input type="text" value="{{\App\Resultphrase::first()->term_begin}}" class="form-control" name="number_class">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>Maximum Marks Obtainable</label>
                    <input type="text" value="{{\App\Resultphrase::first()->max_mark}}" class="form-control" name="max_mark">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Mid Term Test</label>
                    <input type="text" value="{{\App\Resultphrase::first()->mid_term}}" class="form-control" name="mid_term">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Project</label>
                    <input type="text" value="{{\App\Resultphrase::first()->project}}" class="form-control" name="project">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Examination</label>
                    <input type="text" value="{{\App\Resultphrase::first()->exam}}" class="form-control" name="exam">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Total Score</label>
                    <input type="text" value="{{\App\Resultphrase::first()->total_score}}" class="form-control" name="total_score">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Class Average</label>
                    <input type="text" value="{{\App\Resultphrase::first()->class_average}}" class="form-control" name="class_average">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Grade</label>
                    <input type="text" value="{{\App\Resultphrase::first()->grade}}" class="form-control" name="grade">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" value="{{\App\Resultphrase::first()->remark}}" class="form-control" name="remark">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Personality/Behaviour</label>
                    <input type="text" value="{{\App\Resultphrase::first()->personality}}" class="form-control" name="promotion">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Rating</label>
                    <input type="text" value="{{\App\Resultphrase::first()->rate}}" class="form-control" name="rate">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Excellent</label>
                    <input type="text" value="{{\App\Resultphrase::first()->excellent}}" class="form-control" name="excellent">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>High Degree</label>
                    <input type="text" value="{{\App\Resultphrase::first()->high_degree}}" class="form-control" name="high_degree">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Acceptance Level</label>
                    <input type="text" value="{{\App\Resultphrase::first()->accept_level}}" class="form-control" name="accept_level">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Poor Level</label>
                    <input type="text" value="{{\App\Resultphrase::first()->poor_level}}" class="form-control" name="poor_level">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Indifferent</label>
                    <input type="text" value="{{\App\Resultphrase::first()->indifferent}}" class="form-control" name="indifferent">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Keys to rating</label>
                    <input type="text" value="{{\App\Resultphrase::first()->key_rating}}" class="form-control" name="key_rating">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Physical Development</label>
                    <input type="text" value="{{\App\Resultphrase::first()->physical_dev}}" class="form-control" name="physical_dev">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Height</label>
                    <input type="text" value="{{\App\Resultphrase::first()->height}}" class="form-control" name="height">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Weight</label>
                    <input type="text" value="{{\App\Resultphrase::first()->weight}}" class="form-control" name="weight">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Begining of Term</label>
                    <input type="text" value="{{\App\Resultphrase::first()->beg_term}}" class="form-control" name="beg_term">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>End of Term</label>
                    <input type="text" value="{{\App\Resultphrase::first()->end_term}}" class="form-control" name="end_term">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Facilitators Remarks</label>
                    <input type="text" value="{{\App\Resultphrase::first()->fac_rem}}" class="form-control" name="fac_rem">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Head Facilitators Comment</label>
                    <input type="text" value="{{\App\Resultphrase::first()->head_rem}}" class="form-control" name="head_rem">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Signature</label>
                    <input type="text" value="{{\App\Resultphrase::first()->signature}}" class="form-control" name="signature">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Date</label>
                    <input type="text" value="{{\App\Resultphrase::first()->date}}" class="form-control" name="date">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Class Facilitaors Comment</label>
                    <input type="text" value="{{\App\Resultphrase::first()->class_fac}}" class="form-control" name="class_fac">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Average Score</label>
                    <input type="text" value="{{\App\Resultphrase::first()->average_score}}" class="form-control" name="average_score">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>Promotion</label>
                    <input type="text" value="{{\App\Resultphrase::first()->promotion}}" class="form-control" name="promotion">   
                    </div> 
                    </div>
                </div>
                   <div class="row">
                                      <div class="col-md-3">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="Update Phrases" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
                                 <div class="col-md-3">
                                      </div>
                            </div>
                        </form>
                                </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection