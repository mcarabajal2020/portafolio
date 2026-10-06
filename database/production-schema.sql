-- CarabajalDev — tablas para producción (MySQL)
-- Ejecutar en phpMyAdmin sobre la DB u102473875_HvjY2
-- Compatible con Laravel 13 + Filament 5

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- users (por si no existe la versión actual)
CREATE TABLE IF NOT EXISTS `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` VARCHAR(255) NOT NULL,
  `value` MEDIUMTEXT NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` VARCHAR(255) NOT NULL,
  `owner` VARCHAR(255) NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` VARCHAR(255) NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `attempts` TINYINT UNSIGNED NOT NULL,
  `reserved_at` INT UNSIGNED NULL,
  `available_at` INT UNSIGNED NOT NULL,
  `created_at` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `total_jobs` INT NOT NULL,
  `pending_jobs` INT NOT NULL,
  `failed_jobs` INT NOT NULL,
  `failed_job_ids` LONGTEXT NOT NULL,
  `options` MEDIUMTEXT NULL,
  `cancelled_at` INT NULL,
  `created_at` INT NOT NULL,
  `finished_at` INT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` BIGINT UNSIGNED NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `content` LONGTEXT NOT NULL,
  `author` VARCHAR(255) NULL,
  `featured` VARCHAR(255) NULL,
  `is_published` TINYINT(1) NOT NULL DEFAULT 1,
  `visits` INT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- visits
CREATE TABLE IF NOT EXISTS `visits` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_name` VARCHAR(255) NOT NULL,
  `count` INT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

-- Datos de ejemplo (opcional — podés omitir este bloque)
INSERT IGNORE INTO `categories` (`name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
('Desarrollo Web', 'desarrollo-web', 'Artículos sobre desarrollo de sitios y aplicaciones web.', NOW(), NOW()),
('Herramientas', 'herramientas', 'Reviews y guías de herramientas de productividad.', NOW(), NOW()),
('Tips', 'tips', 'Consejos prácticos para programadores.', NOW(), NOW());

INSERT IGNORE INTO `posts` (`category_id`, `title`, `slug`, `content`, `author`, `featured`, `is_published`, `visits`, `created_at`, `updated_at`)
SELECT c.id, 'Cómo modernizar tu sitio con Laravel y Filament', 'modernizar-sitio-laravel-filament',
       '<p>Laravel 13 y Filament 5 permiten construir paneles administrativos potentes en tiempo récord.</p>',
       'CarabajalDev', 'images/featureds/1681440972-notion.png', 1, 42, NOW(), NOW()
FROM categories c WHERE c.slug = 'desarrollo-web'
AND NOT EXISTS (SELECT 1 FROM posts p WHERE p.slug = 'modernizar-sitio-laravel-filament');

INSERT IGNORE INTO `posts` (`category_id`, `title`, `slug`, `content`, `author`, `featured`, `is_published`, `visits`, `created_at`, `updated_at`)
SELECT c.id, 'Notion para programadores: organización real', 'notion-programadores',
       '<p>Notion se ha convertido en una de las herramientas más populares para organizar proyectos de software.</p>',
       'CarabajalDev', 'images/featureds/1680651956-que-es-notion.jpeg', 1, 28, NOW(), NOW()
FROM categories c WHERE c.slug = 'herramientas'
AND NOT EXISTS (SELECT 1 FROM posts p WHERE p.slug = 'notion-programadores');

INSERT IGNORE INTO `posts` (`category_id`, `title`, `slug`, `content`, `author`, `featured`, `is_published`, `visits`, `created_at`, `updated_at`)
SELECT c.id, 'Todoist: productividad sin fricción', 'todoist-productividad',
       '<p>Gestionar tareas no debería ser complicado. Todoist combina simplicidad con potencia.</p>',
       'CarabajalDev', 'images/featureds/1681598406-todoist.png', 1, 19, NOW(), NOW()
FROM categories c WHERE c.slug = 'herramientas'
AND NOT EXISTS (SELECT 1 FROM posts p WHERE p.slug = 'todoist-productividad');

INSERT IGNORE INTO `posts` (`category_id`, `title`, `slug`, `content`, `author`, `featured`, `is_published`, `visits`, `created_at`, `updated_at`)
SELECT c.id, 'WhatsApp Business para freelancers', 'whatsapp-business-freelancers',
       '<p>Comunicarte rápido con clientes marca la diferencia.</p>',
       'CarabajalDev', 'images/featureds/1677933107-WhatsApp Image 2023-02-28 at 9.44.00 AM.jpeg', 1, 15, NOW(), NOW()
FROM categories c WHERE c.slug = 'tips'
AND NOT EXISTS (SELECT 1 FROM posts p WHERE p.slug = 'whatsapp-business-freelancers');

-- Usuario admin (email: admin@carabajaldev.com.ar / password: password)
-- Cambialo después desde /admin o con un hash nuevo
INSERT IGNORE INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`)
VALUES (
  'Admin CarabajalDev',
  'admin@carabajaldev.com.ar',
  '$2y$12$r/efAMG8ap8wNIPd86XGLeLSJoQxSnQp3kwy8MOdhCgqb9DPdHEja',
  NOW(),
  NOW()
);
