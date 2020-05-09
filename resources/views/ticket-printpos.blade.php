<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        #invoice-POS {
            /* box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); */
            padding: 2mm;
            margin: 0 auto;
            width: 44mm;
            background: #FFF;
            font-family: monospace;
        }

        #invoice-POS ::selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS h1 {
            font-size: 1.5em;
            color: #222;
        }

        #invoice-POS h2 {
            font-size: 1rem;
        }

        #invoice-POS h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        #invoice-POS p {
            /* font-size: .7em; */
            color: #000;
            line-height: 1.2em;
        }

        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS #bot {
            min-height: 50px;
        }

        #invoice-POS #top .logo {
            height: 90px;
            width: 90px;
            background-size: 90px 90px;
        }

        #invoice-POS #top .logo2 {
            height: 30px;
            width: 90px;
            background-size: 90px 30px;
        }

        #invoice-POS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        #invoice-POS .info {
            display: block;
            margin-left: 0;
        }

        #invoice-POS .title {
            float: right;
        }

        #invoice-POS .title p {
            text-align: right;
        }

        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice-POS .tabletitle {
            font-size: .5em;
            background: #EEE;
        }

        #invoice-POS .tabletitle td {
            padding: 5px 0px;
        }

        #invoice-POS .tabletitle h2 {
            margin: 0px;
        }

        #invoice-POS .service {
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS .item {
            width: 24mm;
        }

        #invoice-POS .itemtext {
            font-size: .9rem;
        }

        #invoice-POS #legalcopy {
            margin-top: 5mm;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-sm">
            <div id="invoice-POS">

        <center id="top">
            <div class="info">
                <h2 style="font-size: 1.2rem">SỐ PHIẾU #{{ $ticket->id }}</h2>
                <h2 style="text-transform: uppercase; font-size: 1rem">{{ $ticket->client->name }}</h2>
            </div>
            <!--End Info-->

        </center>
        <!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
                <p>
                    <span style="text-transform: uppercase; font-weight: bold; text-align: center;">Theo dõi tiến độ thiết kế bằng MÃ QR</span>
                </p>
            </div>
        </div>
        <!--End Invoice Mid-->

        <center>{!! QrCode::size(150)->margin(0)->generate('http://sys.deli4ne1.com/tracking/'.$ticket->id.'/'.substr($ticket->client->phone, -6)) !!}</center><br>
        <div id="bot">
            <div id="table">
                <table>
                    <tr class="service">
                        <table style="width:98%">
                            <tr>
                                <td style="text-align: justify;">Quý Khách sử dụng Zalo hoặc ứng dụng quét MÃ QR bất kỳ.</td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td style="text-align: justify;"><strong>Link trực tiếp:</strong></td>
                            </tr>
                            <tr>
                                <td style="text-align: justify;">{!! '<i class="fa fa-globe"></i> sys.deli4ne1.com<br>/tracking/'.$ticket->id.'/'.substr($ticket->client->phone, -6) !!}</td>
                            </tr>
                        </table>
                    </tr>
                </table>
            </div>
            <!--End Table-->
            <div id="legalcopy">
                <p class="legal">
                    <p style="width: 98%"></p>
                </p>
            </div>
            <div id="legalcopy">
                <center class="legal"><strong>SĐT: 094.294.7074<br>hoặc 097.151.7074</strong></center>
            </div>
        </div>
        <!--End InvoiceBot-->
    </div>
        </div>
    </div>
    <!--End Invoice-->
</body>

</html>