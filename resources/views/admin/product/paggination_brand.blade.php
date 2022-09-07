 @foreach ($branddata as $brand)

                        <tr>
                          <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
                          <td>{{ $brand->title }}  </td>
                           <td>
                       

                          <img src="{{ asset('public/images/brand/'.$brand->image) }}" height="30px">
                        </td>
                          <td>{{ \Illuminate\Support\Str::limit($brand->description, $limit = 20, $end = '...') }}</td>
                          <td>
                            @if($brand->top_brand==1)

                               <div class='active-color'>
                                Active</div> 

                            @else

                              <div class='inactive-color'>
                                Inactive</div>

                            @endif
                          </td>
                            @if(Auth::user()->role == 'admin')
                          <td>
                            
                              <a title="Edit" href="javascript:void(0)"  onclick="brandedit( {{ $brand->id }} )"  id="brand-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
                                                       
                              <a href="javascript:void(0)" data-url="{{ route('admin.delete_brand',['id'=>$brand->id]) }}"  class="brand-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>
                           
                          </td>
                            @endif
                        </tr>

                      @endforeach
                      <tr>
                        <td colspan="6" align="center"> 
                         <div class="col-md-12">
                          <div class="float-right">
                            {{ $branddata->links('vendor.pagination.bootstrap-4') }}
                        </div>
                      </div>
                    </td>
                      </tr>