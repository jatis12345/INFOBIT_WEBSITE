# 🔐 RECAPTCHA - LOCALHOST vs PRODUCTION

## ❓ **Pertanyaan Anda:**
**"Kalo di localhost saya bisa gak ya coba install google captcha atau harus upload dulu ke website?"**

---

## ✅ **JAWABAN: BISA TEST DI LOCALHOST!**

Anda **BISA** setup dan test reCAPTCHA di localhost **SEBELUM** upload ke website!

---

## 🎯 **2 CARA SETUP RECAPTCHA:**

### **CARA 1: Test di Localhost Dulu (RECOMMENDED!)**

#### **Langkah-langkah:**

**STEP 1: Daftar reCAPTCHA**

1. Buka: https://www.google.com/recaptcha/admin/create
2. Login dengan Google account
3. **Label**: Infobit Website Test
4. **reCAPTCHA type**: ✅ reCAPTCHA v2 → "I'm not a robot" Checkbox
5. **Domains**: 
   - ⚠️ **PENTING!** Tambahkan: **localhost**
   - Juga bisa tambah: **127.0.0.1**
6. Accept terms
7. **Submit**

**STEP 2: Copy Keys**

Google akan kasih:
- **Site Key** (contoh: 6Lc...)
- **Secret Key** (contoh: 6Lc...)

**STEP 3: Update Files**

**A. Edit `index.html`:**

Cari baris ini (sekitar baris 360):
```html
<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
```

Ganti dengan:
```html
<div class="g-recaptcha" data-sitekey="PASTE_SITE_KEY_ANDA"></div>
```

**B. Edit `send_email.php`:**

Cari baris ini (baris 16):
```php
$recaptcha_secret = 'YOUR_RECAPTCHA_SECRET_KEY';
```

Ganti dengan:
```php
$recaptcha_secret = 'PASTE_SECRET_KEY_ANDA';
```

**STEP 4: Test di Localhost**

1. **Install XAMPP** atau **WAMP** (kalau belum ada)
2. Copy folder website ke: `C:\xampp\htdocs\infobit\`
3. Start **Apache** dan **MySQL** di XAMPP
4. Buka browser: `http://localhost/infobit`
5. Scroll ke **Contact Form**
6. ✅ **reCAPTCHA akan muncul!**
7. Test isi form dan kirim

**STEP 5: Check Email**

⚠️ **CATATAN**: Email mungkin **TIDAK TERKIRIM** di localhost karena:
- PHP mail() function butuh SMTP configured
- Localhost biasanya tidak punya mail server

**Solusi untuk test email di localhost:**
- Install **FakeSendmail** atau
- Pakai **Mailtrap.io** (fake SMTP untuk testing)
- Atau skip test email, langsung upload ke hosting

---

### **CARA 2: Langsung di Production Website**

Kalau mau langsung test di website real:

**STEP 1: Setup reCAPTCHA dengan Domain Real**

1. Buka: https://www.google.com/recaptcha/admin/create
2. **Domains**: 
   - infobit.co.id
   - www.infobit.co.id
   - ❌ **JANGAN tambah localhost** (kalau hanya mau production)

**STEP 2: Update Files & Upload**

1. Edit `index.html` dan `send_email.php` (sama seperti di atas)
2. Upload ke hosting
3. Test langsung di website

---

## 🔍 **PERBEDAAN LOCALHOST vs PRODUCTION:**

| Fitur | Localhost | Production (Website Real) |
|-------|-----------|---------------------------|
| **reCAPTCHA muncul?** | ✅ Ya (kalau domain = localhost) | ✅ Ya |
| **Validasi reCAPTCHA?** | ✅ Ya | ✅ Ya |
| **Email terkirim?** | ❌ Tidak (butuh SMTP config) | ✅ Ya (kalau hosting support) |
| **Domain di Google reCAPTCHA** | localhost | infobit.co.id |

---

## 💡 **REKOMENDASI SAYA:**

### **Untuk Testing Cepat:**

**Opsi A: Test reCAPTCHA di Localhost (tanpa email)**

