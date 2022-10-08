@php use Illuminate\Support\Str; @endphp
@if(!empty($services))
    @foreach ($services as $service)

        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            <td>{{ $service->title }}</td>
            @if($service->service_image != null)
                <td><img src="{{ asset('public/images/services/'.$service->service_image) }}" height="30px"></td>
            @elseif($service->service_image == null)
                <td><img src="{{ url('public/assets/spa/images/img/favicon_twc.png') }}" alt="Logo" height="30px"></td>
            @endif

            @if(preg_split ("/\//", $service->service_product_image)['1'] != null)
                <td><img src="{{ asset('public/images/services/'.$service->service_product_image) }}" height="30px"></td>
            @elseif(preg_split ("/\//", $service->service_product_image)['1'] == '')
                <td><img src="{{ url('public/assets/spa/images/img/favicon_twc.png') }}" alt="Logo" height="30px"></td>
            @endif

            @if($service->service_banner_image != null)
                <td><img src="{{ asset('public/images/services/'.$service->service_banner_image) }}" height="30px"></td>
            @elseif($service->service_banner_image == null)
                <td><img src="{{ url('public/assets/spa/images/img/favicon_twc.png') }}" alt="Logo" height="30px"></td>
            @endif
            <td>{{ $service->service_time }}</td>
            <td>{{ $service->price }} ₹</td>
            <td>{{ $service->discount }} ₹</td>
            <td>{{ $service->discounted_price }} ₹</td>
            <td>{{ $service->tag }}</td>
            <td>{{ $service->getCategory->title }}</td>
            <td>{{ $service->getSubCategory->title }}</td>
{{--            <td>{{ $service->description }}</td>--}}

            @if(Auth::user()->role == 'admin')
                <td>
                    <a title="Edit" href="javascript:void(0)" onclick="ServiceEdit( {{ $service->id }} )"
                       id="category-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

                    <a href="{{ route('admin.delete-service',['id'=>$service->id]) }}"><i class="fa fa-trash" style="color: maroon;"></i></a>
                </td>
        </tr>
        @endif
    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $services->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </td>
</tr>
