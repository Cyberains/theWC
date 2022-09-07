<style type="text/css">
    
    .table tr th,.table tr td{

        padding-top: 0px;
        padding-bottom: 0px;
        font-size: 10px;


    }

    html{
        margin:20px 10px 20px 10px;
    }

</style>
<div style="text-align: center">
    <p style="margin:0px;padding:0px">Membership Invoice</p>
</div>
<div style="font-size:12px;padding-top:5px;padding-bottom:10px;border-bottom: 1px dotted black">
    <span style="margin:0px;padding:0px"><strong>Regd.Off. : </strong>Shop No-18,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001</span>
    <p style="margin:0px;padding:0px">9717171429</p>
    <p style="margin:0px;padding:0px">admin@earlybasket.com</p>

    </table>               
</div>


<div style="float:left;font-size: 12px;">
    <table class="table">        
        <tr>

            <th align="left" valign="top">Name:</th><td>{{ $userdata->name }}</td>
        </tr>
        <tr>

            <th align="left">Mobile:</th><td>{{ substr($userdata->mobile, 0, 2) }}*****{{ substr($userdata->mobile, 7, 4) }}</td>
        </tr>
    
        <tr><th align="left">Date:</th><td>{{ date('d-m-y',strtotime($userdata->updated_at)) }}</td></tr>
        <tr><th align="left">Receipt ID:</th><td>{{ substr($userdata->name,0,4) }}{{ $userdata->id }}{{ substr($userdata->mobile, 7, 4) }}</td>
        </tr>               

    </table> 
</div>

<div style="clear:both">
</div>
<div style="font-size:10px; padding-top:10px;padding-bottom:5px;border-bottom: 1px dotted black">
    <table>

        <tr>
            <th colspan="2" align="left" style="text-transform: uppercase;">Membership Info</th>
        </tr>
        <tr>
            <th align="left" style="font-weight:600;">Membership Type</th>
            <td>{{ $membership_type }}</th>
        </tr>
        <tr>
            <th align="left" style="font-weight:600;">Start Date</th>
            <td>{{ $userdata->m_start_date }}</th>
        </tr>
        <tr>
            <th align="left" style="font-weight:600;">Expiry Date</th>
            <td>{{ $userdata->m_end_date }}</th>
        </tr>
        <tr>
            <th align="left" style="font-weight:600;">Payment Type</th>
            <td style="text-transform: uppercase;">{{ $userdata->m_payment }}</th>
        </tr>
        <tr>
            <th align="left" style="font-weight:600;">Amount</th>
            <td style="text-transform: uppercase;">{{ number_format($userdata->m_price,2) }}/-</th>
        </tr>


    </table>
</div>

<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;text-align: right;font-size: 12px">
   
    <p style="margin:0px;padding:0px"><strong>Grand Total : </strong>{{ number_format($userdata->m_price,2) }}/-</p>
      
</div>
<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;text-align: center">
    <p style="font-size: 10px;margin:0px;padding:0px">Now you can shop online tool www.earlybasket.com | Android</p>
    <p style="font-size: 10px;margin:0px;padding:0px">Thank You Visit Again</p>

</div>

<div style="font-size: 10px;">

    <p style="margin: 0px;padding-top: 5px"><strong>Note:</strong>This is system generated copy.Signature does not required.</p>

</div>


