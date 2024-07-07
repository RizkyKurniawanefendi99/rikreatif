<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Portofolio Filmmaker</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 25px;
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            z-index: 100;
        }

        .navbar a {
            text-decoration: none;
            color: #333;
            margin: 0 10px;
            font-weight: bold;
        }

        .slider {
            position: relative;
            width: 100%;
            height: 80vh;
            overflow: hidden;
            padding: 20px;
            box-sizing: border-box;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
            height: 100%;
            padding: 10px;
        }

        .slide img,
        .slide iframe {
            width: 100%;
            height: 100%;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .header {
            text-align: center;
            padding: 40px 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 3em;
            margin: 0;
            color: #333;
        }

        .header p {
            font-size: 1.2em;
            color: #666;
        }

        .header .profile-img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            background: url('{{ asset('images/profile.jpg') }}') no-repeat center center;
            background-size: cover;
            margin: 20px auto;
            transition: transform 0.3s ease-in-out;
        }

        .header .profile-img:hover {
            transform: scale(1.1);
        }

        .header .button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff6600;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            padding: 40px 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            animation: fadeInUp 1s;
            flex-wrap: wrap;
        }

        .stats .card {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 25%;
            transition: transform 0.3s ease-in-out;
        }

        .stats .card:hover {
            transform: scale(1.05);
        }

        .stats h3 {
            margin: 0;
            font-size: 2em;
            color: #ff6600;
            counter-reset: count;
        }

        .stats p {
            margin: 0;
            font-size: 1em;
            color: #fff;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content {
            padding: 40px 20px;
            background-color: #f9f9f9;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .about {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex-wrap: wrap;
        }

        .about .text {
            width: 60%;
            padding: 10px;
        }

        .about .profile-img {
            width: 30%;
            height: auto;
            padding: 10px;
        }

        .skills,
        .services {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .skills .skill,
        .services .service {
            width: 45%;
            background-color: #fff;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .skills .skill h3,
        .services .service h3 {
            margin-top: 0;
            color: #ff6600;
        }

        .skill-bar {
            position: relative;
            display: block;
            width: 100%;
            height: 10px;
            background: #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .skill-bar div {
            height: 100%;
            border-radius: 5px;
            animation: skill-animation 2s ease-in-out;
        }

        .skill-bar div[data-percent="95%"] {
            width: 95%;
            background-color: #ff6600;
        }

        .skill-bar div[data-percent="90%"] {
            width: 90%;
            background-color: #ff9900;
        }

        .skill-bar div[data-percent="85%"] {
            width: 85%;
            background-color: #ffcc00;
        }

        @keyframes skill-animation {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        .portfolio {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .portfolio .portfolio-item {
            width: 30%;
            margin: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .portfolio .portfolio-item iframe {
            width: 100%;
            height: 200px;
            border: none;
        }

        .contact {
            background-color: #fff;
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .contact h2 {
            margin-top: 0;
            color: #ff6600;
        }

        .contact p {
            color: #666;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        @media (max-width: 768px) {
            .navbar {
                width: 90%;
                padding: 10px 20px;
            }

            .stats .card,
            .skills .skill,
            .services .service,
            .portfolio .portfolio-item {
                width: 100%;
                margin: 10px 0;
            }

            .about {
                flex-direction: column;
                text-align: center;
            }

            .about .text,
            .about .profile-img {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="menu">
            <a href="#">Beranda</a>
            <a href="#">Layanan</a>
            <a href="#">Portofolio</a>
            <a href="about" class="button">Tentang</a>
            <a href="#">Kontak</a>
        </div>
    </div>

    <div class="slider">
        <div class="slides">
            <div class="slide">
                <iframe width="1920" height="1080" src="https://www.youtube.com/embed/l9SkZKZemM8" frameborder="0"
                    allowfullscreen></iframe>
            </div>
            <div class="slide">
                <img src="{{ asset('images/slide1.jpg') }}" alt="Gambar 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/slide2.jpg') }}" alt="Gambar 2">
            </div>
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <div class="header">
        <div class="profile-img"></div>
        <h1>Rizky Kurniawan Efendi</h1>
        <p>Filmmaker Profesional</p>
        <a href="#contact" class="button">Hubungi Saya</a>
    </div>

    <div class="stats">
        <div class="card">
            <h3 data-count="10">0</h3>
            <p>Tahun Pengalaman</p>
        </div>
        <div class="card">
            <h3 data-count="50">0</h3>
            <p>Film Pendek</p>
        </div>
        <div class="card">
            <h3 data-count="20">0</h3>
            <p>Penghargaan</p>
        </div>
    </div>

    <div class="content">
        <div class="section about">
            <h2>Tentang Saya</h2>
            <div class="text">
                <p>Halo! Saya Rizky Kurniawan Efendi, seorang filmmaker profesional dengan pengalaman lebih dari 10
                    tahun di industri ini. Saya telah mengarahkan dan memproduksi berbagai film pendek yang mendapatkan
                    pengakuan dan penghargaan. Keahlian saya meliputi penyutradaraan, penulisan naskah, dan editing
                    video. Mari bekerja sama untuk menciptakan karya yang menginspirasi!</p>
            </div>
            <img src="{{ asset('images/profile-pic.jpg') }}" alt="Rizky Kurniawan Efendi" class="profile-img">
        </div>

        <div class="section skills">
            <h2>Keahlian Saya</h2>
            <div class="skill">
                <h3>Penyutradaraan</h3>
                <div class="skill-bar">
                    <div data-percent="95%"></div>
                </div>
            </div>
            <div class="skill">
                <h3>Penulisan Naskah</h3>
                <div class="skill-bar">
                    <div data-percent="90%"></div>
                </div>
            </div>
            <div class="skill">
                <h3>Editing Video</h3>
                <div class="skill-bar">
                    <div data-percent="85%"></div>
                </div>
            </div>
        </div>

        <div class="section journey">
            <h2>Perjalanan Karier Saya</h2>
            <div class="card">
                <h3>Pendidikan</h3>
                <p>Sarjana Seni Film - Universitas Seni Indonesia</p>
                <p>Magister Seni Film - Universitas Film Dunia</p>
            </div>
            <div class="card">
                <h3>Pengalaman</h3>
                <p>Penyutradaraan - Film Indonesia</p>
                <p>Penulisan Naskah - Produksi Internasional</p>
                <p>Editing Video - Studio Kreatif</p>
            </div>
        </div>

        <div class="section services">
            <h2>Layanan yang Saya Tawarkan</h2>
            <div class="service">
                <h3>Penyutradaraan</h3>
                <p>Menyutradarai film dengan sentuhan artistik yang kuat untuk menghasilkan karya yang menginspirasi.
                </p>
            </div>
            <div class="service">
                <h3>Penulisan Naskah</h3>
                <p>Membuat naskah yang menarik dan orisinal untuk berbagai genre film.</p>
            </div>
            <div class="service">
                <h3>Editing Video</h3>
                <p>Mengedit video dengan profesionalisme tinggi untuk menciptakan alur cerita yang kuat.</p>
            </div>
            <div class="service">
                <h3>Produksi Film</h3>
                <p>Menyediakan layanan produksi film lengkap mulai dari pra-produksi hingga pasca-produksi.</p>
            </div>
        </div>

        <div class="section portfolio">
            <h2>Karya Terbaru</h2>
            <div class="portfolio-item">
                <iframe src="https://www.youtube.com/embed/VIDEO_ID_1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="portfolio-item">
                <iframe src="https://www.youtube.com/embed/VIDEO_ID_2" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="portfolio-item">
                <iframe src="https://www.youtube.com/embed/VIDEO_ID_3" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="portfolio-item">
                <iframe src="https://www.youtube.com/embed/VIDEO_ID_4" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="section testimonials">
            <h2>Apa Kata Klien</h2>
            <div class="testimonial card">
                <p>"Rizky Kurniawan Efendi adalah filmmaker yang sangat berbakat. Karya-karyanya selalu menginspirasi
                    dan memberikan pesan yang mendalam."</p>
                <p>- Nama Klien</p>
            </div>
            <div class="testimonial card">
                <p>"Bekerja dengan Rizky adalah pengalaman yang luar biasa. Dia memiliki visi yang jelas dan selalu
                    menghasilkan karya berkualitas tinggi."</p>
                <p>- Nama Klien</p>
            </div>
        </div>

        <div class="section updates">
            <h2>Pembaruan Terbaru</h2>
            <div class="update card">
                <img src="{{ asset('images/update1.jpg') }}" alt="Pembaruan 1">
                <p>10/07/2024 - Merilis film pendek terbaru dengan tema kemanusiaan.</p>
            </div>
            <div class="update card">
                <img src="{{ asset('images/update2.jpg') }}" alt="Pembaruan 2">
                <p>05/07/2024 - Mengadakan workshop penulisan naskah untuk pemula.</p>
            </div>
            <div class="update card">
                <img src="{{ asset('images/update3.jpg') }}" alt="Pembaruan 3">
                <p>01/07/2024 - Webinar gratis tentang teknik editing video untuk profesional.</p>
            </div>
        </div>
    </div>

    <div class="contact" id="contact">
        <h2>Hubungi Saya</h2>
        <p>Ada proyek dalam pikiran? Mari kita bahas bagaimana saya bisa membantu Anda mencapai tujuan Anda.</p>
        <a href="mailto:contact@example.com" class="button">Hubungi Saya</a>
    </div>

    <div class="footer">
        <p>© 2024 Portofolio Rizky Kurniawan Efendi. Semua hak dilindungi.</p>
        <p>Jl. Contoh No. 123, Kota, Negara</p>
        <p>Email: contact@example.com | Telepon: +62 123 4567 890</p>
    </div>

    <script>
        // Count animation for statistics
        document.querySelectorAll('.stats h3').forEach((stat) => {
            let count = 0;
            const updateCount = () => {
                const target = +stat.getAttribute('data-count');
                const speed = 200; // speed of the count animation
                const increment = target / speed;
                count += increment;
                if (count < target) {
                    stat.innerText = Math.ceil(count);
                    requestAnimationFrame(updateCount);
                } else {
                    stat.innerText = target;
                }
            };
            requestAnimationFrame(updateCount);
        });

        // Slider functionality
        let currentSlide = 0;

        function showSlide(index) {
            const slides = document.querySelector('.slides');
            const totalSlides = slides.children.length;

            if (index >= totalSlides) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = totalSlides - 1;
            } else {
                currentSlide = index;
            }

            const offset = -currentSlide * 100;
            slides.style.transform = `translateX(${offset}%)`;
        }

        function moveSlide(direction) {
            showSlide(currentSlide + direction);
        }

        document.querySelector('.prev').addEventListener('click', () => moveSlide(-1));
        document.querySelector('.next').addEventListener('click', () => moveSlide(1));

        setInterval(() => moveSlide(1), 5000);
    </script>
</body>

</html>
