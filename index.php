<?php
// index.php — Landing page SEIRAMA
$linkPerjanjian = 'perjanjian-kerja-sama.php';
$linkNota       = 'nota-kesepakatan.php';
$linkKesepakatan = 'kesepakatan-bersama.php';
$tahunSekarang  = date('Y');
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SEIRAMA — Sistem Informasi Kerja Sama Daerah</title>
<style>
  :root{
    --teal:#189E92;
    --teal-dark:#0E6F66;
    --teal-deep:#0A4B45;
    --teal-soft:#E4F5F2;
    --gold:#E8C48A;
    --bg:#F5F6F5;
    --text:#20302C;
    --muted:#5E6E69;
    --line:#E2E6E4;
    --radius:16px;
    --shadow-sm:0 4px 14px rgba(10,75,69,0.06);
    --shadow-md:0 14px 34px rgba(10,75,69,0.10);
  }
  *{box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{
    margin:0;
    font-family: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    background:var(--bg);
    color:var(--text);
  }
  a{text-decoration:none; color:inherit;}

  /* NAVBAR */
  .navbar{
    background:linear-gradient(100deg, var(--teal-deep), var(--teal));
    padding:16px clamp(20px,5vw,60px);
    display:flex; align-items:center; justify-content:space-between;
    flex-wrap:wrap; gap:10px;
    position:sticky; top:0; z-index:100;
    box-shadow:0 4px 18px rgba(0,0,0,0.12);
  }
  .brand{display:flex; flex-direction:column; gap:2px;}
  .logo-img{height:34px; width:auto; display:block;}
  .brand-sub{color:#EAF6F4; font-size:16px; font-weight:500; margin:2px 0 0;}
  .nav-menu{display:flex; align-items:center; gap:30px; font-size:15px; font-weight:700; color:#fff;}
  .nav-menu > a{opacity:0.95; position:relative; padding-bottom:2px; transition:opacity .2s ease;}
  .nav-menu > a::after{
    content:''; position:absolute; left:0; bottom:-4px; width:0; height:2px;
    background:var(--gold); transition:width .2s ease;
  }
  .nav-menu > a:hover{opacity:1;}
  .nav-menu > a:hover::after{width:100%;}

  .dropdown{position:relative;}
  .dropdown > span{cursor:pointer; display:flex; align-items:center; gap:6px;}
  .dropdown > span::after{content:'▾'; font-size:11px; transition:transform .2s ease;}
  .dropdown:hover > span::after{transform:rotate(180deg);}
  .dropdown-menu{
    display:none; position:absolute; top:calc(100% + 14px); right:0;
    background:#fff; border:1px solid var(--line); border-radius:12px;
    min-width:240px; box-shadow:var(--shadow-md); overflow:hidden; z-index:20;
  }
  .dropdown:hover .dropdown-menu, .dropdown:focus-within .dropdown-menu{display:block;}
  .dropdown-menu a{
    display:flex; align-items:center; gap:10px;
    padding:13px 18px; font-size:14px; color:var(--text); font-weight:500;
    transition:background .15s ease, color .15s ease, padding-left .15s ease;
  }
  .dropdown-menu a:hover{background:var(--teal-soft); color:var(--teal-deep); padding-left:22px;}
  .dropdown-menu a + a{border-top:1px solid var(--line);}

  /* HERO */
  .hero-wrap{
    background:
      radial-gradient(60% 100% at 85% 0%, rgba(24,158,146,0.10) 0%, rgba(24,158,146,0) 60%),
      radial-gradient(50% 80% at 5% 10%, rgba(232,196,138,0.16) 0%, rgba(232,196,138,0) 60%);
    position:relative;
  }
  .hero-wave{
    display:block; width:100%; height:44px; margin-top:-2px;
  }
  .hero{
    max-width:1100px; margin:0 auto; padding:88px 20px 56px; text-align:center;
  }
  .hero-badge{
    display:inline-flex; align-items:center; gap:8px;
    background:var(--teal-soft); color:var(--teal-deep);
    font-size:12.5px; font-weight:700; letter-spacing:0.04em; text-transform:uppercase;
    padding:8px 16px; border-radius:999px; margin-bottom:22px;
  }
  .hero-badge::before{content:''; width:7px; height:7px; border-radius:50%; background:var(--teal);}
  .hero h1{
    font-size:clamp(26px,3.8vw,40px); font-weight:800; margin:0 0 18px; color:var(--teal-deep);
    letter-spacing:-0.01em; line-height:1.2;
  }
  .hero p{
    max-width:640px; margin:0 auto 32px; color:var(--muted); font-size:15.5px; line-height:1.75;
  }
  .btn{
    display:inline-flex; align-items:center; gap:9px;
    background:var(--teal); color:#fff; font-weight:700; font-size:15px;
    padding:14px 30px; border-radius:10px;
    box-shadow:0 10px 22px -6px rgba(24,158,146,0.55);
    transition:transform .18s ease, box-shadow .18s ease, background .18s ease;
  }
  .btn:hover{background:var(--teal-dark); transform:translateY(-2px); box-shadow:0 14px 26px -6px rgba(24,158,146,0.6);}

  /* SECTION SHARED */
  .section{max-width:1100px; margin:0 auto; padding:26px 20px 70px;}
  .section-head{text-align:center; margin-bottom:36px;}
  .kicker{
    font-size:12.5px; font-weight:700; letter-spacing:0.08em; text-transform:uppercase;
    color:var(--teal); margin:0 0 8px;
  }
  .section-title{
    font-size:26px; font-weight:800; color:var(--teal-deep); margin:0;
  }

  /* CARDS - DATA */
  .cards{
    display:grid; grid-template-columns:repeat(3,1fr); gap:22px;
  }
  .card{
    background:#fff; border:1px solid var(--line); border-radius:var(--radius);
    padding:28px 24px; text-align:left; box-shadow:var(--shadow-sm);
    transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease;
  }
  .card:hover{
    transform:translateY(-5px); box-shadow:var(--shadow-md); border-color:var(--teal);
  }
  .card-icon{
    width:44px; height:44px; border-radius:11px; background:var(--teal-soft);
    display:flex; align-items:center; justify-content:center; color:var(--teal-dark);
    margin-bottom:18px;
  }
  .card-icon.icon-teal{background:var(--teal-soft); color:var(--teal-dark);}
  .card-icon.icon-gold{background:#FBF1DF; color:#B8862F;}
  .card-icon.icon-deep{background:#DCEFED; color:var(--teal-deep);}
  .card-stat{
    display:flex; align-items:baseline; gap:8px; margin-bottom:12px;
  }
  .card-stat-number{
    font-size:36px; font-weight:800; color:var(--teal-deep); line-height:1;
  }
  .card-stat-label{
    font-size:12.5px; font-weight:700; color:var(--muted); text-transform:uppercase; letter-spacing:0.04em;
  }
  .card h3{font-size:16px; font-weight:700; color:var(--text); margin:0 0 9px;}
  .card p{font-size:13.5px; color:var(--muted); line-height:1.65; margin:0 0 18px; text-align:justify;}
  .card a.card-link{
    display:inline-flex; align-items:center; gap:6px;
    color:var(--teal-dark); font-weight:700; font-size:13.5px;
    transition:gap .15s ease;
  }
  .card a.card-link:hover{gap:10px;}
  @media (max-width: 860px){ .cards{grid-template-columns:1fr;} }

  /* TENTANG */
  .about-box{
    background:#fff; border:1px solid var(--line); border-radius:var(--radius);
    padding:36px clamp(24px,5vw,48px); max-width:900px; margin:0 auto;
    box-shadow:var(--shadow-sm); position:relative; overflow:hidden;
  }
  .about-box::before{
    content:''; position:absolute; top:0; left:0; width:6px; height:100%;
    background:linear-gradient(180deg, var(--teal), var(--gold));
  }
  .about-box p{
    color:var(--muted); font-size:14.5px; line-height:1.85; margin:0 0 16px; text-align:justify;
  }
  .about-box p:last-of-type{margin-bottom:0;}

  /* FOOTER INFO */
  .footer-info{
    background:linear-gradient(160deg, var(--teal-deep), var(--teal));
    padding:76px 20px 64px;
    display:flex; flex-direction:column; align-items:center; gap:46px;
  }
  .legal-box{
    background:#FBF8E9;
    border-radius:18px;
    max-width:820px;
    padding:36px 44px;
    box-shadow:0 16px 32px rgba(0,0,0,0.14);
  }
  .legal-box p{
    margin:0; color:#2F6B4F; font-size:14.5px; line-height:1.9; text-align:center;
  }
  .social-icons{display:flex; align-items:center; gap:18px;}
  .social-icons a{
    color:#fff; width:42px; height:42px; border-radius:50%;
    background:rgba(255,255,255,0.14);
    display:flex; align-items:center; justify-content:center;
    transition:background .2s ease, transform .2s ease;
  }
  .social-icons a:hover{background:rgba(255,255,255,0.28); transform:translateY(-3px);}

  .footer-credit{
    background:var(--teal-deep);
    color:#fff;
    text-align:center;
    padding:20px 20px;
    font-size:14px;
  }
  .footer-credit strong{font-weight:700;}
</style>
</head>
<body>

  <div class="navbar">
    <div class="brand">
      <img src="LogoSeirama.png" alt="SEIRAMA" class="logo-img">
      <p class="brand-sub">Sistem Informasi Kerja Sama Daerah</p>
    </div>
    <div class="nav-menu">
      <a href="#beranda">Beranda</a>
      <a href="#tentang">Tentang</a>
      <div class="dropdown" tabindex="0">
        <span>Data</span>
        <div class="dropdown-menu">
          <a href="<?php echo htmlspecialchars($linkPerjanjian); ?>">Perjanjian Kerja Sama</a>
          <a href="<?php echo htmlspecialchars($linkNota); ?>">Nota Kesepakatan</a>
          <a href="<?php echo htmlspecialchars($linkKesepakatan); ?>">Kesepakatan Bersama</a>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-wrap">
    <div class="hero" id="beranda">
      <span class="hero-badge">Pemerintah Kabupaten Belitung Timur</span>
      <h1>Sistem Informasi Kerja Sama Daerah</h1>
      <p>
        SEIRAMA menyimpan data kerja sama antara Pemerintah Kabupaten Belitung Timur
        dengan instansi maupun lembaga mitra, mulai dari perjanjian kerja sama,
        nota kesepakatan, hingga kesepakatan bersama.
      </p>
      <a class="btn" href="#data">
        Lihat Data
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
    <svg class="hero-wave" viewBox="0 0 1440 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 30 C 240 60, 480 0, 720 20 C 960 40, 1200 10, 1440 30 L1440 60 L0 60 Z" fill="var(--bg)"/>
    </svg>
  </div>

  <div class="section" id="tentang">
    <div class="section-head">
      <p class="kicker">Profil Sistem</p>
      <h2 class="section-title">Tentang SEIRAMA</h2>
    </div>
    <div class="about-box">
      <p>
        SEIRAMA (Sistem Informasi Kerja Sama Daerah) adalah sistem yang digunakan
        Pemerintah Kabupaten Belitung Timur untuk mencatat dan mengelola seluruh
        dokumen kerja sama daerah — baik dengan pemerintah daerah lain, instansi
        pemerintah, perguruan tinggi, maupun lembaga/pihak ketiga lainnya.
      </p>
      <p>
        Melalui sistem ini, setiap kerja sama dapat ditelusuri riwayatnya secara
        transparan, mulai dari tahap pembahasan, penandatanganan, hingga surat
        diterima dan diarsipkan.
      </p>
    </div>
  </div>

  <div class="section" id="data">
    <div class="section-head">
      <p class="kicker">Jelajahi Data</p>
      <h2 class="section-title">Pilih Jenis Data</h2>
    </div>
    <div class="cards">
      <div class="card">
        <div class="card-icon icon-teal">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M14 2v6h6" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M8 13h8M8 17h8M8 9h3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <div class="card-stat">
          <span class="card-stat-number">18</span>
          <span class="card-stat-label">Data</span>
        </div>
        <h3>Perjanjian Kerja Sama</h3>
        <p>Daftar dokumen perjanjian kerja sama antar pihak beserta tanggal penandatanganan dan surat.</p>
        <a class="card-link" href="<?php echo htmlspecialchars($linkPerjanjian); ?>">
          Lihat data
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
      <div class="card">
        <div class="card-icon icon-gold">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M9 11l3 3L22 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div class="card-stat">
          <span class="card-stat-number">12</span>
          <span class="card-stat-label">Data</span>
        </div>
        <h3>Nota Kesepakatan</h3>
        <p>Daftar nota kesepakatan (MoU) yang telah dibahas dan disepakati oleh kedua belah pihak.</p>
        <a class="card-link" href="<?php echo htmlspecialchars($linkNota); ?>">
          Lihat data
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
      <div class="card">
        <div class="card-icon icon-deep">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><circle cx="8" cy="8" r="3" stroke="currentColor" stroke-width="1.8"/><circle cx="17" cy="8" r="3" stroke="currentColor" stroke-width="1.8"/><path d="M2 20c0-3 2.5-5.5 6-5.5S14 17 14 20M13 14.7c1-.8 2.3-1.2 4-1.2 3.5 0 6 2.5 6 5.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <div class="card-stat">
          <span class="card-stat-number">9</span>
          <span class="card-stat-label">Data</span>
        </div>
        <h3>Kesepakatan Bersama</h3>
        <p>Daftar kesepakatan bersama antar instansi beserta riwayat pembahasan dan penandatanganannya.</p>
        <a class="card-link" href="<?php echo htmlspecialchars($linkKesepakatan); ?>">
          Lihat data
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
  </div>

  <div class="footer-info">
    <div class="legal-box">
      <p>
        Dasar pelaksanaan kegiatan ini adalah Peraturan Pemerintah No. 28 Th. 2018 Tentang
        Kerja Sama Daerah, Permendagri No. 22 Th. 2020 Tentang Tata Cara Kerja Sama Daerah
        dengan Daerah Lain dan Kerja Sama Daerah dengan Pihak Ketiga, dan Permendagri No. 25
        Th. 2020 Tentang Tata Cara Kerja Sama Daerah dengan Pemerintah Daerah / Lembaga Lain
        dari Luar Negeri.
      </p>
    </div>

    <div class="social-icons">
      <a href="https://www.facebook.com/DiskominfoBeltim/" aria-label="Facebook" target="_blank" rel="noopener">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.89h2.78l-.44 2.91h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z"/></svg>
      </a>
      <a href="https://www.instagram.com/diskominfobeltim/" aria-label="Instagram" target="_blank" rel="noopener">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c2.72 0 3.06.01 4.12.06 1.06.05 1.79.22 2.43.47.66.26 1.22.6 1.77 1.15.55.55.89 1.11 1.15 1.77.25.64.42 1.37.47 2.43.05 1.06.06 1.4.06 4.12s-.01 3.06-.06 4.12c-.05 1.06-.22 1.79-.47 2.43a4.9 4.9 0 01-1.15 1.77 4.9 4.9 0 01-1.77 1.15c-.64.25-1.37.42-2.43.47-1.06.05-1.4.06-4.12.06s-3.06-.01-4.12-.06c-1.06-.05-1.79-.22-2.43-.47a4.9 4.9 0 01-1.77-1.15 4.9 4.9 0 01-1.15-1.77c-.25-.64-.42-1.37-.47-2.43C2.01 15.06 2 14.72 2 12s.01-3.06.06-4.12c.05-1.06.22-1.79.47-2.43.26-.66.6-1.22 1.15-1.77A4.9 4.9 0 015.45.53c.64-.25 1.37-.42 2.43-.47C8.94.01 9.28 0 12 0zm0 5a5 5 0 100 10 5 5 0 000-10zm0 8.2a3.2 3.2 0 110-6.4 3.2 3.2 0 010 6.4zm5.2-8.4a1.17 1.17 0 100-2.34 1.17 1.17 0 000 2.34z" transform="translate(0 2)"/></svg>
      </a>
      <a href="https://www.youtube.com/channel/UC_Fda9zOCryl9j2rz2OhLZA" aria-label="YouTube" target="_blank" rel="noopener">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.5s-.23-1.64-.94-2.36c-.9-.95-1.9-.95-2.36-1.01C16.9 2.8 12 2.8 12 2.8h-.01s-4.89 0-8.2.33c-.46.06-1.46.06-2.36 1.01C.72 4.86.5 6.5.5 6.5S.27 8.42.27 10.34v1.32c0 1.92.23 3.84.23 3.84s.23 1.64.94 2.36c.9.95 2.08.92 2.6 1.02 1.9.18 8.06.33 8.06.33s4.9-.01 8.2-.33c.46-.06 1.46-.06 2.36-1.01.71-.72.94-2.36.94-2.36s.23-1.92.23-3.84v-1.32c0-1.92-.23-3.84-.23-3.84zM9.6 14.6V7.9l6.4 3.36-6.4 3.34z"/></svg>
      </a>
    </div>
  </div>

  <div class="footer-credit">
    © <?php echo $tahunSekarang; ?> - <strong><u>Pemerintah Daerah Kabupaten Belitung Timur</u></strong>
  </div>

</body>
</html>
