<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Denuncias</title>
    <style>
        /* Estilos generales */
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        /* Estilos del footer */
        footer {
            background: linear-gradient(45deg, #345676, #151B23);
            color: #fff;
            padding: 40px 0 20px;
            position: relative;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
            padding: 0 15px;
        }

        .footer-section h3 {
            color: #a9c6e2;
            font-size: 18px;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: #65a5ef;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #d1e3f5;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #65a5ef;
        }

        .contact-info p {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .contact-info i {
            margin-right: 10px;
            color: #65a5ef;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: #65a5ef;
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-bottom p {
            margin: 0;
            color: #d1e3f5;
            font-size: 14px;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
        }

        /* Estilos para dispositivos móviles */
        @media screen and (max-width: 768px) {
            .footer-content {
                flex-direction: column;
            }
            
            .footer-section {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>

<!-- Contenido de la página aquí -->

<!-- Footer mejorado -->
<footer>
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-section">
                <div class="footer-logo">Portal de Denuncias</div>
                <p>Comprometidos con la transparencia y la integridad en todos los procesos. Tu voz importa para construir una sociedad más justa.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <ul class="footer-links">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Realizar Denuncia</a></li>
                    <li><a href="#">Seguimiento</a></li>
                    <li><a href="#">Preguntas Frecuentes</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Recursos</h3>
                <ul class="footer-links">
                    <li><a href="#">Guía de Usuarios</a></li>
                    <li><a href="#">Marco Legal</a></li>
                    <li><a href="#">Políticas de Privacidad</a></li>
                    <li><a href="#">Estadísticas</a></li>
                </ul>
            </div>
            
            <div class="footer-section contact-info">
                <h3>Contacto</h3>
                <p><i class="fas fa-map-marker-alt"></i> Av. Principal #123, Ciudad</p>
                <p><i class="fas fa-phone"></i> +0123 456 789</p>
                <p><i class="fas fa-envelope"></i> contacto@denuncias.com</p>
                <p><i class="fas fa-clock"></i> Lun-Vie: 8:00 - 18:00</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 Portal de Denuncias. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script src="path/to/your/scripts.js"></script>
</body>
</html>