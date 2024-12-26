<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        .success-container {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px;
        }

        .success-icon {
            margin-bottom: 20px;
        }

        h1 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .btn-primary {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M9 12l2 2 4-4"></path>
            </svg>
        </div>
        <h1>Form Pinjam Buku Berhasil Terkirim!</h1>
        <p><strong>It is a long established fact that a reader will be distracted by the readable.</strong></p>
        <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
        <p>The standard chunk of Lorem Ipsum used since the 1500s</p>
        <a href="{{ url('/dashboard') }}">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
