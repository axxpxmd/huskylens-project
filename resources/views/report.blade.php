<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>UNITED - Diabetes Checking</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            padding-right: 30px !important;
            padding-left: 30px !important;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }

        table{
            border-collapse:separate;
            border-spacing: 0 10px;
        }

    </style>

</head>

<body>
    <table style="margin-top: -20px !important">
        <tr>
            <td width="30%">
                <img src="{{ public_path('images/logo-united.png') }}" width="100%" alt="">
            </td>
            <td width="70%">
                <div style="color: #00BDAC !important; font-weight: bolder">
                    <p style="margin: 0px !important; font-size: 24px">Utilized Huskylens for Non – Invasive</p>
                    <p style="margin: 0px !important; font-size: 24px">Early Detection of Diabetes Mellitus </p>
                    <p style="margin: 0px !important; font-size: 24px">through Tongue Analysis </p>
                    <p style="margin: 0px !important; font-size: 24px; color: black !important">Analysis Report</p>
                </div>
            </td>
        </tr>
    </table>
    <div style="border: 2px black solid; margin-bottom: 2px; margin-top: -15px !important"></div>
    <div style="margin-left: 30px !important">
        <p style="font-weight: bolder">
            <li style="color: #00BDAC !important; font-size: 18px !important; font-weight: bolder">Patient Identity</li>
        </p>
        <table style="margin-top: 5px !important">
            <tr>
                <td style="font-weight: bolder">Name</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>&nbsp;{{ $data->name }}</td>
            </tr>
            <tr>
                <td style="font-weight: bolder">Email</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>&nbsp;{{ $data->contact }}</td>
            </tr>
            <tr>
                <td style="font-weight: bolder">Address</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>&nbsp;{{ $data->kecamatan->n_kecamatan }}, {{ $data->kota->n_kota }}, {{ $data->provinsi->n_provinsi }}</td>
            </tr>
        </table>
    </div>
    <div style="margin-left: 30px !important">
        <p style="font-weight: bolder;">
            <li style="color: #00BDAC !important; font-size: 18px !important; margin-bottom: 10px !important; font-weight: bolder">Result</li>
        </p>
        <p>The test conducted with the <span style="color: #00BDAC">UNITED</span> program, shows that:</p>
        <table style="margin-top: -10px !important">
            <tr>
                <td style="font-weight: bolder">Status</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td style="font-weight: bolder">
                    @if ($status == 'Negative')
                        &nbsp;<span style="color: #466648">{{ $status }}</span>
                    @else
                        &nbsp;<span style="color: #873434">{{ $status }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="font-weight: bolder">Risk Level</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>&nbsp;{{ $risk_level }}</td>
            </tr>
            <tr>
                <td style="font-weight: bolder">Accuracy</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>&nbsp;{{ $data->final_result }}%</td>
            </tr>
        </table>
    </div>
    <div style="margin-top: 15px !important; margin-left: 30px">
        <p style="line-height: 30px; text-align: justify !important">Based on the results, {{ $text }}</p>
    </div>
    <div style="margin-top: 15px !important; margin-left: 30px">
        <p style="line-height: 30px; text-align: justify !important">
            This result is for <span style="font-weight: bolder">screening purposes only and should not replace professional
            medical diagnosis</span>. Always consult with a healthcare provider for confirmed diagnosis
            and treatment plans
        </p>
    </div>
    <div style="margin-top: 150px !important">
        <div style="border: 1px black solid; margin-bottom: 20px; margin-top: -15px !important; width: 180px !important"></div>
        <p style="font-size: 18px; font-weight: bolder;">
            Thank you for choosing <span style="color: #00BDAC">UNITED</span> for your health screening needs!
        </p>
        <p style="font-size: 18px; font-weight: bolder;">
            Date of analysis : {{ $data->created_at->toDayDateTimeString() }}
        </p>
        <p style="font-size: 18px; font-weight: bolder;">
            © {{ date('Y') }} <span style="color: #00BDAC">UNITED</span>. All rights reserved.
        </p>
    </div>
</body>

</html>
