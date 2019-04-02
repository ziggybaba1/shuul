@extends('layouts.page')

@section('content')
 <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h1>{{\App\Frontabout::find($id)->title}}</h1>
            </div>
          </div>
        </div>
      </section>
 
  <div id="course_list"></div>
  <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script> 
<script type="text/javascript">
	$(function () {
  $.get('{{url('')}}/run/about?cid=1&hos={{$id}}', function(data) {
            if(data!=''){
$("#course_list").html(data);
            }
            });   });
</script>
@endsection