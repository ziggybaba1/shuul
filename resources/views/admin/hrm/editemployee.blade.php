<div class="card card-body">
                            <h4 class="card-title">@lang('admin.edit') @lang('admin.staff') @lang('admin.form')</h4>
                            <h6 class="card-subtitle">@lang('admin.edit') @lang('admin.staff')</h6>
<form action="{{url('')}}/edit_new/teacher/{{$id}}" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
            <label for="example-email">@lang('admin.staff_id') *<span class="help"></span></label>
               <input name="token" type="text" value="{{\App\Teacher::find($id)->user_id}}" required id="example-email"  class="form-control" placeholder="Employee ID">
                                </div>
                             <div class="form-group">
            <label for="example-email">@lang('admin.gname') *<span class="help"></span></label>
  <input name="gname" value="{{\App\Teacher::find($id)->gname}}" type="text" required id="example-email"  class="form-control" placeholder="">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.mname') <span class="help"></span></label>
               <input name="mname" value="{{\App\Teacher::find($id)->mname}}" type="text" id="example-email"  class="form-control" placeholder="">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.fname') *<span class="help"></span></label>
               <input name="fname" type="text" value="{{\App\Teacher::find($id)->fname}}" required id="example-email"  class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.dob') <span class="help"></span></label>
               <input name="dob" type="text" value="{{\App\Teacher::find($id)->dob}}" id="mdate" placeholder=""  class="form-control" >
                                </div>
                                 <div class="form-group">
                                <h4 class="card-title">@lang('admin.sex') *</h4>
                                <div class="demo-radio-button">
                      @if(\App\Teacher::find($id)->sex=='M')
                        <input name="sex" value="M" type="radio" id="radio_1" checked />
                                    <label for="radio_1">@lang('admin.male')</label>
                                     <input name="sex" value="F" type="radio" id="radio_2" />
                                    <label for="radio_2">@lang('admin.female')</label>
                                     <input name="sex" value="O" type="radio" id="radio_3" />
                                    <label for="radio_3">@lang('admin.other')</label>
                        @elseif(\App\Teacher::find($id)->sex=='F')
                            <input name="sex" value="M" type="radio" id="radio_1"  />
                                    <label for="radio_1">@lang('admin.male')</label>
                                     <input name="sex" value="F" type="radio" id="radio_2" checked />
                                    <label for="radio_2">@lang('admin.female')</label>
                                     <input name="sex" value="O" type="radio" id="radio_3" />
                                    <label for="radio_3">@lang('admin.other')</label>
                         @elseif(\App\Teacher::find($id)->sex=='O')
                                   <input name="sex" value="M" type="radio" id="radio_1"  />
                                    <label for="radio_1">@lang('admin.male')</label>
                                     <input name="sex" value="F" type="radio" id="radio_2" />
                                    <label for="radio_2">@lang('admin.female')</label>
                                     <input name="sex" value="O" type="radio" id="radio_3" checked />
                                    <label for="radio_3">@lang('admin.other')</label>
                          @endif
                                </div>
                            </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.pr_address') *<span class="help"></span></label>
               <textarea required name="praddress" placeholder="" class="form-control">{{\App\Teacher::find($id)->praddress}}</textarea>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.pe_address') *<span class="help"></span></label>
               <textarea required name="peaddress" placeholder="" class="form-control">{{\App\Teacher::find($id)->peaddress}}</textarea>
                                </div>
                            </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="example-email">@lang('admin.phone') *<span class="help"></span></label>
                <input required name="mobile" value="{{\App\Teacher::find($id)->dom1}}" type="text" id="phone"  class="form-control" placeholder="">
                 <span id="valid-msg" class="hide">✓ Valid</span>
                                        <span id="error-msg" class="hide"></span>
                                </div>
                                <div class="form-group">
                    <label for="example-email">@lang('admin.post_position') *<span class="help"></span></label>
                <input required name="position" value="{{\App\Teacher::find($id)->position}}" type="text" id="example-email"  class="form-control" placeholder="">
                                </div>
             <div class="form-group">
              <label for="example-email">@lang('admin.dept') *<span class="help"></span></label>
                <select name="dept" required class="form-control">
                   <option value="{{\App\Teacher::find($id)->dept}}">{{\App\Department::find(\App\Teacher::find($id)->dept)->name}}</option>
      @foreach(\App\Department::all() as $dept)
                   <option value="{{$dept->id}}">{{$dept->name}}</option>
                   @endforeach
               </select>
                                </div>
                                 <div class="form-group">
                    <label for="example-email">@lang('admin.staff') @lang('admin.type') *<span class="help"></span></label>
                <select id="status" name="type" required class="form-control">
                   <option id="nill" value="">@lang('admin.select') @lang('admin.type')</option>
                   <option id="teach" value="1">@lang('admin.teach')</option>
                   <option id="non" value="0">@lang('admin.no_teach')</option>
               </select>
                                </div>
                <div class="form-group">
                    <label for="example-email">@lang('admin.staff') @lang('admin.role') *<span class="help"></span></label>
                <select id="status" name="role" required class="form-control">
                   <option  value="{{\App\Teacher::find($id)->role}}">{{\App\Teacher::find($id)->role}}</option>
                   <option value="teacher">Teacher</option>
                   <option value="admin">Admin</option>
                   <option value="hrm">HRM</option>
                   <option value="account">Account</option>
                   <option value="library">Librarian</option>
               </select>
                           </div>
    @if(\App\Teacher::find($id)->type=='1')
    <div class="form-group">
                    <label for="example-email">@lang('admin.assign') @lang('admin.class') *<span class="help"></span></label>
               <select name="assign" class="form-control">
                   <option value="{{\App\Teacher::find($id)->assign}}">
                    @if(\App\Teacher::find($id)->assign!='')
                    {{\App\Course::find(\App\Teacher::find($id)->assign)->title}}
                  @endif</option>
                   @foreach(\App\Course::all() as $class)
                   <option value="{{$class->id}}">{{$class->title}}</option>
                   @endforeach
               </select>
                                </div>
                                <div class="form-group">
                    <label for="example-email">@lang('admin.assign') @lang('admin.subject') *<span class="help"></span></label>
               <select name="subassign" class="form-control select2">
          <option value="{{\App\Teacher::find($id)->subassign}}" selected>{{\App\Teacher::find($id)->subassign}}</option>
                   @foreach(\App\Subject::all() as $subject)
                   <option value="{{$subject->title}}">{{$subject->title}}</option>
                   @endforeach
               </select>
                                </div>
    @else
                <div id="hido">
                                 <div class="form-group">
                    <label for="example-email">@lang('admin.assign') @lang('admin.class') *<span class="help"></span></label>
               <select name="assign" class="form-control">
                   <option value="{{\App\Teacher::find($id)->assign}}">
                    @if(\App\Teacher::find($id)->assign!='')
                    {{\App\Course::find(\App\Teacher::find($id)->assign)->title}}
                  @endif</option>
                   @foreach(\App\Course::all() as $class)
                   <option value="{{$class->id}}">{{$class->title}}</option>
                   @endforeach
               </select>
                                </div>
                                <div class="form-group">
                    <label for="example-email">@lang('admin.assign') @lang('admin.subject') *<span class="help"></span></label>
               <select name="subassign" multiple class="form-control select2">
           <option value="{{\App\Teacher::find($id)->assign}}" selected>{{\App\Subject::find(\App\Teacher::find($id)->assign)->title}}</option>
                   @foreach(\App\Subject::all() as $subject)
                   <option value="{{$subject->id}}">{{$subject->title}}</option>
                   @endforeach
               </select>
                                </div>
                              </div>
                              @endif
                                  <div class="form-group">
                    <label for="example-email">@lang('admin.work_hour') *<span class="help"></span></label>
               <select name="work" class="form-control">
              @if(\App\Teacher::find($id)->work=='full')
                   <option value="full">@lang('admin.full_time')</option>
                   <option value="part">@lang('admin.part_time')</option>
              @else
                   <option value="part">@lang('admin.part_time')</option>
                    <option value="full">@lang('admin.full_time')</option>
                    @endif
               </select>
                                </div>
                                <div class="form-group">
                        <label>@lang('admin.staff') @lang('admin.image')<span class="help"></span></label>
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="{{url('')}}/uploads/avatars/{{\App\Teacher::find($id)->image}}" />
                                </div>
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="@lang('admin.submit')">
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
        
           <script type="text/javascript">
             $(document).ready(function() {
               $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
          $(".select2").select2();
          $('.dropify').dropify();
          $('#hido').hide();
          $("#status").change(function(){
  var id = $(this).find("option:selected").attr("id");

  switch (id){
    case "nill":
      $('#hido').hide();
      break;
       case "teach":
      $('#hido').show();
      break;
       case "non":
      $('#hido').hide();
      break;
  }
});
             });
           </script>
             <script>
    var input = document.querySelector("#phone");
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

// Error messages based on the code returned from getValidationError
var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
    var intl=window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      geoIpLookup: function(callback) {
       $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
       });
       },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
       nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
       placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
       separateDialCode: true,
      utilsScript: "{{url('')}}/build/js/utils.js",
    });
var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
}
input.addEventListener('blur', function() {
    reset();
    if(input.value.trim()){
        if(intl.isValidNumber()){
            validMsg.classList.remove("hide");
             var number = intl.getNumber(intlTelInputUtils.numberFormat.E164);
             $('#phone').val(number);
        }else{
            input.classList.add("error");
            var errorCode = intl.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
        }
    }
});
  </script>