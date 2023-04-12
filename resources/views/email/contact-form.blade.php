<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Mensaje desde formulario de contacto</title>
</head>

<body>
<div class="card">
<div class="card-header">
Un usuario te ha dejado un mensaje.
</div>
<div class="card-body">
<h3 class="card-title">Datos del mensaje</h3>
<p class="card-text"><b>Nombre:</b> {{ $data['name'] }}</p>
<p class="card-text"><b>Telefono:</b> {{ $data['phone'] }}</p>
<p class="card-text"><b>Email:</b> {{ $data['email'] }}.</p>
<p class="card-text"><b>Asunto:</b> {{ $data['subject'] }}.</p>
<p class="card-text"><b>Mensaje:</b> {{ $data['message'] }}.</p>

</div>
</div>
</body>
</html>
