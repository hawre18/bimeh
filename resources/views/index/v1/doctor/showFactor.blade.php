<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table{
            border-collapse: collapse;
        }
        table, th, td
        {
            font-size: 10pt;
            border:1px solid black;
            direction: rtl;
        }
    </style>
</head>
<body>
<div style="position: absolute;text-align: center;right: 40%;"><label>صورت حساب خدمات</label><br/></div>
<div style="position: absolute;right: 20px;color: #0f5132;"><label style="color: #0f5132;">شفا آوای باپیر</label></div>
<div><label>تاریخ:</label><label >{{\Hekmatinasser\Verta\Verta::today()}}</label></div>
<br/>
<label style="position: absolute;left: 0px;">شماره سریال:{{$sell->id}}</label>
<br/>


<table>
    <tr style="text-align: center;background: #0f5132;">
        <th colspan="12" style="text-align: center;">مشخصات فروشنده</th>
    </tr>
    <tr>
        <th style="text-align: right;">نام شخص حقیقی/حقوقی:</th>
        <td style="text-align: left;">{{$information->title}}</td>
        <th style="text-align: right;max-width: 30px;">شماره اقتصادی:</th>
        <td  style="text-align:left;">12345678</td>
        <th style="text-align: right;">شماره ثبت:</th>
        <td style="text-align: left;">12345678</td>
    </tr>
    <tr>
        <th  style="text-align: right;">نشانی کامل استان:</th>
        <td style="text-align: left;">فارس</td>
        <th  style="text-align: right;">شهرستان:</th>
        <td style="text-align: left;">لامرد</td>
        <th  style="text-align: right;">کدپستی:</th>
        <td style="text-align: left;">1234567890</td>
        <th  style="text-align: right;">شهر:</th>
        <td style="text-align: left;">لامرد</td>
    </tr>
    <tr>
        <th  style="text-align: right;">نشانی:</th>
        <td style="text-align: left;">{{$information->address}}</td>
        <th  style="text-align: right;">شماره ملی:</th>
        <td style="text-align: left;">-</td>
        <th  style="text-align: right;">تلفن</th>
        <td style="text-align: left;">{{substr($information->phone,3,11)}}</td>
        <td style="text-align: right;">-</td>
        <td style="text-align: left;">{{substr($information->phone,0,3)}}</td>
    </tr>
    <tr style="text-align: center;background: #0f5132;">
        <th colspan="12" style="text-align: center;">مشخصات مشتری</th>
    </tr>
    <tr>
        <th style="text-align: right;">نام شخص حقیقی/حقوقی:</th>
        <td style="text-align: left;">{{$customer->f_name.' '}}{{$customer->l_name.' '}}</td>
        <th style="text-align: right;max-width: 30px;">شماره اقتصادی:</th>
        <td  style="text-align:left;">-</td>
        <th style="text-align: right;">شماره ثبت:</th>
        <td style="text-align: left;">-</td>
    </tr>
    <tr>
        <th  style="text-align: right;">نشانی کامل استان:</th>
        <td style="text-align: left;">{{$address->province->name}}</td>
        <th  style="text-align: right;">شهرستان:</th>
        <td style="text-align: left;">{{$address->city->name}}</td>
        <th  style="text-align: right;">کدپستی:</th>
        <td style="text-align: left;">{{$address->postcode}}</td>
        <th  style="text-align: right;">شهر:</th>
        <td style="text-align: left;">{{$address->city->name}}</td>
    </tr>
    <tr>
        <th  style="text-align: right;">نشانی:</th>
        <td style="text-align: left;">{{$address->bodyad}}</td>
        <th  style="text-align: right;">شماره ملی:</th>
        <td style="text-align: left;">{{$customer->nationalcode}}</td>
        <th  style="text-align: right;">تلفن</th>
        <td style="text-align: left;">{{substr ($address->tellphone,3,11)}}</td>
        <td style="text-align: right;">-</td>
        <td style="text-align: left;">{{substr($address->tellphone,0,3)}}</td>
    </tr>
    <tr style="text-align: center;background: #0f5132;">
        <th colspan="12" style="text-align: center;">مشخصات خدمات</th>
    </tr>
    <tr>
        <th>#</th>
        <th>کد خدمت</th>
        <th>عنوان</th>
        <th>مبلغ(ریال)</th>
        <th>مبلغ تخفیف(ریال)</th>
        <th>مبلغ کل پس ازتخفیف(ریال)</th>
        <th>مالیات و عوارض</th>
        <th>جمع کل</th>
    </tr>
    @foreach($sell->services as $service)
    <tr>

        @foreach($sell->services as $service)
            <td>{{$loop->index+1}}</td>
            <td>{{$service->id}}</td>
            <td>{{$service->title}}</td>
            <td>{{$service->price}}</td>
            <td>{{$service->price*$service->offPrice}}</td>
            <td>{{$service->price-($service->price*$service->offPrice)}}</td>
            <td>0</td>
            <td>{{$service->price-($service->price*$service->offPrice)}}</td>

        @endforeach
    </tr>
    @endforeach
    <tr>
        <td>جمع کل قابل پرداخت: </td>
        <td colspan="11">{{$sell->totalPrice}}</td>
    </tr>
    <tr>
        <td>شرایط نحوه پرداخت:</td>
        <td>نقدی<input type="checkbox" checked></td>
        <td>غیر نقدی<input type="checkbox"></td>
    </tr>
    <tr >
        <td rowspan="2">توضیحات</td>
    </tr>
    <tr>

    </tr>
</table>
<div style="position: absolute;right: 20px;"><label>امضای مشتری</label></div>
<div><label>امضای فروشنده</label></div>

<div style="position: absolute;right: 20px;">
    <br/>
    <br/>
    <br/>
    <label>کاربر دکتر مرجع:</label>
    <label style="direction:rtl;">{{$sell->doctor->fname.' '.$sell->doctor->lname}}</label>
</div>



</body><!-- This template has been downloaded from Webrubik.com -->
</html>
