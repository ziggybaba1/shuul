<div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.edit') @lang('admin.behave_person')</h4>
                            <h6 class="card-subtitle">{{\App\Course::find($id)->title}} @lang('admin.behave_person')</h6>
<form class="" action="{{url('')}}/add/behave/edit/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                                     <br>
                               <span id="medicine">
    @foreach(\App\Behavioural::where('class_id',$id)->get() as $ent)
                         <div class="form-group">
                        <div class="col-sm-12">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="@lang('admin.behave_person') @lang('admin.name')" type="text" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      </div>
          @endforeach
                               </span>
                               <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="@lang('admin.submit')">
                    </div>  
                </div>
                        </div>
                  </form>
                </div>
              </div>
            </div>
            