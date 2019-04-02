 <div class="row">
                    <div class="col-12">
                        <div class="card">
                <div class="card-body" id="content-maino">
                	{!!\App\Result::find($id)->data!!}
                </div>
                <div id="editor"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"> 
</div>
<div class="col-md-4">
<button onclick="printpagen('{{\App\Student::find(\App\Result::find($id)->student_id)->gname}} {{\App\Student::find(\App\Result::find($id)->student_id)->fname}}','Result')" class="btn btn-lg btn-primary btn-block">@lang('admin.print')</button>
</div>
</div>
<script type="text/javascript">
    var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content-maino').html(), 20, 20, {
        ‘width’: 110,
            'elementHandlers': specialElementHandlers
    });
    doc.save('{{\App\Student::find(\App\Result::find($id)->student_id)->gname}}_{{\App\Student::find(\App\Result::find($id)->student_id)->fname}}_{{\App\Result::find($id)->session}}_{{\App\Result::find($id)->term}}_result.pdf');
});
</script>
