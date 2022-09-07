@extends('admin.includes.main')
@section('title')

<title>Manage CMS</title>

@endsection

@section('btitle')

<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{ transLang('dashboard') }}</a><i class="fa fa-angle-right"></i> </li>
        <li class="active"> &nbsp;{{ $cms->type }}</li>
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

    .message_box {
        padding: 10px;
    }
</style>

@endsection
@section('body')
<div class="container-fluid">
    <div class="row bg-white mx-0 py-3 mt-2">
        <div class="col-md-12">
            <p class="alert message_box hide"></p>
            <form id="save-frm">
                @csrf
                <div class="row " style="padding: 30px;">
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label for="heading">heading<span>*</span></label>
                            <input class="form-control" type="text" name="heading" value="{{$cms->type}}" placeholder="Enter Brand Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="price">Description</label>
                            <textarea class="form-control ckeditor" name="description" value="{{$cms->description }}" placeholder="Enter Description" id="editor">{!!$cms->description!!}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="button" class="btn btn-success pull-left" id="submitBtn">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row-->
</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    initSample();
    $(document).on('click', '#submitBtn', function(e) {
        e.preventDefault();
        let btn = $(this);
        let loader = $('.message_box');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{ route('admin.cms.update',['type'=>$cms->type]) }}",
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
                window.location.replace('{{route("admin.cms.index",["type"=>$cms->type])}}');
            }
        });
    });
</script>
@endsection