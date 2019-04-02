 <div class="row">
                    <div class="col-12">
                        <div class="card">
                <div class="card-body" id="content-maino">
                	{!!\App\Syllabus::find($id)->content!!}
                </div>
                <div id="editor"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"> 
</div>
<div class="col-md-4">
<button onclick="printpagen('{{\App\Syllabus::find($id)->subject}}','Syllabus')" class="btn btn-lg btn-primary btn-block">@lang('admin.print_syllable')</button>
</div>
</div>

