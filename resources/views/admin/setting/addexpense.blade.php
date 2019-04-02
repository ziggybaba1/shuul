<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.add') @lang('admin.expense')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/new/expense" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>@lang('admin.expense') @lang('admin.type')</label>
                            <select class="form-control select2" name="type">
            @foreach(\App\Expensetype::all() as $type)
                             <option>{{$type->title}}</option>   
            @endforeach
                            </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.title')</label>
                             <input type="text" class="form-control" name="name">
                            </div>
                        </div>  
                    </div>
                     <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.session')</label>
                             <input type="text" value="{{\App\Session::latest()->first()->session}}" readonly class="form-control" name="number">
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.term')</label>
                               @if(\App\Session::latest()->first()->terms==='First')
                                 <input type="text" value="@lang('admin.first_term')" readonly class="form-control" name="">
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                               <input type="text" value="@lang('admin.second_term')" readonly class="form-control" name="">
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                <input type="text" value="@lang('admin.third_term')" readonly class="form-control" name="">
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                <input type="text" value="@lang('admin.fourth_term')" readonly class="form-control" name="">
                             @endif
                            
                            </div> 
                        </div>
                            </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.invoice') @lang('admin.number')</label>
                             <input type="text" class="form-control" name="number">
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.date')</label>
                             <input type="text" class="form-control mdate" name="date">
                            </div> 
                        </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.amount')</label>
                             <input type="number" class="form-control" name="amount">
                            </div> 
                        </div>
                         <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.upload_doc')</label>
                             <input type="file" class="form-control" name="file">
                            </div> 
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                              <label>@lang('admin.describe')</label>
                           <textarea class="form-control" name="describe"></textarea>
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
                 $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
                 $(document).ready(function() {
            $('.select2').select2();
         });
            </script>