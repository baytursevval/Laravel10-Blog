Laravel 10 kullanılarak hazırlanmış blog yazma sitesi.
Database için MySQL kullanılmış olup, xml şeklinde projeye eklenmiştir. (blog1.xml)

Installation:
> Clone the Repo:
> git clone https://github.com/baytursevval/Laravel10-Blog.git
> cd hospitalMS
> composer install or composer update
> cp .env.example .env
> Set up .env file
> php artisan key:generate
> php artisan storage:link
> php artisan migrate:fresh --seed
> php artisan serve
http://127.0.0.1:8000/
