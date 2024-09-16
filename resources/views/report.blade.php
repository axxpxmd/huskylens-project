<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>UNITE - Diabetes Checking</title>

    <style>
        body{
            padding: 50px
        }
    </style>

</head>
<body>
    <p style="text-align: center; font-size: 14px">ANALYZE REPORT</p>
    <img src="{{ public_path('images/logo-united.png') }}" width="100px" alt="">
    <div>
        <p style="font-weight: bolder; margin-bottom: 0px">PATIENT IDENTITY</p>
        <table style="margin-left: -3px">
            <tr>
                <td>Name</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>&nbsp;&nbsp;{{ $data->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>&nbsp;&nbsp;{{ $data->contact }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>&nbsp;&nbsp;{{ $data->kecamatan->n_kecamatan }}</td>
            </tr>
            <tr>
                <td>
                    <p>&nbsp; </p>
                </td>
                <td>&nbsp;</td>
                <td>
                    <table>
                        <tr>
                            <td>&nbsp;&nbsp;City</td>
                            <td>&nbsp;&nbsp;:</td>
                            <td>&nbsp;&nbsp;{{ $data->kota->n_kota }}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;Province</td>
                            <td>&nbsp;&nbsp;:</td>
                            <td>&nbsp;&nbsp;{{ $data->provinsi->n_provinsi }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <p style="font-weight: bolder; margin-bottom: 0px">Detection Summary</p>
        <div style="margin-top: 15px; margin-left: 50px">
            <li>
                <p style="font-weight: bold; margin: 0px">Test Conducted</p>
                <p style="margin-top: 4px; margin-bottom: 4px">AI-based Tongue Analysis using HuskyLens and UNITED System</p>
            </li>
            <li>
                <p style="font-weight: bold; margin: 0px">Result</p>
                <div style="margin-left: 40px">
                    <li>
                        <p style="font-weight: bold; margin-top: 4px; margin-bottom: 0px">Status : <span style="font-weight: normal !important">{{ $data->final_result >= 75 ? 'NEGATIF' : 'POSITIF' }}</span></p>
                    </li>
                    <li>
                        <p style="font-weight: bold; margin-top: 4px; margin-bottom: 4px">Risk Level : <span style="font-weight: normal !important">Medium</span></p>
                    </li>
                </div>
            </li>
            <li>
                <p style="font-weight: bold; margin: 0px">Accurary</p>
                <p style="margin-top: 4px">The AI detection system provides a <span style="font-weight: bolder">{{ $data->final_result }}%</span> accuracy in identifying early signs of diabetes.</p>
            </li>
        </div>
    </div>
    <div>
        <p style="font-weight: bolder">Recommendation Step</p>
        <p>Based on the results, we recommend the following steps:</p>
        <div style="margin-top: 15px; margin-left: 50px">
            @if ($data->final_result >= 75)
            <li>
                <p style="margin-top: 4px">Continue with regular health check-ups and maintain a healthy lifestyle.</p>
            </li>
            @else
            <li>
                <p style="margin-top: 4px">Schedule a consultation with your healthcare provider for further tests and management.</p>
            </li>
            @endif
        </div>
    </div>
    <div>
        <p style="font-weight: bolder">Disclaimer</p>
        <p>This result is for screening purposes only and should not replace professional medical diagnosis. Always consult with a healthcare provider for confirmed diagnosis and treatment plans.</p>
    </div>
    <div style="margin-top: 100px">
        <p>Thank you for choosing UNITED for your health screening needs!</p>
        <p>© {{ date('Y') }} UNITED. All rights reserved.</p>
    </div>
</body>
</html>
