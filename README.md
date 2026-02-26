# Laravel Blog (Docker olmadan kurulum)

Bu proje, basit bir blog uygulaması üzerinden Laravel geliştirme pratiklerini örnekler.

## Gereksinimler
- PHP 8.2+ (Windows için XAMPP / Laragon kullanılabilir)
- Composer
- MySQL (veya MariaDB)
- (Opsiyonel) Node.js + NPM (asset build için)

## Lokal kurulum (MySQL ile)

1) Bağımlılıkları yükle:
```bash
composer install
```

2) Ortam dosyasını oluştur:
```bash
cp .env.local .env
```

3) `.env` içinde veritabanını kendi ortamına göre ayarla:
- `DB_DATABASE` : oluşturacağın veritabanı adı
- `DB_USERNAME` / `DB_PASSWORD` : MySQL kullanıcı bilgileri
- `DB_HOST` : genelde `127.0.0.1`
- `DB_PORT` : genelde `3306`

> Örnek (XAMPP varsayılanı): kullanıcı `root`, şifre boş olabilir.

4) Uygulama anahtarını üret:
```bash
php artisan key:generate
```

5) Veritabanını migrate + seed et:
```bash
php artisan migrate:fresh --seed
```

6) Çalıştır:
```bash
php artisan serve --port=8000
```

Tarayıcıdan: http://127.0.0.1:8000

## Frontend asset (opsiyonel)
Eğer projede Vite/NPM asset’leri kullanacaksan:
```bash
npm install
npm run dev
```

## Notlar
- Bu zip paketinde Docker ile ilgili dosyalar kaldırılmıştır (Dockerfile / docker-compose).
- Mail ayarları varsayılan olarak localhost’a işaret eder; kendi SMTP’ne göre `.env` güncelleyebilirsin.
