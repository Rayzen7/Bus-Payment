<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Blue Star</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('./image/logo.jpg') }}">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'poppins';
    }

    :root {
        --primary-color: #2543b1;
    }

    .payment {
        min-height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .payment h2 {
        font-size: 32px;
        font-weight: 500;
    }

    .table-container {
        overflow-x: scroll;
        border-radius: 12px;
        margin-top: 40px;
    }

    .table-head td {
        font-size: 16px;
        font-weight: 500;
    }

    table {
      min-width: 100%;
      border-collapse: collapse;
      text-align: center;
    }

    thead {
      background-color: var(--primary-color);
      color: white;
    }

    td {
      padding: 16px 24px;
      white-space: nowrap;
      font-weight: 400;
      font-size: 14px;
    }

    tbody tr:hover {
      background-color: #dcefff;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .payment h2 {
            font-size: 24px;
            text-align: center;
            margin: 0 auto;
        }

        .payment {
            align-items: start;            
        }

        .table-container {
            padding: 0 20px;
            margin-top: 40px;
            width: 100%;
            border-radius: 0;
        }

        table {
            width: 300px;
        }
    }
</style>

<body>
    @include('components.navbar')
    <section class="payment">
        <h2>HIstory Pembayaran</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr class="table-head">
                        <td>No</td>
                        <td>Nama</td>
                        <td>Bus</td>
                        <td>Email</td>
                        <td>No. HP</td>
                        <td>Jumlah Kursi</td>
                        <td>Total Harga</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payment as $data => $value)
                        <tr>
                            <td>{{ $data + 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->bus->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->no_hp }}</td>
                            <td>{{ $value->sheets }} Kursi</td>
                            <td>Rp. {{ number_format($value->total_price, 0, '.', ',') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @include('components.footer')
</body>

</html>