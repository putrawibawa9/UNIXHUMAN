<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    .invoice {
        background-color: #fff;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .invoice-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .invoice-header h1 {
        margin: 0;
        color: #333;
    }

    .invoice-details {
        margin-bottom: 20px;
    }

    .invoice-details p {
        margin: 0;
    }

    .invoice-items {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .invoice-items th,
    .invoice-items td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    .invoice-items th {
        background-color: #f4f4f4;
    }

    .invoice-total {
        text-align: right;
    }

    .invoice-total p {
        margin: 0;
        font-weight: bold;
    }

    .footer {
        text-align: center;
        color: #777;
    }
</style>
</head>
<body>
<div class="invoice">
    <div class="invoice-header">
        <h1>Nota</h1>
    </div>
    <div class="invoice-details">
        <p><strong>Id Transaksi:</strong> 18</p>
        <p><strong>Tanggal:</strong> 27 Maret 2024</p>
        <p><strong>Customer:</strong> Dayura</p>
    </div>
    <table class="invoice-items">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Ukuran</th>
                <th>Jumlah</th>
                <th>Hari</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kostum Nahida</td>
                <td>L</td>
                <td>1</td>
                <td>1 Hari</td>
                <td>Rp.20.000</td>
            </tr>

        </tbody>
    </table>
    <div class="invoice-total">
        <p><strong>Total:</strong> Rp.20.000</p>
    </div>
</div>
<div class="footer">
    <p>Thank you for your business!</p>
    <label for="">Input Bukti Transaksi!</label>
    <br>
    <input type="file">
    <br>
    <a href="index.php">Kembali</a>
</div>
</body>
</html>
