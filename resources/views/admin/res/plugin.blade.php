   <div class="row">
                    <div class="col-md-12">
  <form action="{{url('')}}/set/plugin/config" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
<div class="p-20">
                                           <h4 class="card-title">@lang('admin.plug_config')</h4>
                <h6 class="card-subtitle"></h6>
                <hr>
    
         <div class="row">
          <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->res=='1')               
              <input value="1" name="res" checked type="checkbox" class="check" id="minimal-checkbox-1">
    @else
     <input value="1" name="res" type="checkbox" class="check" id="minimal-checkbox-1">
     @endif
              <label for="minimal-checkbox-1">@lang('admin.result_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
  @if(\App\Support::first()->syl=='1')                   
              <input value="1" name="syl" checked type="checkbox" class="check" id="minimal-checkbox-2">
    @else
     <input value="1" name="syl" type="checkbox" class="check" id="minimal-checkbox-2">
     @endif
              <label for="minimal-checkbox-2">@lang('admin.sylla_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
   @if(\App\Support::first()->less=='1')             
              <input value="1" name="less" checked type="checkbox" class="check" id="minimal-checkbox-3">
    @else
     <input value="1" name="less" type="checkbox" class="check" id="minimal-checkbox-3">
     @endif
              <label for="minimal-checkbox-3">@lang('admin.les_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
   @if(\App\Support::first()->etest=='1')              
              <input value="1" name="etest" checked type="checkbox" class="check" id="minimal-checkbox-4">
    @else
     <input value="1" name="etest" type="checkbox" class="check" id="minimal-checkbox-4">
     @endif
              <label for="minimal-checkbox-4">@lang('admin.etest_plug')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->att=='1')              
              <input value="1" name="att" checked type="checkbox" class="check" id="minimal-checkbox-5">
    @else
     <input value="1" name="att" type="checkbox" class="check" id="minimal-checkbox-5">
     @endif
              <label for="minimal-checkbox-5">@lang('admin.att_plug')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->awa=='1')             
              <input value="1" name="awa" checked type="checkbox" class="check" id="minimal-checkbox-6">
    @else
     <input value="1" name="awa" type="checkbox" class="check" id="minimal-checkbox-6">
     @endif
              <label for="minimal-checkbox-6">@lang('admin.awa_plug')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->pick=='1')             
              <input value="1" name="pick" checked type="checkbox" class="check" id="minimal-checkbox-7">
    @else
     <input value="1" name="pick" type="checkbox" class="check" id="minimal-checkbox-7">
     @endif
              <label for="minimal-checkbox-7">@lang('admin.pick_plug')</label>
            </div>
        </div>  
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->dorm=='1')             
              <input value="1" name="dorm" checked type="checkbox" class="check" id="minimal-checkbox-8">
    @else
     <input value="1" name="dorm" type="checkbox" class="check" id="minimal-checkbox-8">
     @endif
              <label for="minimal-checkbox-8">@lang('admin.dorm_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->clin=='1')             
              <input value="1" name="clin" checked type="checkbox" class="check" id="minimal-checkbox-9">
    @else
     <input value="1" name="clin" type="checkbox" class="check" id="minimal-checkbox-9">
     @endif
              <label for="minimal-checkbox-9">@lang('admin.clin_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->lib=='1')             
              <input value="1" name="lib" checked type="checkbox" class="check" id="minimal-checkbox-10">
    @else
     <input value="1" name="lib" type="checkbox" class="check" id="minimal-checkbox-10">
     @endif
              <label for="minimal-checkbox-10">@lang('admin.lib_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->book=='1')             
              <input value="1" name="book" checked type="checkbox" class="check" id="minimal-checkbox-11">
    @else
     <input value="1" name="book" type="checkbox" class="check" id="minimal-checkbox-11">
     @endif
              <label for="minimal-checkbox-11">@lang('admin.book_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->event=='1')             
              <input value="1" name="event" checked type="checkbox" class="check" id="minimal-checkbox-12">
    @else
     <input value="1" name="event" type="checkbox" class="check" id="minimal-checkbox-12">
     @endif
              <label for="minimal-checkbox-12">@lang('admin.event_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->gall=='1')             
              <input value="1" name="gall" checked type="checkbox" class="check" id="minimal-checkbox-13">
    @else
     <input value="1" name="gall" type="checkbox" class="check" id="minimal-checkbox-13">
     @endif
              <label for="minimal-checkbox-13">@lang('admin.gall_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->hrm=='1')             
              <input value="1" name="hrm" checked type="checkbox" class="check" id="minimal-checkbox-14">
    @else
     <input value="1" name="hrm" type="checkbox" class="check" id="minimal-checkbox-14">
     @endif
              <label for="minimal-checkbox-14">@lang('admin.hrm_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->ybook=='1')             
              <input value="1" name="ybook" checked type="checkbox" class="check" id="minimal-checkbox-15">
    @else
     <input value="1" name="ybook" type="checkbox" class="check" id="minimal-checkbox-15">
     @endif
              <label for="minimal-checkbox-15">@lang('admin.ybook_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->ann=='1')             
              <input value="1" name="ann" checked type="checkbox" class="check" id="minimal-checkbox-16">
    @else
     <input value="1" name="ann" type="checkbox" class="check" id="minimal-checkbox-16">
     @endif
              <label for="minimal-checkbox-16">@lang('admin.ann_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->forum=='1')             
              <input value="1" name="forum" checked type="checkbox" class="check" id="minimal-checkbox-17">
    @else
     <input value="1" name="forum" type="checkbox" class="check" id="minimal-checkbox-17">
     @endif
              <label for="minimal-checkbox-17">@lang('admin.forum_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->front=='1')             
              <input value="1" name="front" checked type="checkbox" class="check" id="minimal-checkbox-18">
    @else
     <input value="1" name="front" type="checkbox" class="check" id="minimal-checkbox-18">
     @endif
              <label for="minimal-checkbox-18">@lang('admin.front_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
            <div class="input-group"> 
    @if(\App\Support::first()->opay=='1')             
              <input value="1" name="opay" checked type="checkbox" class="check" id="minimal-checkbox-19">
    @else
     <input value="1" name="opay" type="checkbox" class="check" id="minimal-checkbox-19">
     @endif
              <label for="minimal-checkbox-19">@lang('admin.opay_plug')</label>
            </div>
        </div>  
        </div>
         <div class="col-md-6">
        <div class="form-group">
     <input value="@lang('admin.submit')" type="submit" class="btn btn-primary text-white">
            </div>
        </div>
      </div>
                                        </div>
                                    </form>
                                </div>
                            </div>