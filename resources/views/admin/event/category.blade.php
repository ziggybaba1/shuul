<form role="form" action="{{url('')}}/admin/event_category/create" method="post">
                                {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label class="control-label">@lang('admin.event_cat_name')</label>
                                                        <input required class="form-control form-white" placeholder="" type="text" name="name"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">@lang('admin.cat_identify')</label>
                                                        <select required class="form-control form-white" data-placeholder="Choose a color..." name="color">
                                                            <option value="red">Red</option>
                                                            <option value="blue">Blue</option>
                                                            <option value="green">Green</option>
                                                            <option value="yellow">Yellow</option>
                                                            <option value="black">Black</option>
                                                            <option value="orange">Orange</option>
                                                            <option value="purple">Purple</option>
                                                            <option value="brown">Brown</option>
                                                            <option value="grey">Grey</option>
                                                            <option value="navy">Navy</option>
                                                            <option value="peru">Peru</option>
                                                            <option value="mangeta">Mangenta</option>
                                                            <option value="silver">Silver</option>
                                                            <option value="lime">Lime</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                            <textarea class="form-control" placeholder="@lang('admin.description_option')" name="description"></textarea>
                                        </div>
                                                    <div class="text-right">
                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">@lang('admin.cancel')</button>
                                                     <button type="submit" class="btn btn-danger waves-effect waves-light">@lang('admin.save')</button>
                                                    
                                                </div>
                                                </form>