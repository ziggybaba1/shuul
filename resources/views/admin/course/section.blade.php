<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">Add {{\App\Work::find($id)->title}} Sections</h4>
                            <h6 class="card-subtitle">{{\App\Work::find($id)->title}} Section</h6>
                             <div class="pull-right">
<button onclick="add_medicinel()" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i>Add {{\App\Work::find($id)->title}} Section
  </button>
                                                  </div>
<form class="" action="{{url('')}}/add/section/course/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                                     <br>
                               <span id="medicinel">
    @foreach(\App\Section::where('course_id',$id)->get() as $ent)
                         <div class="form-group">
                          <div class="input-group">
                  <input name="title[]" value="{{$ent->title}}" placeholder="Add {{\App\Work::find($id)->title}} Sections Title" type="text" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElementl(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                              </span>
                          </div>
                      </div>
          @endforeach
                               </span>
                              <span id="medicine_inputl">
                                <div class="form-group">
                          <div class="input-group">
                  <input name="title[]" placeholder="Add {{\App\Work::find($id)->title}} Sections Title" type="text" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElementl(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                      </div>
                            
                               </span>
                               <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="Add Section">
                    </div>  
                </div>
                        </div>
                  </form>
                </div>
              </div>
            </div>
            <script type="text/javascript">
    var medicine_countl      = {{count(\App\Section::where('course_id',$id)->get())}};
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

        $('#medicine_id').attr('id', 'medicine_id_' + medicine_count);
        $('#medicine_deletel').attr('id', 'medicine_delete_' + medicine_count);
        $('#medicine_deletel_' + medicine_countl).attr('onclick', 'deletemedicineParentElementl(this, ' + medicine_countl + ')');
    }

    // REMOVING medicine INPUT
    function deletemedicineParentElementl(n, medicine_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicinesl.push(medicine_countl);
    }
</script>