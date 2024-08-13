<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Post</title>
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
        <h2 class="text-center mb-4">Cadastro de Post</h2>
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="content">Conteúdo:</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="media">Mídia (URL da imagem, vídeo, etc.):</label>
                <input type="text" class="form-control" id="media" name="media">
            </div>
            <input type="text" name="user_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-submit">Enviar</button>
        </form>
    </div>

    <!-- Scripts do Bootstrap e do jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
