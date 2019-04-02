 <div class="row">
     <div class="col-md-12">
                        <div class="card card-body">
                            <h3><b>@lang('admin.book') @lang('admin.release')</b> <span class="pull-right">#{{\App\Payment::find($id)->receipt_id}}{{\App\Student::find(\App\Payment::find($id)->student_id)->user_id}}</span></h3>
                           
                            <hr>
                            <h5>@lang('admin.sel_book_rel')</h5>
                             <form action="{{url('')}}/receive/book/student/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center">#</th>
                                                    <th>@lang('admin.description')</th>
                                                    <th class="text-right">@lang('admin.total')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                   
                            @foreach(\App\Payitem::where('pay_id',$id)->get() as $list)
                                                <tr>
                                                      <td style="width:40px">
                                                                <div class="checkbox">
                                                        @if($list->give_status=='1')
                                                         <h4><i class="fa fa-check"></i></h4>
                                                         @else
                                                                    <input value="{{$list->id}}" name="item[]" type="checkbox" id="checkbox{{$loop->iteration}}" value="check">
                                                                    <label for="checkbox{{$loop->iteration}}"></label>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{\App\Bookassign::find($list->item_id)->name}}</td>
                                                    <td class="text-right">{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Bookassign::find($list->item_id)->price}}</td>
                                                </tr>
                                    @endforeach
                                    
                                            </tbody>
                                        </table>
                                        
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