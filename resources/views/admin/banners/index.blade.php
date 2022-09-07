@extends('admin.includes.main')
@section('title')

<title>Manage Banner</title>

@endsection

@section('btitle')

<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{ transLang('dashboard') }}</a><i class="fa fa-angle-right"></i> </li>
        <li class="active"> &nbsp;{{ transLang('all_banners') }}</li>
    </ol>
</section>

@endsection

@section('style')

<style type="text/css">
    .todo-list {
        margin: 0;
        padding: 0;
        list-style: none;
        overflow: auto;
    }

    .todo-list>li {
        border-radius: 2px;
        padding: 10px;
        background: #f4f4f4;
        margin-bottom: 2px;
        border-left: 2px solid #e6e7e8;
        color: #444;
    }

    .todo-list>input[type='checkbox'] {
        margin: 0 10px 0 5px;
    }

    .text {
        display: inline-block;
        margin-left: 5px;
        font-weight: 600;
    }

    .label {
        margin-left: 10px;
        font-size: 9px;
    }

    .tools {
        float: right;
        color: red;
    }

    .tools>.fa,
    .tools>.glyphicon,
    .tools>.ion {
        margin-right: 5px;
        cursor: pointer;
    }


    .danger {
        border-left-color: red;
    }

    .warning {
        border-left-color: yellow;
    }

    .info {
        border-left-color: aqua;
    }

    .success {
        border-left-color: green;
    }

    .primary {
        border-left-color: light-blue;
    }

    .handle {
        display: inline-block;
        cursor: move;
        margin: 0 5px;
    }
    label.required::after {
    content: "*";
    color: rgb(219, 22, 22);
    padding: 5px;
    font-size: 17px;
    vertical-align: middle;
}

th.required::after {
    content: "*";
    color: rgb(192, 3, 3);
    padding: 5px;
    vertical-align: middle;
}
.message_box{
    padding: 10px;
}
</style>

@endsection
@section('body')
<div class="container-fluid">
    <div class="row bg-white mx-0 py-3 mt-2">
        <div class="col-md-12">
                    <p class="alert message_box hide"></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="save-frm" class="form-inline">
                                        @csrf
                                        <div class="form-group image-wrapper">
                                            <label class="col-sm-3 control-label required">{{ transLang('image') }}</label>
                                            <div class="col-sm-5">
                                                <img src="" id="image-cropper-preview" style="display:none; float:left;" width="60">
                                               <br>
                                                <input type="hidden" name="image" id="preview_image">
                                                <input type="file" class="image-cropper" data-width="{{ $img_width }}" data-height="{{ $img_height }}" data-name="image">
                                                <small class="grey">{{ transLang('image_dimension') }}: <span class='dir-ltr'>{{ $img_width }} x {{ $img_height }}</span></small>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-success" id="addImageBtn"><i class="fa fa-plus"></i> {{ transLang('add_new') }}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br><br>
                            <ul class="todo-list product-images-section">
                                @if($banners->count())
                                @foreach($banners as $item)
                                <li data-id="{{ $item->id }}">
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    @if ($item->image)
                                    <span class="text">
                                    <a data-fancybox="gallery" href="{{ imageBasePath($item->image) }}">
                                    <img src="{{ imageBasePath($item->image) }}" width="40" />
</a>
                                      
                                    </span>
                                    @endif
                                    <div class="pull-right">
                                        <div class="tools">
                                            <a title="{{ transLang('delete') }}" href="{{ route('admin.banners.delete', [ 'id' => $item->id]) }}" class="delete-entry" data-reload_page="1"><i class="fa fa-trash fa-fw"></i></a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @else
                                <li data-id="0">
                                    <span class="text">{{ transLang('no_record_found') }}</span>
                                </li>
                                @endif
                            </ul>
                        </div>
          
    </div>
    <!-- /.row-->
</div>
</div>

@endsection

@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>
<script type="text/javascript">
    $(document).on('click', '#addImageBtn', function(e) {
                e.preventDefault();
                let btn = $(this);
                let loader = $('.message_box');

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ route('admin.banners.create') }}",
                    data: new FormData($('#save-frm')[0]),
                    processData: false,
                    contentType: false,
                    beforeSend: () => {
                        btn.attr('disabled', true);
                        loader.html(`{!! transLang('loader_message') !!}`).removeClass('alert alert-success').addClass('alert-info');
                    },
                    error: (jqXHR, exception) => {
                        btn.attr('disabled', false);
                        loader.html(formatErrorMessage(jqXHR, exception)).removeClass('alert-info').addClass('alert-danger');
                    },
                    success: response => {
                        btn.attr('disabled', false);
                        loader.html(response.message).removeClass('alert-info').addClass('alert-success');
                        location.reload(true);
                    }
                });
            });
 

$('.product-images-section').sortable({
    placeholder: 'sort-highlight',
    handle: '.handle',
    forcePlaceholderSize: true,
    zIndex: 999999,
    stop: function(event, ui) {
        let order = $(".product-images-section").sortable('toArray', { attribute: 'data-id' });
        $.post(`{{ route('admin.banners.images.order.update') }}`, {order, '_token': '{{ csrf_token() }}'});
    }
});


</script>
@endsection