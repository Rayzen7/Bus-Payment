<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

    .navbar {
        background: var(--primary-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 40px;
        width: 100%;
        height: 11vh;
        position: fixed;
        color: white;
    }

    .navbar-logo {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .navbar-logo img {
        width: 60px;
        height: auto;
    }

    .navbar-logo h1 {
        font-size: 20px;
        font-weight: 600;
    }

    .navbar-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px;
        font-size: 16px;
        font-weight: 500;
    }

    .navbar-container p,
    .navbar-container button {
        cursor: pointer;
    }

    .navbar-container button {
        background: white;
        padding: 8px 16px;
        border-radius: 6px;
        color: var(--primary-color);
        font-size: 14px;
    }

    .navbar-user {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .navbar-user i {
        font-size: 20px;
    }

    .list {
        display: none;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .navbar {
            padding: 0 20px;
        }

        .navbar-container.active {
            right: 0;
        }

        .navbar-container {
            position: absolute;
            height: 100vh;
            background: var(--primary-color);
            z-index: -10;
            top: 0;
            right: -300%;
            transition: all ease-in-out 0.7s;
            width: 160px;
            font-size: 18px;
            flex-direction: column;
        }

        .list {
            display: block;
            font-size: 30px
        }
    }
</style>
<body>
    <nav class="navbar">
        <a href="/dashboard" class="navbar-logo">
            <img src="{{ asset('./image/logo.jpg') }}" alt=""/>
            <h1>PT. Blue Star</h1>
        </a>
        <div class="navbar-container">
            <div class="navbar-user">
                <i class="bx bxs-user"></i>
                <p>{{ auth()->user()->name }}</p>
            </div>
            <a href="{{ route('indexHistory') }}">Riwayat</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button>Keluar</button>
            </form>
        </div>
        <i class="bx bx-list-ul list"></i>
    </nav>

    <script>
        const list = document.querySelector('.list');
        const sidebar = document.querySelector('.navbar-container');

        list.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>