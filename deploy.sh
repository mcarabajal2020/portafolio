#!/usr/bin/env bash
#
# Deploy en Hostinger (SSH, sin npm).
#
# En LOCAL:
#   npm run build
#   git add -A && git commit && git push
#
# EN EL SERVIDOR (desde la raíz del proyecto):
#   ./deploy.sh              deploy normal
#   ./deploy.sh --migrate    además corre php artisan migrate --force
#
set -euo pipefail
cd "$(dirname "$0")"

echo "==> git pull"
git clean -fdx -- public/build 2>/dev/null || true
git pull --ff-only

if [ ! -f vendor/autoload.php ] || [ composer.lock -nt vendor/autoload.php ]; then
    echo "==> composer install"
    if ! command -v composer >/dev/null 2>&1; then
        echo "ERROR: no encontré el comando 'composer' en el servidor." >&2
        exit 1
    fi
    composer install --no-dev --optimize-autoloader --no-interaction
fi

echo "==> limpiar cachés (config, rutas, eventos, vistas)"
php artisan optimize:clear

echo "==> cachear config, rutas y eventos"
php artisan config:cache
php artisan route:cache
php artisan event:cache

echo "==> storage: directorios + symlink"
php fix-storage.php

if [ "${1:-}" = "--migrate" ]; then
    echo "==> migrate"
    php artisan migrate --force
fi

echo
echo "Deploy listo."
echo "Si la página se ve vieja: recarga dura (Cmd/Ctrl+Shift+R) o vaciá la caché de LiteSpeed en hPanel."
