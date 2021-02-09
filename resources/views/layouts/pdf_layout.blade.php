<!DOCTYPE>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    {{-- <style>
        @font-face {
            font-family: 'XBRiyaz', sans-serif;
            }
        body {
            font-family: 'XBRiyaz', sans-serif;
        }
        body, h1 {
            font-family: 'XBRiyaz', sans-serif;
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

        th, td{ font-size: 12px; padding: 0px 5px; font-family: 'XBRiyaz', sans-serif; /*text-align: right*/}

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

        @page {
            header: page-header;
            footer: page-footer;
        }
    </style> --}}
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
    <div class="page-break" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">

        <table class="table borderless tbl_header">
            <tr>
                <td width="33.3%" class="text text-center" align="right">
                    <img src="images/image001.png" alt="">
                    <div>One Tec Group LLC</div>
                    {{--@dd(asset('images/image001.png'),asset('public/images/image001.png'))--}}
                </td>
              @yield('propsal')
               
            </tr>
        </table>

        <hr>
        @yield('content')
    </div>

</body>
</html>
