<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clube da Amizade Pe. Antônio Gonçalves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
        }
        .hero {
            background-color: #4a6da7;
            color: white;
            padding: 80px 0;
            margin-bottom: 40px;
        }
        .card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Clube da Amizade</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero text-center">
        <div class="container">
            <h1>Bem-vindo ao Clube da Amizade</h1>
            <p class="lead">Um espaço de convivência, aprendizado e amizade</p>
        </div>
    </section>

    <div class="container">
        <h2 class="text-center mb-4">Nossos Cursos</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Curso de Artesanato">
                    <div class="card-body">
                        <h5 class="card-title">Artesanato</h5>
                        <p class="card-text">Aprenda diversas técnicas de artesanato com professores experientes.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Curso de Música">
                    <div class="card-body">
                        <h5 class="card-title">Música</h5>
                        <p class="card-text">Aulas de instrumentos musicais e canto para todas as idades.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Curso de Dança">
                    <div class="card-body">
                        <h5 class="card-title">Dança</h5>
                        <p class="card-text">Diversos estilos de dança em um ambiente acolhedor e divertido.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mb-4 mt-5">Próximos Eventos</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Festa Junina</h5>
                        <h6 class="card-subtitle mb-2 text-muted">15 de Junho, 2023</h6>
                        <p class="card-text">Venha participar da nossa tradicional festa junina com comidas típicas, música e muita diversão!</p>
                        <a href="#" class="btn btn-outline-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Exposição de Artesanato</h5>
                        <h6 class="card-subtitle mb-2 text-muted">10 de Julho, 2023</h6>
                        <p class="card-text">Exposição dos trabalhos realizados pelos alunos do curso de artesanato durante o semestre.</p>
                        <a href="#" class="btn btn-outline-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Clube da Amizade</h5>
                    <p>Um espaço de convivência, aprendizado e amizade.</p>
                </div>
                <div class="col-md-4">
                    <h5>Contato</h5>
                    <p>Endereço: Rua Exemplo, 123</p>
                    <p>Telefone: (11) 1234-5678</p>
                    <p>Email: contato@clubeamizade.org</p>
                </div>
                <div class="col-md-4">
                    <h5>Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Cursos</a></li>
                        <li><a href="#" class="text-white">Eventos</a></li>
                        <li><a href="#" class="text-white">Sobre Nós</a></li>
                        <li><a href="#" class="text-white">Contato</a></li>
                    </ul>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p>&copy; 2023 Clube da Amizade Pe. Antônio Gonçalves. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>