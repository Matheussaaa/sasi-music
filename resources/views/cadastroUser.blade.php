<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário do Usuário</title>
    <!-- Link para o Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo */
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-submit {
            background-color: #a163e8; /* Cor roxa pastel */
            border: none;
            color: #fff;
            padding: 10px 20px;
            text-transform: uppercase;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #8e4cd6;
        }

        .btn-submit:focus {
            background-color: #7a3bbf;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(138, 82, 255, 0.5);
        }

        .btn-submit:active {
            background-color: #7135b0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Formulário do Usuário</h2>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" class="form-control" id="number" name="number" required>
            </div>
            <div class="form-group">
                <label for="bio">Biografia:</label>
                <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="media">foto de perfil :</label>
                <input type="text" class="form-control" id="profile_picture" name="profile_picture">
           
            </div>
            <button type="submit" class="btn btn-submit">Enviar</button>
        </form>
    </div>

    <!-- Scripts do Bootstrap e do jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
