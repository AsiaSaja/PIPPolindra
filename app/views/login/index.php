<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['title']); ?></title>
    <style>
        /* Global Styles */
        body {
            background-color: #60A5FA;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container */
        .container {
            width: 300px;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Input Fields */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Button */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Links */
        a {
            color: #4CAF50;
            text-align: center;
            display: block;
            margin-top: 10px;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Error Message */
        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Instructions */
        .instructions {
            text-align: center;
            font-size: 14px;
            margin-bottom: 15px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Masuk dan Verifikasi</h2>
        <p class="instructions">Silahkan Login menggunakan akun admin yang Anda miliki</p>

        <!-- Pesan Error -->
        <?php if (!empty($data['error'])): ?>
            <p class="error-message"><?= htmlspecialchars($data['error']); ?></p>
        <?php endif; ?>
        <!-- Form Login -->
        <form action="<?= BASEURL; ?>/login/proses" method="POST">
            <!-- Input NIM -->
            <div>
                <label for="username">Akun Pengguna</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Masukkan username yang terdaftar" 
                    required 
                >
            </div>

            <!-- Input Password -->
            <div>
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan Password" 
                    required 
                >
            </div>

            <!-- Tombol Login -->
            <button type="submit">Login</button>
        </form>

        <!-- Lupa Password -->
        <a href="<?= BASEURL; ?>">Lupa Password?</a>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('button').textContent = "Logging in..."; // Update button text to indicate loading
            document.querySelector('button').disabled = true; // Disable the button
        });
    </script>
</body>
</html>