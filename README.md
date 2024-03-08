# appArtistasUsm_laravel

<p>App creada en laravel 10 y bootstrap 5.3 con bootstrap ICONS a nivel PROFESIONAL, usando XAMPP para la gestion de registros de la base de datos con Apache y MySql.</p>

<h2>Descripción</h2>

<p>App que emula una extensión de la pagina para la USM por parte de los usuarios Artistas, pudiendo subir sus imagenes con su contenido (titulo, descripción, etc), pudiendo ver los comentarios que los estudiantes hagan a sus publicaciones y también pudiendo ver los likes de la publicación.

Como usuario Estudiante puedes ver todas las publicaciones de los artistas y comentarlas para dar tu opinión pudiendo darle like si esque te gustaron.

Como usuario normal solo podrás ver las publicaciones de los artistas y noticias. 

Finalmente como usuario administrador puedes gestionar (borrar, editar, ver y añadir) Artistas, administradores, estudiantes y poder eliminar publicaciones no deseadas o que incumplan las reglas.

Uso completo de todas las herramientas de laravel 10 => para iniciar sesión (Auth), seguridad (middleware, gates, etc), plantillas (blade), validadores (Request personalizados, rules, etc), relaciones en base de datos de ELOQUENT con usos de llenado de datos (migrations, seeders, faker, factory), uso a nivel PROFESIONAL.</p>

<h2>Requerimientos</h2>

<p>La app fue desarrollada con XAMPP (apache y mysql), pero laravel permite utilizar otros sistemas de bases de datos, solo debe de configurar su sistema en .env y la app funcionará correctamente.

La app puede proveer de datos de prueba para que pueda ver el funcionamento a fondo del sistema, usando el comando en la terminal => { php artisan migrate:fresh --seed }, podrá llenar su base de datos (las credenciales para las cuentas están en database/seeders/CuentasSeeder.php).</p>
