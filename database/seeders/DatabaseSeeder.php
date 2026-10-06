<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin CarabajalDev',
            'email' => 'admin@carabajaldev.com.ar',
        ]);

        $dev = Category::create([
            'name' => 'Desarrollo Web',
            'slug' => 'desarrollo-web',
            'description' => 'Artículos sobre desarrollo de sitios y aplicaciones web.',
        ]);

        $tools = Category::create([
            'name' => 'Herramientas',
            'slug' => 'herramientas',
            'description' => 'Reviews y guías de herramientas de productividad.',
        ]);

        $tips = Category::create([
            'name' => 'Tips',
            'slug' => 'tips',
            'description' => 'Consejos prácticos para programadores.',
        ]);

        Post::create([
            'category_id' => $dev->id,
            'title' => 'Cómo modernizar tu sitio con Laravel y Filament',
            'slug' => 'modernizar-sitio-laravel-filament',
            'content' => '<p>Laravel 13 y Filament 5 permiten construir paneles administrativos potentes en tiempo récord.</p><p>En este artículo repasamos la arquitectura recomendada, el theming con Tailwind 4 y las mejores prácticas de rendimiento.</p>',
            'author' => 'CarabajalDev',
            'featured' => 'images/featureds/1681440972-notion.png',
            'is_published' => true,
            'visits' => 42,
        ]);

        Post::create([
            'category_id' => $tools->id,
            'title' => 'Notion para programadores: organización real',
            'slug' => 'notion-programadores',
            'content' => '<p>Notion se ha convertido en una de las herramientas más populares para organizar proyectos de software.</p><p>Aquí te mostramos plantillas y flujos de trabajo útiles para el día a día.</p>',
            'author' => 'CarabajalDev',
            'featured' => 'images/featureds/1680651956-que-es-notion.jpeg',
            'is_published' => true,
            'visits' => 28,
        ]);

        Post::create([
            'category_id' => $tools->id,
            'title' => 'Todoist: productividad sin fricción',
            'slug' => 'todoist-productividad',
            'content' => '<p>Gestionar tareas no debería ser complicado. Todoist combina simplicidad con potencia.</p><p>Configuramos un sistema de GTD adaptado a desarrolladores.</p>',
            'author' => 'CarabajalDev',
            'featured' => 'images/featureds/1681598406-todoist.png',
            'is_published' => true,
            'visits' => 19,
        ]);

        Post::create([
            'category_id' => $tips->id,
            'title' => 'WhatsApp Business para freelancers',
            'slug' => 'whatsapp-business-freelancers',
            'content' => '<p>Comunicarte rápido con clientes marca la diferencia. Aprovechá WhatsApp Business al máximo.</p>',
            'author' => 'CarabajalDev',
            'featured' => 'images/featureds/1677933107-WhatsApp Image 2023-02-28 at 9.44.00 AM.jpeg',
            'is_published' => true,
            'visits' => 15,
        ]);
    }
}
