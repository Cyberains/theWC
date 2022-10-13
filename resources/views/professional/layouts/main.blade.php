<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    @include('professional.layouts.header')
</head>
<style>
    #cropper_model img {
        width: 100%;
    }
    #cropper_model .modal-body {
        padding: 0;
    }
    .image-container {
        overflow: hidden;
    }</style>
@yield('style')
<body class="c-app">
<div id="remote_model" class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>

<div id="cropper_model" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div id="image-cropper-wrapper">
                <div class="modal-header">
                    <div class="pull-right">
                        <button id="crop-btn" class="btn btn-sm btn-success">
                            <i class="fa fa-check"></i> {{ transLang('crop') }}
                        </button>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger hide_model_box">
                            <i class="fa fa-times"></i> {{ transLang('close') }}
                        </button>
                    </div>
                    <h4 class="smaller lighter blue no-margin">{{ transLang('crop_image') }}</h4>
                </div>
                <div class="modal-body">
                    <img id="img-cropper" style="display:none;">
                </div>
                <div class="modal-footer">
                    <button id="crop-btn" class="btn btn-sm btn-success">
                        <i class="fa fa-check"></i> {{ transLang('crop') }}
                    </button>
                    <button data-dismiss="modal" class="btn btn-sm btn-danger hide_model_box">
                        <i class="fa fa-times"></i> {{ transLang('close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

@include('professional.layouts.sidebar')
<div class="c-wrapper c-fixed-components">
    @include('professional.layouts.navbar')
    <div class="c-body">

        <main class="c-main">
            @yield('body')

        </main>
        @include('professional.layouts.footer')
    </div>
</div>

@yield('modal')
<script  type="text/javascript">
    $(document).on('click', 'a[data-toggle="modal"]', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var target_element = $(this).data('target');
        $(target_element).find('.modal-content').html(`
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 center">{!! transLang("loader_message") !!}</div>
                        </div>
                    </div>
                `);
    });

    $('#remote_model,#cropper_model').on('hidden.bs.modal', function (e) {
        $(this).removeData();
        $(this).find('.modal-content').empty();
    });
    // $('#remote_model').on('show.bs.modal', function (e) {});

    // For Image Cropper
    $(document).on('change', '.image-cropper', function (e) {
        if (this.files && this.files[0]) {
            let file = this.files[0];
            let _URL = window.URL || window.webkitURL;

            let { width, height, name, enable_ratio } = $(this).data();
            enable_ratio = enable_ratio === undefined ? 3 : enable_ratio;
            let filename = $(this).val();
            let extension = filename.substr((filename.lastIndexOf('.') + 1)).toLowerCase();
            if($.inArray(extension, ['jpg', 'jpeg', 'png']) < 0) {
                infoAlert('{{ transLang("invalid_file_type") }}');
                return false;
            }
            // Validate image dimensions
            let img = new Image();
            img.onload = function () {
                if(this.width < width || this.height < height) {
                    infoAlert('{{ transLang("invalid_file_dimension") }}');
                    return false;
                }

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#cropper_model .modal-content').data('crop_img', e.target.result);
                    $('#cropper_model').modal({show:true});


                    setTimeout(() => initCropper(height,width,enable_ratio,name), 400);
                }
                reader.readAsDataURL(file);
            };
            img.src = _URL.createObjectURL(file);
        }
    });
    let $cropper_img  = $('#cropper_model').find('.modal-content img');
    function initCropper(height,width,enable_ratio,name) {
        let $target = $('#cropper_model').find('.modal-content');
        let { crop_img } = $target.data();
        $cropper_img.attr('src', crop_img).show();
        $enable_ratio=enable_ratio;
        // enable_ratio = enable_ratio === undefined ? 1 : enable_ratio;
        $cropper_img.cropper({

            cropBoxResizable: true,
            aspectRatio: parseFloat(width) / parseFloat(height),

            zoomOnWheel: true,
            dragMode: 'none',
            data: {
                width: parseFloat(width),
                height: parseFloat(height),
            }
        });
    }

    $('#image-cropper-wrapper').on('click', '#crop-btn', function (e) {
        e.preventDefault();
        $(this).prop('disabled', true);
        try {
            let mimeType = dataURLtoMimeType($('#image-cropper-wrapper #img-cropper').attr('src'));
            console.log(mimeType);
            let imageData = $cropper_img.cropper('getCroppedCanvas').toDataURL(mimeType, 0.9);
            $('#image-cropper-preview').attr('src', imageData).show();
            $('#preview_image').val(imageData);
        } catch(e) {
            console.log(e);
        }

        $('#image-cropper-wrapper .hide_model_box').click();
    });



    $(document).on('click', '.delete-entry', async function(e) {
        e.preventDefault();

        if (await confirmAlert()) {
            var href = $(this).attr('href');
            var { tbl, reload_page } = $(this).data();
            $.get( href, () => {
                if (reload_page == 1) {
                    location.reload(true);
                } else {
                    reloadTable(`${tbl}-table`);
                }
            })
                .fail((jqXHR, exception) => infoAlert($(formatErrorMessage(jqXHR, exception)).text()));
        }
    });

    // await confirmAlert()
    async function confirmAlert() {
        let { value: isAccepted } = await Swal.fire({
            text: `{{ transLang('are_you_sure') }}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `<i class="fa fa-check"></i> {{ transLang('yes') }}`,
            cancelButtonText: `{{ transLang('cancel') }}`,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        });
        return isAccepted === true;
    }

    async function infoAlert(msg, icon = 'warning') {
        await Swal.fire({
            text: msg,
            icon, // warning, error, success, info, and question
            showCancelButton: false,
            confirmButtonText: `<i class="fa fa-check"></i> {{ transLang('okay') }}`,
            confirmButtonColor: '#3085d6',
        });
    }


</script>
@include('professional.layouts.script')
</body>
</html>
