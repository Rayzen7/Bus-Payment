<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Star</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

    .dashboard {
        display: flex;
        width: 100%;
        min-height: 100vh;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .welcome {
        text-align: center;
    }

    .welcome h1 {
        font-size: 46px;
        font-weight: 600;
    }

    .welcome h1 span {
        color: var(--primary-color)
    }

    .welcome p {
        font-size: 24px;
        font-weight: 500;
        margin-top: 12px;
    }

    .choose-bus {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin-top: 60px;
    }

    .choose-bus img {
        width: 45px;
        height: auto;
        border-radius: 10px;
    }

    .choose-bus select {
        border: 2px solid black;
        outline: none;
        border-radius: 6px;
        width: 300px;
        height: 45px;
        font-size: 14px;
        padding: 0 8px;
        cursor: pointer;
    }

    .choose-bus input:focus {
        border: 2px solid var(--primary-color);
    }

    .choose-bus button {
        width: 70px;
        height: 45px;
        background-color: var(--primary-color);
        border-radius: 6px;
        font-size: 14px;
        color: white;
        font-weight: 500;
        cursor: pointer;
    }

    .bus-sect {
        margin-bottom: 80px;
        margin-top: -80px;
    }

    .bus {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .bus-container {
        display: flex;
        justify-content: center;
        align-items: start;
        gap: 60px;
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 8px;
    }

    .bus-container img {
        width: 600px;
        height: auto;
        border-radius: 4px;
    }

    .bus-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .bus-content a button {
        background-color: var(--primary-color);
        color: white;
        width: 100%;
        height: 45px;
        font-size: 14px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }

    .bus-content-container h1 {
        font-size: 16px;
        font-weight: 600;
        color: var(--primary-color);
    }

    .bus-content-container p {
        font-size: 18px;
        font-weight: 400;
    }

    .bus-facility p {
        width: 320px;
        text-align: justify;
        font-size: 14px;
    }

    .btn-1 button {
        display: block;
    }

    .btn-2 button {
        display: none;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .welcome h1 {
            font-size: 30px;
        }

        .welcome p {
            font-size: 16px;
            width: 300px;
            margin: 0 auto;
            margin-top: 14px;
        }

        .bus-sect {
            margin-top: -140px;
        }

        .choose-bus img {
            display: none;
        }

        .choose-bus select {
            width: 220px;
        }

        .bus-container {
            flex-direction: column;
            width: 300px;
            gap: 18px;
        }

        .bus-content {
            width: 100%;
        }

        .bus-container img {
            width: 100%;
        }

        .bus-facility p {
            width: 100%;
        }

        .btn-1 button {
            display: none;
        }

        .btn-2 button {
            display: block;
        }

        .bus-content a button {
            margin-top: 12px;
        }
    }
</style>

<body>
    @include('components.navbar')
    <section class="dashboard">
        <div class="welcome">
            <h1>Selamat Datang di Website <span>PT. Blue Star</span></h1>
            <p>Tempat Pemesanan Tiket Bus Terbaik se Indonesia</p>
        </div>
        <form class="choose-bus" method="get" action="{{ route('indexDashboard') }}">
            @csrf
            <img src="{{ asset('./image/logo.jpg') }}" alt=""/>
            <select name="class">
                <option value="" selected disabled>Pilih Kelas Bus Kamu</option>
                <option value="Economy">Ekonomi</option>
                <option value="Executive">Eksekutif</option>
                <option value="Luxury">Luxury</option>
            </select>
            <button>Pilih</button>
        </form>
    </section>

    <section class="bus-sect">
        <div class="bus">
            @foreach ($bus as $buss => $data)
                <div class="bus-container">
                    <img src="{{ asset('http://localhost:8000/storage' . $data->image) }}"/>
                    <div class="bus-content">
                        <div class="bus-content-container">
                            <h1>Nama Bus :</h1>
                            <p>{{ $data->name }}</p>
                        </div>
                        <div class="bus-content-container">
                            <h1>Kelas :</h1>
                            <p>{{ $data->class }}</p>
                        </div>
                        <div class="bus-content-container">
                            <h1>Tujuan :</h1>
                            <p>Jakarta - Bogor</p>
                        </div>
                        <div class="bus-content-container">
                            <h1>Harga :</h1>
                            <p>Rp. {{ number_format($data->price, 0, ',', '.') }}</p>
                        </div>
                        <a class="btn-1" href="{{ '/dashboard/payment/' . $data->id }}">
                            <button>Pesan</button>
                        </a>
                    </div>
                    <div class="bus-content">
                        <div class="bus-content-container bus-facility">
                            <h1>Fasilitas :</h1>
                            @foreach ($data->facility as $facility => $dataFacility)
                                <p>{{ $dataFacility }}</p>
                            @endforeach
                        </div>
                        <a class="btn-2" href="{{ '/dashboard/payment/' . $data->id }}">
                            <button>Pesan</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @include('components.contact')
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'oke',
                confirmButtonColor: 'green'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'oke',
                confirmButtonColor: 'red'
            });
        </script>
    @endif
</body>
</html>