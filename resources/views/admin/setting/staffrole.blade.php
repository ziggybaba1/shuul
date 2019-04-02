<div class="row">
                      <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.assign_perm') <b>{{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</b></h4>
                                <h6 class="card-subtitle">@lang('admin.assign_note')</h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#academic" role="tab">@lang('admin.academic')</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#cbt" role="tab">@lang('admin.cbt')</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#student" role="tab">@lang('admin.student')</a> </li>
                                     <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#source" role="tab">@lang('admin.source')</a> </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#boarding" role="tab">@lang('admin.boarding') </a></li>
                                 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#resource" role="tab">@lang('admin.resource')</a></li>
                                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#hrm" role="tab">@lang('admin.hrm')</a> </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#account" role="tab">@lang('admin.account') </a></li>
                                 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#message" role="tab">@lang('admin.messaging')</a></li>
                              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting" role="tab">@lang('admin.setting')</a></li>

                                </ul>
    <form action="{{url('')}}/add/staff/role/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="academic" role="tabpanel">
                                        <div class="p-20">
                                           <h4 class="card-title">@lang('admin.aca_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->class=='1')               
              <input value="1" name="class" checked type="checkbox" class="check" id="minimal-checkbox-1">
    @else
     <input value="1" name="class" type="checkbox" class="check" id="minimal-checkbox-1">
     @endif
              <label for="minimal-checkbox-1">@lang('admin.class_subject_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->behave=='1')               
              <input value="1" name="behave" checked type="checkbox" class="check" id="minimal-checkbox-2">
    @else
     <input value="1" name="behave" type="checkbox" class="check" id="minimal-checkbox-2">
     @endif
              <label for="minimal-checkbox-2">@lang('admin.behave_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->result_gen=='1')               
              <input value="1" name="result_gen" checked type="checkbox" class="check" id="minimal-checkbox-3">
    @else
     <input value="1" name="result_gen" type="checkbox" class="check" id="minimal-checkbox-3">
     @endif
              <label for="minimal-checkbox-3">@lang('admin.report_gen_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->result_setting=='1')               
              <input value="1" name="result_setting" checked type="checkbox" class="check" id="minimal-checkbox-4">
    @else
     <input value="1" name="result_setting" type="checkbox" class="check" id="minimal-checkbox-4">
     @endif
              <label for="minimal-checkbox-4">@lang('admin.report_set_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->syllabus=='1')               
              <input value="1" name="syllabus" checked type="checkbox" class="check" id="minimal-checkbox-5">
    @else
     <input value="1" name="syllabus" type="checkbox" class="check" id="minimal-checkbox-5">
     @endif
              <label for="minimal-checkbox-5">@lang('admin.syllab_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->lesson=='1')               
              <input value="1" name="lesson" checked type="checkbox" class="check" id="minimal-checkbox-6">
    @else
     <input value="1" name="lesson" type="checkbox" class="check" id="minimal-checkbox-6">
     @endif
              <label for="minimal-checkbox-6">@lang('admin.lesson_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->del_syle=='1')               
              <input value="1" name="del_syle" checked type="checkbox" class="check" id="minimal-checkbox-7">
    @else
     <input value="1" name="del_syle" type="checkbox" class="check" id="minimal-checkbox-7">
     @endif
              <label for="minimal-checkbox-7">@lang('admin.del_aca_perm')</label>
            </div>
        </div>  
        </div>
        @endif
      </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="cbt" role="tabpanel">
                                   <div class="p-20">
                                           <h4 class="card-title">@lang('admin.cbt_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->batch=='1')               
              <input value="1" name="batch" checked type="checkbox" class="check" id="minimal-checkbox-8">
    @else
     <input value="1" name="batch" type="checkbox" class="check" id="minimal-checkbox-8">
     @endif
              <label for="minimal-checkbox-8">@lang('admin.batch_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->question=='1')               
              <input value="1" name="question" checked type="checkbox" class="check" id="minimal-checkbox-9">
    @else
     <input value="1" name="question" type="checkbox" class="check" id="minimal-checkbox-9">
     @endif
              <label for="minimal-checkbox-9">@lang('admin.question_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->result_col=='1')               
              <input value="1" name="result_col" checked type="checkbox" class="check" id="minimal-checkbox-10">
    @else
     <input value="1" name="result_col" type="checkbox" class="check" id="minimal-checkbox-10">
     @endif
              <label for="minimal-checkbox-10">@lang('admin.result_col_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->reset=='1')               
              <input value="1" name="reset" checked type="checkbox" class="check" id="minimal-checkbox-11">
    @else
     <input value="1" name="reset" type="checkbox" class="check" id="minimal-checkbox-11">
     @endif
              <label for="minimal-checkbox-11">@lang('admin.reset_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->batch_act=='1')               
              <input value="1" name="batch_act" checked type="checkbox" class="check" id="minimal-checkbox-12">
    @else
     <input value="1" name="batch_act" type="checkbox" class="check" id="minimal-checkbox-12">
     @endif
              <label for="minimal-checkbox-12">@lang('admin.activate_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->del_cbt=='1')               
              <input value="1" name="del_cbt" checked type="checkbox" class="check" id="minimal-checkbox-13">
    @else
     <input value="1" name="del_cbt" type="checkbox" class="check" id="minimal-checkbox-13">
     @endif
              <label for="minimal-checkbox-13">@lang('admin.debcbt_perm')</label>
            </div>
        </div>  
        </div>
      
        @endif
      </div>
                                        </div>   

                                    </div>
                                    <div class="tab-pane p-20" id="student" role="tabpanel">
                                    <div class="p-20">
                                           <h4 class="card-title">@lang('admin.student_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->student=='1')               
              <input value="1" name="student" checked type="checkbox" class="check" id="minimal-checkbox-14">
    @else
     <input value="1" name="student" type="checkbox" class="check" id="minimal-checkbox-14">
     @endif
              <label for="minimal-checkbox-14">@lang('admin.sstudent_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->timetable=='1')               
              <input value="1" name="timetable" checked type="checkbox" class="check" id="minimal-checkbox-15">
    @else
     <input value="1" name="timetable" type="checkbox" class="check" id="minimal-checkbox-15">
     @endif
              <label for="minimal-checkbox-15">@lang('admin.timetable_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->grad=='1')               
              <input value="1" name="grad" checked type="checkbox" class="check" id="minimal-checkbox-16">
    @else
     <input value="1" name="grad" type="checkbox" class="check" id="minimal-checkbox-16">
     @endif
              <label for="minimal-checkbox-16">@lang('admin.grad_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->ybook=='1')               
              <input value="1" name="ybook" checked type="checkbox" class="check" id="minimal-checkbox-17">
    @else
     <input value="1" name="ybook" type="checkbox" class="check" id="minimal-checkbox-17">
     @endif
              <label for="minimal-checkbox-17">@lang('admin.ybook_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->saward=='1')               
              <input value="1" name="saward" checked type="checkbox" class="check" id="minimal-checkbox-18">
    @else
     <input value="1" name="saward" type="checkbox" class="check" id="minimal-checkbox-18">
     @endif
              <label for="minimal-checkbox-18">@lang('admin.saward_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->sattend=='1')               
              <input value="1" name="sattend" checked type="checkbox" class="check" id="minimal-checkbox-19">
    @else
     <input value="1" name="sattend" type="checkbox" class="check" id="minimal-checkbox-19">
     @endif
              <label for="minimal-checkbox-19">@lang('admin.sattend_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->del_stud=='1')               
              <input value="1" name="del_stud" checked type="checkbox" class="check" id="minimal-checkbox-20">
    @else
     <input value="1" name="del_stud" type="checkbox" class="check" id="minimal-checkbox-20">
     @endif
              <label for="minimal-checkbox-20">@lang('admin.delstud_perm')</label>
            </div>
        </div>  
        </div>
      
        @endif
      </div>
                                        </div>   

                                    </div>
                                     <div class="tab-pane" id="source" role="tabpanel">
    <div class="p-20">
                                           <h4 class="card-title">@lang('admin.source_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->pickup=='1')               
              <input value="1" name="pickup" checked type="checkbox" class="check" id="minimal-checkbox-21">
    @else
     <input value="1" name="pickup" type="checkbox" class="check" id="minimal-checkbox-21">
     @endif
              <label for="minimal-checkbox-21">@lang('admin.pickup_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->parent=='1')               
              <input value="1" name="parent" checked type="checkbox" class="check" id="minimal-checkbox-22">
    @else
     <input value="1" name="parent" type="checkbox" class="check" id="minimal-checkbox-22">
     @endif
              <label for="minimal-checkbox-22">@lang('admin.parent_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->del_source=='1')               
              <input value="1" name="del_source" checked type="checkbox" class="check" id="minimal-checkbox-23">
    @else
     <input value="1" name="del_source" type="checkbox" class="check" id="minimal-checkbox-23">
     @endif
              <label for="minimal-checkbox-23">@lang('admin.del_source_perm')</label>
            </div>
        </div>  
        </div>
        @endif
      </div>
                                        </div>
  </div>
  <div class="tab-pane" id="boarding" role="tabpanel">
     <div class="p-20">
                                           <h4 class="card-title">@lang('admin.boarding_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->hostel=='1')               
              <input value="1" name="hostel" checked type="checkbox" class="check" id="minimal-checkbox-24">
    @else
     <input value="1" name="hostel" type="checkbox" class="check" id="minimal-checkbox-24">
     @endif
              <label for="minimal-checkbox-24">@lang('admin.hostel_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->bed=='1')               
              <input value="1" name="bed" checked type="checkbox" class="check" id="minimal-checkbox-25">
    @else
     <input value="1" name="bed" type="checkbox" class="check" id="minimal-checkbox-25">
     @endif
              <label for="minimal-checkbox-25">@lang('admin.bed_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->report=='1')               
              <input value="1" name="report" checked type="checkbox" class="check" id="minimal-checkbox-26">
    @else
     <input value="1" name="report" type="checkbox" class="check" id="minimal-checkbox-26">
     @endif
              <label for="minimal-checkbox-26">@lang('admin.report_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->del_board=='1')               
              <input value="1" name="del_board" checked type="checkbox" class="check" id="minimal-checkbox-27">
    @else
     <input value="1" name="del_board" type="checkbox" class="check" id="minimal-checkbox-27">
     @endif
              <label for="minimal-checkbox-27">@lang('admin.delboard_perm')</label>
            </div>
        </div>  
        </div>
        @endif
      </div>
                                        </div>
  </div>
  <div class="tab-pane" id="resource" role="tabpanel">
   <div class="p-20">
                                           <h4 class="card-title">@lang('admin.resource_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->category=='1')               
              <input value="1" name="category" checked type="checkbox" class="check" id="minimal-checkbox-28">
    @else
     <input value="1" name="category" type="checkbox" class="check" id="minimal-checkbox-28">
     @endif
              <label for="minimal-checkbox-28">@lang('admin.category_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->inventory=='1')               
              <input value="1" name="inventory" checked type="checkbox" class="check" id="minimal-checkbox-29">
    @else
     <input value="1" name="inventory" type="checkbox" class="check" id="minimal-checkbox-29">
     @endif
              <label for="minimal-checkbox-29">@lang('admin.inventory_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->request=='1')               
              <input value="1" name="requestn" checked type="checkbox" class="check" id="minimal-checkbox-30">
    @else
     <input value="1" name="requestn" type="checkbox" class="check" id="minimal-checkbox-30">
     @endif
              <label for="minimal-checkbox-30">@lang('admin.request_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->book=='1')               
              <input value="1" name="book" checked type="checkbox" class="check" id="minimal-checkbox-31">
    @else
     <input value="1" name="book" type="checkbox" class="check" id="minimal-checkbox-31">
     @endif
              <label for="minimal-checkbox-31">@lang('admin.book_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->order=='1')               
              <input value="1" name="order" checked type="checkbox" class="check" id="minimal-checkbox-32">
    @else
     <input value="1" name="order" type="checkbox" class="check" id="minimal-checkbox-32">
     @endif
              <label for="minimal-checkbox-32">@lang('admin.order_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->del_inv=='1')               
              <input value="1" name="del_inv" checked type="checkbox" class="check" id="minimal-checkbox-33">
    @else
     <input value="1" name="del_inv" type="checkbox" class="check" id="minimal-checkbox-33">
     @endif
              <label for="minimal-checkbox-33">@lang('admin.delinv_perm')</label>
            </div>
        </div>  
        </div> 
        @endif
  </div>
</div>
</div>
  <div class="tab-pane p-20" id="hrm" role="tabpanel">
      <div class="p-20">
                                           <h4 class="card-title">@lang('admin.hrm_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->dept=='1')               
              <input value="1" name="dept" checked type="checkbox" class="check" id="minimal-checkbox-34">
    @else
     <input value="1" name="dept" type="checkbox" class="check" id="minimal-checkbox-34">
     @endif
              <label for="minimal-checkbox-34">@lang('admin.dept_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->staff=='1')               
              <input value="1" name="staff" checked type="checkbox" class="check" id="minimal-checkbox-35">
    @else
     <input value="1" name="staff" type="checkbox" class="check" id="minimal-checkbox-35">
     @endif
              <label for="minimal-checkbox-35">@lang('admin.staff_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->stattend=='1')               
              <input value="1" name="stattend" checked type="checkbox" class="check" id="minimal-checkbox-36">
    @else
     <input value="1" name="stattend" type="checkbox" class="check" id="minimal-checkbox-36">
     @endif
              <label for="minimal-checkbox-36">@lang('admin.stattend_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->leave=='1')               
              <input value="1" name="leave" checked type="checkbox" class="check" id="minimal-checkbox-37">
    @else
     <input value="1" name="leave" type="checkbox" class="check" id="minimal-checkbox-37">
     @endif
              <label for="minimal-checkbox-37">@lang('admin.leave_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->staward=='1')               
              <input value="1" name="staward" checked type="checkbox" class="check" id="minimal-checkbox-38">
    @else
     <input value="1" name="staward" type="checkbox" class="check" id="minimal-checkbox-38">
     @endif
              <label for="minimal-checkbox-38">@lang('admin.staward_perm')</label>
            </div>
        </div>  
        </div>
        @endif
  </div>
</div>
</div>
  <div class="tab-pane p-20" id="account" role="tabpanel">
    <div class="p-20">
                                           <h4 class="card-title">@lang('admin.account_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->expense=='1')               
              <input value="1" name="expense" checked type="checkbox" class="check" id="minimal-checkbox-39">
    @else
     <input value="1" name="expense" type="checkbox" class="check" id="minimal-checkbox-39">
     @endif
              <label for="minimal-checkbox-39">@lang('admin.expense_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->title=='1')               
              <input value="1" name="title" checked type="checkbox" class="check" id="minimal-checkbox-40">
    @else
     <input value="1" name="title" type="checkbox" class="check" id="minimal-checkbox-40">
     @endif
              <label for="minimal-checkbox-40">@lang('admin.title_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->invoice=='1')               
              <input value="1" name="invoice" checked type="checkbox" class="check" id="minimal-checkbox-41">
    @else
     <input value="1" name="invoice" type="checkbox" class="check" id="minimal-checkbox-41">
     @endif
              <label for="minimal-checkbox-41">@lang('admin.invoice_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->pay=='1')               
              <input value="1" name="pay" checked type="checkbox" class="check" id="minimal-checkbox-42">
    @else
     <input value="1" name="pay" type="checkbox" class="check" id="minimal-checkbox-42">
     @endif
              <label for="minimal-checkbox-42">@lang('admin.pay_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->payroll=='1')               
              <input value="1" name="payroll" checked type="checkbox" class="check" id="minimal-checkbox-43">
    @else
     <input value="1" name="payroll" type="checkbox" class="check" id="minimal-checkbox-43">
     @endif
              <label for="minimal-checkbox-43">@lang('admin.payroll_perm')</label>
            </div>
        </div>  
        </div>
        @endif
  </div>
</div> 
  </div>
  <div class="tab-pane p-20" id="message" role="tabpanel">
    <div class="p-20">
                                           <h4 class="card-title">@lang('admin.messaging_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->announce=='1')               
              <input value="1" name="announce" checked type="checkbox" class="check" id="minimal-checkbox-44">
    @else
     <input value="1" name="announce" type="checkbox" class="check" id="minimal-checkbox-44">
     @endif
              <label for="minimal-checkbox-44">@lang('admin.announce_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->forum=='1')               
              <input value="1" name="forum" checked type="checkbox" class="check" id="minimal-checkbox-45">
    @else
     <input value="1" name="forum" type="checkbox" class="check" id="minimal-checkbox-45">
     @endif
              <label for="minimal-checkbox-45">@lang('admin.forum_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->topic=='1')               
              <input value="1" name="topic" checked type="checkbox" class="check" id="minimal-checkbox-46">
    @else
     <input value="1" name="topic" type="checkbox" class="check" id="minimal-checkbox-46">
     @endif
              <label for="minimal-checkbox-46">@lang('admin.topic_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->contact=='1')               
              <input value="1" name="contact" checked type="checkbox" class="check" id="minimal-checkbox-47">
    @else
     <input value="1" name="contact" type="checkbox" class="check" id="minimal-checkbox-47">
     @endif
              <label for="minimal-checkbox-47">@lang('admin.contact_perm')</label>
            </div>
        </div>  
        </div>
     
        @endif
  </div>
</div> 
  </div>
  <div class="tab-pane p-20" id="setting" role="tabpanel">
      <div class="p-20">
                                           <h4 class="card-title">@lang('admin.setting_perm') {{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
  @if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0)
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->front=='1')               
              <input value="1" name="front" checked type="checkbox" class="check" id="minimal-checkbox-48">
    @else
     <input value="1" name="front" type="checkbox" class="check" id="minimal-checkbox-48">
     @endif
              <label for="minimal-checkbox-48">@lang('admin.front_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->event=='1')               
              <input value="1" name="event" checked type="checkbox" class="check" id="minimal-checkbox-49">
    @else
     <input value="1" name="event" type="checkbox" class="check" id="minimal-checkbox-49">
     @endif
              <label for="minimal-checkbox-49">@lang('admin.event_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->gallery=='1')               
              <input value="1" name="gallery" checked type="checkbox" class="check" id="minimal-checkbox-50">
    @else
     <input value="1" name="gallery" type="checkbox" class="check" id="minimal-checkbox-50">
     @endif
              <label for="minimal-checkbox-50">@lang('admin.gallery_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->notice=='1')               
              <input value="1" name="notice" checked type="checkbox" class="check" id="minimal-checkbox-51">
    @else
     <input value="1" name="notice" type="checkbox" class="check" id="minimal-checkbox-51">
     @endif
              <label for="minimal-checkbox-51">@lang('admin.notice_perm')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->calendar=='1')               
              <input value="1" name="calendar" checked type="checkbox" class="check" id="minimal-checkbox-52">
    @else
     <input value="1" name="calendar" type="checkbox" class="check" id="minimal-checkbox-52">
     @endif
              <label for="minimal-checkbox-52">@lang('admin.calendar_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->role=='1')               
              <input value="1" name="role" checked type="checkbox" class="check" id="minimal-checkbox-53">
    @else
     <input value="1" name="role" type="checkbox" class="check" id="minimal-checkbox-53">
     @endif
              <label for="minimal-checkbox-53">@lang('admin.role_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->sfee=='1')               
              <input value="1" name="sfee" checked type="checkbox" class="check" id="minimal-checkbox-54">
    @else
     <input value="1" name="sfee" type="checkbox" class="check" id="minimal-checkbox-54">
     @endif
              <label for="minimal-checkbox-54">@lang('admin.sfee_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->stsalary=='1')               
              <input value="1" name="stsalary" checked type="checkbox" class="check" id="minimal-checkbox-55">
    @else
     <input value="1" name="stsalary" type="checkbox" class="check" id="minimal-checkbox-55">
     @endif
              <label for="minimal-checkbox-55">@lang('admin.stsalary_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->ginfo=='1')               
              <input value="1" name="ginfo" checked type="checkbox" class="check" id="minimal-checkbox-56">
    @else
     <input value="1" name="ginfo" type="checkbox" class="check" id="minimal-checkbox-56">
     @endif
              <label for="minimal-checkbox-56">@lang('admin.ginfo_perm')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first()->backup=='1')               
              <input value="1" name="backup" checked type="checkbox" class="check" id="minimal-checkbox-57">
    @else
     <input value="1" name="backup" type="checkbox" class="check" id="minimal-checkbox-57">
     @endif
              <label for="minimal-checkbox-57">@lang('admin.backup_perm')</label>
            </div>
        </div>  
        </div>
        @endif
  </div>
</div> 
  </div>
                                </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-body">
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block text-white" name="@lang('admin.submit')">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                              </form>
                            </div>
                        </div>
                    </div>
                    </div>
            <script type="text/javascript">
               $(document).ready(function() {
            $('.select2').select2();
        $('.dropify').dropify();
         });
            </script>