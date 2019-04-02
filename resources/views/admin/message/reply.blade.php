
<style type="text/css">
  .form-control[readonly] {
    background-color: #2f3d4a;
    opacity: 1;
}
</style>
<div class="card m-b-30 widget-flat border-custom text-white" >
                                  <i class="fi-tag"></i>
                                    <div class="card-body">
                                        <h5 class="card-title">@lang('admin.create') @lang('admin.announce') @lang('admin.parent')</h5>
  <form action="{{url('')}}/send/contact/reply/{{$id}}" method="post" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}
    <div class="row">
      <div class="col-md-6">
             <div class="form-group">
            <label style="color: black;" for="example-email">@lang('admin.contact') @lang('admin.email') *<span class="help"></span></label>
          <input type="text" class="form-control" value="{{\App\Contact::find($id)->email}}" readonly name="">
                                </div>
                              </div> <div class="col-md-6">
                            <div class="form-group m-b-20 row">
                             <div class="col-12">
                                        <label style="color: black;">@lang('admin.contact') @lang('admin.title')</label>
     <input type="text" class="form-control" value="{{\App\Contact::find($id)->subject}}" readonly name="">
                                    </div>
                            </div>
                          </div>
                        </div>
                            <div class="form-group m-b-20 row">
                             <div class="col-12">
                                        <label style="color: black;">@lang('admin.message')</label>
                  <textarea class="form-control" readonly rows="7" name="" placeholder="Add Message">{{\App\Contact::find($id)->question}}</textarea>
                                    </div>
                            </div>
                             <div class="form-group">
            <label style="color: black;" for="example-email">@lang('admin.title') *<span class="help"></span></label>
          <input type="text" class="form-control" value="{{\App\Contact::find($id)->title}}" name="title">
                                </div>
                            <div class="form-group m-b-20 row">
                             <div class="col-12">
                                        <label style="color: black;" for="emailaddress">@lang('admin.reply')</label>
                    <textarea class="form-control" rows="7" name="message" placeholder="@lang('admin.add') @lang('admin.message')">{{\App\Contact::find($id)->answer}}</textarea>
                                    </div>
                            </div>
                            
                            
                            <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">@lang('admin.submit')</button>
                                        
                                    </div>
                                </div>
                                </form>  
                                    </div>
                                </div>