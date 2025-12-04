<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Sakit Hewan Pendidikan - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --dark-color: #2c3e50;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .nav-link {
            color: var(--dark-color) !important;
            font-weight: 500;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-link.active {
            color: var(--primary-color) !important;
            border-bottom: 2px solid var(--primary-color);
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .header-logo {
            max-width: 500px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header .lead {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .btn-login {
            background: white;
            color: var(--primary-color);
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border: none;
            font-weight: 600;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            color: var(--primary-color);
            text-decoration: none;
        }

        /* Sections */
        .section {
            padding: 80px 0;
        }

        .section:nth-child(even) {
            background-color: var(--light-bg);
        }

        .section h2 {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
            position: relative;
        }

        .section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        /* Cards */
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .feature-card i {
            font-size: 2.5rem;
            margin-bottom: 20px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-card h5 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #6c757d;
            margin-bottom: 0;
        }

        /* Table */
        .table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table thead {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .table tbody tr:hover {
            background-color: rgba(102, 126, 234, 0.1);
        }

        /* Footer */
        .footer {
            background: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
        }

        .footer h3 {
            color: white;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .footer p {
            color: #bdc3c7;
            margin-bottom: 10px;
        }

        .footer a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: white;
        }

        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            color: #bdc3c7;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .header .lead {
                font-size: 1.1rem;
            }

            .section {
                padding: 60px 0;
            }
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="fas fa-heart-pulse me-2"></i>
                Rumah Sakit Hewan Pendidikan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home"><i class="fas fa-home me-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang"><i class="fas fa-info-circle me-1"></i>Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#struktur"><i class="fas fa-users me-1"></i>Struktur Organisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan"><i class="fas fa-hospital me-1"></i>Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#visi-misi"><i class="fas fa-bullseye me-1"></i>Visi & Misi</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <header class="header" id="home">
        <div class="container">
            <div class="header-content fade-in">
                <img
                    src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
                    alt="Logo Rumah Sakit Hewan Pendidikan"
                    class="header-logo" />
                <h1>Selamat Datang di Rumah Sakit Hewan Pendidikan</h1>
                <p class="lead">Sahabat terbaik bagi kesehatan hewan kesayangan Anda</p>
                <a href="{{ route('login') }}" class="btn-login">
                    <i class="fas fa-box-arrow-in-right me-2"></i>Mulai Layanan
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Tentang Kami Section -->
        <section id="tentang" class="section fade-in">
            <div class="container">
                <h2>Tentang Kami</h2>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <p class="lead">
                            Rumah Sakit Hewan Pendidikan didirikan pada tahun 2020 dengan
                            dedikasi untuk memberikan pelayanan kesehatan terbaik bagi
                            hewan peliharaan.
                        </p>
                        <p>
                            Kami percaya bahwa setiap hewan berhak mendapatkan perawatan yang
                            penuh kasih dan profesional. Tim kami terdiri dari dokter hewan
                            berpengalaman dan staf yang peduli, siap melayani Anda dan hewan
                            kesayangan Anda dengan sepenuh hati.
                        </p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check-circle text-success me-3 fs-5"></i>
                                    <span>Dokter Berpengalaman</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check-circle text-success me-3 fs-5"></i>
                                    <span>Perawatan 24 Jam</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check-circle text-success me-3 fs-5"></i>
                                    <span>Alat Modern</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check-circle text-success me-3 fs-5"></i>
                                    <span>Layanan Komprehensif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.youtube.com/embed/rCfvZPECZvE?si=QvhfUDJfd40C_ppY&controls=0"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Struktur Organisasi Section -->
        <section id="struktur" class="section fade-in">
            <div class="container">
                <h2>Struktur Organisasi</h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Dokter</th>
                                <th>Jabatan</th>
                                <th>Spesialisasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>dr. Andi Pratama, Sp.PD</strong></td>
                                <td>Kepala Instalasi Rawat Inap</td>
                                <td>Penyakit Dalam</td>
                            </tr>
                            <tr>
                                <td><strong>dr. Siti Rahmawati, Sp.A</strong></td>
                                <td>Dokter Spesialis Anak</td>
                                <td>Medis Hewan Anak</td>
                            </tr>
                            <tr>
                                <td><strong>dr. Budi Santoso, Sp.B</strong></td>
                                <td>Koordinator Bedah Umum</td>
                                <td>Bedah Hewan</td>
                            </tr>
                            <tr>
                                <td><strong>dr. Dewi Lestari, M.Kes</strong></td>
                                <td>Kepala Laboratorium</td>
                                <td>Diagnostik Laboratorium</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Layanan Section -->
        <section id="layanan" class="section fade-in">
            <div class="container">
                <h2>Layanan Kami</h2>
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-stethoscope"></i>
                            <h5 class="card-title">Pemeriksaan Kesehatan</h5>
                            <p class="card-text">Pemeriksaan rutin dan vaksinasi untuk menjaga kesehatan hewan Anda</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-cut"></i>
                            <h5 class="card-title">Bedah Minor & Mayor</h5>
                            <p class="card-text">Prosedur bedah dengan peralatan modern dan teknologi terkini</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-tooth"></i>
                            <h5 class="card-title">Perawatan Gigi</h5>
                            <p class="card-text">Layanan perawatan kesehatan gigi dan mulut hewan</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-hospital"></i>
                            <h5 class="card-title">Rawat Inap</h5>
                            <p class="card-text">Layanan perawatan inap dengan fasilitas lengkap</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-brush"></i>
                            <h5 class="card-title">Grooming & Penitipan</h5>
                            <p class="card-text">Layanan perawatan kecantikan dan penitipan hewan</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-ambulance"></i>
                            <h5 class="card-title">Darurat 24 Jam</h5>
                            <p class="card-text">Layanan darurat kapan saja untuk situasi mendesak</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi Misi Section -->
        <section id="visi-misi" class="section fade-in">
            <div class="container">
                <h2>Visi, Misi, dan Tujuan</h2>
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-eye"></i>
                            <h3 class="card-title">Visi</h3>
                            <p class="card-text">
                                Menjadi Rumah Sakit Hewan Pendidikan terdepan dan terpercaya di
                                Indonesia yang mengutamakan kesejahteraan hewan.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-bullseye"></i>
                            <h3 class="card-title">Misi</h3>
                            <p class="card-text">
                                Memberikan pelayanan medis veteriner berkualitas tinggi, edukasi
                                kepada pemilik hewan, dan menciptakan lingkungan yang nyaman bagi
                                pasien dan klien.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="feature-card">
                            <i class="fas fa-flag"></i>
                            <h3 class="card-title">Tujuan</h3>
                            <p class="card-text">
                                Meningkatkan kualitas hidup hewan peliharaan melalui pencegahan,
                                diagnosis, dan pengobatan penyakit secara komprehensif.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h3><i class="fas fa-map-marker-alt me-2"></i>Alamat</h3>
                    <p><strong>Alamat:</strong> Jl. Sahabat Satwa No. 123, Surabaya, Indonesia</p>
                    <p><strong>Telepon:</strong> (021) 123-4567</p>
                    <p><strong>Email:</strong> info@RumahSakitHP.com</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h3><i class="fas fa-clock me-2"></i>Jam Operasional</h3>
                    <p><strong>Senin - Jumat:</strong> 08:00 - 20:00</p>
                    <p><strong>Sabtu:</strong> 08:00 - 17:00</p>
                    <p><strong>Minggu & Hari Libur:</strong> 09:00 - 15:00</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h3><i class="fas fa-phone-alt me-2"></i>Darurat 24 Jam</h3>
                    <p><strong>Hotline:</strong> 0812-3456-7890</p>
                    <p>Siap membantu kapan saja</p>
                    <div class="mt-3 social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Rumah Sakit Hewan Pendidikan. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Active navigation highlighting
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('.section');
            const navLinks = document.querySelectorAll('.nav-link');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').slice(1) === current) {
                    link.classList.add('active');
                }
            });
        });

        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>

</html>