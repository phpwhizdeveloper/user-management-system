<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(to bottom right, #000000, #FFD700); /* black to gold */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* ensures full viewport height */
            margin: 0;
        }

        /* Navbar buttons */
        .top-right {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-left: 10px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
        }

        .btn-login:hover {
            background: white;
        }

        .btn-register {
            background: #007BFF;
            color: white;
        }

        .btn-register:hover {
            background: #0056b3;
        }

        /* Centered content */
        .content {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            color: white;
            max-width: 600px;
        }

        .content h1 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .content p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="top-right flex items-center gap-4">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-login">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <!-- Centered Content -->
    <div class="content">
        <h1>Welcome to Our Platform</h1>
        <p>Manage your workspace, connect, and collaborate seamlessly.</p>
    </div>
</body>
</html>
