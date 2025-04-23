<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu con subemenu - MagtimusPro</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../backend/css/style.css">
    <style>
        .marginDerecha {
            margin-right: 350px;
        }
    </style>
</head>
<body>
    
    <header>
        <div class="header__superior">
            <div class="logo">
                <img src="../backend/img/logo_sistema.png" alt="">
            </div>
            <div class="search">
                <input type="search" placeholder="¿Qué deseas buscar?">
            </div>
        </div>

        <div class="container__menu">

            <div class="menu">
                <input type="checkbox" id="check__menu">
                <label for="check__menu" id="label__check">
                    <i class="fas fa-bars icon__menu"></i>
                </label>
                <nav>
                    <ul>
                        <li><a href="#" id="selected"></a></li>
                        <li><a href="#">Servicios</a>
                            <ul>
                                <li><a href="reg_denucnia.php">Registrar denuncia</a></li>
                                <li><a href="ver_denuncia.php">Ver denuncias</a></li>
                                <li><a href="seg_denuncia.php">Consultar estado</a></li>
                                <li><a href="mapa_denuncias.php">Mapa del crimen</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Nosotros</a>
                            <ul>
                                <li><a href="#">¿Quiénes somos?</a></li>
                                <li><a href="#">Misión y visión</a></li>
                                <li><a href="#">Equipo de trabajo</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog</a>
                            <ul>
                                <li><a href="#">Noticias y actualizaciones </a></li>
                                <li><a href="#">Consejos sobre denuncias</a></li>
                                <li><a href="#">Casos de éxito</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Seguridad</a>
                            <ul>
                                <li><a href="#">Privacidad y Confidencialidad </a></li>
                                <li><a href="#">Protección de denunciantes</a></li>
                                <li><a href="#">Seguridad en el sistema</a></li>
                            </ul>
                        </li>
                        <li class="marginDerecha"><a href="#">Contactos</a>
                            <ul>
                                <li><a href="#">Soporte</a></li>
                                <li><a href="#">FAQ (Preguntas frecuentes)</a></li>
                                <li><a href="#">Redes sociales</a></li>
                            </ul>
                        </li>
                        <li><a href="login.php">Iniciar sesion</a>
                            
                        </li>
                        <li><a href="registro.php">Registrar</a>
                            
                        </li>
                    </ul>
                </nav>
            </div>

        </div>

    </header>

    <main>
        <article>
            <h2>Página de inicio</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis perspiciatis, minus repellendus laborum porro distinctio est molestias, tempora, eligendi id asperiores dolores eos aut. Fuga laudantium vel obcaecati voluptatem magnam tempore rerum dolor tenetur dolorem et voluptates velit officia, sint veritatis dicta totam architecto, modi omnis illo dignissimos, doloremque cupiditate debitis! Dolorum voluptates nulla vitae corporis omnis quaerat maiores qui.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque porro nostrum eveniet cumque animi totam error placeat quos molestiae non, aperiam incidunt ratione ipsum. Illum ducimus aliquam, mollitia dicta nulla at et! Alias et facere odio esse consequatur sunt dolorum?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, culpa animi laudantium quam omnis et fugiat ullam? Sint placeat illo, quam reprehenderit eligendi ab maxime dolorem? A, hic inventore dolorem illo odit pariatur facilis magni vel, exercitationem dolor excepturi. Perferendis sequi repellendus voluptatum praesentium velit debitis natus exercitationem dolorum a! Eligendi, veniam? Dolores obcaecati iure enim pariatur similique porro nihil ipsum possimus voluptate laudantium cum non accusamus quos ratione vel perspiciatis explicabo nemo modi assumenda suscipit consequuntur, ut eligendi corrupti ex? Odit architecto nesciunt hic nisi magnam velit animi voluptatibus omnis inventore, quibusdam soluta doloribus fugit dignissimos esse deserunt excepturi earum natus ex quia suscipit similique veritatis error accusantium molestiae! Sint facilis excepturi veritatis quod alias earum dicta nemo a.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia ex ut exercitationem rerum animi ipsa, similique odit repellat dolorum sunt reiciendis nostrum velit est ipsam iusto atque quam placeat explicabo aperiam aliquam vel omnis? Fugiat unde expedita velit sed quibusdam doloremque non similique architecto odio quaerat repellendus odit nemo harum deserunt inventore ipsa explicabo sint, perferendis libero. Eum, dicta molestiae? Ut, quas officia? Sunt, aspernatur porro! Error, quibusdam iure nesciunt consectetur dolore sunt nihil quod adipisci voluptate omnis unde suscipit molestias ea dolores, architecto maxime saepe? Repudiandae ex accusamus minus.</p>
        </article>

        <article>
            <h2>Página de servicios</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio est nobis consectetur officia dolore accusamus sunt vel quo exercitationem doloribus dolores repudiandae atque, cupiditate laboriosam id, accusantium ducimus tempore ullam?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque porro nostrum eveniet cumque animi totam error placeat quos molestiae non, aperiam incidunt ratione ipsum. Illum ducimus aliquam, mollitia dicta nulla at et! Alias et facere odio esse consequatur sunt dolorum?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae iusto eligendi nesciunt soluta molestias sit.</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis et eum reiciendis unde dignissimos temporibus ipsa suscipit animi expedita, praesentium recusandae minima quasi mollitia culpa fugiat odit voluptate rerum incidunt.</p>
        </article>

        <article>
            <h2>Página de nosotros</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio est nobis consectetur officia dolore accusamus sunt vel quo exercitationem doloribus dolores repudiandae atque, cupiditate laboriosam id, accusantium ducimus tempore ullam?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque porro nostrum eveniet cumque animi totam error placeat quos molestiae non, aperiam incidunt ratione ipsum. Illum ducimus aliquam, mollitia dicta nulla at et! Alias et facere odio esse consequatur sunt dolorum?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae iusto eligendi nesciunt soluta molestias sit.</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis et eum reiciendis unde dignissimos temporibus ipsa suscipit animi expedita, praesentium recusandae minima quasi mollitia culpa fugiat odit voluptate rerum incidunt.</p>
        </article>

        <article>
            <h2>Página de servicios</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio est nobis consectetur officia dolore accusamus sunt vel quo exercitationem doloribus dolores repudiandae atque, cupiditate laboriosam id, accusantium ducimus tempore ullam?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque porro nostrum eveniet cumque animi totam error placeat quos molestiae non, aperiam incidunt ratione ipsum. Illum ducimus aliquam, mollitia dicta nulla at et! Alias et facere odio esse consequatur sunt dolorum?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae iusto eligendi nesciunt soluta molestias sit.</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis et eum reiciendis unde dignissimos temporibus ipsa suscipit animi expedita, praesentium recusandae minima quasi mollitia culpa fugiat odit voluptate rerum incidunt.</p>
        </article>
    </main>
</body>
</html>