<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        $categories = [
            'Desarrollo Web' => [
                'slug' => 'desarrollo-web',
                'description' => 'Artículos sobre desarrollo de sitios y aplicaciones web.',
            ],
            'Herramientas' => [
                'slug' => 'herramientas',
                'description' => 'Reviews y guías de herramientas de productividad.',
            ],
            'Tips' => [
                'slug' => 'tips',
                'description' => 'Consejos prácticos para programadores.',
            ],
        ];

        foreach ($categories as $name => $data) {
            DB::table('categories')->updateOrInsert(
                ['slug' => $data['slug']],
                [
                    'name' => $name,
                    'description' => $data['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $categoryId = function (string $slug): int {
            return (int) DB::table('categories')->where('slug', $slug)->value('id');
        };

        $posts = [
            [
                'category' => 'desarrollo-web',
                'title' => '¿Cuánto cuesta tener una página web en 2026? Guía de precios y opciones',
                'content' => '<p>Una de las primeras preguntas de cualquier proyecto digital es el costo. En 2026 el mercado sigue dividido entre opciones económicas, sitios a medida y productos intermedios para pymes y cooperativas.</p>
<h2>Qué influye en el precio</h2>
<ul>
<li>Dominio y hosting de calidad</li>
<li>Diseño responsive y experiencia de usuario</li>
<li>Cantidad de páginas y funcionalidades</li>
<li>Integraciones (pagos, CRM, formularios, analytics)</li>
<li>Mantenimiento posterior</li>
</ul>
<h2>Opciones habituales</h2>
<p>Una landing page simple puede resolverse con poca inversión. Un sitio institucional con blog y formulario de contacto requiere más diseño y contenido. Un ecommerce o un desarrollo a medida tiene un alcance distinto: catálogo, usuarios, stock, facturación y soporte.</p>
<p>La clave no es solo el precio de entrada, sino qué incluye el servicio: quién es dueño del dominio, si hay copias de seguridad, si el sitio es mobile-first y si queda documentado para que otra persona pueda continuar el trabajo.</p>
<p>Si estás evaluando un proyecto, pedí un presupuesto por alcance y no solo por "número de páginas". Un sitio claro, rápido y mantenible suele costar menos a largo plazo que uno barato que hay que rehacer en un año.</p>',
                'featured' => 'images/featureds/1677938504-2.png',
                'visits' => 86,
                'date' => '2026-04-24 10:00:00',
            ],
            [
                'category' => 'desarrollo-web',
                'title' => 'Diferencias entre web institucional, landing page, ecommerce y desarrollos personalizados',
                'content' => '<p>No todas las páginas web sirven para lo mismo. Elegir el tipo de sitio incorrecto es uno de los errores más caros al inicio de un proyecto.</p>
<h2>Web institucional</h2>
<p>Presenta a la empresa, sus servicios, historia y forma de contacto. Ideal para cooperativas, profesionales y negocios que necesitan credibilidad online.</p>
<h2>Landing page</h2>
<p>Una sola página enfocada en una acción: pedir presupuesto, descargar algo o inscribirse a un evento. Se usa mucho en campañas y lanzamientos.</p>
<h2>Ecommerce</h2>
<p>Venta online con carrito, medios de pago, stock y gestión de pedidos. Requiere más mantenimiento y atención al detalle operativo.</p>
<h2>Desarrollo a medida</h2>
<p>Cuando el proceso del negocio no entra en un template: portales de socios, tableros internos, flujos personalizados, integraciones con sistemas existentes.</p>
<p>La pregunta útil no es "¿cuál es la más cara?", sino "¿cuál resuelve mejor el problema real?". Muchas veces una institucional bien hecha alcanza; otras, necesitás un sistema que trabaje con tu operación diaria.</p>',
                'featured' => 'images/featureds/1677937786-1.png',
                'visits' => 64,
                'date' => '2026-05-09 10:00:00',
            ],
            [
                'category' => 'herramientas',
                'title' => 'WordPress en 2026: ¿sigue siendo una buena opción para crear una página web?',
                'content' => '<p>WordPress sigue siendo una de las plataformas más usadas del mundo. Pero en 2026 la pregunta ya no es si "sirve", sino para qué tipo de proyecto conviene realmente.</p>
<h2>Ventajas</h2>
<ul>
<li>Madurez del ecosistema de plugins y temas</li>
<li>Amplia comunidad y documentación</li>
<li>Buen equilibrio entre costo y flexibilidad</li>
<li>Fácil de editar por equipos no técnicos</li>
</ul>
<h2>Limitaciones</h2>
<p>Un sitio mal configurado se vuelve lento y difícil de mantener. Demasiados plugins, temas pesados y hosting barato suelen ser la combinación que más problemas genera.</p>
<h2>Seguridad y rendimiento</h2>
<p>Actualizar core, plugins y tema; limitar usuarios con permisos de administrador; usar caché y hosting con PHP actualizado son obligatorios, no opcionales.</p>
<h2>Cuándo conviene</h2>
<p>Para sitios de contenido, institucionales y proyectos donde el cliente quiere autogestionar textos e imágenes, WordPress sigue siendo una opción sólida. Si necesitás un producto SaaS o un panel complejo a medida, Laravel o un stack propio puede ser más limpio.</p>',
                'featured' => 'images/featureds/1680651956-que-es-notion.jpeg',
                'visits' => 112,
                'date' => '2026-05-24 10:00:00',
            ],
            [
                'category' => 'tips',
                'title' => '10 errores que pueden hacer que tu página web sea lenta',
                'content' => '<p>La velocidad no es solo una métrica de SEO: afecta la experiencia, la conversión y la percepción de confianza. Estos son los problemas que más veo en sitios reales.</p>
<ol>
<li>Imágenes pesadas sin optimizar ni comprimir</li>
<li>Hosting compartido de bajo rendimiento</li>
<li>Demasiados plugins o scripts de terceros</li>
<li>JavaScript bloqueando el render inicial</li>
<li>CSS gigantes sin purge de estilos no usados</li>
<li>Falta de caché en servidor o CDN</li>
<li>Fuente web con demasiados pesos</li>
<li>Animaciones pesadas en el above the fold</li>
<li>Redirecciones encadenadas</li>
<li>No medir con PageSpeed o Lighthouse</li>
</ol>
<p>Empezá por las imágenes y el hosting: suelen explicar la mayor parte del problema. Después revisá qué se carga antes de que el usuario vea contenido útil.</p>',
                'featured' => 'images/featureds/1681440972-notion.png',
                'visits' => 143,
                'date' => '2026-06-08 10:00:00',
            ],
            [
                'category' => 'herramientas',
                'title' => 'Cómo proteger una página web de WordPress contra ataques y malware',
                'content' => '<p>La mayoría de los incidentes no son ataques sofisticados: son descuidos acumulados. Con una rutina básica se reduce bastante el riesgo.</p>
<h2>Actualizaciones</h2>
<p>Mantené WordPress, plugins y tema al día. Los bugs corregidos suelen incluir fallos de seguridad conocidos.</p>
<h2>Copias de seguridad</h2>
<p>Backups automáticos en un lugar distinto al hosting del sitio. Probá restaurar de vez en cuando: un backup que nunca se restauró no es un backup.</p>
<h2>Usuarios y accesos</h2>
<ul>
<li>Un solo administrador real</li>
<li>Contraseñas largas y únicas</li>
<li>Autenticación en dos pasos donde sea posible</li>
<li>Renombrar URLs de login si el tráfico lo justifica</li>
</ul>
<h2>Plugins y tema</h2>
<p>Instalá solo lo necesario. Un plugin abandonado o con permisos amplios es un riesgo real. Preferí opciones con actualizaciones frecuentes y buenas reseñas.</p>
<h2>Monitoreo</h2>
<p>Alertas de caída, revisión de logs y un WAF o protección básica contra fuerza bruta ayudan a detectar problemas antes de que el cliente los note.</p>',
                'featured' => 'images/featureds/1677936414-3.png',
                'visits' => 97,
                'date' => '2026-06-23 10:00:00',
            ],
            [
                'category' => 'desarrollo-web',
                'title' => '¿Página web o redes sociales? Por qué tu negocio necesita tener su propio sitio',
                'content' => '<p>Instagram, Facebook y TikTok son canales útiles. Pero no son un reemplazo de un sitio propio. La diferencia aparece cuando algo cambia.</p>
<h2>Qué controlás con tu web</h2>
<ul>
<li>Diseño, contenido y estructura</li>
<li>SEO y visibilidad en buscadores</li>
<li>Propiedad del dominio y de los datos</li>
<li>Integraciones con ventas, formularios y CRM</li>
</ul>
<h2>Qué no controlás en redes</h2>
<p>Algoritmo, alcance, políticas de la plataforma y la cuenta misma. Un cambio de reglas puede reducir tu visibilidad de un día para el otro.</p>
<h2>La combinación inteligente</h2>
<p>Las redes sirven para atraer y conversar. El sitio concentra la información seria: servicios, precios, casos, preguntas frecuentes y contacto. Cuando alguien busca tu marca, necesita encontrar un lugar propio que lo confirme.</p>
<p>Para cooperativas y pymes, la web también aporta credibilidad institucional que una red social no termina de construir.</p>',
                'featured' => 'images/featureds/1677936242-3.png',
                'visits' => 78,
                'date' => '2026-07-08 10:00:00',
            ],
            [
                'category' => 'herramientas',
                'title' => 'Inteligencia artificial para desarrolladores web: herramientas que realmente vale la pena utilizar',
                'content' => '<p>La IA ya no es una promesa futura: es parte del flujo de trabajo diario. La diferencia está en usarla donde suma de verdad, no donde solo genera ruido.</p>
<h2>Programación</h2>
<p>Asistentes de código aceleran tareas repetitivas, explican errores y ayudan a escribir tests. Sirven mucho para boilerplate, refactors acotados y documentación inicial.</p>
<h2>Contenido y SEO</h2>
<p>Útil para bocetos, ideas de títulos y primeras versiones de copy. Siempre con revisión humana: el tono de tu marca no se delega por completo.</p>
<h2>Debugging y documentación</h2>
<p>Pegar un stack trace o una query rara y pedir hipótesis ahorra tiempo real. Lo mismo para generar documentación de APIs o README a partir del código.</p>
<h2>Automatización</h2>
<p>Clasificar tickets, resumir reuniones o preparar respuestas iniciales de soporte son casos concretos donde la IA mejora la productividad sin reemplazar criterio.</p>
<p>Mi recomendación: empezá por un caso acotado de tu trabajo diario, medí el tiempo ahorrado y expandí desde ahí. La IA potencia; no reemplaza el criterio técnico.</p>',
                'featured' => 'images/featureds/1681776742-todoist.png',
                'visits' => 156,
                'date' => '2026-07-23 10:00:00',
            ],
            [
                'category' => 'desarrollo-web',
                'title' => 'Qué tener en cuenta antes de contratar un desarrollador web',
                'content' => '<p>Contratar mal cuesta más caro que contratar un poco más caro. Antes de firmar, revisá estos puntos.</p>
<h2>Dominio y hosting</h2>
<p>Que queden a nombre del cliente, no del proveedor. Accesos y facturas claras desde el día uno.</p>
<h2>Alcance y mantenimiento</h2>
<p>Qué incluye el proyecto y qué no. Si hay mantenimiento mensual, qué cubre: actualizaciones, backups, soporte, pequeños cambios.</p>
<h2>Diseño y responsive</h2>
<p>El sitio tiene que funcionar bien en celular, no solo en la computadora del estudio. Pedí ver ejemplos en dispositivos reales.</p>
<h2>SEO técnico básico</h2>
<p>Estructura de URLs, títulos, meta descriptions, sitemap, velocidad y Analytics. Sin esto, un sitio lindo puede quedar invisible.</p>
<h2>Propiedad del sitio</h2>
<p>Código, diseño, accesos y contenidos deben quedar del lado del cliente. Es lo que te permite moverte después si hace falta.</p>
<h2>Soporte y comunicación</h2>
<p>Tiempos de respuesta, forma de coordinar y quién responde cuando algo se rompe. La tecnología falla; lo importante es cómo se maneja.</p>
<p>Un buen desarrollador no solo entrega archivos: deja el proyecto ordenado para que pueda crecer.</p>',
                'featured' => 'images/featureds/1677934248-Juan.png',
                'visits' => 121,
                'date' => '2026-08-07 10:00:00',
            ],
            [
                'category' => 'tips',
                'title' => 'Diseño responsive: por qué tu página debe funcionar perfectamente en celulares',
                'content' => '<p>La mayoría de las visitas llegan desde un teléfono. Si tu sitio se ve mal en mobile, estás perdiendo clientes antes de que lean tu propuesta.</p>
<h2>Mobile-first no es una opción</h2>
<p>Diseñar primero para pantallas chicas obliga a priorizar contenido, jerarquía y velocidad. Después es más fácil escalar a tablet y desktop.</p>
<h2>Resoluciones reales</h2>
<p>No alcanza con "que se vea en el celular del diseñador". Hay que probar en distintos anchos, navegadores y conexiones.</p>
<h2>Velocidad en mobile</h2>
<ul>
<li>Imágenes responsivas y comprimidas</li>
<li>Poco JavaScript inicial</li>
<li>Fuentes optimizadas</li>
<li>Elementos táctiles cómodos</li>
</ul>
<h2>Experiencia de usuario</h2>
<p>Menús claros, botones grandes, formularios simples y textos legibles. Si un usuario tiene que hacer zoom para leer el precio, el diseño falló.</p>
<p>El responsive no es un detalle visual: es la experiencia principal de casi todos tus visitantes.</p>',
                'featured' => 'images/featureds/1681442703-Captura de Pantalla 2022-12-28 a la(s) 15.01.38.png',
                'visits' => 104,
                'date' => '2026-08-22 10:00:00',
            ],
            [
                'category' => 'tips',
                'title' => 'SEO básico para una página web: 10 cosas que deberías revisar',
                'content' => '<p>El SEO no es magia: es orden técnico y contenido útil. Estos son los puntos que conviene revisar en cualquier sitio nuevo o renovado.</p>
<ol>
<li>Títulos únicos y descriptivos por página</li>
<li>URLs limpias y legibles</li>
<li>Meta descriptions que inviten al clic</li>
<li>Velocidad de carga en móvil y desktop</li>
<li>Contenido que responda preguntas reales</li>
<li>Imágenes con alt text y peso adecuado</li>
<li>Enlaces internos que ayuden a navegar</li>
<li>Sitemap XML y robots.txt correctos</li>
<li>Google Search Console configurado</li>
<li>HTTPS y errores 404 bajo control</li>
</ol>
<p>Ninguno de estos puntos por separado te posiciona. Juntos forman una base sólida para que Google entienda tu sitio y el usuario encuentre lo que busca.</p>
<p>Si recién empezás, priorizá velocidad, títulos y contenido útil. El resto se va puliendo con el tiempo.</p>',
                'featured' => 'images/featureds/1681773924-todoist.png',
                'visits' => 168,
                'date' => '2026-09-06 10:00:00',
            ],
            [
                'category' => 'desarrollo-web',
                'title' => '¿Necesitás mantenimiento para tu página web? Qué incluye realmente un servicio de mantenimiento',
                'content' => '<p>Un sitio web no termina cuando se publica. Como cualquier herramienta de trabajo, necesita cuidado para seguir rápido, seguro y confiable.</p>
<h2>Qué suele incluir un mantenimiento bueno</h2>
<ul>
<li>Actualizaciones de core, plugins y dependencias</li>
<li>Copias de seguridad automáticas y verificación</li>
<li>Monitoreo de caídas y errores</li>
<li>Optimización de rendimiento periódica</li>
<li>Correcciones de bugs menores</li>
<li>Soporte para dudas y pequeños cambios</li>
</ul>
<h2>Qué no debería quedar afuera</h2>
<p>La seguridad básica, los backups probados y el control de accesos. Un mantenimiento que solo "deja el sitio online" no está cubriendo el riesgo real.</p>
<h2>Cuándo conviene contratarlo</h2>
<p>Si el sitio representa tu marca, genera consultas o maneja datos de clientes, el mantenimiento deja de ser un gasto extra y pasa a ser parte de la operación.</p>
<p>Trabajo con cooperativas y pymes que necesitan claridad: un plan mensual con alcance definido, reportes simples y una persona responsable evita sorpresas. Si querés, puedo ayudarte a definir qué necesita tu sitio realmente.</p>',
                'featured' => 'images/featureds/1681598406-todoist.png',
                'visits' => 91,
                'date' => '2026-09-21 10:00:00',
            ],
        ];

        foreach ($posts as $post) {
            $slug = Str::slug($post['title']);
            $exists = DB::table('posts')->where('slug', $slug)->exists();

            if ($exists) {
                continue;
            }

            DB::table('posts')->insert([
                'category_id' => $categoryId($post['category']),
                'title' => $post['title'],
                'slug' => $slug,
                'content' => $post['content'],
                'author' => 'CarabajalDev',
                'featured' => $post['featured'],
                'is_published' => true,
                'visits' => $post['visits'],
                'created_at' => $post['date'],
                'updated_at' => $post['date'],
            ]);
        }
    }

    public function down(): void
    {
        $slugs = [
            'cuanto-cuesta-tener-una-pagina-web-en-2026-guia-de-precios-y-opciones',
            'diferencias-entre-web-institucional-landing-page-ecommerce-y-desarrollos-personalizados',
            'wordpress-en-2026-sigue-siendo-una-buena-opcion-para-crear-una-pagina-web',
            '10-errores-que-pueden-hacer-que-tu-pagina-web-sea-lenta',
            'como-proteger-una-pagina-web-de-wordpress-contra-ataques-y-malware',
            'pagina-web-o-redes-sociales-por-que-tu-necesita-tener-su-propio-sitio',
            'inteligencia-artificial-para-desarrolladores-web-herramientas-que-realmente-vale-la-pena-utilizar',
            'que-tener-en-cuenta-antes-de-contratar-un-desarrollador-web',
            'diseno-responsive-por-que-tu-pagina-debe-funcionar-perfectamente-en-celulares',
            'seo-basico-para-una-pagina-web-10-cosas-que-deberias-revisar',
            'necesitas-mantenimiento-para-tu-pagina-web-que-incluye-realmente-un-servicio-de-mantenimiento',
        ];

        DB::table('posts')->whereIn('slug', $slugs)->delete();
    }
};
