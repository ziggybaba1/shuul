 <div class="row">
    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">Edit Subject Forms</h4>
                            <h6 class="card-subtitle">Edit Subject</h6>
            <form action="{{url('')}}/admin/edit/subject/{{$id}}" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
                             <div class="form-group">
                    <label for="example-email">Select Type *<span class="help"></span></label>
                <select name="type" class="form-control">
                    <option value="{{\App\Subject::find($id)->type}}">{{\App\Subjecttype::find(\App\Subject::find($id)->type)->title}}</option>
                    @foreach(\App\Subjecttype::all() as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                @endforeach
                </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Subject Title *<span class="help"></span></label>
                <input name="title" type="text" id="example-email" value="{{\App\Subject::find($id)->title}}"  class="form-control" placeholder="e.g Elementary Mathematics 1">
                                </div>
                                 <div class="form-group">
                                    <label for="example-email">Subject Code *<span class="help"></span></label>
                <input name="code" type="text" value="{{\App\Subject::find($id)->code}}" id="example-email"  class="form-control" placeholder="e.g EMTH 1">
                                </div>
                                <div class="form-group">
                                    <label>Description<span class="help"></span></label>
                                    <textarea name="description" class="form-control">{{\App\Subject::find($id)->description}}</textarea>
                                </div>
                                 <div class="form-group">
                                <h4 class="card-title">Optional Subject *</h4>
                                <div class="demo-radio-button">
                        @if(\App\Subject::find($id)->option==1)
                        <input name="option" value="1" type="radio" id="radio_1" checked />
                                    <label for="radio_1">Yes</label>
                            <input name="option" value="0" type="radio" id="radio_2" />
                                    <label for="radio_2">No</label>
                        @else
                         <input name="option" value="1" type="radio" id="radio_1" />
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
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>            
