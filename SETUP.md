# FairIT Solutions — Complete Setup Guide

## Prerequisites

Before starting, install these on your server or local machine:

- **PHP 8.2+** — `brew install php` (Mac) or `apt install php8.2` (Ubuntu)
- **Composer** — https://getcomposer.org/download/
- **Node.js 18+** — https://nodejs.org/
- **MySQL 8.0+** — `brew install mysql` or `apt install mysql-server`
- **Git** — pre-installed on most systems

---

## Step 1: Project Setup

```bash
# Navigate to project directory
cd "/Users/nishantmhatre/FairITSolutions Website"

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

---

## Step 2: Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

Edit `.env` and set your values:

```env
APP_URL=https://fairitsolutions.ch         # Your actual domain
APP_ENV=production
APP_DEBUG=false

DB_HOST=127.0.0.1
DB_DATABASE=fairitsolutions                # Create this database first
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_email_username
MAIL_PASSWORD=your_email_password
MAIL_FROM_ADDRESS=hello@fairitsolutions.ch
ADMIN_NOTIFICATION_EMAIL=nishant.mhatre@gmail.com
```

---

## Step 3: Database Setup

```bash
# Create database in MySQL
mysql -u root -p -e "CREATE DATABASE fairitsolutions CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Run migrations
php artisan migrate

# Seed with sample data (admin user, sample posts, testimonials)
php artisan db:seed
```

**Default Admin Credentials (change immediately!):**
- Email: `admin@fairitsolutions.ch`
- Password: `change-this-password-immediately`

---

## Step 4: Build Frontend Assets

```bash
# Development (with hot reload)
npm run dev

# Production build (minified, optimised)
npm run build
```

---

## Step 5: Storage & Permissions

```bash
# Create storage symlink
php artisan storage:link

# Set permissions (Linux/Mac)
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache  # (Linux production)
```

---

## Step 6: Production Server (Nginx)

Create `/etc/nginx/sites-available/fairitsolutions.ch`:

```nginx
server {
    listen 80;
    server_name fairitsolutions.ch www.fairitsolutions.ch;
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl http2;
    server_name fairitsolutions.ch www.fairitsolutions.ch;
    root /var/www/fairitsolutions/public;
    index index.php;

    ssl_certificate     /etc/letsencrypt/live/fairitsolutions.ch/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/fairitsolutions.ch/privkey.pem;

    # Security headers
    add_header X-Frame-Options SAMEORIGIN;
    add_header X-Content-Type-Options nosniff;
    add_header X-XSS-Protection "1; mode=block";
    add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload";

    # Gzip
    gzip on;
    gzip_types text/plain text/css application/json application/javascript text/xml application/xml;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Cache static assets
    location ~* \.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

```bash
# Enable site
sudo ln -s /etc/nginx/sites-available/fairitsolutions.ch /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx

# SSL Certificate (Let's Encrypt)
sudo certbot --nginx -d fairitsolutions.ch -d www.fairitsolutions.ch
```

---

## Step 7: Optimise for Production

```bash
# Cache configuration, routes, views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimise autoloader
composer install --optimize-autoloader --no-dev
```

---

## Step 8: First Login & Admin Setup

1. Go to: `https://fairitsolutions.ch/x-admin-secure-2024/login`
2. Login with admin credentials
3. **IMMEDIATELY change your password** (update in database or add password change feature)
4. Add your testimonials
5. Create your first blog post
6. Check incoming leads via the Leads section

---

## Ongoing Maintenance

```bash
# Clear all caches when you update content or code
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Rebuild production assets after code changes
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## File Structure Overview

```
FairITSolutions Website/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # All page & admin controllers
│   │   └── Middleware/           # Security headers, admin auth
│   ├── Mail/                     # Lead notification emails
│   └── Models/                   # Lead, Post, Testimonial, User
├── bootstrap/                    # Laravel bootstrap
├── config/                       # App, DB, mail configuration
├── database/
│   ├── migrations/               # 4 database tables
│   └── seeders/                  # Sample data seeder
├── public/                       # Web root (point server here)
│   ├── .htaccess                 # Apache config + security
│   ├── robots.txt                # SEO robots file
│   └── index.php
├── resources/
│   ├── css/app.css               # Complete TailwindCSS styles
│   ├── js/app.js                 # Alpine.js + scroll animations
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php     # Main layout with navbar/footer
│       │   └── admin.blade.php   # Admin panel layout
│       ├── home.blade.php        # Homepage (8 sections)
│       ├── services/             # 6 service pages
│       ├── products/             # 4 product pages
│       ├── industries/           # Industries pages
│       ├── about.blade.php
│       ├── contact.blade.php
│       ├── consultation.blade.php
│       ├── blog/                 # Blog index + post views
│       ├── legal/                # Privacy, Terms, Cookies
│       ├── admin/                # Complete admin panel
│       ├── emails/               # Lead notification email
│       └── sitemap.blade.php     # XML sitemap
├── routes/web.php                # All routes
├── .env.example                  # Environment template
├── composer.json                 # PHP dependencies
├── package.json                  # Node dependencies
├── tailwind.config.js            # Design system configuration
└── vite.config.js                # Asset bundler configuration
```

---

## SEO Checklist

After going live, verify:
- [ ] Google Search Console — add property, submit sitemap.xml
- [ ] Google Analytics — add tracking code to `layouts/app.blade.php`
- [ ] Meta tags — check all pages with browser dev tools
- [ ] sitemap.xml — visit `https://fairitsolutions.ch/sitemap.xml`
- [ ] robots.txt — visit `https://fairitsolutions.ch/robots.txt`
- [ ] Core Web Vitals — test with PageSpeed Insights
- [ ] SSL certificate — verify HTTPS works

---

## Admin Panel

URL: `https://fairitsolutions.ch/x-admin-secure-2024/login`

Features:
- **Dashboard** — lead stats, recent activity, quick actions
- **Leads** — all contact form submissions with status management
- **Consultations** — consultation-specific view
- **Blog Posts** — create, edit, publish articles
- **Testimonials** — manage social proof display

---

## Support

For issues or enhancements, contact: nishant.mhatre@gmail.com
