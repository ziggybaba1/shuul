   <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Title</th>
                                                <th>Sub Categories</th>
                                                <th>Manage Sub Category</th>
                                                <th>Edit Category</th>
                                                <th>Delete</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Title</th>
                                                <th>Sub Categories</th>
                                                <th>Manage Sub Category</th>
                                                <th>Edit Category</th>
                                                <th>Delete</th> 
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Category::latest()->get() as $batch)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                       <td>{{$batch->title}}</td>
                      <td>
                    <ul>
    @foreach(\App\Subcategory::where('cat_id',$batch->id)->get() as $cat)
                <li>{{$cat->title}}</li>
    @endforeach
                    </ul>
                      </td>
<td><button onclick="showAjaxModal('{{url('')}}/manage/course/category/{{$batch->id}}')" class="btn btn-sm btn-default btn-block">Manage Sub Category</button></td>
<td><button onclick="showAjaxModal('{{url('')}}/edit/course/category/{{$batch->id}}')" class="btn btn-sm btn-default btn-block">Manage Category</button></td>
<td><button onclick="deletecategory('{{$batch->id}}')" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i>Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script type="text/javascript">
                  $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
                </script>
                 <script type="text/javascript">
              function deletecategory(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/category/'+id,function(data)
                {
                if(data==0){
                  swal('Category has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=28');
                }
            else{
                     swal("Error in deletimg Category, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
          </script>