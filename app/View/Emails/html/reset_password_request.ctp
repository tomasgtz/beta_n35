<div style="font-family:'Segoe UI',Tahoma,Verdana,Arial,sans-serif;font-size: 14px;">
    <p>Hola <b><?php echo $User['User']['username']; ?></b>.</p>
    <p>Nos enteramos que perdiste tu contraseña para accesar a nuestro portal.</p>
    <p>No te preocupes, puedes usar el siguiente link para restablecer tu contraseña.</p>
    <p><a href="<?php echo 'http://' . env('SERVER_NAME') . ':81/proyectotomas/Users/reset_password_token/' . $User['User']['reset_password_token']; ?>">Restaurar contraseña</a></p>
    <p>
        Gracias<br>
        El equipo CADCAM
    </p>
</div>