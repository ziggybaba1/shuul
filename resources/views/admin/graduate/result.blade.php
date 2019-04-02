<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                        <ul class="nav nav-tabs profile-tab" role="tablist">
  @foreach(\App\Result::where('student_id',\App\Graduation::find($id)->user_id)->get() as $result)
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home{{$loop->iteration}}" role="tab">{{$result->session}} ({{$result->term}})</a> </li>
@endforeach
                            </ul>
 <div class="tab-content">
 	 @foreach(\App\Result::where('student_id',\App\Graduation::find($id)->user_id)->get() as $result)
                                <div class="tab-pane" id="home{{$loop->iteration}}" role="tabpanel">
                                   <div class="row">
                                   	 <div class="card-body" id="content-main{{$loop->iteration}}">
                	{!!\App\Result::find($result->id)->data!!}
                				</div>
                                   </div>
                   <div class="row">
<div class="col-md-4">
<button onclick="printpager('content-main{{$loop->iteration}}')" class="btn btn-lg btn-primary btn-block">@lang('admin.print')</button>
</div>
<div class="col-md-4"> 
</div>
</div>
                               </div>
       @endforeach
                           </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
  function printpager(ver){
$('#'+ver).printThis({
  debug: false,
  importCSS: true,
  importStyle: false,
  printContainer: true,
  loadCSS: "",
  pageTitle: "",
  removeInline: false,
  printDelay: 333,
  header: null,
  footer: null,   
  formValues: true,
  base: false,
  canvas: false,
  doctypeString: '<!DOCTYPE html>',
  removeScripts: false,
  copyTagClasses: false   
});

    }
  </script>