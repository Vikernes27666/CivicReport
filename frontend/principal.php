<?php $nombre_usuario = $_SESSION['nombre_usuario'] ?? null; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Denuncias Ciudadanas - Perú</title>
  <link rel="stylesheet" href="../backend/css/principal.css">
</head>
<body>


  <!-- HERO -->
  <header class="hero">
    <div class="hero-texto">
      <h1>La plataforma de <span>Denuncias Ciudadanas</span> que el Perú Necesita</h1>
      <p>Contribuye a una sociedad más justa y transparente. Denuncia, participa, cambia.</p>

      <?php if ($nombre_usuario): ?>
        <a href="reg_denucnia.php" class="btn-principal">Ver Denuncias</a>
      <?php else: ?>
        <a href="#" class="btn-principal" data-bs-toggle="modal" data-bs-target="#loginModal">Ver Denuncias</a>
      <?php endif; ?>
      
    </div>
    <div class="hero-img">
      <img src="../backend/img/banner.png" alt="Denuncia ilustración">
    </div>
  </header>

  <!-- VENTAJAS -->
  <section class="ventajas">
      <div class="container">
          <h2>¿Por qué elegir nuestra plataforma?</h2>
          
          <div class="ventaja-lista">
              <div class="card">
                  <div class="card-icon-container">
                      <img src="../backend/img/anonimo.png" alt="Icono Anónimo">
                  </div>
                  <h3>100% Anónima</h3>
                  <p>Realiza tus denuncias con total tranquilidad. Garantizamos la protección completa de tu identidad en todo momento.</p>
              </div>
              
              <div class="card">
                  <div class="card-icon-container">
                      <img src="../backend/img/ubicacion.png" alt="Icono Geolocalización">
                  </div>
                  <h3>Geolocalización</h3>
                  <p>Visualiza y ubica las denuncias en tiempo real mediante nuestro mapa interactivo de alta precisión.</p>
              </div>
              
              <div class="card">
                  <div class="card-icon-container">
                      <img src="../backend/img/accesibilidad.png" alt="Icono Accesible y Transparente">
                  </div>
                  <h3>Accesible y Transparente</h3>
                  <p>Facilitamos que todos puedan ver y compartir información relevante sobre eventos en su comunidad de manera clara.</p>
              </div>
          </div>
      </div>
  </section>

