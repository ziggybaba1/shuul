<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            	<h4 class="card-title">{{\App\Student::find(\App\Award::find($id)->user_id)->gname}} {{\App\Student::find(\App\Award::find($id)->user_id)->fname}} @lang('admin.award_detail')</h4>
                            <h6 class="card-subtitle">@lang('admin.award_detail')</h6>
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-badge success">
@if(\App\Student::find(\App\Award::find($id)->user_id)->image!='')
                                       <img class="img-responsive" alt="user" src="{{url('')}}/uploads/avatars/{{\App\Student::find(\App\Award::find($id)->user_id)->image}}" alt="img"> 
                                       @else
                                      <img class="img-responsive" alt="user" src="{{url('')}}/assets/images/user.png" alt="img"> 
                                      @endif 
                                   </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">{{\App\Award::find($id)->name}}</h4>
                                                <p><small class="text-muted"><i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse(\App\Award::find($id)->date)->toFormattedDateString()}}</small> </p>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{{\App\Award::find($id)->description}}</p>
                                            </div>
                                        </div>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>