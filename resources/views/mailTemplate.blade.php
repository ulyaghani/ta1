<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Verifikasi Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body,
        table,
        td,
        a {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            width: 100% !important;
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
            border: 1px solid #eaeaea;
        }

        .email-header {
            text-align: center;
            padding-bottom: 20px;
        }

        .email-body {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            text-align: left;
            color: #333333;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        .email-body p {
            margin: 0 0 20px;
        }

        .email-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #000000;
            background-color: #88c9ff;
            border-radius: 7px;
            text-decoration: bold;
            margin: 20px 0;
        }

        .email-footer {
            text-align: center;
            color: #888888;
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Verifikasi Akun</h2>
        </div>
        <div class="email-body">
            <p>Halo <b>{{ $details['name'] }}</b>,</p>
            <p>Terima kasih telah melakukan registrasi di {{ $details['website'] }}. Berikut adalah data registrasi
                Anda:</p>
            <table width="100%">
                <tr>
                    <td><b>name:</b></td>
                    <td>{{ $details['name'] }}</td>
                </tr>
                <tr>
                    <td><b>Website:</b></td>
                    <td>{{ $details['website'] }}</td>
                </tr>
                <tr>
                    <td><b>Tanggal Register:</b></td>
                    <td>{{ $details['datetime'] }}</td>
                </tr>
            </table>
            <p>Untuk mengaktifkan akun Anda, silakan verifikasi dengan mengklik tombol di bawah ini:</p>
            <center>
                <a href="{{ $details['url'] }}" class="email-button">Verifikasi Akun</a>
            </center>
            <p>Jika tombol di atas tidak berfungsi, salin dan tempel tautan berikut ke browser Anda:</p>
            <p><b style="color: #3490dc;">{{ $details['url'] }}</b></p>
            <p>Terima kasih,</p>
            <p>Tim {{ $details['website'] }}</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} {{ $details['website'] }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
