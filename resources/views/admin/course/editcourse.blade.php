<ul class="nav nav-tabs customtab2" role="tablist">
<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#basicn" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Basic Info</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#outcomen" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Results</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#categoryn" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Category & Sub Category</span></a> </li>
                                     <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#requiren" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Requirement</span></a> </li>
                                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pricen" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Price</span></a> </li>
                                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#thumbn" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Thumbnail</span></a> </li>
                                </ul>
<form action="{{url('')}}/edit/real/course/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
  <div class="tab-content">
                  <div class="tab-pane active" id="basicn" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Course Form</h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Title</label>
          <input type="text" value="{{\App\Work::find($id)->title}}" class="form-control" name="title">
                            </div>
                             <div class="form-group">
                              <label>Description</label>
                         <textarea class="form-control" name="description">{{\App\Work::find($id)->description}}</textarea>
                            </div> 
                            </div> 
                            <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Level</label>
                      <select class="form-control" name="level">
                      <option>{{\App\Work::find($id)->level}}</option>
                       <option>Beginner</option>
                        <option>Intermediate</option>
                         <option>Advanced</option> 
                      </select>
                            </div>
                            <div class="form-group">
                              <label>Course Language</label>
                      <select style="width: 100%;" class="form-control select2" name="lang">
                        <option value="{{\App\Work::find($id)->lang}}">{{\App\Language::find(\App\Work::find($id)->lang)->name}}</option>
                @foreach(\App\Language::all() as $lang)
                       <option value="{{$lang->id}}">{{$lang->name}}</option>
                @endforeach
                      </select>
                            </div>
                          </div>
                           <div class="col-md-12"> 
                            <div class="form-group">
                              <label>Detail</label>
                         <textarea class="form-control mymcen">{!!\App\Work::find($id)->detail!!}</textarea>
                            </div>
            <textarea id="showtextn" class="form-control" name="detail"></textarea>

                            </div>
                                   
                              </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
                          </div>
                        <div class="tab-pane" id="outcomen" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Course Expected Results </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-12">
                   <span id="medicinel">
  @foreach(\App\Outcome::where('course_id',$id)->get() as $result)
                            <div class="form-group">
                               <div class="input-group">
                           <input type="text" value="{{$result->title}}" class="form-control" placeholder="Add Course Expected Result" name="result[]">
                            <span class="input-group-btn">
              <button onclick="add_medicinel()"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                              </span>
                          </div>
                            </div>
  @endforeach
                    </span>
                     <span id="medicine_inputl">
                <div class="form-group">
                               <div class="input-group">
                           <input type="text" class="form-control" placeholder="Add Course Expected Result" name="result[]">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElementl(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                              </span>
                            </div>  
                      </div>     
                     </span>
                            </div>
                                   
                              </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
                          </div>
                          <div class="tab-pane" id="categoryn" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Course Expected Results </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                             <label>Choose Category</label>
        <select style="width: 100%;" class="form-control select2" name="category">
          <option>{{\App\Work::find($id)->category}}</option>
    @foreach(\App\Category::all() as $cat)
          <option>{{$cat->title}}</option>
    @endforeach
        </select>
                            </div>
                <div class="form-group">
  <label>Choose Sub Category</label>
    <select style="width: 100%;" class="form-control select2" name="subcategory">
        <option>{{\App\Work::find($id)->subcategory}}</option>
    @foreach(\App\Subcategory::all() as $sub)
          <option>{{$sub->title}}</option>
    @endforeach
        </select>
                            </div>  
                      </div>     
                            </div>
                                   
                              </div>
                                    
                        </div>
                    </div>
            </div>
                          </div>
              <div class="tab-pane" id="requiren" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Requirements </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-12">
                   <span id="medicineln">
        @foreach(\DB::table('requires')->where('course_id',$id)->get() as $requiren)
                            <div class="form-group">
                               <div class="input-group">
                           <input type="text" value="{{$requiren->title}}" class="form-control" placeholder="Add Course Requirement" name="require[]">
                            <span class="input-group-btn">
              <button onclick="add_medicineln()"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                              </span>
                          </div>
                            </div>
        @endforeach
                    </span>
                     <span id="medicine_inputln">
                <div class="form-group">
                               <div class="input-group">
                           <input type="text" class="form-control" placeholder="Add Course Requirement" name="require[]">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElementln(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                              </span>
                            </div>  
                      </div>     
                     </span>
                            </div>
                                   
                              </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
                          </div>
                           <div class="tab-pane" id="pricen" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Requirements </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
          <div class="col-md-3"></div>
                        <div class="col-md-6">
                    <div class="form-group">
                      <label>Course Price {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}</label>
                      <input type="number" value="{{\App\Work::find($id)->price}}" class="form-control" name="price">
                    </div>
                     <div class="form-group">
                      <label>Expected Days to Finish Course</label>
                      <input type="number" value="{{\App\Work::find($id)->days}}" class="form-control" name="days">
                    </div>
                    <div class="form-group">
                      <label>Renewal Price {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}</label>
                      <input type="number" class="form-control" value="{{\App\Work::find($id)->rprice}}" name="rprice">
                    </div>
                        </div>
                         <div class="col-md-3"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                           <div class="tab-pane" id="thumbn" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Add Course Thumbnail </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                          <label for="input-file-now">Add Course Thumbnail</label>
                            <img width="100px" src="{{url('')}}/uploads/thumbnail/{{\App\Work::find($id)->file}}">
                                <input type="file" id="input-file-now" name="file" class="dropify" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Submit">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                </div>
                        </div>
                           </form>
    <script type="text/javascript">
      jQuery(document).ready(function() {
        $('.mymcen').summernote({
            
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
      });
      $(function () {
    setInterval(function(){
 document.getElementById('showtextn').value =$(".mymcen").val();
   }, 1000);
});
    </script>
    <script type="text/javascript">
    var medicine_countl      = {{count(\App\Outcome::where('course_id',$id)->get())}};
    var total_amountl        = 0;
    var deleted_medicinesl   = [];
    // CREATING BLANK medicine INPUT
    var blank_medicinel = '';
    $(document).ready(function () {
      $('#medicine_inputl').hide();
        blank_medicinel = $('#medicine_inputl').html();
    });
    function add_medicinel()
    {
        medicine_countl++;
        $("#medicinel").append(blank_medicinel);

        $('#medicine_id').attr('id', 'medicine_id_' + medicine_countl);
        $('#medicine_delete').attr('id', 'medicine_delete_' + medicine_countl);
        $('#medicine_delete_' + medicine_countl).attr('onclick', 'deletemedicineParentElement(this, ' + medicine_countl + ')');
    }

    // REMOVING medicine INPUT
    function deletemedicineParentElementl(n, medicine_countl) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicinesl.push(medicine_countl);
    }
</script>
 <script type="text/javascript">
    var medicine_countln      = {{count(\DB::table('requires')->where('course_id',$id)->get())}};
    var total_amountln        = 0;
    var deleted_medicinesln   = [];
    // CREATING BLANK medicine INPUT
    var blank_medicineln = '';
    $(document).ready(function () {
      $('#medicine_inputln').hide();
        blank_medicineln = $('#medicine_inputln').html();
    });
    function add_medicineln()
    {
        medicine_countln++;
        $("#medicineln").append(blank_medicineln);

        $('#medicine_id').attr('id', 'medicine_id_' + medicine_countln);
        $('#medicine_delete').attr('id', 'medicine_delete_' + medicine_countln);
        $('#medicine_delete_' + medicine_countln).attr('onclick', 'deletemedicineParentElementn(this, ' + medicine_countln + ')');
    }
    // REMOVING medicine INPUT
    function deletemedicineParentElementln(n, medicine_countln) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicinesln.push(medicine_countln);
    }
</script>
                        