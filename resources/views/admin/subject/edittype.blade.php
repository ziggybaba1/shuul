 <div class="row">
    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card card-body">
                            <h4 class="card-title">Edit Subject Type</h4>
                            <h6 class="card-subtitle"> Edit Type</h6>
 <form action="{{url('')}}/edit/subject-type/{{$id}}" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="example-email">Type Name<span class="help"></span></label>
                <input name="title" type="text" value="{{\App\Subjecttype::find($id)->title}}" id="example-email"  class="form-control" placeholder="e.g Mathematics">
                                </div>
                                 <div class="form-group">
                                    <label for="example-email">Type Code<span class="help"></span></label>
                    <input name="code" value="{{\App\Subjecttype::find($id)->code}}" type="text" id="example-email"  class="form-control" placeholder="e.g MTH">
                                </div>
                                <div class="form-group">
                                    <label>Description<span class="help"></span></label>
                                    <textarea name="description" class="form-control">{{\App\Subjecttype::find($id)->description}}</textarea>
                                </div>
                                 <div class="form-group">
                                <h4 class="card-title">Optional Type</h4>
                                <div class="demo-radio-button">
                @if(\App\Subjecttype::find($id)->option=='1')
                        <input name="option" value="1" type="radio" id="radio_1" checked />
                                    <label for="radio_1">Yes</label>
                            <input name="option" value="0" type="radio" id="radio_2" />
                                    <label for="radio_2">No</label>
                @else
                 <input name="option" value="1" type="radio" id="radio_1"/>
                                    <label for="radio_1">Yes</label>
                            <input name="option" value="0" type="radio" id="radio_2" checked />
                                    <label for="radio_2">No</label>
                @endif
                                </div>
                            </div>
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="Submit">
                                </div>
                            </form>