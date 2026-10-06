<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo mensaje de contacto — CarabajalDev</title>
</head>
<body style="font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, sans-serif; color: #0f172a; background: #f8fafc; padding: 24px;">
    <div style="max-width: 560px; margin: 0 auto; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px;">
        <h1 style="margin: 0 0 8px; font-size: 20px;">Nuevo mensaje de contacto</h1>
        <p style="margin: 0 0 20px; color: #64748b; font-size: 14px;">Recibiste un mensaje desde el formulario del sitio.</p>

        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <tr>
                <td style="padding: 8px 0; color: #64748b; width: 120px;">Nombre</td>
                <td style="padding: 8px 0;">{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #64748b;">Teléfono</td>
                <td style="padding: 8px 0;">{{ $data['phone'] }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #64748b;">Email</td>
                <td style="padding: 8px 0;">{{ $data['email'] }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #64748b;">Asunto</td>
                <td style="padding: 8px 0;">{{ $data['subject'] }}</td>
            </tr>
        </table>

        <div style="margin-top: 16px; padding: 16px; background: #f8fafc; border-radius: 12px; font-size: 14px; white-space: pre-line;">{{ $data['message'] }}</div>

        <p style="margin-top: 24px; font-size: 12px; color: #94a3b8;">CarabajalDev — carabajaldev.com.ar</p>
    </div>
</body>
</html>
