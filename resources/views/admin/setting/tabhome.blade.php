<div class="p-20">
                                                <div id="accordionexample" class="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordionexample" href="#collapseexaOne" aria-expanded="true" aria-controls="collapseexaOne">
          Sliding Gallery
        </a>
      </h5>
    </div>

    <div id="collapseexaOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-body">
        <div class="pull-right">
          <button onclick="showAjaxModal('{{url('')}}/add/slide/gallery')" class="btn btn-sm btn-primary">Add Sliding Image</button>  
        </div>
      <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>description</th>
                                                <th>Status</th>
                                                <th>Date Added</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                                <th>Image</th>
                                                <th>description</th>
                                                <th>Status</th>
                                                <th>Date Added</th>
                                                <th>Option</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
@foreach(\App\Frontgallery::all() as $class)
                                            <tr>
<td>{{$loop->iteration}}</td>
<td><img width="100px" src="{{url('')}}/uploads/frontend/{{$class->image}}"></td>
<td>{{$class->description}}</td>
@if($class->status=='1')
<td>Published</td>
@elseif($class->status=='0')
<td>Pending</td>
@endif
<td>
{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}
</td>
<td>
 <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu animated flipInX">
                        <a onclick="showAjaxModal('{{url('')}}/edit/slide/gallery/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">Edit</a>
                        <a class="dropdown-item" onclick="deletegallery('{{$class->id}}')" href="javascript:void(0)">Delete</a>
                                    </div>
                            </div>
</td>
                                            </tr>
                        @endforeach
                                        </tbody>
                </table>
            </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordionexample" href="#collapseexaTwo" aria-expanded="false" aria-controls="collapseexaTwo">
         Add About Video
        </a>
      </h5>
    </div>
    <div id="collapseexaTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-body">
       <h4 class="card-title">Edit Frontpage Video Section </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/video/section" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Video Caption Title</label>
                             <input value="{{\App\Frontpage::first()->title}}" type="text" class="form-control" name="title">
                            </div>
                            </div>
                             <div class="col-md-12">
                             <div class="form-group">
                              <label>Video Section Background</label>
                             <input type="color" value="{{\App\Frontpage::first()->back_color}}" class="form-control" name="back_color">
                            </div>
                            </div>
                             <div class="col-md-12">
                             <div class="form-group">
                              <label>Video Url</label>
                             <input type="text" value="{{\App\Frontpage::first()->videourl}}" class="form-control" name="videourl">
                            </div>
                            </div>
                            <div class="col-md-3">
                             <div class="form-group">
                              <label>Total Student Enroll</label>
                             <input type="number" value="{{\App\Frontpage::first()->student_num}}" class="form-control" name="student_num">
                            </div>
                            </div>
                            <div class="col-md-3">
                             <div class="form-group">
                              <label>Total Certified Teachers</label>
                             <input type="number" value="{{\App\Frontpage::first()->teacher_num}}" class="form-control" name="teacher_num">
                            </div>
                            </div>
                             <div class="col-md-3">
                             <div class="form-group">
                              <label>Total Passed out student</label>
                             <input type="number" value="{{\App\Frontpage::first()->pass_num}}" class="form-control" name="pass_num">
                            </div>
                            </div>
                            <div class="col-md-3">
                             <div class="form-group">
                              <label>Satisfaction Rating (%)</label>
                             <input type="number" value="{{\App\Frontpage::first()->satisfact_num}}" class="form-control" name="satisfact_num">
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
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordionexample" href="#collapseexaThree" aria-expanded="false" aria-controls="collapseexaThree">
         Header Descriptions
        </a>
      </h5>
    </div>
    <div id="collapseexaThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-body">
        <h4 class="card-title">Edit Header Descriptions </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/header/description" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Our Featured Courses Description</label>
                             <input value="{{\App\Frontpage::first()->course_description}}" type="text" class="form-control" name="course_description">
                            </div>
                            </div>
                             <div class="col-md-12">
                             <div class="form-group">
                              <label>Meet Our Qualified Teachers Description</label>
                             <input type="text" value="{{\App\Frontpage::first()->teacher_description}}" class="form-control" name="teacher_description">
                            </div>
                            </div>
                             <div class="col-md-12">
                             <div class="form-group">
                              <label>Alumni Testimonial Description</label>
                             <input type="text" value="{{\App\Frontpage::first()->alumni_description}}" class="form-control" name="alumni_description">
                            </div>
                            </div>
                            <div class="col-md-12">
                             <div class="form-group">
                              <label>Why Choose Our School Description</label>
                             <input type="text" value="{{\App\Frontpage::first()->why_description}}" class="form-control" name="why_description">
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
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordionexample" href="#collapseexaThree" aria-expanded="false" aria-controls="collapseexaThree">
        Why Choose Our School 
        </a>
      </h5>
    </div>
    <div id="collapseexaThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-body">
        <h4 class="card-title">Why Choose Our School List </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/header/description" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
       <span id="medicine">
    @foreach(\App\Frontlist::all() as $ent)
                         <div class="form-group">
                        <div class="col-sm-12">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="List Title" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="description[]" value="{{$ent->description}}" placeholder="List Description" type="number" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
<button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                        </div>
                      </div>
          @endforeach
      </span>
         <span id="medicine_input">
             <div class="form-group">
                        <div class="col-sm-12">
                          <div class="input-group">
                  <input name="name[]"  placeholder="List Title" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="description[]" placeholder="List Description" type="number" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                        </div>
                      </div>
        </span>
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
                                            </div>