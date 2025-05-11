<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blue Star</title>
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
    
    .background {
        width: 100%;
        height: 100vh;
        object-fit: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url('../image/bus-bg.jpg');
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .container {
        background-color: #0000005b;
        width: 450px;
        color: white;
        height: 500px;
        border-radius: 10px;
        padding: 30px 40px;
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: center;
    }

    .container-title h1 {
        text-align: center;
        font-size: 32px;
        font-weight: 600;
    }

    .container-title p {
        text-align: center;
        font-size: 12px;
        width: 80%;
        margin: 0 auto;
        margin-top: 10px;
        font-weight: 500;
    }

    .container-input {
        display: flex;
        width: 100%;
        flex-direction: column;
        gap: 18px;
        margin-top: 10px;
    }

    .content-input {
        display: flex;
        flex-direction: column;
        gap: 4px;
        width: 100%;
    }

    .content-input label {
        font-size: 14px;
    }

    .content-input input {
        background-color: white;
        border-radius: 4px;
        color: black;
        width: 100%;
        padding: 0 10px;
        border: 0;
        outline: none;
        font-size: 12px;
        height: 45px;
    }

    .content-input input:focus {
        border: 2px solid #2543b1;
    }

    .container button {
        width: 100%;
        height: 45px;
        font-size: 14px;
        color: white;
        background: #2543b1;
        border-radius: 6px;
        margin-top: 24px;
        cursor: pointer;
    }

    .ask {
        margin-top: 6px;
        font-size: 12px;
    }

    .ask a {
        text-decoration: underline;
        font-style: italic;
        cursor: pointer;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .container {
            width: 300px;
            height: 460px;
            padding: 24px;
        }

        .container-title h1 {
            font-size: 26px;
        }

        .container-title p {
            font-size: 12px;
        }

        .container-input {
            margin-top: 10px;
            gap: 10px;
        }

        .container-input label {
            font-size: 12px;
        }

        .container-input input {
            height: 40px;
        }

        .container button {
            margin-top: 30px;
            height: 40px;
        }
    }
</style>

<body>
    <section class="background">
        <form action="{{ route('register-post') }}" method="post" class="container">
            @csrf            
            <div class="container-title">
                <h1>Daftar</h1>
                <p>Masukkan Nama, Email dan Kata Sandi Anda Dengan Benar</p>
            </div>
            <div class="container-input">
                <div class="content-input">
                    <label for="">Nama: </label>
                    <input type="text" name="name" required placeholder="Nama.."/>
                </div>
                <div class="content-input">
                    <label for="">Email: </label>
                    <input type="email" name="email" required placeholder="Email..."/>
                </div>
                <div class="content-input">
                    <label for="">Kata Sandi: </label>
                    <input type="password" name="password" required placeholder="Kata Sandi.."/>
                </div>
            </div>
            <button>Masuk</button>
            <p class="ask">Sudah punya Akun? <a href="/">Masuk</a></p>
        </form>
    </section>
</body>
</html>