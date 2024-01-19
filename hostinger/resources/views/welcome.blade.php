<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviar correo con Laravel Framework</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
    <header>
        <h2 style="align-items: center">Sindrome de Leriche</h2>
        <h2 style="align-items: center">HOLA FUNCIONAS O NO IORASION</h2>
    </header>
    <nav>
        <li><a href="">Inicio</a></li>
        <li><a href="">Sobre nosotros</a></li>
        <li><a href="">Contáctanos</a></li>
    </nav>
    <br>

    <section>
        <form action="{{ route('enviar-correo') }}" method="POST">
            @csrf
            <div>
                <h4>Formulario de contacto:</h4>
            </div>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <br>
            <div>
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <br>
            <div>
                <label for="intereses">Intereses:</label>
                <textarea id="intereses" name="intereses" rows="4" required></textarea>
            </div>
            <br>
            <div>
                <input type="submit">
            </div>
            <div class="successmensaje">
                @if(session('success'))
                    <div style="color: green; text-align: center;">
                        {{ session('success') }}
                    </div>
                @endif
                </div>
        </form>

    </section>
</body>
</html>
