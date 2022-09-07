<head>
    <link rel="stylesheet" type="text/css" href= "{{ URL::asset('public/assets/css/bootstrap.min.css') }}">
</head>
<style type="text/css">
    
    html{
        margin:0px 7px 0px 7px;
    }

    .bill-table tr th,.bill-table tr td{

        padding-top: 0px;
        padding-bottom: 0px;
        font-size: 9px;
        text-align: left;
        padding-right: 5px;
    }

    .bill-table .space-table{

        padding-left: 15px;
    }

</style>

<div style="width:286px;font-size:12px; padding-top:10px;padding-bottom:5px;border-bottom: 1px dotted black">
        @for($i=0;$i<(count(json_decode($barcodedata->barcode)));$i++)

                @for($j=0;$j<(intval(json_decode($barcodedata->quantity)[$i]));$j++)
                
                    <div style="width:123px;float: left;margin-left:5px;margin-right: 10px" >
                        
                            <small style="display: block">{{ json_decode($barcodedata->product_name)[$i] }}</small>
                            <span><img width="123px" src="data:image/png;base64,{{ DNS1D::getBarcodePNG(json_decode($barcodedata->barcode)[$i], 'C128') }}"></span>
                            <small style="display: block">{{ json_decode($barcodedata->barcode)[$i] }}</small>                                  
                    </div>
                    <div style="width:123px;float:right;margin-left:5px;margin-right: 10px" >
                        
                            <small style="display: block">{{ json_decode($barcodedata->product_name)[$i] }}</small>
                            <span><img width="123px" src="data:image/png;base64,{{ DNS1D::getBarcodePNG(json_decode($barcodedata->barcode)[$i], 'C128') }}"></span>
                            <small style="display: block">{{ json_decode($barcodedata->barcode)[$i] }}</small>                                  
                    </div>
                    <div style="clear: both"></div>
                   
                @endfor
            
        @endfor
</div>



