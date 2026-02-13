# WordPress Theme Installation & Setup Guide

## Developer Theme for WordPress - Kurulum ve Ayarlama Rehberi

### Adım 1: WordPress'e Tema Kurulumu

1. **WordPress Admin Dashboard**'a giriş yapın
2. Sol menüden **Görünüm (Appearance) > Temalar (Themes)** seçeneğine gidin
3. "Developer Theme for WordPress" temasını bulun
4. **Aktifleştir (Activate)** düğmesine tıklayın

### Adım 2: Tema Ayarlarını Yapın

Tema aktifleştirildikten sonra, **Görünüm > Özelleştir (Customize)**'den aşağıdaki ayarlamaları yapın:

#### 2.1 Site Başlığı ve Açıklaması
- **Başlık**: Adınız veya şirketinizin adı (ör: "James Lee")
- **Açıklama**: Profesyonel unvanınız (ör: "Web App Developer")

#### 2.2 Logo ve Profil Resmi
- **Logo**: Kustom logonuzu yükleyin
- **Site İkonu**: Favicon'unuzu ayarlayın

#### 2.3 Sosyal Medya Bağlantıları
Görünüm > Özelleştir > **Sosyal Medya Bağlantıları** bölümüne gidin:
- **Twitter URL**: https://twitter.com/yourprofile
- **LinkedIn URL**: https://linkedin.com/in/yourprofile
- **GitHub URL**: https://github.com/yourprofile
- **Stack Overflow URL**: https://stackoverflow.com/users/yourprofile
- **CodePen URL**: https://codepen.io/yourprofile

#### 2.4 Sidebar Bilgileri
Görünüm > Özelleştir > **Sidebar Bilgileri** bölümüne gidin:
- **Konum**: Şehriniz, Ülkeniz (ör: "San Francisco, US")
- **E-posta Adresi**: İletişim e-postanız
- **Website URL**: Kişisel web siteniz

#### 2.5 İletişim Düğmesi
Görünüm > Özelleştir > **İletişim Düğmesi** bölümüne gidin:
- **İletişim Sayfası URL**: İletişim formunuzun URL'si
- **Düğme Metni**: "Bana İletişim" veya istediğiniz metin

#### 2.6 Altbilgi
Görünüm > Özelleştir > **Altbilgi** bölümüne gidin:
- **Tasarımcı Adı**: Orijinal temanın tasarımcısının adı
- **Tasarımcı URL**: Tasarımcının web sitesi

### Adım 3: Portfolyo Projelerini Ekleyin

1. **Yazılar > Yeni Yazı Ekle**'ye gidin
2. Proje başlığı ve açıklamasını yazın
3. Proje fotoğrafını öne çıkan görüntü olarak ayarlayın
4. Yazıyı yayınlayın

Tema otomatik olarak son 5 yazıyı anasayfada gösterecektir.

### Adım 4: Statik Anasayfa Ayarını (İsteğe bağlı)

Dinamik blog yazıları yerine statik bir anasayfa görmek istiyorsanız:

1. **Yazılar > Sayfalar > Sayfalar > Yeni Ekle**
2. "Anasayfa" adında bir sayfa oluşturun
3. **Ayarlar > Okulum**'a gidin
4. **Anasayfa gösterimi** seçeneğini **Statik sayfa** olarak ayarlayın
5. Anasayfa olarak oluşturduğunuz sayfayı seçin

### Adım 5: GitHub Entegrasyonu (İsteğe bağlı)

Eğer GitHub takvim ve aktivite akışını göstermek istiyorsanız:

1. `assets/js/main.js` dosyasını açın (bkz. FTP/Dosya Yöneticisi)
2. Aşağıdaki satırları bulun:
   ```javascript
   new GitHubCalendar("#github-graph", "IonicaBizau", { responsive: true });
   GitHubActivity.feed({ username: "mdo", selector: "#ghfeed" });
   ```
3. `"IonicaBizau"` ve `"mdo"` kısımlarını kendi GitHub kullanıcı adınız ile değiştirin

### Adım 6: RSS Feed Entegrasyonu (İsteğe bağlı)

Blog yazılarınızı anasayfada göstermek için:

1. Tema dosyalarını FTP üzerinden açın
2. `assets/js/main.js` dosyasını düzenleyin
3. Aşağıdaki satırı bulun:
   ```javascript
   "https://feeds.feedburner.com/TechCrunch/startups"
   ```
4. Bunu kendi RSS feed URL'iniz ile değiştirin

### Adım 7: Tema Dosya Yapısı

```
Developer-Theme-for-WP/
├── index.php                 # Ana şablon (anasayfa)
├── header.php               # Başlık şablonu
├── footer.php               # Altbilgi şablonu
├── sidebar.php              # Kenar çubuğu şablonu
├── functions.php            # Tema fonksiyonları ve hooks
├── style.css               # Tema meta bilgisi ve stiller
├── assets/
│   ├── css/
│   │   └── styles.css
│   ├── js/
│   │   └── main.js
│   ├── images/
│   ├── plugins/
│   ├── fontawesome/
│   └── scss/
├── languages/              # Çeviriler (isteğe bağlı)
└── THEME-README.md        # Tema belgeleri
```

### Adım 8: Özelleştirmeyi Derinleştirin

#### CSS Özelleştirmesi
`assets/css/styles.css` veya `assets/scss/style.scss` dosyasını düzenleyin.

#### Renk Şeması
`assets/scss/_variables.scss` dosyasında SCSS değişkenlerini değiştirin.

#### Ana Yazı Tipi
`header.php` dosyasında Google Fonts URL'sini değiştirin:
```html
<link href='https://fonts.googleapis.com/css?family=YourFont:400,700' rel='stylesheet' type='text/css'>
```

### Sık Sorulan Sorular (FAQ)

**S: Projelerin sırasını nasıl değiştirebilirim?**
C: WordPress admin panelinden yazıları sürükleyerek yeniden sıralayabilirsiniz (Yazılar > Yazılar).

**S: Kendi CSS dosyalarımı nasıl ekleyebilirim?**
C: `functions.php` dosyasında `developer_theme_enqueue_assets()` fonksiyonuna `wp_enqueue_style()` satırı ekleyin.

**S: Dark Mode nasıl devre dışı bırakılır?**
C: `header.php` dosyasında dark mode kısmını yorumla (`<!-- -->`) başını sonunu ekleyin.

**S: Sayfa başına gösterilen proje sayısını nasıl değiştirebilirim?**
C: `index.php` dosyasında `'posts_per_page' => 5` satırını değiştirin.

**S: Tema çevirisi nasıl yapılır?**
C: `languages/` klasöründe `.po` dosyası oluşturun ve tercüme edin. Locale adı `_` ile ayrılmalıdır (ör: `developer-theme-wp-tr_TR.po`).

### Destek ve Yardım

- **WordPress Dokümantasyon**: https://wordpress.org/support/
- **Orijinal Tema**: https://themes.3rdwavemedia.com/
- **Bootstrap Dokümantasyon**: https://getbootstrap.com/docs/
- **Font Awesome İkonları**: https://fontawesome.com/icons

### Yaratıcısı Kredileri

- **Orijinal Tasarım**: Xiaoying Riley - 3rd Wave Media
- **WordPress Entegrasyonu**: Developer Theme for WordPress
- **Bootstrap Framework**: Bootstrap Core Team
- **İkon Seti**: Font Awesome

---

**Not**: Bu tema Creative Commons Attribution 3.0 Lisansı altında dağıtılır. Altbilgideki atıf bağlantısını korumayı unutmayın.
