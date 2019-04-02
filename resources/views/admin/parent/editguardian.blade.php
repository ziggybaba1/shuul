<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit') @lang('admin.guardian')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/existing/guardian/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.name')</label>
              <input type="text" value="{{\App\Parenting::find($id)->name}}" class="form-control" name="name">
                                      </div>   
                            </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                         <label>@lang('admin.email_username')</label>
                      <input type="text" value="{{\App\Parenting::find($id)->email}}" class="form-control" name="email">
                                      </div>   
                                </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                         <label>@lang('admin.password')</label>
                    <input type="text" value="{{\App\Parenting::find($id)->password}}" class="form-control" name="password">
                                      </div>   
                                        </div>
                                    </div>
        <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.phone')</label>
                <input type="tel" id="phone" value="{{\App\Parenting::find($id)->phone}}" class="form-control" name="phone">
                                      </div>   
                                        </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                         <label>@lang('admin.address')</label>
              <input type="text" value="{{\App\Parenting::find($id)->address}}" class="form-control" name="address">
                                      </div>   
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                         <label>@lang('admin.profession')</label>
                            <input type="text" value="{{\App\Parenting::find($id)->work}}" class="form-control" name="work">
                                      </div>   
                                        </div>
                                    </div>
                                    <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.upload_image')</label>
                              <input type="file" class="form-control" name="file">
                                      </div>   
                                        </div>
                                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.assign') @lang('admin.student')</label>
                          <select multiple class="form-control select2" style="width: 100%;" name="student[]">
                            @foreach(\App\Related::where('guardian_id',$id)->get() as $ward)
                            <option selected value="{{$ward->student_id}}">{{\App\Student::find($ward->student_id)->user_id}} {{\App\Student::find($ward->student_id)->gname}} {{\App\Student::find($ward->student_id)->fname}}</option>
                            @endforeach
                            @foreach(\App\Student::where('status','0')->get() as $student)
                            <option value="{{$student->id}}">{{$student->user_id}} {{$student->gname}} {{$student->fname}}</option>
                          @endforeach
                          </select>
                                      </div>   
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function() {
            $('.select2').select2();
         });
            </script>
            <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js",
    });
  </script>