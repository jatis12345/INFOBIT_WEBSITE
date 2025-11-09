# PT INFOBIT CIPTA MANDIRI - Website

Website resmi PT INFOBIT CIPTA MANDIRI - Your Trusted IT Solutions Partner

## 📋 Deskripsi

Website ini adalah landing page profesional untuk PT INFOBIT CIPTA MANDIRI, reseller IT solutions yang menyediakan produk Microsoft, Lenovo, HP, Dell, APC, dan Fortinet.

### Fitur Utama:
- ✅ Design modern dengan animasi smooth scroll
- ✅ Responsive mobile-friendly
- ✅ Contact form dengan reCAPTCHA
- ✅ Section: Hero, Partners, Products, About, Testimonials, Contact
- ✅ Animasi fade-in saat scroll
- ✅ Counter animation untuk statistik
- ✅ Back to top button
- ✅ Loading animation
- ✅ SEO optimized

## 📁 Struktur File

```
infobit-website/
│
├── index.html          # Homepage utama
├── style.css           # Styling lengkap
├── script.js           # JavaScript untuk interaktivitas
├── send_email.php      # PHP handler untuk contact form
└── README.md           # Dokumentasi (file ini)
```

## 🚀 Cara Install di WordPress

### Metode 1: Upload Manual (Paling Mudah)

1. **Copy semua file** ke dalam folder tema WordPress Anda:
   ```
   wp-content/themes/radiant-child/
   ```

2. **Buat page baru** di WordPress:
   - Pergi ke: Pages → Add New
   - Judul: "Home"
   - Template: Full Width (atau blank template)

3. **Copy HTML content**:
   - Buka `index.html`
   - Copy isi dari `<body>` sampai `</body>`
   - Paste ke WordPress page editor (mode HTML/Code)

4. **Enqueue CSS & JS** di `functions.php`:
   ```php
   function infobit_enqueue_assets() {
       wp_enqueue_style('infobit-style', get_stylesheet_directory_uri() . '/style.css');
       wp_enqueue_script('infobit-script', get_stylesheet_directory_uri() . '/script.js', array(), '1.0', true);
   }
   add_action('wp_enqueue_scripts', 'infobit_enqueue_assets');
   ```

5. **Set sebagai homepage**:
   - Settings → Reading
   - A static page → Homepage: Home

### Metode 2: Convert ke HTML Theme

1. **Buat folder baru** di `wp-content/themes/infobit/`

2. **Buat `style.css`** (WordPress theme header):
   ```css
   /*
   Theme Name: PT Infobit
   Description: Website untuk PT INFOBIT CIPTA MANDIRI
   Version: 1.0
   Author: Your Name
   */
   @import url('style.css');
   ```

3. **Rename `index.html`** menjadi **`front-page.php`**

4. **Activate theme** di WordPress:
   - Appearance → Themes → Activate "PT Infobit"

### Metode 3: Pakai Elementor (Recommended!)

1. **Install Elementor** plugin

2. **Buat page baru** dengan Elementor

3. **Import HTML**:
   - Use Elementor's HTML widget
   - Atau convert section by section

4. **Atau copy file**:
   - Copy `style.css` content ke Elementor Custom CSS
   - Copy `script.js` content ke Elementor Custom JavaScript

## 🔧 Setup Contact Form

### 1. Setup Google reCAPTCHA

1. **Daftar di Google reCAPTCHA**:
   - Pergi ke: https://www.google.com/recaptcha/admin
   - Pilih reCAPTCHA v2 (Checkbox)
   - Domain: infobit.co.id (atau domain Anda)

2. **Dapatkan keys**:
   - Site Key: untuk HTML (client-side)
   - Secret Key: untuk PHP (server-side)

3. **Update Site Key** di `index.html`:
   ```html
   <div class="g-recaptcha" data-sitekey="PASTE_YOUR_SITE_KEY_HERE"></div>
   ```

4. **Update Secret Key** di `send_email.php`:
   ```php
   $recaptcha_secret = 'PASTE_YOUR_SECRET_KEY_HERE';
   ```

### 2. Setup PHP Mail

**Opsi A: Pakai PHP mail() function (default)**
- Sudah siap pakai jika hosting support PHP mail
- Pastikan SMTP terkonfi

gurasi di server

**Opsi B: Pakai PHPMailer (lebih reliable)**

1. Install PHPMailer:
   ```bash
   composer require phpmailer/phpmailer
   ```

2. Update `send_email.php` dengan PHPMailer code

**Opsi C: Pakai WordPress wp_mail()**
- Convert `send_email.php` untuk pakai `wp_mail()` function

### 3. Test Email

