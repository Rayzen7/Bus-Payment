<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Blue Star</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="{{ asset('./image/logo.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        flex-direction: column;
        min-height: 100vh;
        padding-top: 140px;
    }

    .payment-title h1 {
        font-size: 34px;
        font-weight: 500;
        text-align: center;
    }

    .payment-title p {
        font-size: 20px;
        margin-top: 4px;
        text-align: center;
    }

    .payment-container {
        display: flex;
        margin-top: 50px;
        gap: 40px;
    }

    .payment-content {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .payment-input {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .payment-input label {
        font-size: 16px;
        font-weight: 500;
    }

    .payment-input input,
    .payment-input select {
        border: 2px solid black;
        border-radius: 6px;
        padding: 0 6px;
        width: 300px;
        height: 50px;
        font-size: 14px;
    }

    .payment-input select {
        cursor: pointer;
    }

    .payment-content button {
        background-color: var(--primary-color);
        color: white;
        width: 100%;
        height: 45px;
        font-size: 14px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 30px;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .payment {
            min-height: 100vh;
            padding-top: 140px;
        }

        .payment-title h1 {
            font-size: 30px;
        }

        .payment-title p {
            font-size: 20px;
        }

        .payment-container {
            flex-direction: column;
        }
    }
</style>

<body>
    @include('components.navbar')
    <section class="payment">
        <div class="payment-title">
            <h1>Pembayaran Tiket</h1>
            <p>JAKARTA - BOGOR</p>
        </div>
        <form action="{{ route('payment-post', ['id' => $bus->id]) }}" method="post" class="payment-container">
            @csrf
            <div class="payment-content">
                <div class="payment-input">
                    <label for="">Nama :</label>
                    <input type="text" name="name" required placeholder="Nama Kamu..."/>
                </div>
                <div class="payment-input">
                    <label for="">No. Handphone :</label>
                    <input type="number" name="no_hp" required placeholder="No Kamu..."/>
                </div>
                <div class="payment-input">
                    <label for="">Email :</label>
                    <input type="email" name="email" required placeholder="Email..."/>
                </div>
                <div class="payment-input">
                    <label for="">Metode Pembayaran :</label>
                    <select name="method" required>
                        <option value="" selected disabled>Pilih Metode</option>
                        <option value="Dana">Dana</option>
                        <option value="OVO">OVO</option>
                        <option value="Gopay">Gopay</option>
                        <option value="BCA">BCA</option>
                        <option value="BNI">BNI</option>
                        <option value="Mandiri">Mandiri</option>
                    </select>
                </div>
                <div class="payment-input">
                    <label for="">Jumlah Kursi :</label>
                    <input id="sheets" type="number" name="sheets" required min="0" placeholder="Jumlah Kursi..."/>
                </div>
            </div>
            <div class="payment-content">
                <div class="payment-input">
                    <label for="">Nama Bus :</label>
                    <input type="text" required value="{{ old('name', $bus->name) }}" disabled/>
                </div>
                <div class="payment-input">
                    <label for="">Kelas :</label>
                    <input type="text" required value="{{ old('class', $bus->class) }}" disabled placeholder="No Kamu..."/>
                </div>
                <div class="payment-input">
                    <label for="">Harga :</label>
                    <input id="price" type="text" value="{{ old('price', $bus->price) }}" disabled required placeholder="Harga..."/>
                </div>
                <div class="payment-input">
                    <label for="">Total Harga :</label>
                    <input id="total" type="number" name="total_price" readonly required placeholder="Total Harga..."/>
                </div>
                <button>Bayar</button>
            </div>
        </form>
        @include('components.footer')
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sheets = document.getElementById('sheets');
            const total = document.getElementById('total');
            const price = document.getElementById('price');

            document.addEventListener('input', () => {
                const sheetsCount = parseInt(sheets.value || 0);
                const priceCount = parseInt(price.value || 0);
                const totalRaw = priceCount * sheetsCount;
                total.value = totalRaw;
            });
        });
    </script>
</body>
</html>