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
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">@lang('admin.result') @lang('admin.phrase')</a></li>
                                 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rsettings" role="tab">@lang('admin.setting')</a></li>
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
    @if(\App\Resultsetting::first()->division=='2')
    <div class="col-md-3">
                        <div class="form-group">
                      <label>{{\App\Resultphrase::first()->start_term}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->project_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="project_percent">
            </div>
        </div>
         <div class="col-md-3">
                        <div class="form-group">
                 <label>{{\App\Resultphrase::first()->exam}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->exam_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="exam_percent">
            </div>
        </div>
    @elseif(\App\Resultsetting::first()->division=='3')
    <div class="col-md-3">
                        <div class="form-group">
               <label>{{\App\Resultphrase::first()->start_term}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->test_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="test_percent">
                        </div> 
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                      <label>{{\App\Resultphrase::first()->mid_term}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->project_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="project_percent">
            </div>
        </div>
         <div class="col-md-3">
                        <div class="form-group">
                 <label>{{\App\Resultphrase::first()->exam}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->exam_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="exam_percent">
            </div>
        </div>
    @elseif(\App\Resultsetting::first()->division=='4')
     <div class="col-md-3">
                        <div class="form-group">
               <label>{{\App\Resultphrase::first()->start_term}} %</label>
                <input type="number" value="{{\App\Resultconfig::first()->start_percent}}" placeholder="" class="form-control col-md-12 col-xs-12" name="start_percent">
                        </div> 
                    </div>
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
    @endif 
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
                        <h4 class="card-title">@lang('admin.result') @lang('admin.phrase')</h4>
                         <h6 class="card-subtitle">@lang('admin.change_pref')</h6>
                        <hr>
    <form method="post" action="{{url('')}}/admin/result/phrases">
                             {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.result') @lang('admin.sheet')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->result_sheet}}" class="form-control" name="result_sheet">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.name')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->name}}" class="form-control" name="name">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.sex')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->sex}}" class="form-control" name="sex">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.age')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->age}}" class="form-control" name="age">   
                    </div> 
                    </div>  
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.admission_no')</label>
                <input type="text" value="{{\App\Resultphrase::first()->adm_no}}" class="form-control" name="adm_no">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.term')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->term}}" class="form-control" name="term">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.year')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->year}}" class="form-control" name="year">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.class')</label>
                    <input type="text" value="CLASS" class="form-control" name="class">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.num_in_class')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->number_class}}" class="form-control" name="number_class">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.num_sch_op')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->time_open}}" class="form-control" name="time_open">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.num_sch_pr')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->time_present}}" class="form-control" name="time_present">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.num_sch_pu')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->time_punctual}}" class="form-control" name="time_punctual">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.num_sch_late')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->time_late}}" class="form-control" name="time_late">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.num_sch_absent')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->time_absent}}" class="form-control" name="time_absent">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.term_beg')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->term_begin}}" class="form-control" name="term_begin">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.cont_asses')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->cont_asses}}" class="form-control" name="cont_asses">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.attend_reg')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->attend}}" class="form-control" name="attend">  
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.school')</label>
                <input type="text" value="{{\App\Resultphrase::first()->school}}" class="form-control" name="school">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.sport_ath')</label>
                <input type="text" value="{{\App\Resultphrase::first()->sport}}" class="form-control" name="sport">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.oth_act')</label>
                <input type="text" value="{{\App\Resultphrase::first()->other}}" class="form-control" name="other">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.max_mark')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->max_mark}}" class="form-control" name="max_mark">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.first')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->start_term}}" class="form-control" name="start_term">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.second')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->mid_term}}" class="form-control" name="mid_term">   
                    </div> 
                    </div> 
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.third')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->project}}" class="form-control" name="project">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.exam_n')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->exam}}" class="form-control" name="exam">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.total') @lang('admin.score')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->total_score}}" class="form-control" name="total_score">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.class') @lang('admin.average_n')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->class_average}}" class="form-control" name="class_average">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.grade')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->grade}}" class="form-control" name="grade">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.position_n')</label>
                <input type="text" value="{{\App\Resultphrase::first()->position}}" class="form-control" name="position">   
                    </div> 
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.retain_in')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->retain}}" class="form-control" name="retain">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.remark')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->remark}}" class="form-control" name="remark">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.behave_person')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->personality}}" class="form-control" name="promotion">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.rating')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->rate}}" class="form-control" name="rate">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.excellent')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->excellent}}" class="form-control" name="excellent">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.high_degree')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->high_degree}}" class="form-control" name="high_degree">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.accept_level')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->accept_level}}" class="form-control" name="accept_level">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.poor_level')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->poor_level}}" class="form-control" name="poor_level">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.indifferent')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->indifferent}}" class="form-control" name="indifferent">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.key_rating')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->key_rating}}" class="form-control" name="key_rating">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.physic_dev')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->physical_dev}}" class="form-control" name="physical_dev">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.height')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->height}}" class="form-control" name="height">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.weight')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->weight}}" class="form-control" name="weight">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.beg_term')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->beg_term}}" class="form-control" name="beg_term">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.end_term')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->end_term}}" class="form-control" name="end_term">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.facili_rem')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->fac_rem}}" class="form-control" name="fac_rem">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.head_facili_rem')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->head_rem}}" class="form-control" name="head_rem">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.signature')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->signature}}" class="form-control" name="signature">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.date')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->date}}" class="form-control" name="date">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.cl_facili_rem')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->class_fac}}" class="form-control" name="class_fac">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.av_core')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->average_score}}" class="form-control" name="average_score">   
                    </div> 
                    </div>
                     <div class="col-md-3">
                   <div class="form-group">
                    <label>@lang('admin.promot')</label>
                    <input type="text" value="{{\App\Resultphrase::first()->promotion}}" class="form-control" name="promotion">   
                    </div> 
                    </div>
                </div>
                   <div class="row">
                                      <div class="col-md-3">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="@lang('admin.submit')" class="btn btn-bg btn-primary btn-block text-white" name="">
                                                </div>
                                </div>
                                 <div class="col-md-3">
                                      </div>
                            </div>
                        </form>
                                </div>
                                 <div class="tab-pane" id="rsettings" role="tabpanel">
          <hr>
                        <h4 class="card-title">@lang('admin.result') @lang('admin.setting')</h4>
                         <h6 class="card-subtitle">@lang('admin.note_res_set')</h6>
                        <hr>
                      <form action="{{url('')}}/add/score/division" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
            <div class="col-md-3">
              <div class="form-group">
            <div class="input-group">
        @if(\App\Resultsetting::first()->sattend=='1')
         <input value="1" name="sattend" checked type="checkbox" class="check" id="minimal-checkbox-1">
        @elseif(\App\Resultsetting::first()->sattend=='0'||\App\Resultsetting::first()->sattend=='')
                  <input value="1" name="sattend" type="checkbox" class="check" id="minimal-checkbox-1">
                  @endif
                    <label for="minimal-checkbox-1">@lang('admin.show_attend')</label>
                    </div>
        </div>
        </div>
         
        <div class="col-md-3">
        <div class="form-group">
            <div class="input-group">
                @if(\App\Resultsetting::first()->personal=='1')
                 <input value="1" name="personal" checked type="checkbox" class="check" id="minimal-checkbox-3">
                @elseif(\App\Resultsetting::first()->personal=='0'||\App\Resultsetting::first()->personal=='')
                  <input value="1" name="personal" type="checkbox" class="check" id="minimal-checkbox-3">
                  @endif
                    <label for="minimal-checkbox-3">@lang('admin.behave_person')</label>
                    </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <div class="input-group">
                  @if(\App\Resultsetting::first()->physical=='1')
                 <input value="1" name="physical" checked type="checkbox" class="check" id="minimal-checkbox-4">
                @elseif(\App\Resultsetting::first()->physical=='0'||\App\Resultsetting::first()->physical=='')
                  <input value="1" name="physical" type="checkbox" class="check" id="minimal-checkbox-4">
                  @endif
                    <label for="minimal-checkbox-4">@lang('admin.physic_dev')</label>
                    </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <div class="input-group">
                 @if(\App\Resultsetting::first()->position=='1')
                 <input value="1" name="position" checked type="checkbox" class="check" id="minimal-checkbox-5">
                @elseif(\App\Resultsetting::first()->position=='0'||\App\Resultsetting::first()->position=='')
                  <input value="1" name="position" type="checkbox" class="check" id="minimal-checkbox-5">
                  @endif
                    <label for="minimal-checkbox-5">@lang('admin.show_posit')</label>
                    </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <div class="input-group">
                  @if(\App\Resultsetting::first()->web=='1')
                 <input value="1" name="web" checked type="checkbox" class="check" id="minimal-checkbox-6">
                @elseif(\App\Resultsetting::first()->web=='0'||\App\Resultsetting::first()->web=='')
                  <input value="1" name="web" type="checkbox" class="check" id="minimal-checkbox-6">
                  @endif
                    <label for="minimal-checkbox-6">@lang('admin.show_web')</label>
                    </div>
        </div>
    </div>
         </div>
         <div class="row">
                                      <div class="col-md-3">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="@lang('admin.submit')" class="btn btn-bg btn-primary btn-block" name="">
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