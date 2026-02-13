# Quick Start Guide - Hızlı Başlama Rehberi

## Developer Theme for WordPress - 5 Dakikalık Kurulum

### 🚀 Adım 1: Tema Aktivasyonu (1 dakika)

```
1. WordPress Admin Paneline gidin
2. Görünüm → Temalar
3. "Developer Theme for WordPress" temasını bulun
4. "Aktifleştir" düğmesine tıklayın
```

**Başarılı mı?** Anasayfa yeni tasarımla görülür.

---

### 🎨 Adım 2: Temel Ayarlar (2 dakika)

**Site Kimliği Ayarları:**
```
Ayarlar → Genel
- Başlık: Adınız (ör: "James Lee")
- Açıklama: Unvanınız (ör: "Web Developer")
- URL: WordPress sitenizin adresi
```

**Tema Özelleştirme:**
```
Görünüm → Özelleştir
```

#### Sosyal Medya Bağlantıları
```
Sosyal Medya Bağlantıları bölümünde:
- Twitter: https://twitter.com/profiliniz
- LinkedIn: https://linkedin.com/in/profiliniz
- GitHub: https://github.com/profiliniz
```

#### Profil Bilgileri
```
Sidebar Bilgileri bölümünde:
- Konum: Şehir, Ülke
- E-posta: contact@example.com
- Website: https://example.com
```

---

### 📝 Adım 3: İçerik Ekleyin (2 dakika)

**Proje/Yazı Ekleyin:**
```
Yazılar → Yeni Yazı Ekle
- Başlık: Proje adı
- İçerik: Proje açıklaması
- Öne çıkan görüntü: Proje resmi
- Yayınla
```

**Tekrarlayın:** En az 3-5 proje ekleyin (Anasayfa en son 5'ini gösterir)

---

### ✅ Tamamlandı!

Siteniz şu an tam olarak çalışmalıdır. 

**Sonraki adımlar:**
- [ ] İletişim formu sayfası oluşturun (Contact Form 7 ile)
- [ ] GitHub bilgilerinizi `assets/js/main.js`'de güncelleyin
- [ ] Hakkımda sayfasını oluşturun ve düzenleyin
- [ ] Logo/Favicon yükleyin

---

## Sık Sorulan Sorular

**S: Resimler değişmiyor?**
C: Yazıyı Yayınla'den önce "Öne çıkan görüntü" ekle

**S: Sosyal medya ikonları görülmüyor?**
C: Görünüm > Özelleştir > Sosyal Medya'da URL'leri ekle (#'tan başlamamalıdır)

**S: GitHub aktivitesi görülmüyor?**
C: `assets/js/main.js`'de GitHub kullanıcı adını güncelle

**S: Dark Mode nasıl çalışır?**
C: Header'daki toggle ON/OFF yapar (otomatik kaydedilir)

---

## Tema URL'leri

| Sayfa | URL |
|-------|-----|
| Anasayfa | `http://localhost/wordpress/` |
| Admin | `http://localhost/wordpress/wp-admin/` |
| Yazılar | `http://localhost/wordpress/wp-admin/edit.php` |
| Özelleştir | `http://localhost/wordpress/wp-admin/customize.php` |

---

## Dosya Konumları

| Dosya | Konum |
|-------|-------|
| Temalar | `/Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/` |
| Eklentiler | `/Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/plugins/` |
| Uploads | `/Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/uploads/` |

Eğer tema bu konumda değilse, `Developer-Theme-for-WP` klasörünü uygun yere kopyalayın.

---

## Tema Dosyalarını Düzenlemek

**FTP/Dosya Yöneticisi ile:**

1. XAMPP htdocs klasöründe tema klasörüne gidin
2. Dosyaları açın:
   - `header.php` - Başlık kısmını düzenle
   - `footer.php` - Altbilgi kısmını düzenle
   - `assets/scss/style.scss` veya `assets/css/styles.css` - Stili düzenle
   - `functions.php` - İleri fonksiyonlar

3. Her değişiklik sonrası tarayıcıyı yenile (Ctrl+R veya Cmd+R)

---

## Kolay Renk Değişikliği

Header rengi değiştirmek için:

```css
/* assets/css/styles.css dosyasını bulun ve değiştirin */
.header {
    background-color: #f5f5f5; /* Yeni renkle değiştir */
}
```

---

## İletişim Formu Ekleme

1. Contact Form 7 eklentisini yükleyin ve aktifleştirin
2. Yeni bir form oluşturun
3. İletişim sayfası oluşturun ve formu sayfaya ekleyin
4. Sayfa URL'sini Görünüm > Özelleştir > İletişim'de ayarlayın

---

## GitHub Entegrasyonu

GitHub takvim göstermek için:

```javascript
// assets/js/main.js dosyasını açın, satır ~75'i bulun ve değiştirin:

new GitHubCalendar("#github-graph", "BURAYA_KULLANICI_ADI", { responsive: true });

// Örnek:
new GitHubCalendar("#github-graph", "octocat", { responsive: true });
```

---

## Yararlı Linkler

- [WordPress Türkçesi](https://tr.wordpress.org/)
- [Bootstrap Dokümantasyon](https://getbootstrap.com/docs/5.0/)
- [Font Awesome İkonları](https://fontawesome.com/icons)
- [Tema Orijinal Sayfası](https://themes.3rdwavemedia.com/)

---

**Başlamaya hazırsınız!** 🎉

Daha ayrıntılı bilgi için `INSTALLATION.md` ve `THEME-README.md` dosyalarını okuyun.
