<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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

    .contact {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 60px;
    }

    .contact h1 {
        font-size: 34px;
        color: var(--primary-color);
        font-weight: 600;
    }

    .contact-container {
        margin-top: 40px;
        display: flex;
        flex-direction: column;
        gap: 28px;
    }

    .contact-container input,
    .contact-container textarea {
        width: 400px;
        height: 50px;
        border-radius: 8px;
        font-size: 14px;
        border: 2px solid black;
    }

    .contact-container input {
        padding: 0 10px;
    }

    .contact-container textarea {
        padding: 10px;
        height: 190px;
    }

    .contact-container button {
        background-color: var(--primary-color);
        color: white;
        width: 100%;
        height: 45px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
        border-radius: 6px;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .contact h1 {
            font-size: 28px;
        }

        .contact-container input,
        .contact-container textarea {
            width: 280px;
        }
    }
</style>

<body>
   <section>
      <div class="contact">
        <h1>Kontak Kami</h1>
        <div class="contact-container">
            <input type="text" id="name" placeholder="Nama Kamu..." required/>
            <textarea id="message" placeholder="Pesan Kamu..." required></textarea>
            <button onclick="kirimWhatsApp()">Kirim</button>
        </div>
      </div>
   </section> 

   <script>
        function kirimWhatsApp() {
            const nama = document.getElementById('name').value;
            const pesan = document.getElementById('message').value;

            if (!nama || !pesan) {
                alert('Nama dan pesan wajib diisi!');
                return;
            }

            const nomor = '6287844556570';
            const teks = `Halo, saya ${nama}.%0A${pesan}`;
            const link = `https://wa.me/${nomor}?text=${teks}`;

            window.open(link, '_blank');
        }
    </script>
</body>
</html>