<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Renew/Change {{\App\Enroll::find($id)->name}} Subscription Status</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/change/status/course/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Student</label>
                <input value="{{\App\Enroll::find($id)->name}}" readonly type="text" class="form-control" name="title">
                            </div>
                            </div>
                      <div class="col-md-6"> 
                            <div class="form-group">
                             <label>Choose Plan</label>
                            <select style="width: 100%;" class="form-control select2" name="plan">
                        @foreach(\App\Plan::all() as $plan)
                              <option value="{{$plan->id}}">{{$plan->name}}</option>
                    @endforeach
                            </select>
                            </div> 
                        </div>      
                    </div>
                    <div class="row">
                       <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Activation Date</label>
                          <input type="text" class="form-control mdate"  name="date">
                            </div> 
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Activate User</label>
                            <select style="width: 100%;" class="form-control select2" name="status">
                                <option value="1">Active</option>
                                <option value="0">Pending</option>
                                <option value="2">Suspend</option>  
                            </select>
                            </div> 
                        </div>
                             
                    </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Submit">
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
            </script>