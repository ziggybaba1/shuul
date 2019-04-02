<div class="card card-body">
                            <h4 class="card-title">@lang('admin.staff') @lang('admin.form')</h4>
                            <h6 class="card-subtitle"> @lang('admin.add') @lang('admin.new') @lang('admin.staff')</h6>
<form action="{{url('')}}/create_new/teacher" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
            <label for="example-email">@lang('admin.staff_id') *<span class="help"></span></label>
               <input name="token" type="text" required id="example-email"  class="form-control" placeholder="">
                                </div>
                             <div class="form-group">
            <label for="example-email">@lang('admin.gname') *<span class="help"></span></label>
               <input name="gname" type="text" required id="example-email"  class="form-control" placeholder="">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.mname') <span class="help"></span></label>
               <input name="mname" type="text" id="example-email"  class="form-control" placeholder="">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.fname') *<span class="help"></span></label>
               <input name="fname" type="text" required id="example-email"  class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.dob') <span class="help"></span></label>
               <input name="dob" type="text" id="mdate" placeholder=""  class="form-control" >
                                </div>
                                 <div class="form-group">
                                <h4 class="card-title">@lang('admin.sex') *</h4>
                                <div class="demo-radio-button">
                        <input name="sex" value="M" type="radio" id="radio_1" checked />
                                    <label for="radio_1">@lang('admin.male')</label>
                            <input name="sex" value="F" type="radio" id="radio_2" />
                                    <label for="radio_2">@lang('admin.female')</label>
                                     <input name="sex" value="O" type="radio" id="radio_3" />
                                    <label for="radio_3">@lang('admin.other')</label>
                                </div>
                            </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.pr_address') *<span class="help"></span></label>
               <textarea required name="praddress" placeholder="" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.pe_address') *<span class="help"></span></label>
               <textarea required name="peaddress" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="example-email">@lang('admin.phone') *<span class="help"></span></label>
                <input required name="mobile" type="text" id="phone"  class="form-control" placeholder="">
                 <span id="valid-msg" class="hide">✓ Valid</span>
                                        <span id="error-msg" class="hide"></span>
                                </div>
                                 <div class="form-group">
                    <label for="example-email">@lang('admin.email') *<span class="help"></span></label>
                <input required name="email" type="email"  class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                    <label for="example-email">@lang('admin.post_position') *<span class="help"></span></label>
                <input required name="position" type="text" id="example-email"  class="form-control" placeholder="e.gHead Master, Principal....">
                                </div>
             <div class="form-group">
              <label for="example-email">@lang('admin.staff_dept') *<span class="help"></span></label>
                <select name="dept" required class="form-control">
                   <option value="@lang('admin.select_dept')"></option>
      @foreach(\App\Department::all() as $dept)
                   <option value="{{$dept->id}}">{{$dept->name}}</option>
                   @endforeach
               </select>
                                </div>
                                 <div class="form-group">
                    <label for="example-email">@lang('admin.type') *<span class="help"></span></label>
                <select id="status" name="type" required class="form-control">
                   <option id="nill" value="">@lang('admin.select_type')</option>
                   <option id="teach" value="1">@lang('admin.teach')</option>
                   <option id="non" value="0">@lang('admin.no_teach')</option>
               </select>
                                </div>
                <div class="form-group">
                    <label for="example-email">@lang('admin.select') @lang('admin.staff') @lang('admin.role')*<span class="help"></span></label>
                <select id="status" name="role" required class="form-control">
                   <option  value="">@lang('admin.select') @lang('admin.role')</option>
                   <option value="teacher">@lang('admin.teacher')</option>
                   <option value="admin">@lang('admin.admin')</option>
                   <option value="hrm">@lang('admin.hrm')</option>
                   <option value="account">@lang('admin.account')</option>
                   <option value="library">@lang('admin.library')</option>
                   <option value="medical">@lang('admin.medical')</option>
                   <option value="staff">@lang('admin.staff')</option>
               </select>
                                </div>
                <div id="hido">
                                 <div class="form-group">
                    <label for="example-email">@lang('admin.assign') @lang('admin.class') *<span class="help"></span></label>
               <select name="assign" class="form-control">
                   <option value="">@lang('admin.select') @lang('admin.class')</option>
                   <option value="">@lang('admin.non')</option>
                   @foreach(\App\Course::all() as $class)
                   <option value="{{$class->id}}">{{$class->title}}</option>
                   @endforeach
               </select>
                                </div>
                                <div class="form-group">
                    <label for="example-email">@lang('admin.assign') @lang('admin.subject') *<span class="help"></span></label>
               <select name="subassign" class="form-control select2">
                   <option value="">@lang('admin.select') @lang('admin.subject')</option>
                   <option value="">@lang('admin.non')</option>
                   @foreach(\App\Subject::all() as $subject)
                   <option value="{{$subject->title}}">{{$subject->title}}</option>
                   @endforeach
               </select>
                                </div>
                              </div>
                                  <div class="form-group">
                    <label for="example-email">@lang('admin.work_hour') *<span class="help"></span></label>
               <select name="work" class="form-control">
                   <option value="full">@lang('admin.full_time')</option>
                   <option value="part">@lang('admin.part_time')</option>
               </select>
                                </div>
                                <div class="form-group">
                        <label>@lang('admin.staff') @lang('admin.image')<span class="help"></span></label>
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="" />
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
              
        
        $('.dropify').dropify();
      
          $(".select2").select2();
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