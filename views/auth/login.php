<main class="main-login">
    <h1>Iniciar sesion</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach;?>
    
    <div class="box-login">
        <form method="POST" action="/login" class="form-login">
            <h2>Email Y Password</h2>
            <label for="email">E-mail</label>
            <input class="input-login" type="email" name="email" placeholder=" Tu email (Solo Administrador)" id="email">
            <label for="password">Password</label>
            <input class="input-login" type="password" name="password"  placeholder=" Tu password" id="password">
            <input type="submit" value="Iniciar sesion" class="botton-login Boton boton-verde">
        </form>
    </div>
      
</main>