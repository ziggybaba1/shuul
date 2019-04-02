<div class="card card-body">
                  <div class="row">
                    <div class="col-md-12">
                                       <form  action="{{url('')}}/add/home/count" method="post" enctype="multipart/form-data" class="">
                                       	<div class="row">
             {{ csrf_field() }}       
                                                <div class="col-md-6">
              <div class="form-group">
                              <label>@lang('admin.student_enrol')</label>
                      <input type="number" value="{{\App\Fronthome::first()->count_stud}}" placeholder="" class="form-control" name="count_stud">
                          </div>
                      <div class="form-group">
                              <label>@lang('admin.cert_teach')</label>
                      <input type="number" value="{{\App\Fronthome::first()->cert_teach}}" placeholder="" class="form-control" name="cert_teach">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.pass_uni') @lang('admin.percent')</label>
                      <input type="number" value="{{\App\Fronthome::first()->uni_pass}}" placeholder="" class="form-control" name="uni_pass">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.parent_satisfy') @lang('admin.percent')</label>
                      <input type="number" value="{{\App\Fronthome::first()->parent_sat}}" placeholder="" class="form-control" name="parent_sat">
                          </div>
                           
                           <div class="form-group">
                      <input type="submit" value="@lang('admin.submit')" placeholder="" class="btn btn-primary btn-block" name="course">
                          </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>