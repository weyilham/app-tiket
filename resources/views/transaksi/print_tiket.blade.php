<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .container {
            margin: 20px;
            border: 1px solid black;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header" style="text-align: center">
            <h4>Wisata Air Tirta Persada DM</h4>
            <p>Kadubungbang, Cimanuk, Pandeglang Regency, Banten 42271</p>
        </div>
        <hr>
        <div class="body-struk" style=" width: 100%;">
            <table style="width: 100%">
                <tr>
                    <td>Nama Petugas</td>
                    <td style="text-align: right">Ilham Maulana</td>
                </tr>
                <tr>
                    <td>Jenis Pembayaran</td>
                    <td style="text-align: right">Cash</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Wisata Air Tirta Persada DM</th>
                </tr>
                <tr>
                    <td>Harga Tiket</td>
                    <td style="text-align: right">35000</td>
                </tr>
                <tr>
                    <td>Jumlah Tiket</td>
                    <td style="text-align: right">x 3</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th>Total (Cash)</th>
                    <th>90000</th>
                </tr>
            </table>
        </div>

        <div class="footer" style="text-align: center; margin-top:30px;">
            <p>Wisata Air Tirta Persada DM menyatakan bahwa struk ini sebagai bukti pembayaran sah.</p>
            <p>www.airtirtadm.com</p>
            <div id="barcode-container "></div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
