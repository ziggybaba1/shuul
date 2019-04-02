  @forelse($gallerys as $gala)
   <div class="row el-element-overlay">
                    <div class="col-md-12">
   <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{url('')}}/uploads/gallery/{{$gala->image}}" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{url('')}}/uploads/gallery/{{$gala->image}}"><i class="icon-magnifier"></i></a></li>
                                             
                                        </ul>
                                    </div>
                                </div>
                                  <div class="el-card-content">
                                    <h6 class="box-title">{{$gala->caption}}</h6><small>{{$gala->session}}</small>
                                    <br/> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
             <h3 style="color: blue;">No Image in Category</h3>
    @endforelse
    {{$gallerys->links()}}
     <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
  <script src="{{url('')}}/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="{{url('')}}/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>