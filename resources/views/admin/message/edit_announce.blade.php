<div class="row">
                           <div class="col-md-2"></div>
                           <div class="col-md-8">
                               <div class="card m-b-30 widget-flat border-custom text-white" >
                                  <i class="fi-tag"></i>
                                    <div class="card-body">
                                        <h5 class="card-title">@lang('admin.edit') @lang('admin.announce') @lang('admin.to') @lang('admin.parent')</h5>
  <form action="{{url('')}}/practise/edit-announce/{{$id}}" method="post" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}
            <div class="form-group m-b-20 row">
                             <div class="col-12">
        <input type="text" class="form-control" hidden name="ref" value="{{\App\Announce::find($id)->ref}}">
                                        <label style="color: black;">@lang('admin.remove') @lang('admin.parent')</label>
    <select class="form-control select2" style="width: 100%;" name="parent[]" multiple="multiple" data-placeholder=""> @foreach(\App\Announcelist::where('announce_id',$id)->get() as $list)
      <option value="{{$list->parent_id}}" selected>{{\App\Parenting::find($list->parent_id)->name}}</option>
      @endforeach
                  </select>
                                    </div>
                            </div>
                            <div cl
                            <div class="form-group m-b-20 row">
                             <div class="col-12">
                                        <label style="color: black;">@lang('admin.title') <small>(@lang('admin.max_length') 50)</small></label>
                   <input type="text" class="form-control" value="{{\App\Announce::find($id)->subject}}" maxlength="50" name="subject" placeholder="Subject of the Announcement">
                                    </div>
                            </div>
                            <div class="form-group m-b-20 row">
                             <div class="col-12">
                                        <label style="color: black;" for="emailaddress">@lang('admin.message') <small>(@lang('admin.max_length') 160)</small></label>
                    <textarea class="form-control" maxlength="160" rows="7" name="message" placeholder="Add Message">{{\App\Announce::find($id)->message}}</textarea>
                                    </div>
                            </div>
                            
                              <div class="checkbox checkbox-primary">
                          @if(\App\Announce::find($id)->email_not=='1')
                                <input id="checkbox4" type="checkbox" checked value="1" name="email">
                          @elseif(\App\Announce::find($id)->email_not=='')
                           <input id="checkbox4" type="checkbox" value="1" name="email">
                           @endif
                                                    <label style="color: black;" for="checkbox4">
                                                        @lang('admin.enable_email_not')
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-primary">
                                                  @if(\App\Announce::find($id)->sms_not=='1')
                                <input id="checkbox5" type="checkbox" checked value="1" name="sms">
                              @elseif(\App\Announce::find($id)->email_not=='')
 <input id="checkbox5" type="checkbox"  value="1" name="sms">
                              @endif
                                                    <label style="color: black;" for="checkbox5">
                                                        @lang('admin.enable_sms_not')
                                                    </label>
                                                </div>
                            <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit"> @lang('admin.submit')</button>
                                        
                                    </div>
                                </div>
                                </form>  
                                    </div>
                                </div>
                              </div>
                           <div class="col-md-2"></div>
                         </div>
                         <script type="text/javascript">
                           $('.select2').select2();
                         </script>