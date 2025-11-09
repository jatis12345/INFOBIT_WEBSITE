# 🚀 QUICK START GUIDE
# PT INFOBIT CIPTA MANDIRI Website

## ⚡ Cara Tercepat Pakai Website Ini

### STEP 1: Download Files ✅ (SUDAH SELESAI!)

Semua file sudah siap di folder ini!

### STEP 2: Preview di Browser (Test Lokal)

1. **Buka file `index.html`** dengan browser (Chrome/Firefox)
2. **Lihat hasilnya** - Website sudah langsung bisa dilihat!
3. **NOTE**: Contact form belum berfungsi (perlu hosting dengan PHP)

### STEP 3: Upload ke Hosting (Langsung Online!)

**Jika Anda punya hosting cPanel:**

1. Login ke **cPanel**
2. Buka **File Manager**
3. Masuk ke folder **public_html/**
4. **Upload semua file** (index.html, style.css, script.js, send_email.php, .htaccess)
5. **Done!** Website langsung bisa diakses di domain Anda!

**Jika belum punya hosting:**
- Rekomendasi: Niagahoster, Hostinger, atau Dewaweb
- Paket minimal: Cloud Hosting atau Unlimited Hosting
- Spesifikasi: PHP 7.4+, MySQL (optional), SSL Certificate

### STEP 4: Setup Contact Form

#### A. Setup reCAPTCHA (5 menit)

1. Pergi ke: https://www.google.com/recaptcha/admin/create
2. Pilih **reCAPTCHA v2** (Checkbox)
3. **Domain**: masukkan domain Anda (contoh: infobit.co.id)
4. Klik **Submit**

5. **Copy Site Key** dan paste di `index.html` baris 360:
   ```html
   <div class="g-recaptcha" data-sitekey="PASTE_SITE_KEY_DISINI"></div>
   ```

6. **Copy Secret Key** dan paste di `send_email.php` baris 16:
   ```php
   $recaptcha_secret = 'PASTE_SECRET_KEY_DISINI';
   ```

7. **Upload kembali** kedua file ke hosting

#### B. Test Email

1. Buka website Anda
2. Scroll ke bagian **Contact Us**
3. Isi form dan klik **Kirim Pesan**
4. Cek email di **johan.effendy@infobit.co.id**
5. Cek juga **Spam folder** jika tidak masuk

### STEP 5: Integrasi dengan WordPress (Opsional)

**Jika sudah ada WordPress WP Radiant:**

#### Metode A: Import sebagai Page (Paling Mudah)

1. Login WordPress
2. **Pages → Add New**
3. Klik **"Edit with Elementor"** (pastikan Elementor sudah terinstall)
4. Klik **Template Library** (ikon folder)
5. Tab **"My Templates"** → **Import**
6. Upload file template (atau copy section by section)

**ATAU**

1. Edit page dengan **HTML mode**
2. Copy isi `index.html` dari `<body>` sampai `</body>`
3. Paste ke editor
4. Publish

#### Metode B: Enqueue CSS & JS di Theme

1. Buka **Appearance → Theme File Editor**
2. Edit **functions.php**
3. Tambahkan code ini di akhir:

```php
function infobit_custom_assets() {
    wp_enqueue_style(
        'infobit-style', 
        get_stylesheet_directory_uri() . '/infobit/style.css', 
        array(), 
        '1.0'
    );
    wp_enqueue_script(
        'infobit-script', 
        get_stylesheet_directory_uri() . '/infobit/script.js', 
        array('jquery'), 
        '1.0', 
        true
    );
}
add_action('wp_enqueue_scripts', 'infobit_custom_assets');
```

4. **Upload folder `infobit-website`** ke `wp-content/themes/radiant-child/`
5. **Save changes**

---

## 🎨 CUSTOMIZATION CEPAT

### Ganti Warna (5 menit)

Edit **style.css** baris 13-17:

```css
:root {
    --primary-color: #7C3AED;  /* Ganti ke warna Anda */
    --primary-dark: #6D28D9;
    --primary-light: #A855F7;
}
```

Contoh warna lain:
- **Biru**: #0066CC
- **Hijau**: #10B981
- **Merah**: #EF4444
- **Orange**: #F59E0B

### Ganti Logo (2 menit)

1. **Siapkan logo** (format PNG, ukuran 150x50px)
2. **Upload** ke folder yang sama dengan index.html
3. Edit **index.html** baris 35, ganti:

```html
<span class="logo-text">INFOBIT</span>
```

Dengan:

```html
<img src="logo.png" alt="Infobit" height="40">
```

### Ganti Text Hero (1 menit)

Edit **index.html** baris 51-61:
- Judul hero
- Deskripsi
- Text button

### Tambah/Hapus Produk (5 menit)

Edit **index.html** section `.products-grid` (mulai baris 130):
- Copy paste `<div class="product-card">...</div>`
- Edit judul, deskripsi, dan fitur

---

## 📊 CHECKLIST SEBELUM GO LIVE

### Pre-Launch Checklist:

- [ ] **Test di browser**: Chrome, Firefox, Safari, Edge
- [ ] **Test di mobile**: Buka dari HP
- [ ] **Contact form working**: Test kirim email
- [ ] **reCAPTCHA working**: Verifikasi muncul
- [ ] **Links semua berfungsi**: Test semua menu
- [ ] **Logo sudah diganti**: Pakai logo perusahaan
- [ ] **Content sudah final**: Cek typo dan grammar
- [ ] **SSL Certificate aktif**: HTTPS hijau
- [ ] **Google Analytics**: Install tracking code (opsional)
- [ ] **Backup**: Download semua file

### Post-Launch:

- [ ] Submit ke Google Search Console
- [ ] Submit sitemap
- [ ] Test speed: https://pagespeed.web.dev/
- [ ] Monitor email: Cek apakah form masuk
- [ ] Setup Google Business Profile
- [ ] Share di social media

---

## 🆘 TROUBLESHOOTING CEPAT

### ❌ "Contact form tidak kirim email"

**Solusi:**
1. Cek email masuk di **Spam folder**
2. Pastikan hosting support PHP mail
3. Contact hosting support untuk enable mail function

### ❌ "CSS tidak ter-load, tampilan berantakan"

**Solusi:**
1. Pastikan `style.css` ada di folder yang sama dengan `index.html`
2. Cek nama file: **harus `style.css`** (lowercase)
3. Clear browser cache (Ctrl+Shift+R)

### ❌ "Animasi tidak jalan"

**Solusi:**
1. Pastikan `script.js` ter-load
2. Buka Console browser (F12) → cari error
3. Pastikan pakai browser modern (bukan IE)

### ❌ "Mobile menu tidak buka"

**Solusi:**
1. Clear cache
2. Test di browser lain
3. Cek JavaScript tidak error

---

## 💡 TIPS TAMBAHAN

### Optimasi Speed:

1. **Compress images**: Pakai https://tinypng.com
2. **Enable caching**: Sudah ada di .htaccess
3. **Minify CSS/JS**: Pakai online tool jika perlu

### SEO:

1. **Install Yoast SEO** (jika pakai WordPress)
2. **Tambah meta description** di setiap page
3. **Alt text** untuk semua gambar
4. **Submit sitemap** ke Google

### Keamanan:

1. **Update PHP** ke versi terbaru
2. **Backup rutin**: Minimal 1x seminggu
3. **Monitor email**: Cek spam form
4. **SSL Certificate**: Wajib pakai HTTPS

---

## 📞 BUTUH BANTUAN?

Jika ada yang bingung atau error, kirim pertanyaan ke:
**Email**: johan.effendy@infobit.co.id

---

**🎉 SELAMAT! Website Anda siap online!**

**Built by**: Claude AI  
**Version**: 1.0  
**Date**: November 2024
