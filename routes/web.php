<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;
use App\Models\Mensaje;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('enviar-correo', function (Request $request) {
    try {
        $data = $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'intereses' => 'required',
        ]);

        // Guarda en la base de datos
        $mensaje = Mensaje::create($data);

        // Envía el correo con la información proporcionada
        Mail::to($data['correo'])->send(new EnviarCorreo($data));

        // Flash a success message to the session
        session()->flash('success', 'Correo enviado exitosamente');

        return redirect()->route('home');
    } catch (\Exception $e) {
        // Manejar la excepción, por ejemplo, imprimir el mensaje de error
        return "Error al enviar el correo: " . $e->getMessage();
    }
})->name('enviar-correo');

