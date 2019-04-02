<div class="row">
                    <div class="col-md-12">

                        <div id="content-main" class="card card-body">
                        	<h4 class="card-title">@lang('admin.verify_payee')</h4>
<form action="{{url('')}}/verify/remain/payment/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
	<div class="form-group">
		<img src="{{url('')}}/uploads/proof/{{\App\Feepay::find($id)->file}}">
	</div>
	<div class="form-group">
		<label>@lang('admin.payment') @lang('admin.status')</label>
		<select class="form-control" name="status">
			<option value="1">@lang('admin.accept') @lang('admin.payment')</option>
			<option value="3">@lang('admin.reject') @lang('admin.payment')</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary btn-block text-white" value="@lang('admin.submit')" name="">
	</div>
</form>
</div>
</div>
</div>