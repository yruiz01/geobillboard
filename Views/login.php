<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LOGIN GB</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/alertify.core.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/alertify.default.css" id="toggleCSS">
    <link rel="shortcut icon" href="<?php echo base_url; ?>Assets/img/cartelera.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #23242a;
        }
        .box {
            position: relative;
            width: 380px;
            height: 500px;
            background: #1c1c1c;
            border-radius: 8px;
            overflow: hidden;
        }
        .box::before, .box::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 500px;
            background: linear-gradient(0deg, transparent,transparent,#45f3ff,#45f3ff,#45f3ff);
            z-index: 1;
            transform-origin: bottom right;
            animation: animate 6s linear infinite;
        }
        .box::after {
            animation-delay: -3s;
        }
        .borderLine::before, .borderLine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 500px;
            background: linear-gradient(0deg, transparent,transparent,#ff2770,#ff2770,#ff2770);
            z-index: 1;
            transform-origin: bottom right;
            animation: animate 6s linear infinite;
        }
        .borderLine::after {
            animation-delay: -4.5s;
        }
        @keyframes animate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .box form {
            position: absolute;
            inset: 6px;
            background: #222;
            padding: 50px 40px;
            border-radius: 8px;
            z-index: 2;
            display: flex;
            flex-direction: column;
        }
        .box form h2 {
            color: #fff;
            font-weight: 500;
            text-align: center;
            letter-spacing: 0.1em;
        }
        .box form .inputBox {
            position: relative;
            width: 300px;
            margin-top: 25px;
            margin-bottom: 25px; /* Espacio inferior añadido */
        }
        .box form .inputBox:first-child {
            margin-top: 0;
        }
        .box form .inputBox input {
            position: relative;
            width: 100%;
            padding: 20px 10px 10px;
            background: transparent;
            outline: none;
            border: none;
            color: #000000;
            font-size: 1em;
            letter-spacing: 0.05em;
            transition: 0.5s;
            z-index: 10;
        }
        .box form .inputBox span {
            position: absolute;
            left: 0;
            padding: 20px 0px 10px;
            pointer-events: none;
            color: #8f8f8f;
            font-size: 1em;
            letter-spacing: 0.05em;
            transition: 0.5s;
        }
        .box form .inputBox input:valid ~ span,
        .box form .inputBox input:focus ~ span {
            color: #fff;
            font-size: 0.75em;
            transform: translateY(-34px);
        }
        .box form .inputBox i {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            transition: 0.5s;
            pointer-events: none;
        }
        .box form .inputBox input:valid ~ i,
        .box form .inputBox input:focus ~ i {
            height: 44px;
        }
        .box form .form-group {
            position: relative;
            width: 300px;
            margin-bottom: 25px;
        }
        .box form .form-group select {
            width: 100%;
            padding: 10px;
            background: #222;
            color: #fff;
            border: 1px solid #08b8bb ;
            border-radius: 4px;
            outline: none;
        }
        .box form .links {
            display: flex;
            justify-content: space-between;
        }
        .box form .links a {
            color: #8f8f8f;
            margin: 8px 0;
            text-decoration: none;
        }
        .box form .links a:hover {
            color: #069483 ;
        }
        .box form input[type="submit"] {
            border: none;
            outline: none;
            padding: 11px 25px;
            background: #fff;
            cursor: pointer;
            border-radius: 4px;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form id="frmLogin" onsubmit="frmLogin(event)" autocomplete="off">
            <h2>INICIAR SESIÓN</h2>
            <div class="inputBox">
                <input type="text" id="usuario" name="usuario" required="required">
                <span>Usuario o Correo Electrónico</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" id="clave" name="clave" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>
            <div class="form-group">
                <select id="rol" class="form-control" name="rol" required>
                    <option value="">Tipo de Usuario</option>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente</option>
                </select>
            </div>
            <div class="links">
                <a href="#">¿Has olvidado tu contraseña?</a>
                <a href="<?php echo base_url . '#formulario' ?>">Crear cuenta</a>
            </div>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>

    <script src="<?php echo base_url; ?>Assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/template.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/settings.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/alertify.min.js"></script>
    <script>
        const base_url = "<?php echo base_url; ?>";
    </script>
    <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
</body>
</html>
