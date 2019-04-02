
 <div class="row">
    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card card-body">
                            <h4 class="card-title">Class Promotion</h4>
                            <h6 class="card-subtitle"> Select Class Promotion </h6>
                            <form class="form-horizontal m-t-40">
                                <div class="form-group">
                                    <label>Class</label>
                                  <select class="form-control">
                            @foreach(\App\Course::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                            @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>Promotion Next Class</label>
                                  <select class="form-control">
                                      @foreach(\App\Course::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                            @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Year</label>
                                  <select class="form-control">
                                      <option></option>
                                  </select>
                                </div>
                               <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>            