<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="">

    <style>
        @font-face {
            font-family: 'ARIALUNI';
            src: url(data:font/truetype;charset=utf-8;base64,<BASE64-ENCODED-DATA>);
            }
        body, h1 {
        font-family: 'ARIALUNI', sans-serif;
        }
        hr {
            height: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ccc;
        }

        table{
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
        }

        th, td{ font-size: 12px; padding: 0px 5px; font-family: Tahoma, Helvetica, Arial; /*text-align: right*/}

        th { background-color: #222D32; color: #fff; }

        td { color: #222D32;}

        .borderless{ border: none !important;}

        .text-right{ text-align: right}
        .text-left{ text-align: left}
        .text-center{ text-align: center}

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd !important;
        }

        .payment-preview-wrapper {
            background: #84c529;
            padding: 15px;
            text-align: center;
            color: #fff;
            margin-top: 25px;
            font-size: 16px;
        }
        .pull-right {
            float: right !important;
        }

        .pull-left {
            float: left !important;
        }

        /*.page-break{*/
            /*!*border: 2px solid #FA1732;*!*/
            /*!*border-radius: 7px;*!*/
            /*height: 100%;*/
            /*padding: 10px;*/
        /*}*/

        .tbl_header {
            font-weight: bold;
            line-height: 20px;
        }

    </style>

</head>

<body>
    <div class="page-break" dir="ltr">

        <table class="table borderless tbl_header">
            <tr>
                <td width="33.3%" class="text text-center" align="right">
                    {{--<img src="{{asset('images/image001.png')}}" alt="">--}}
                    <div>One Tec Group LLC</div>
                    {{--@dd(asset('images/image001.png'),asset('public/images/image001.png'))--}}
                </td>
                {{--<td width="33.3%" class="text text-center" align="center">--}}
                    {{--<img class="logo" src="{{ asset('public/images/image001.png') }}" alt="logo" >--}}
                {{--</td>--}}
                {{--<td width="33.3%" align="left"></td>--}}
            </tr>
        </table>

        <hr>
        @yield('content')
    </div>

</body>
</html>