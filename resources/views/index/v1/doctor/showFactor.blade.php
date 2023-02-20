<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* CSS Document */
        @charset "UTF-8";

        @font-face {
            font-family: 'Vazir';
            src: url('../fonts/Vazir.eot');
            src: local('../fonts/Vazir'), url('../fonts/Vazir.woff') format('woff'), url('../fonts/Vazir.ttf') format('truetype');
        }

        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Vazir';
            direction: rtl;
        }

        /* ------------------------------------ */
        a {
            margin: 0px;
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
        }

        a:focus {
            outline: none !important;
        }

        a:hover {
            text-decoration: none;
        }

        /* ------------------------------------ */
        h1,h2,h3,h4,h5,h6 {margin: 0px;}

        p {margin: 0px;}

        ul, li {
            margin: 0px;
            list-style-type: none;
        }


        /* ------------------------------------ */
        input {
            display: block;
            outline: none;
            border: none !important;
        }

        textarea {
            display: block;
            outline: none;
        }

        textarea:focus, input:focus {
            border-color: transparent !important;
        }

        /* ------------------------------------ */
        button {
            outline: none !important;
            border: none;
            background: transparent;
        }

        button:hover {
            cursor: pointer;
        }

        iframe {
            border: none !important;
        }




        /*//////////////////////////////////////////////////////////////////
        [ Utiliti ]*/






        /*//////////////////////////////////////////////////////////////////
        [ Table ]*/

        .limiter {
            width: 100%;
            margin: 0 auto;
        }

        .container-table100 {
            width: 100%;
            min-height: 100vh;
            background: #c850c0;
            background: -webkit-linear-gradient(45deg, #4158d0, #c850c0);
            background: -o-linear-gradient(45deg, #4158d0, #c850c0);
            background: -moz-linear-gradient(45deg, #4158d0, #c850c0);
            background: linear-gradient(45deg, #4158d0, #c850c0);

            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 33px 30px;
        }

        .wrap-table100 {
            width: 1170px;
        }

        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }
        table * {
            position: relative;
        }
        table td, table th {
            padding-right: 8px;
        }
        table thead tr {
            height: 60px;
            background: #36304a;
        }
        table tbody tr {
            height: 50px;
        }
        table tbody tr:last-child {
            border: 0;
        }
        table td, table th {
            text-align: right;
        }
        table td.l, table th.l {
            text-align: left;
        }
        table td.c, table th.c {
            text-align: center;
        }
        table td.r, table th.r {
            text-align: center;
        }


        .table100-head th{
            font-family: 'Vazir';
            font-size: 18px;
            color: #fff;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tbody tr {
            font-family: 'Vazir';
            font-size: 15px;
            color: #808080;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:hover {
            color: #555555;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .column1 {
            width: 260px;
            padding-right: 40px;
        }

        .column2 {
            width: 160px;
        }

        .column3 {
            width: 245px;
        }

        .column4 {
            width: 110px;
            text-align: left;
        }

        .column5 {
            width: 170px;
            text-align: left;
        }

        .column6 {
            width: 222px;
            text-align: left;
            padding-left: 62px;
        }


        @media screen and (max-width: 992px) {
            table {
                display: block;
            }
            table > *, table tr, table td, table th {
                display: block;
            }
            table thead {
                display: none;
            }
            table tbody tr {
                height: auto;
                padding: 37px 0;
            }
            table tbody tr td {
                padding-right: 40% !important;
                margin-bottom: 24px;
            }
            table tbody tr td:last-child {
                margin-bottom: 0;
            }
            table tbody tr td:before {
                font-family: 'Vazir';
                font-size: 14px;
                color: #999999;
                line-height: 1.2;
                font-weight: unset;
                position: absolute;
                width: 40%;
                right: 30px;
                top: 0;
            }
            table tbody tr td:nth-child(1):before {
                content: "Date";
            }
            table tbody tr td:nth-child(2):before {
                content: "Order ID";
            }
            table tbody tr td:nth-child(3):before {
                content: "Name";
            }
            table tbody tr td:nth-child(4):before {
                content: "Price";
            }
            table tbody tr td:nth-child(5):before {
                content: "Quantity";
            }
            table tbody tr td:nth-child(6):before {
                content: "Total";
            }

            .column4,
            .column5,
            .column6 {
                text-align: right;
            }

            .column4,
            .column5,
            .column6,
            .column1,
            .column2,
            .column3 {
                width: 100%;
            }

            tbody tr {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .container-table100 {
                padding-right: 15px;
                padding-left: 15px;
            }
        }
    </style>
</head>
<body>
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                    <tr class="table100-head">
                        <th class="column1">تاریخ</th>
                        <th class="column2">شماره سفارش</th>
                        <th class="column3">مشتری</th>
                        <th class="column4">قیمت</th>
                        <th class="column5">سرویس ها</th>
                        <th class="column6">دکتر مرجع</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="column2">{{\Hekmatinasser\Verta\Verta::instance($sell->created_at)->formatJalaliDatetime(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}
                        </td>
                        <td class="column3">{{$sell->id}}</td>
                        <td class="column1">{{$customer->f_name.' '}}{{$customer->l_name.' '}}{{$customer->nationalcode}}
                        </td>


                        <td class="column3">{{$sell->totalPrice}}</td>
                        <td class="column4">
                            @foreach
                                ($sell->services as $service){{$service->title.','}}
                            @endforeach
                        </td>

                        <td class="column6">{{Auth::guard('doctor')->user()->fname ." "}}{{Auth::guard('doctor')->user()->lname}} </td>

                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body><!-- This template has been downloaded from Webrubik.com -->
</html>
