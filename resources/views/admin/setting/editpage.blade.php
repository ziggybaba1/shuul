 <form action="{{url('')}}/edit/about/page/{{$id}}" method="post" >
           {{ csrf_field() }}
                                            <div class="row">
  <div class="col-md-3">
<input type="text" value="{{\App\Frontabout::find($id)->title}}" required placeholder="Menu Title" class="form-control" name="title">
</div>
<div class="col-md-2">
<select required class="form-control" name="category">
  <option>{{\App\Frontabout::find($id)->category}}</option>
  <option>{{\App\Frontcategory::first()->dom2}}</option>
  <option>{{\App\Frontcategory::first()->dom3}}</option>
  <option>{{\App\Frontcategory::first()->dom4}}</option>
  <option>{{\App\Frontcategory::first()->dom5}}</option>
  <option>{{\App\Frontcategory::first()->dom6}}</option>
  <option>{{\App\Frontcategory::first()->dom7}}</option>
</select>
</div>
<div class="col-md-2">
<select required class="form-control" name="status">
  @if(\App\Frontabout::find($id)->status=='1')
  <option value="1">Publish</option>
  <option value="0">Pending</option>
  @elseif(\App\Frontabout::find($id)->status=='0')
  <option value="0">Pending</option>
  <option value="1">Publish</option>
  @endif
</select>
</div>
 <input style="display: none;" type="text" id="showtwxtnn" required name="content">
 <div class="col-md-2">
 <div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-plus"></i> Add Items
          </button>
          <div class="dropdown-menu" style="overflow-y: auto;max-height:300px;">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">Full Layouts</a>
            <div class="dropdown-divider"></div>
           <a class="dropdown-item" onclick="loadfilen('{{url('')}}/test/about?cid=1')" href="javascript:void(0)">About</a>
            <a class="dropdown-item" onclick="loadfilen('{{url('')}}/test/about?cid=2')" href="javascript:void(0)">Course List</a>
             <a class="dropdown-item" onclick="loadfilen('{{url('')}}/test/about?cid=3')" href="javascript:void(0)">Teacher List</a>
            <a class="dropdown-item" onclick="loadfilen('{{url('')}}/test/about?cid=4')" href="javascript:void(0)">Events List</a>
            <a class="dropdown-item" onclick="loadfilen('{{url('')}}/test/about?cid=6')" href="javascript:void(0)">NoticeBoard</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" >Sub Layouts</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Image Slider</a>
            <a class="dropdown-item" href="#">Introduction Card</a>
             <a class="dropdown-item" href="#">Count Analysis</a>
            <a class="dropdown-item" href="#">Highlight Tab</a>
            <a class="dropdown-item" href="#">Feature Card (Image)</a>
            <a class="dropdown-item" href="#">Feature Card (Text only)</a>
            <a class="dropdown-item" href="#">Action Card</a>
            <a class="dropdown-item" href="#">Image-Text Card</a>
            <a class="dropdown-item" href="#">Text-Image Card</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">Featured Layouts</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#">Feature Courses</a>
            <a class="dropdown-item" href="#">Testimonial</a>
            <a class="dropdown-item" href="#">Event/Notification Tab</a>
            <a class="dropdown-item" href="#">Feature Teachers</a>
            <a class="dropdown-item" href="#">School Features</a>
          </div>
        </div>
</div>

 <div class="col-md-3">
  <div class="button-group">
<a onclick="savechangesn()" class="btn btn-outline-primary btn-sm"><i class="fa fa-save"></i> Save Changes</a>
<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i>Submit Changes</button>
</div>
</div>
</div>
</form>
                                   <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#homn2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">HTML Editor</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profil2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Preview</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profil3" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Choose Image</span></a> </li>
                            </ul>
  <div class="tab-content">
                                <div class="tab-pane active" id="homn2" role="tabpanel">
                                    <div class="p-20">
                              <div class="row">
       <textarea id="coden" name="code" rows="10">
       </textarea>
     </div>
   </div>
 </div>
  <div class="tab-pane  p-20" id="profil2" role="tabpanel">
        <iframe id="previewn"></iframe>
                              </div>
                               <div class="tab-pane  p-20" id="profil3" role="tabpanel">
       <div class="row el-element-overlay">
                    <div class="col-md-12">
        <div class="row">
                @foreach(\App\Frontgallery::all() as $galleryn)
                      <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{url('')}}/uploads/frontend/{{$galleryn->image}}" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{url('')}}/uploads/frontend/{{$galleryn->image}}"><i class="icon-magnifier"></i></a></li>
                                            <li><a class="btn default btn-outline" onclick="deleteImage('{{$galleryn->id}}')" href="javascript:void(0);"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                           <div class="el-card-content">

                                    <h6 class="box-title">Area: <small>{{$galleryn->area}}px</small></h6>
                                    <h6 class="box-title">Size: <small>{{$galleryn->size/100}}Kb</small></h6> 
                                    <br/> 
                                    <a class="btn btn-primary btn-outline" onclick="copytextnn('{{$galleryn->id}}')" href="javascript:void(0);"><i class="icon-link"></i><input type="text" value="{{url('')}}/uploads/frontend/{{$galleryn->image}}" id="imgurln{{$galleryn->id}}"></a>
                                  </div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
                  </div>
                                        </div>
                              </div>
                            </div>
                              <form  method="post" enctype="multipart/form-data" class="format">
     {{ csrf_field() }}
          
         </form>
         <script>
    var editornn = CodeMirror.fromTextArea(document.getElementById("coden"), {
      lineNumbers: true,
      theme: "night",
      extraKeys: {
        "F11": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        }
      }
    });
  $(document).ready(function() {
     editornn.setValue('{!!\App\Frontabout::find($id)->content!!}');
     document.getElementById('previewn').src += '{{url('')}}/about/page.fmp?page={{\App\Frontabout::find($id)->id}}';
    setInterval(function(){ $("#showtwxtnn").val(editornn.getValue()) }, 1000);
  });
  function reloadn() {
    document.getElementById('previewn').src += '{{url('')}}/show/demo/design';
}
  function savechangesn(){
    var value=$("#showtwxtnn").val();
    $.ajax({
      type: 'post',
      url: "{{url('')}}/save/content",
      data: 'text=' +value+'&_token='+$(".format input").val(),
      success: function(response)
      {
       swal("Changes have been Saved!", "click Preview to view Changes!", "success");
       reload();
      },
      error:function(response)
      {
        swal("Error in saving changes!", "Ensure your login session is not over!", "error");
      }
    });
  }
  function loadfilen(url){
                $.get(url, function(data) {
                    editornn.setValue(data);
            if(data!=''){
$.toast({heading: 'Layout Builder',text: 'Layout has been added to the Html Editor.',position: 'top-right',loaderBg:'#ff6849',icon: 'success',hideAfter: 3500, stack: 6
          });     
            }
            });
              }
              function copytextnn(text){
                 var copyTextnn = document.getElementById("imgurl"+text);
                copyTextnn.select();
                document.execCommand("copy");
               $.toast({heading: 'Copy Clipboard',text: 'Image Url has been copied.',position: 'top-right',loaderBg:'#ff6849',icon: 'success',hideAfter: 3500, stack: 6
          });
              }
  </script>
       