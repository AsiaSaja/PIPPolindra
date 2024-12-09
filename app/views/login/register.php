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

        .container {
            width: 300px;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

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

        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }

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
        <h2>Daftar Admin Baru</h2>
        <p class="instructions">Silahkan isi formulir untuk mendaftarkan akun admin baru</p>

        <!-- Pesan Error -->
        <?php if (!empty($data['error'])): ?>
            <p class="error-message"><?= htmlspecialchars($data['error']); ?></p>
        <?php endif; ?>

        <!-- Form Register -->
        <form action="<?= BASEURL; ?>/login/prosesRegister" method="POST">
            <div>
                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Masukkan username baru" 
                    required 
                    minlength="3" 
                    maxlength="50"
                >
            </div>

            <div>
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan password baru" 
                    required 
                    minlength="6" 
                    maxlength="50"
                >
            </div>

            <div>
                <label for="confirm_password">Konfirmasi Password</label>
                <input 
                    type="password" 
                    id="confirm_password" 
                    name="confirm_password" 
                    placeholder="Ulangi password baru" 
                    required 
                    minlength="6" 
                    maxlength="50"
                >
            </div>

            <button type="submit">
                <span id="button-text">Register</span>
                <span id="button-loader" style="display: none;">Loading...</span>
            </button>
        </form>

        <a href="<?= BASEURL; ?>/login">Kembali ke Login</a>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('button-text').style.display = 'none'; 
            document.getElementById('button-loader').style.display = 'inline-block'; 
            document.querySelector('button').disabled = true;
        });
    </script>
</body>
</html>
