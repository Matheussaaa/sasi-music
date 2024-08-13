<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicações para o Trabalho</title>
    <!-- Link para o Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
            button,
        button:focus,
        button:active {  
            outline: none;   
            box-shadow: none;
            border: none;
        }
        body {
            background-color: #f8f9fa; /* Cor de fundo */
            font-family: Arial, sans-serif;
        }

        main {
            padding-top: 80px; /* Adiciona espaço para a barra de navegação fixa */
        }

        .navbar {
            background-color: #a163e8; /* Cor roxa pastel */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #fff; /* Cor do texto na barra de navegação */
        }

        .nav-link {
            color: #fff !important; /* Cor dos links do menu */
        }

        .nav-link:hover {
            color: #f0f0f0 !important; /* Cor dos links ao passar o mouse */
        }

        .application {
            background-color: #d6d6d6 !important;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-view-profile {
            background-color: #a163e8; /* Cor roxa pastel */
            border: none;
            color: #fff;
            padding: 10px 20px;
            text-transform: uppercase;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-view-profile:hover {
            background-color: #8e4cd6;
        }

        .btn-view-profile:focus {
            background-color: #7a3bbf;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(138, 82, 255, 0.5);
        }

        .btn-view-profile:active {
            background-color: #7135b0;
        }
        .menu-logo{
            max-height: 80px;
        }
        .logo{
            height: 100px;
            background-size: cover;

        }
        .notification-dot {
            position: absolute;
            top: 30px;
            transform: translateX(50%);
            transform: translateX(-50%);
            display: inline-block;
            width: 10px;
            height: 10px;
            background-color: #5620bb; /* Roxo mais escuro */
            border-radius: 50%;
            z-index: 3;
        }

.notification-pulse {
    position: absolute;
    top: 30px;
    transform: translateX(50%);
    transform: translateX(-50%);
    margin-left: -5px;
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #fff;
    
    
    animation: pulseAnimation 1s ease-out infinite;
    z-index: 2; /* Ajustado para que a bolinha pulse acima do ponto de notificação */
}

@keyframes pulseAnimation {
    0% {
        transform: translateX(50%);
        transform: translateX(-50%);
        transform: scale(1);
        opacity: 0;
    }
    50% {
        transform: translateX(50%);
        transform: translateX(-50%);
        transform: scale(1.2);
        opacity: 0.5;
    }
    100% {
        transform: translateX(50%);
        transform: translateX(-50%);
        transform: scale(2);
        opacity: 0;
    }
}
.floating-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #a163e8; /* Cor roxa pastel */
        color: #fff;
    border: none; 
    border-radius: 50%; 
    width: 60px; 
    height: 60px; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    outline: none;
    z-index: 1000; /* Garante que o botão estará sempre acima dos outros elementos */
    }
    .floating-button:hover {
        background-color: #8e4cd9; /* Cor roxa pastel mais escura ao passar o mouse */
    }
    .option-button {
    position: fixed;
    bottom: 90px;
    right: 20px;
    border: none;
    display: none; /* Inicialmente escondido */
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 999; 
    list-style: none;
}
.option-button li{
    margin: 0 2px;
    padding: 3px;
    border-radius: 5px;
    background-color: #a163e8; /* Cor roxa pastel */
    color: #fff;
}
.option-button li a,.option-button li a:hover{
    color: #fff;
    text-decoration: none;
}

.option-button li:hover {
    background-color: #8e4cd9; /* Cor roxa pastel mais escura ao passar o mouse */
}
 
    </style>
</head>

<body>
    <header>
        <!-- Barra de navegação -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="menu-logo navbar-brand" href="{{ route('home') }}">
                    <img src="{{asset('img/icon/logo.png')}}" class="logo" alt="Logo da Plataforma de Músicos" height="100%">
                </a>
                <!-- Botão para exibir menu em telas pequenas -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                       @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Página Inicial</a>
                        </li>
                       @auth
                       <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile', Auth::user()->id) }}">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobs.applications') }}">Mensagens</a>
                        </li>
                        <li class="nav-item">
                            @if(Auth::user()->hasUnreadNotifications())
                            <a class="nav-link" href="{{ route('notifications') }}">
                                Notificações
                                <span class="notification-dot"></span> <!-- Ponto de notificação -->
                                <span class="notification-pulse"></span> <!-- Bolinha branca animada -->
                            </a>
                            @else
                            <a class="nav-link" href="{{ route('notifications') }}">
                                Notificações
                            </a>
                            @endif
                        </li>
                       @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobs') }}">Oportunidades</a>
                        </li>
                       
                        @auth
                        <li class="nav-item">
                         <a class="nav-link" href="{{ route('logout') }}">sair</a>
                         </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    
    

    <!-- Conteúdo principal -->
    <main>
        <div class="container mt-5">
            <h2 class="text-center mb-4">Aplicações para: asdadda</h2>
            <div class="applications">
                @foreach($applications as $application)
                <div class="application">
                    <p><strong>Nome do Aplicante:</strong> {{ $application->user->name }}</p>
                    <p><strong>Email do Aplicante:</strong> {{ $application->user->email }}</p>
                 
                    <p><strong>Data da Aplicação:</strong> {{ $application->message}}</p>
                    <a href="{{ route('user.profile', $application->user->id) }}" class="btn btn-view-profile">Ver Perfil</a>
                </div>
                @endforeach
            </div>
        </div>
        @auth
        <button class="floating-button">+</button>
        <ul class="option-button">
            <li> <a href="{{route('post.create')}}">Adicionar Post</a></li>
            <li>  <a href="{{route('job.create')}}">Adicionar JOB</a></li>
            <li>  <a >Pesquisar Usuário</a></li>
        </ul>
        @endauth
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const floatingButton = document.querySelector(".floating-button");
            const options = document.querySelectorAll(".option-button");
        
            floatingButton.addEventListener("click", () => {
                options.forEach(option => {
                    option.style.display = option.style.display === "none" ? "flex" : "none";
                });
            });
        });
        </script>
    <!-- Scripts do Bootstrap e do jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