1. **Cek email masuk** di johan.effendy@infobit.co.id
2. **Cek spam folder** jika tidak masuk
3. **Setup SPF/DKIM** untuk prevent spam

## 🎨 Customization

### Ganti Warna Tema

Edit di `style.css`, bagian `:root`:

```css
:root {
    --primary-color: #7C3AED;  /* Purple */
    --primary-dark: #6D28D9;
    --primary-light: #A855F7;
    /* Ganti dengan warna Anda */
}
```

### Ganti Logo

1. **Buat logo image** (format PNG/SVG, transparent background)
2. **Replace logo text** di HTML:
   ```html
   <a href="#" class="logo">
       <img src="path/to/logo.png" alt="Infobit" height="40">
   </a>
   ```

### Ganti Content

Edit file `index.html`:
- **Hero text**: Section `.hero-content`
- **Products**: Section `.products-grid`
- **About**: Section `.about-content`
- **Testimonials**: Section `.testimonials-grid`
- **Contact**: Section `.contact-info`

### Tambah/Hapus Section

1. **Copy section** yang mau diduplikasi
2. **Edit content** sesuai kebutuhan
3. **Update navigation** di menu

## 📱 Responsive Breakpoints

- **Desktop**: > 1024px
- **Tablet**: 768px - 1024px
- **Mobile**: < 768px
- **Small Mobile**: < 480px

## ⚡ Performance Optimization

### 1. Compress Images

```bash
# Pakai TinyPNG atau ImageOptim
# Atau online: https://tinypng.com
```

### 2. Minify CSS & JS

```bash
# Pakai online tool atau:
npm install -g clean-css-cli uglify-js

cleancss -o style.min.css style.css
uglifyjs script.js -o script.min.js -c -m
```

### 3. Enable Caching

Add di `.htaccess`:
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
</IfModule>
```

## 🐛 Troubleshooting

### Contact Form Tidak Kirim Email

**Problem**: Email tidak masuk

**Solusi**:
1. Cek spam folder
2. Cek PHP mail configuration: `php -i | grep mail`
3. Test dengan script sederhana:
   ```php
   <?php
   $result = mail('test@example.com', 'Test', 'Test message');
   echo $result ? 'Email sent!' : 'Email failed!';
   ?>
   ```
4. Pakai PHPMailer atau SMTP plugin

### reCAPTCHA Tidak Muncul

**Problem**: Kotak reCAPTCHA kosong

**Solusi**:
1. Cek site key sudah benar
2. Cek domain sudah terdaftar di Google reCAPTCHA
3. Cek console browser untuk error
4. Pastikan internet connect

ion OK

### Animasi Tidak Jalan

**Problem**: Fade-in animation tidak muncul

**Solusi**:
1. Cek JavaScript tidak error (buka console browser)
2. Pastikan `script.js` ter-load dengan benar
3. Cek IntersectionObserver support (browser lawas tidak support)

### Mobile Menu Tidak Buka

**Problem**: Hamburger menu tidak responsive

**Solusi**:
1. Cek CSS `@media` queries ter-load
2. Cek JavaScript hamburger event listener
3. Clear browser cache

## 📊 Browser Support

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ⚠️ IE 11 (partial support, perlu polyfills)

## 🔐 Security

### Best Practices

1. **Sanitize input**: Sudah implemented di `send_email.php`
2. **Validate email**: Pakai `filter_var()`
3. **Use reCAPTCHA**: Prevent spam/bots
4. **Rate limiting**: Limit form submissions per IP
5. **HTTPS**: Wajib pakai SSL certificate

### Update `.htaccess`

```apache
# Prevent direct access to PHP files
<FilesMatch "send_email\.php">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# Except AJAX requests
<If "%{HTTP:X-Requested-With} == 'XMLHttpRequest'">
    Allow from all
</If>
```

## 📝 TODO / Future Enhancements

- [ ] Add blog section
- [ ] Add portfolio/case studies
- [ ] Integrate with CRM (HubSpot/Salesforce)
- [ ] Add live chat (WhatsApp Business API)
- [ ] Add product catalog with pricing
- [ ] Multi-language support (EN/ID)
- [ ] Dark mode toggle
- [ ] Analytics integration (Google Analytics)
- [ ] Newsletter subscription
- [ ] Customer portal login

## 📞 Support

Untuk bantuan lebih lanjut:
- Email: johan.effendy@infobit.co.id
- Website: www.infobit.co.id

## 📄 License

Copyright © 2024 PT INFOBIT CIPTA MANDIRI. All Rights Reserved.

---

**Built with ❤️ by Claude AI**
**Version: 1.0**
**Last Updated: November 2024**