<!-- DENUNCIAS DESTACADAS -->
<section class="denuncias-destacadas" id="denuncias">
    <div class="denuncias-contenedor">
        <h2>Últimas denuncias destacadas</h2>
        
        <div class="denuncia-grid">
            <div class="denuncia">
                <span class="denuncia-etiqueta-nueva">NUEVA</span>
                <div class="denuncia-contenido">
                    <span class="denuncia-etiqueta">Infraestructura</span>
                    <h4>Baches peligrosos</h4>
                    
                    <div class="denuncia-meta">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Distrito de Surco - Lima</span>
                    </div>
                    
                    <p>Múltiples baches de gran tamaño representan un peligro inminente para vehículos y peatones en la zona.</p>
                    
                    <div class="denuncia-footer">
                        <div class="denuncia-stats">
                            <div class="stat">
                                <i class="fas fa-eye"></i>
                                <span>124</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-comment"></i>
                                <span>38</span>
                            </div>
                        </div>
                        <a href="#" class="denuncia-ver-mas">Ver detalles</a>
                    </div>
                </div>
            </div>
            
            <div class="denuncia">
                <div class="denuncia-contenido">
                    <span class="denuncia-etiqueta">Seguridad</span>
                    <h4>Robo en transporte público</h4>
                    
                    <div class="denuncia-meta">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Callao - Av. Colonial</span>
                    </div>
                    
                    <p>Reportes frecuentes de robos al paso y asaltos en unidades de transporte público durante horarios específicos.</p>
                    
                    <div class="denuncia-footer">
                        <div class="denuncia-stats">
                            <div class="stat">
                                <i class="fas fa-eye"></i>
                                <span>278</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-comment"></i>
                                <span>65</span>
                            </div>
                        </div>
                        <a href="#" class="denuncia-ver-mas">Ver detalles</a>
                    </div>
                </div>
            </div>
            
            <div class="denuncia">
                <div class="denuncia-contenido">
                    <span class="denuncia-etiqueta">Medio Ambiente</span>
                    <h4>Vertido ilegal de basura</h4>
                    
                    <div class="denuncia-meta">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Comas - Jr. Los Sauces</span>
                    </div>
                    
                    <p>Acumulación constante de residuos y desechos en espacio público generando problemas sanitarios en la comunidad.</p>
                    
                    <div class="denuncia-footer">
                        <div class="denuncia-stats">
                            <div class="stat">
                                <i class="fas fa-eye"></i>
                                <span>196</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-comment"></i>
                                <span>42</span>
                            </div>
                        </div>
                        <a href="#" class="denuncia-ver-mas">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- ESTADÍSTICAS -->
  <section class="estadisticas">
    <div class="estadistica">
      <h3>+4,500</h3>
      <p>Denuncias registradas</p>
    </div>
    <div class="estadistica">
      <h3>+120</h3>
      <p>Municipios participantes</p>
    </div>
    <div class="estadistica">
      <h3>+89%</h3>
      <p>Usuarios satisfechos</p>
    </div>
  </section>

  <!-- PREGUNTAS FRECUENTES -->
  <section class="faq">
    <h2>Preguntas Frecuentes</h2>
    <div class="acordeon">
      <details>
        <summary>¿Necesito registrarme para denunciar?</summary>
        <p>No es necesario, pero si te registras puedes hacer seguimiento.</p>
      </details>
      <details>
        <summary>¿Qué pasa después de una denuncia?</summary>
        <p>La denuncia es visible públicamente y notificada a las autoridades competentes.</p>
      </details>
      <details>
        <summary>¿Es gratuito?</summary>
        <p>Totalmente gratuito para todos los ciudadanos.</p>
      </details>
    </div>
  </section>

  <!-- TESTIMONIOS -->
  <section class="testimonios">
    <h2>Testimonios de ciudadanos</h2>
    <div class="testimonio-lista">
      <blockquote>"Pude denunciar un robo y las autoridades actuaron en menos de 48 horas."</blockquote>
      <cite>— María R., Arequipa</cite>

      <blockquote>"Esta plataforma le dio voz a mi comunidad para frenar la corrupción."</blockquote>
      <cite>— Juan C., Cusco</cite>
    </div>
  </section>

<!-- HTML para sección de mapa -->
<section class="mapa-oficinas">
  <div class="ola-decorativa"></div>
  <div class="contenido-mapa">
    <h2>Encuéntranos en nuestras oficinas</h2>
    <div class="mapa-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.9763127627263!2d-77.03137494867132!3d-12.046663791485203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8b5d75148e3%3A0x193b9d1b118e2ebe!2sPlaza%20Mayor%20de%20Lima!5e0!3m2!1ses-419!2spe!4v1683297440977!5m2!1ses-419!2spe" 
              width="100%" 
              height="450" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
    <div class="info-oficinas">
      <div class="oficina">
        <h3>Sede Lima</h3>
        <p><strong>Dirección:</strong> Av. Abancay 123, Cercado de Lima</p>
        <p><strong>Horario:</strong> Lunes a Viernes 8:00 - 17:00</p>
        <p><strong>Teléfono:</strong> (01) 123-4567</p>
      </div>
      <div class="oficina">
        <h3>Sede Lima - Los Olivos</h3>
        <p><strong>Dirección:</strong> Av. Universitaria 1234, Los Olivos, Lima</p>
        <p><strong>Horario:</strong> Lunes a Viernes 8:30 - 16:30</p>
        <p><strong>Teléfono:</strong> (01) 765-4321</p>
      </div>
    </div>
  </div>
</section>

</body>
</html>
