<?php
// index.php — Landing page SEIRAMA
// Sesuaikan link di bawah ini dengan nama file halaman data yang sudah ada.
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
    --gold:#E8C48A;
    --bg:#F5F6F5;
    --text:#2B3532;
    --muted:#6B7671;
    --line:#E2E6E4;
  }
  *{box-sizing:border-box;}
  body{
    margin:0;
    font-family: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    background:var(--bg);
    color:var(--text);
  }
  a{text-decoration:none; color:inherit;}

  /* NAVBAR */
  .navbar{
    background:var(--teal);
    padding:16px clamp(20px,5vw,60px);
    display:flex; align-items:center; justify-content:space-between;
    flex-wrap:wrap; gap:10px;
    position:sticky; top:0; z-index:100;
  }
  .brand{display:flex; flex-direction:column; gap:2px;}
  .logo-img{height:34px; width:auto; display:block;}
  .brand-sub{color:#EAF6F4; font-size:16px; font-weight:500; margin:2px 0 0;}
  .nav-menu{display:flex; align-items:center; gap:28px; font-size:15px; font-weight:700; color:#fff;}
  .nav-menu > a{opacity:0.95;}
  .nav-menu > a:hover{opacity:1; text-decoration:underline;}

  .dropdown{position:relative;}
  .dropdown > span{cursor:pointer; display:flex; align-items:center; gap:6px;}
  .dropdown > span::after{content:'▾'; font-size:11px;}
  .dropdown-menu{
    display:none; position:absolute; top:calc(100% + 10px); right:0;
    background:#fff; border:1px solid var(--line); border-radius:8px;
    min-width:230px; box-shadow:0 8px 20px rgba(0,0,0,0.12); overflow:hidden; z-index:20;
  }
  .dropdown:hover .dropdown-menu, .dropdown:focus-within .dropdown-menu{display:block;}
  .dropdown-menu a{
    display:block; padding:12px 16px; font-size:14px; color:var(--text); font-weight:400;
  }
  .dropdown-menu a:hover{background:var(--bg); color:var(--teal-dark);}
  .dropdown-menu a + a{border-top:1px solid var(--line);}

  /* HERO */
  .hero{
    max-width:1100px; margin:0 auto; padding:60px 20px 40px; text-align:center;
  }
  .hero h1{
    font-size:clamp(24px,3.4vw,34px); font-weight:700; margin:0 0 14px; color:var(--teal-dark);
  }
  .hero p{
    max-width:620px; margin:0 auto 26px; color:var(--muted); font-size:15px; line-height:1.7;
  }
  .btn{
    display:inline-block; background:var(--teal); color:#fff; font-weight:600; font-size:14.5px;
    padding:12px 26px; border-radius:8px; transition:background .2s ease;
  }
  .btn:hover{background:var(--teal-dark);}

  /* KATEGORI DATA */
  .section{max-width:1100px; margin:0 auto; padding:20px 20px 60px;}
  .section-title{
    font-size:18px; font-weight:600; color:var(--teal-dark); margin:0 0 18px; text-align:center;
  }
  .cards{
    display:grid; grid-template-columns:repeat(3,1fr); gap:18px;
  }
  .card{
    background:#fff; border:1px solid var(--line); border-radius:10px; padding:26px 22px;
    text-align:left;
  }
  .card-stat{
    display:flex; align-items:baseline; gap:8px; margin-bottom:14px;
  }
  .card-stat-number{
    font-size:38px; font-weight:800; color:var(--teal-dark); line-height:1;
  }
  .card-stat-label{
    font-size:13px; font-weight:600; color:var(--muted); text-transform:uppercase; letter-spacing:0.03em;
  }
  .card h3{font-size:15.5px; font-weight:600; color:var(--text); margin:0 0 8px;}
  .card p{font-size:13.5px; color:var(--muted); line-height:1.6; margin:0 0 16px;}
  .card a.card-link{color:var(--teal-dark); font-weight:600; font-size:13.5px;}
  .card a.card-link:hover{text-decoration:underline;}
  @media (max-width: 800px){ .cards{grid-template-columns:1fr;} }

  /* TENTANG */
  .about-box{
    background:#fff; border:1px solid var(--line); border-radius:10px;
    padding:32px clamp(22px,5vw,44px); max-width:900px; margin:0 auto;
  }
  .about-box p{
    color:var(--muted); font-size:14.5px; line-height:1.8; margin:0 0 16px;
  }
  .about-box p:last-of-type{margin-bottom:0;}

  /* FOOTER INFO */
  .footer-info{
    background:var(--teal);
    padding:70px 20px 60px;
    display:flex; flex-direction:column; align-items:center; gap:44px;
  }
  .legal-box{
    background:#F5F3D9;
    border-radius:14px;
    max-width:820px;
    padding:34px 40px;
    box-shadow:0 10px 22px rgba(0,0,0,0.08);
  }
  .legal-box p{
    margin:0; color:#2F6B4F; font-size:14.5px; line-height:1.85; text-align:center;
  }
  .social-icons{display:flex; align-items:center; gap:26px;}
  .social-icons a{
    color:#fff; opacity:0.95; display:flex; align-items:center; justify-content:center;
    transition:opacity .2s ease, transform .2s ease;
  }
  .social-icons a:hover{opacity:1; transform:translateY(-2px);}

  .footer-credit{
    background:var(--teal-dark);
    color:#fff;
    text-align:center;
    padding:18px 20px;
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

  <div class="hero" id="beranda">
    <h1>Sistem Informasi Kerja Sama Daerah</h1>
    <p>
      SEIRAMA menyimpan data kerja sama antara Pemerintah Kabupaten Belitung Timur
      dengan instansi maupun lembaga mitra, mulai dari perjanjian kerja sama,
      nota kesepakatan, hingga kesepakatan bersama.
    </p>
    <a class="btn" href="#data">Lihat Data</a>
  </div>

  <div class="section" id="tentang">
    <p class="section-title">Tentang SEIRAMA</p>
    <div class="about-box">
      <p>
        SEIRAMA (Sistem Informasi Kerja Sama Daerah) adalah sistem yang digunakan
        Pemerintah Kabupaten Belitung Timur untuk mencatat dan mengelola seluruh
        dokumen kerja sama daerah, baik dengan pemerintah daerah lain, instansi
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
    <p class="section-title">Pilih Jenis Data</p>
    <div class="cards">
      <div class="card">
        <div class="card-stat">
          <span class="card-stat-number">18</span>
          <span class="card-stat-label">Data</span>
        </div>
        <h3>Perjanjian Kerja Sama</h3>
        <p>Daftar dokumen perjanjian kerja sama antar pihak beserta tanggal penandatanganan dan surat.</p>
        <a class="card-link" href="<?php echo htmlspecialchars($linkPerjanjian); ?>">Lihat data →</a>
      </div>
      <div class="card">
        <div class="card-stat">
          <span class="card-stat-number">12</span>
          <span class="card-stat-label">Data</span>
        </div>
        <h3>Nota Kesepakatan</h3>
        <p>Daftar nota kesepakatan (MoU) yang telah dibahas dan disepakati oleh kedua belah pihak.</p>
        <a class="card-link" href="<?php echo htmlspecialchars($linkNota); ?>">Lihat data →</a>
      </div>
      <div class="card">
        <div class="card-stat">
          <span class="card-stat-number">9</span>
          <span class="card-stat-label">Data</span>
        </div>
        <h3>Kesepakatan Bersama</h3>
        <p>Daftar kesepakatan bersama antar instansi beserta riwayat pembahasan dan penandatanganannya.</p>
        <a class="card-link" href="<?php echo htmlspecialchars($linkKesepakatan); ?>">Lihat data →</a>
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
      <a href="#" aria-label="Facebook" target="_blank" rel="noopener">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.89h2.78l-.44 2.91h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z"/></svg>
      </a>
      <a href="#" aria-label="Instagram" target="_blank" rel="noopener">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c2.72 0 3.06.01 4.12.06 1.06.05 1.79.22 2.43.47.66.26 1.22.6 1.77 1.15.55.55.89 1.11 1.15 1.77.25.64.42 1.37.47 2.43.05 1.06.06 1.4.06 4.12s-.01 3.06-.06 4.12c-.05 1.06-.22 1.79-.47 2.43a4.9 4.9 0 01-1.15 1.77 4.9 4.9 0 01-1.77 1.15c-.64.25-1.37.42-2.43.47-1.06.05-1.4.06-4.12.06s-3.06-.01-4.12-.06c-1.06-.05-1.79-.22-2.43-.47a4.9 4.9 0 01-1.77-1.15 4.9 4.9 0 01-1.15-1.77c-.25-.64-.42-1.37-.47-2.43C2.01 15.06 2 14.72 2 12s.01-3.06.06-4.12c.05-1.06.22-1.79.47-2.43.26-.66.6-1.22 1.15-1.77A4.9 4.9 0 015.45.53c.64-.25 1.37-.42 2.43-.47C8.94.01 9.28 0 12 0zm0 5a5 5 0 100 10 5 5 0 000-10zm0 8.2a3.2 3.2 0 110-6.4 3.2 3.2 0 010 6.4zm5.2-8.4a1.17 1.17 0 100-2.34 1.17 1.17 0 000 2.34z" transform="translate(0 2)"/></svg>
      </a>
      <a href="#" aria-label="YouTube" target="_blank" rel="noopener">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.5s-.23-1.64-.94-2.36c-.9-.95-1.9-.95-2.36-1.01C16.9 2.8 12 2.8 12 2.8h-.01s-4.89 0-8.2.33c-.46.06-1.46.06-2.36 1.01C.72 4.86.5 6.5.5 6.5S.27 8.42.27 10.34v1.32c0 1.92.23 3.84.23 3.84s.23 1.64.94 2.36c.9.95 2.08.92 2.6 1.02 1.9.18 8.06.33 8.06.33s4.9-.01 8.2-.33c.46-.06 1.46-.06 2.36-1.01.71-.72.94-2.36.94-2.36s.23-1.92.23-3.84v-1.32c0-1.92-.23-3.84-.23-3.84zM9.6 14.6V7.9l6.4 3.36-6.4 3.34z"/></svg>
      </a>
    </div>
  </div>

  <div class="footer-credit">
    © <?php echo $tahunSekarang; ?> - <strong><u>Pemerintah Daerah Kabupaten Belitung Timur</u></strong>
  </div>

</body>
</html>