✅ **Kelebihan:**
- Bisa test reCAPTCHA muncul atau tidak
- Bisa test validasi form
- Gratis dan cepat

❌ **Kekurangan:**
- Email tidak terkirim (butuh config SMTP)

**Setup:**
1. Daftar reCAPTCHA dengan domain: **localhost**
2. Update keys di files
3. Buka di localhost
4. Test form (reCAPTCHA akan validasi)
5. ⚠️ Email tidak akan terkirim (normal!)

---

**Opsi B: Langsung Upload ke Hosting (test lengkap)**

✅ **Kelebihan:**
- Test reCAPTCHA + email sekaligus
- Test kondisi real production

❌ **Kekurangan:**
- Harus upload dulu
- Kalau ada error, harus upload lagi

**Setup:**
1. Daftar reCAPTCHA dengan domain: **infobit.co.id**
2. Update keys di files
3. Upload ke hosting
4. Test form + email

---

## 🎯 **SARAN TERBAIK:**

**STEP 1: Test di Localhost** (reCAPTCHA only)
- Pastikan reCAPTCHA muncul dan validasi jalan
- Domain: localhost

**STEP 2: Upload ke Hosting** (full test)
- Test form + email
- Domain: infobit.co.id

**ATAU**

Jika mau **SKIP localhost testing**, langsung:

**Langsung Upload ke Hosting + Setup reCAPTCHA**
- Domain: infobit.co.id
- Test semuanya sekaligus
- Lebih cepat!

---

## 🔧 **SETUP RECAPTCHA UNTUK LOCALHOST + PRODUCTION:**

Kalau mau test di **LOCALHOST** dulu, lalu **PRODUCTION**, pakai 1 reCAPTCHA key yang sama:

**Daftar reCAPTCHA dengan 2 domains:**

```
Domains:
- localhost
- 127.0.0.1
- infobit.co.id
- www.infobit.co.id
```

Dengan cara ini, **1 key bisa dipakai di localhost DAN production!** ✨

---

## 📧 **CARA TEST EMAIL DI LOCALHOST (OPSIONAL):**

Kalau mau test email di localhost juga, pakai **Mailtrap**:

### **Setup Mailtrap (Free Fake SMTP):**

1. **Daftar**: https://mailtrap.io (gratis)
2. **Create inbox**
3. **Copy SMTP credentials**
4. **Edit `send_email.php`**, ganti `mail()` dengan PHPMailer + Mailtrap

Atau lebih simple: **Skip test email di localhost**, langsung test di hosting aja! 😊

---

## ✅ **KESIMPULAN:**

### **Pertanyaan: Bisa test reCAPTCHA di localhost?**
**Jawaban**: ✅ **BISA!**

### **Caranya:**
1. Daftar reCAPTCHA dengan domain: **localhost**
2. Update keys di `index.html` dan `send_email.php`
3. Buka di localhost (via XAMPP)
4. reCAPTCHA akan muncul dan berfungsi! ✅

### **Tapi:**
- ⚠️ Email **tidak akan terkirim** di localhost (normal!)
- ✅ Upload ke hosting untuk test email

---

## 🚀 **QUICK START:**

**Mau test di localhost dulu?**

```
1. Daftar reCAPTCHA:
   Domain: localhost

2. Update keys di files

3. Copy folder ke:
   C:\xampp\htdocs\infobit\

4. Start XAMPP Apache

5. Buka: http://localhost/infobit

6. Scroll ke Contact Form

7. reCAPTCHA muncul! ✅
```

**Atau mau langsung production?**

```
1. Daftar reCAPTCHA:
   Domain: infobit.co.id

2. Update keys di files

3. Upload ke hosting

4. Test form + email ✅
```

---

## 💬 **PILIH YANG MANA?**

- **Test di localhost dulu** = Mau cek reCAPTCHA muncul atau tidak sebelum upload
- **Langsung production** = Mau test semuanya (reCAPTCHA + email) sekaligus

**Recommendation**: **Langsung upload ke hosting aja!** Lebih cepat dan test semuanya sekaligus! 🚀

---

**Questions? Tanya aja!** 😊
