<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T-LMS Enterprise — Corporate Learning & Compliance Platform</title>
    <meta name="description"
        content="T-LMS Enterprise by Talenta Traincom Indonesia. Platform LMS enterprise untuk corporate training, compliance tracking, dan certification management.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0F172A;
            background: #fff;
            -webkit-font-smoothing: antialiased
        }

        a {
            text-decoration: none;
            color: inherit
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 14px 0;
            transition: all .3s;
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid transparent
        }

        .navbar.scrolled {
            border-bottom-color: #E2E8F0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .06)
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .nav-logo {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #4F46E5, #0EA5E9);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 16px;
            color: #fff;
            box-shadow: 0 4px 12px rgba(79, 70, 229, .25)
        }

        .nav-title {
            font-weight: 800;
            font-size: 16px;
            color: #0F172A
        }

        .nav-title small {
            display: block;
            font-size: 10px;
            font-weight: 500;
            color: #94A3B8
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px
        }

        .nav-link {
            font-size: 14px;
            font-weight: 500;
            color: #475569;
            transition: color .2s
        }

        .nav-link:hover {
            color: #4F46E5
        }

        .nav-cta {
            padding: 10px 22px;
            background: #4F46E5;
            color: #fff;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: all .2s;
            box-shadow: 0 2px 8px rgba(79, 70, 229, .3)
        }

        .nav-cta:hover {
            background: #4338CA;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(79, 70, 229, .4)
        }

        /* Hero */
        .hero {
            padding: 140px 0 80px;
            position: relative;
            overflow: hidden
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -200px;
            right: -200px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(79, 70, 229, .06), transparent);
            pointer-events: none
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(14, 165, 233, .05), transparent);
            pointer-events: none
        }

        .hero-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: #EEF2FF;
            border: 1px solid #C7D2FE;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 600;
            color: #4F46E5;
            margin-bottom: 20px
        }

        .hero-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #4F46E5;
            animation: hero-pulse 2s infinite
        }

        @keyframes hero-pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1)
            }

            50% {
                opacity: .5;
                transform: scale(.8)
            }
        }

        .hero h1 {
            font-size: 52px;
            font-weight: 900;
            line-height: 1.1;
            color: #0F172A;
            margin-bottom: 18px;
            letter-spacing: -.03em
        }

        .hero h1 span {
            background: linear-gradient(135deg, #4F46E5, #0EA5E9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .hero p {
            font-size: 17px;
            color: #64748B;
            line-height: 1.7;
            margin-bottom: 28px;
            max-width: 480px
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            align-items: center
        }

        .btn-hero {
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            transition: all .2s;
            display: inline-flex;
            align-items: center;
            gap: 8px
        }

        .btn-hero-primary {
            background: #4F46E5;
            color: #fff;
            box-shadow: 0 4px 16px rgba(79, 70, 229, .35)
        }

        .btn-hero-primary:hover {
            background: #4338CA;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(79, 70, 229, .4)
        }

        .btn-hero-outline {
            background: #fff;
            color: #475569;
            border: 2px solid #E2E8F0;
            padding: 12px 26px
        }

        .btn-hero-outline:hover {
            border-color: #4F46E5;
            color: #4F46E5;
            background: #EEF2FF
        }

        /* Hero visual */
        .hero-visual {
            position: relative
        }

        .hero-card {
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .08);
            position: relative;
            z-index: 2
        }

        .hc-top {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            padding-bottom: 14px;
            border-bottom: 1px solid #F1F5F9
        }

        .hc-logo {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #4F46E5, #0EA5E9);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
            color: #fff
        }

        .hc-brand {
            font-weight: 700;
            font-size: 14px;
            color: #0F172A
        }

        .hc-brand small {
            display: block;
            font-size: 10px;
            color: #94A3B8;
            font-weight: 400
        }

        .hc-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 14px
        }

        .hc-stat {
            background: #F8FAFC;
            border-radius: 12px;
            padding: 14px;
            text-align: center;
            border: 1px solid #F1F5F9
        }

        .hc-stat-val {
            font-size: 20px;
            font-weight: 800
        }

        .hc-stat-lbl {
            font-size: 9px;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: .06em;
            font-weight: 600;
            margin-top: 2px
        }

        .hc-bars {
            display: flex;
            flex-direction: column;
            gap: 8px
        }

        .hc-bar-row {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .hc-bar-name {
            font-size: 11px;
            color: #64748B;
            min-width: 50px;
            font-weight: 500
        }

        .hc-bar-track {
            flex: 1;
            height: 8px;
            background: #F1F5F9;
            border-radius: 10px;
            overflow: hidden
        }

        .hc-bar-fill {
            height: 100%;
            border-radius: 10px
        }

        .hc-bar-pct {
            font-size: 11px;
            font-weight: 700;
            min-width: 35px;
            text-align: right
        }

        .float-card {
            position: absolute;
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 14px;
            padding: 14px 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
            z-index: 3;
            animation: float 4s ease-in-out infinite
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-8px)
            }
        }

        .float-1 {
            top: -10px;
            right: -20px;
            animation-delay: 0s
        }

        .float-2 {
            bottom: 20px;
            left: -30px;
            animation-delay: 1s
        }

        /* Features */
        .features {
            padding: 80px 0;
            background: #F8FAFC
        }

        .section-header {
            text-align: center;
            margin-bottom: 48px
        }

        .section-header h2 {
            font-size: 36px;
            font-weight: 800;
            color: #0F172A;
            margin-bottom: 10px;
            letter-spacing: -.02em
        }

        .section-header p {
            font-size: 16px;
            color: #64748B;
            max-width: 540px;
            margin: 0 auto;
            line-height: 1.6
        }

        .feat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px
        }

        .feat-card {
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            padding: 28px;
            transition: all .2s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .04)
        }

        .feat-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
            transform: translateY(-4px);
            border-color: #C7D2FE
        }

        .feat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 16px
        }

        .feat-title {
            font-size: 16px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 8px
        }

        .feat-desc {
            font-size: 13px;
            color: #64748B;
            line-height: 1.6
        }

        /* CTA */
        .cta-section {
            padding: 80px 0;
            text-align: center
        }

        .cta-box {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 50%, #0EA5E9 100%);
            border-radius: 24px;
            padding: 60px 40px;
            position: relative;
            overflow: hidden
        }

        .cta-box::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08)
        }

        .cta-box h2 {
            font-size: 32px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 12px;
            position: relative;
            z-index: 1
        }

        .cta-box p {
            font-size: 16px;
            color: rgba(255, 255, 255, .8);
            margin-bottom: 28px;
            position: relative;
            z-index: 1
        }

        .btn-cta {
            padding: 14px 32px;
            background: #fff;
            color: #4F46E5;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all .2s;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .15);
            position: relative;
            z-index: 1
        }

        .btn-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .2)
        }

        /* Footer */
        footer {
            padding: 40px 0;
            border-top: 1px solid #E2E8F0
        }

        .ft-inner {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .ft-copy {
            font-size: 13px;
            color: #94A3B8
        }

        .ft-links {
            display: flex;
            gap: 20px
        }

        .ft-link {
            font-size: 13px;
            color: #64748B;
            transition: color .2s
        }

        .ft-link:hover {
            color: #4F46E5
        }

        @media(max-width:768px) {
            .hero-inner {
                grid-template-columns: 1fr;
                text-align: center
            }

            .hero h1 {
                font-size: 36px
            }

            .hero p {
                margin: 0 auto 28px
            }

            .hero-actions {
                justify-content: center;
                flex-wrap: wrap
            }

            .hero-visual {
                display: none
            }

            .feat-grid {
                grid-template-columns: 1fr
            }

            .nav-links {
                display: none
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="container nav-inner">
            <div class="nav-brand">
                <div class="nav-logo">T</div>
                <div class="nav-title">T-LMS Enterprise<small>Talenta Traincom Indonesia</small></div>
            </div>
            <div class="nav-links">
                <a href="#features" class="nav-link">Fitur</a>
                <a href="#" class="nav-link">Harga</a>
                <a href="#" class="nav-link">Kontak</a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-cta">Dashboard →</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-cta">Coba Gratis</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="container hero-inner">
            <div>
                <div class="hero-badge">🚀 Platform LMS #1 Indonesia</div>
                <h1>Empowering<br><span>Corporate Excellence</span><br>Through Learning</h1>
                <p>Platform LMS enterprise terlengkap untuk corporate training, compliance tracking, dan certification
                    management. Dipercaya perusahaan besar Indonesia.</p>
                <div class="hero-actions">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-hero btn-hero-primary">Buka Dashboard →</a>
                    @else
                        <a href="{{ route('register') }}" class="btn-hero btn-hero-primary">Mulai Gratis →</a>
                    @endauth
                    <a href="#features" class="btn-hero btn-hero-outline">Pelajari Fitur</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="float-card float-1">
                    <div style="font-size:11px;color:#64748B;margin-bottom:4px;font-weight:600">Completion Rate</div>
                    <div style="font-size:22px;font-weight:800;color:#10B981">94.2%</div>
                </div>
                <div class="float-card float-2">
                    <div style="font-size:11px;color:#64748B;margin-bottom:4px;font-weight:600">Active Learners</div>
                    <div style="font-size:22px;font-weight:800;color:#4F46E5">2,847</div>
                </div>
                <div class="hero-card">
                    <div class="hc-top">
                        <div class="hc-logo">T</div>
                        <div class="hc-brand">HR Admin Dashboard<small>Talenta Traincom Indonesia</small></div>
                    </div>
                    <div class="hc-stats">
                        <div class="hc-stat">
                            <div class="hc-stat-val" style="color:#4F46E5">156</div>
                            <div class="hc-stat-lbl">Pelatihan</div>
                        </div>
                        <div class="hc-stat">
                            <div class="hc-stat-val" style="color:#10B981">94.2%</div>
                            <div class="hc-stat-lbl">Kepatuhan</div>
                        </div>
                        <div class="hc-stat">
                            <div class="hc-stat-val" style="color:#0EA5E9">1,456</div>
                            <div class="hc-stat-lbl">Sertifikat</div>
                        </div>
                    </div>
                    <div class="hc-bars">
                        <div class="hc-bar-row"><span class="hc-bar-name">IT</span>
                            <div class="hc-bar-track">
                                <div class="hc-bar-fill" style="width:92%;background:#4F46E5"></div>
                            </div><span class="hc-bar-pct" style="color:#4F46E5">92%</span>
                        </div>
                        <div class="hc-bar-row"><span class="hc-bar-name">HR</span>
                            <div class="hc-bar-track">
                                <div class="hc-bar-fill" style="width:88%;background:#10B981"></div>
                            </div><span class="hc-bar-pct" style="color:#10B981">88%</span>
                        </div>
                        <div class="hc-bar-row"><span class="hc-bar-name">Sales</span>
                            <div class="hc-bar-track">
                                <div class="hc-bar-fill" style="width:45%;background:#F59E0B"></div>
                            </div><span class="hc-bar-pct" style="color:#F59E0B">45%</span>
                        </div>
                        <div class="hc-bar-row"><span class="hc-bar-name">Fin</span>
                            <div class="hc-bar-track">
                                <div class="hc-bar-fill" style="width:95%;background:#0EA5E9"></div>
                            </div><span class="hc-bar-pct" style="color:#0EA5E9">95%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>Fitur Enterprise-Grade</h2>
                <p>Semua yang dibutuhkan perusahaan untuk mengelola pelatihan dan kepatuhan karyawan</p>
            </div>
            <div class="feat-grid">
                @php $feats = [
                    ['📚', 'Course Management', 'Buat, kelola, dan distribusikan pelatihan dengan module builder intuitif.', '#EEF2FF'],
                    ['🛡️', 'Compliance Center', 'Pantau kepatuhan real-time dengan 9 kategori compliance tracking.', '#D1FAE5'],
                    ['🏅', 'Certification', 'Track sertifikat karyawan dengan reminder otomatis sebelum expired.', '#FEF3C7'],
                    ['📊', 'Analytics & Reports', 'Dashboard analitik lengkap dengan export dan visualisasi data.', '#E0F2FE'],
                    ['🎯', 'Learning Paths', 'Jalur pembelajaran terstruktur sesuai kebutuhan karir karyawan.', '#EDE9FE'],
                    ['🎥', 'Live Webinar', 'Integrasi webinar langsung dengan recording dan attendance tracking.', '#FEE2E2'],
                    ['👥', 'Employee Management', 'Kelola ribuan karyawan dengan profil, departemen, dan progres.', '#E0F2FE'],
                    ['📝', 'Quiz & Assessment', 'Assessment interaktif dengan auto-grading dan analytics.', '#F5F3FF'],
                    ['🔐', 'Multi-tenant SaaS', 'Arsitektur multi-company dengan isolasi data dan role management.', '#ECFDF5'],
                ]; @endphp
                @foreach($feats as $f)
                    <div class="feat-card">
                        <div class="feat-icon" style="background:{{ $f[3] }}">{{ $f[0] }}</div>
                        <div class="feat-title">{{ $f[1] }}</div>
                        <div class="feat-desc">{{ $f[2] }}</div>
                    </div>
                @endforeach
            </div>
    </div>
    </section>
    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-box">
                <h2>Siap Transformasi Pelatihan Perusahaan Anda?</h2>
                <p>Bergabung dengan ratusan perusahaan Indonesia yang sudah menggunakan T-LMS Enterprise</p>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-cta">Buka Dashboard →</a>
                @else
                    <a href="{{ route('register') }}" class="btn-cta">Mulai 14 Hari Gratis →</a>
                @endauth
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container ft-inner">
            <div class="ft-copy">© 2026 T al en ta Traincom Indonesia. All rights reserved.</div>
            <div class="ft-links">
                   <a href="#" class="ft-link">Privacy Policy</a>
                <a href="#" class="ft-link">Terms of Service</a>
       
         <a href="#" class="ft-link">Support</a>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll',()=>{
            document.getElementById('navbar').classList.toggle('scrolled',window.scrollY>20);
        });
    </script>
</body>
</html>