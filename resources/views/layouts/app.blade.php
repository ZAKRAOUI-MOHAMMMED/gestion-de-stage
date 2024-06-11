<!DOCTYPE html>
<html>

<head>
    <title>Stagiaire Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background: #f0f0f0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 40px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light container">
        {{-- <div class="container"> --}}
        <a class="navbar-brand">Système de Gestion des Stages</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Étudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('stages.index') }}">Stages</a>
                </li>
            </ul>
        </div>
        {{-- </div> --}}
    </nav>


    <div class="container">
        @yield('content')
    </div>

</body>

</html>
