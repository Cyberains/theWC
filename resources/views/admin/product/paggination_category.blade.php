   @if(!empty($categorydata))
   @foreach ($categorydata as $category)

   <tr>
     <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
{{--     <td>{{ $category->service }}</td>--}}
     <td>{{ $category->title }}</td>
     <td><img src="{{ asset('public/images/category/'.$category->image) }}" height="30px"></td>
     <td>{!! \Illuminate\Support\Str::limit($category->description, $limit = 20, $end = '...') !!}</td>
     <td>
       @if($category->top_category==1)

       <div class='active-color'>
         Active</div>

       @else
       <div class='inactive-color'>
         Inactive</div>
       @endif
     </td>
     @if(Auth::user()->role == 'admin')
     <td>
       <a title="Edit" href="javascript:void(0)" onclick="categoryedit( {{ $category->id }} )" id="category-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
       <a href="javascript:void(0)" data-url="{{ route('admin.delete_category',['id'=>$category->id]) }}" class="category-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>

     </td>
   </tr>
   @endif
   @endforeach

   @endif
   <tr>
     <td colspan="6" align="center">
       <div class="col-md-12">
         <div class="float-right" id='paggination'>
           {{ $categorydata->links('vendor.pagination.bootstrap-4') }}
         </div>

       </div>
     </td>
   </tr>
