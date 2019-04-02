<div class="row">
                    <div class="col-sm-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.edit') @lang('admin.registered') @lang('admin.student')</h4>
                            <h6 class="card-subtitle"> @lang('admin.edit') @lang('admin.student')</h6>
<form action="{{url('')}}/edit/student/{{$id}}" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
    <div class="row">
                    <div class="col-sm-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.gname') *<span class="help"></span></label>
               <input name="gname" type="text" value="{{\App\Student::find($id)->gname}}" required id="example-email"  class="form-control" placeholder="Given Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.mname')<span class="help"></span></label>
               <input name="mname" type="text" value="{{\App\Student::find($id)->mname}}" id="example-email"  class="form-control" placeholder="Middle Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.fname') *<span class="help"></span></label>
               <input name="fname" type="text" required value="{{\App\Student::find($id)->fname}}" id="example-email"  class="form-control" placeholder="Family Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.faname') *<span class="help"></span></label>
               <input name="faname" type="text" value="{{\App\Student::find($id)->faname}}" required id="example-email"  class="form-control" placeholder="Father Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.maname') *<span class="help"></span></label>
               <input name="maname" type="text" value="{{\App\Student::find($id)->maname}}" required id="example-email"  class="form-control" placeholder="Mother Name">
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.dob') *<span class="help"></span></label>
               <input name="dob" type="text" value="{{\App\Student::find($id)->dob}}" required id="mdate" placeholder="Date of Birth"  class="form-control" >
                                </div>
                                 <div class="form-group">
                                <h4 class="card-title">@lang('admin.sex') *</h4>
                                <div class="demo-radio-button">
        @if(\App\Student::find($id)->sex=='M')
                        <input name="sex" value="M" type="radio" id="radio_1" checked />
                                    <label for="radio_1">@lang('admin.male')</label>
                            <input name="sex" value="F" type="radio" id="radio_2" />
                                    <label for="radio_2">@lang('admin.female')</label>
          @else
           <input name="sex" value="M" type="radio" id="radio_1" />
                                    <label for="radio_1">@lang('admin.male')</label>
                            <input name="sex" value="F" type="radio" id="radio_2" checked/>
                                    <label for="radio_2">@lang('admin.female')</label>
          @endif
                                </div>
                            </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.pr_address') *<span class="help"></span></label>
<textarea required name="praddress" placeholder="Present Address" class="form-control">{{\App\Student::find($id)->praddress}}</textarea>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.pe_address') *<span class="help"></span></label>
               <textarea required name="peaddress" placeholder="Permanent Address" class="form-control">{{\App\Student::find($id)->peaddress}}</textarea>
                                </div>
                            </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="example-email">@lang('admin.phone') *<span class="help"></span></label>
                <input required name="mobile" value="{{\App\Student::find($id)->dom1}}" type="text" id="example-email"  class="form-control" placeholder="Phone Number">
                                </div>
                         <div class="form-group">
                <label>@lang('admin.blood_grp')<span class="help"></span></label>
                        <select required name="group" class="form-control">
                    <option>{{\App\Student::find($id)->group}}</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                                </div>
                                 <div class="form-group">
                        <label>@lang('admin.father_occ')<span class="help"></span></label>
                    <input name="foccupation" value="{{\App\Student::find($id)->foccupation}}" type="text" id="example-email"  class="form-control" placeholder="@lang('admin.father_occ')">
                                </div>
                                <div class="form-group">
                        <label>@lang('admin.mother_occ')<span class="help"></span></label>
                    <input name="moccupation" type="text" value="{{\App\Student::find($id)->moccupation}}" id="example-email"  class="form-control" placeholder="@lang('admin.mother_occ')">
                                </div>
                                 <div class="form-group">
                                    <label>@lang('admin.select') @lang('admin.class')<span class="help"></span></label>
                        <select required name="class" class="form-control">
                          <option value="{{\App\Student::find($id)->class}}">{{\App\Course::find(\App\Student::find($id)->class)->title}}</option>
                            @foreach(\App\Course::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                            @endforeach
                        </select>
                                </div>
                                <div class="form-group">
                        <label>@lang('admin.change') @lang('admin.student') @lang('admin.image')<span class="help"></span></label>
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="" />
                                </div>
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="@lang('admin.submit')">
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
                    </div>
                </div>