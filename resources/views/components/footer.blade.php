<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
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

    .footer {
        width: 100%;
        height: 10vh;
        background-color: var(--primary-color);
        display: flex;
        justify-content: center;
        align-items: center;     
        margin-top: 120px;   
    }

    .footer p {
        font-size: 14px;
        color: white;
        font-weight: 500;
    }
</style>

<body>
    <footer class="footer">
        <p>@Copyright 2025</p>
    </footer>
</body>
</html>