<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link para o Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo */
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 100px;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-login {
            background-color: #a163e8; /* Cor roxa pastel */
            border: none;
            color: #fff;
            padding: 10px 20px;
            text-transform: uppercase;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #8e4cd6;
        }

        .btn-login:focus {
            background-color: #7a3bbf;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(138, 82, 255, 0.5);
        }

        .btn-login:active {
            background-color: #7135b0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Login</h2>
        <form action="{{ route('logando') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-login">Entrar</button>
         <a href="{{route('user.create')}}">cadastrar-se</a>
        </form>
    </div>

    <!-- Scripts do Bootstrap e do jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
