# Forza Motor (UTS Pemrograman Web, Laravel + Blade)

## Cara pakai
1. Buat proyek baru: `composer create-project laravel/laravel forza-motor`
2. Salin ke proyek tersebut (timpa jika diminta): `routes/`, `app/`, `resources/`, `public/images/`
3. Jalankan `php artisan serve`, lalu buka http://127.0.0.1:8000

## Alur data
Form login (GET) -> `/dashboard?username=...` -> PageController -> view.
Link navbar membawa `?username=` ke Dashboard, Pengelolaan, dan Profile.
