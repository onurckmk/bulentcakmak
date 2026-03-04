@extends('layouts.wrapper', ['title' => 'Yazar Hakkında'])

@section('content')
    <div class="about-author">

        {{-- HERO --}}
        <section class="aa-hero">
            <div class="container">
                <div class="aa-hero__inner">
                    <div class="aa-avatar" aria-hidden="true">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="aa-title">
                        <h1>Yazar Hakkında</h1>
                        <p>Finansal risk, banka perspektifi ve kurumsal finansal farkındalık üzerine notlar.</p>
                    </div>

                    <div class="aa-actions">
                        <a href="{{ url('/') }}" class="btn btn-primary aa-btn">
                            <i class="bi bi-journal-text me-2"></i> Blog’a Dön
                        </a>

                        <a href="mailto:bilgi@bulentcakmak.com" class="btn btn-outline-secondary aa-btn">
                            <i class="bi bi-envelope me-2"></i> İletişim
                        </a>
                    </div>

                    <div class="aa-social">
                        <a href="#" class="aa-social__item" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="aa-social__item" aria-label="X">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="aa-social__item" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="aa-social__item" aria-label="GitHub">
                            <i class="bi bi-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- CONTENT --}}
        <section class="aa-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9 col-xl-8">

                        <div class="aa-card">

                            {{-- NEW: PROFILE (photo + text) --}}
                            <div class="aa-profile">
                                <div class="aa-photo">
                                    <img src="{{ asset('bulentcakmak2.jpeg') }}"
                                         alt="Bülent Çakmak"
                                         loading="lazy">
                                </div>

                                <div class="aa-profile__text">
                                    <h2>Bülent Çakmak</h2>

                                    <p class="aa-lead">
                                        Yaklaşık otuz yıl boyunca bir kamu bankasında yönetici ve üst düzey yönetici olarak görev yapmıştır.
                                    </p>

                                    <p>
                                        Bankacılık kariyeri süresince farklı ölçek ve sektörlerdeki işletmelerin finansal yapıları,
                                        kredi değerlendirme süreçleri ve risk analizleri üzerine karar verici düzeyde sorumluluk üstlenmiştir.
                                    </p>

                                    <p class="mb-0">
                                        Çalışma alanı; şirketlerin finansal dayanıklılığı, borçlanma dengesi ve banka nezdindeki kredibilite değerlendirmesidir.
                                        Finansal tabloları yalnızca geçmiş performans göstergesi olarak değil, geleceğe ilişkin risk sinyalleri barındıran bir yapı olarak ele almaktadır.
                                    </p>
                                </div>
                            </div>

                            <div class="aa-divider"></div>

                            <div class="aa-grid">
                                <div class="aa-box">
                                    <div class="aa-box__title">
                                        <i class="bi bi-graph-up-arrow me-2"></i> Bu blogda neler var?
                                    </div>
                                    <ul class="aa-list">
                                        <li>Finansal risk değerlendirmesi</li>
                                        <li>Banka perspektifinden kredibilite</li>
                                        <li>Kurumsal finansal farkındalık</li>
                                        <li>Finansal tablolar üzerinden risk sinyalleri</li>
                                    </ul>
                                </div>

                                <div class="aa-box">
                                    <div class="aa-box__title">
                                        <i class="bi bi-shield-check me-2"></i> Yaklaşım
                                    </div>
                                    <p class="mb-0">
                                        Finansal tablolar; sadece geçmişi anlatan belgeler değil, aynı zamanda geleceğe dair risk işaretleri taşıyan bir “erken uyarı sistemi”dir.
                                        İçerikler bu bakış açısıyla, pratik ve anlaşılır bir çerçevede hazırlanır.
                                    </p>
                                </div>

                                <div class="aa-box aa-box--soft">
                                    <div class="aa-box__title">
                                        <i class="bi bi-chat-dots me-2"></i> İletişim / İş Birliği
                                    </div>
                                    <p class="mb-3">
                                        Finansal risk, kurumsal değerlendirme veya içerik önerileri için iletişime geçebilirsiniz.
                                    </p>
                                    <a href="mailto:bilgi@bulentcakmak.com" class="btn btn-dark aa-btn aa-btn--dark">
                                        <i class="bi bi-send me-2"></i> Mail Gönder
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <style>
        /* =========================
           FRONTEND: ABOUT AUTHOR
           Minimal / Editorial Look
           ========================= */

        .about-author{ background:#fff; }

        .aa-hero{
            position: relative;
            padding: 56px 0 34px;
            background:
                radial-gradient(1200px 480px at 50% 0%, rgba(13,110,253,.14), transparent 60%),
                linear-gradient(180deg, rgba(15,23,42,.04), rgba(15,23,42,0));
        }

        .aa-hero__inner{
            max-width: 880px;
            margin: 0 auto;
            text-align: center;
        }

        .aa-avatar{
            width: 74px;
            height: 74px;
            margin: 0 auto 14px;
            border-radius: 999px;
            display:grid;
            place-items:center;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.08);
            box-shadow: 0 18px 50px rgba(15,23,42,.06);
        }

        .aa-avatar i{
            font-size: 34px;
            color:#0f172a;
            opacity:.75;
        }

        .aa-title h1{
            font-weight: 950;
            letter-spacing: -.03em;
            margin: 0 0 6px;
            color:#0f172a;
            line-height: 1.1;
        }

        .aa-title p{
            margin: 0;
            color:#64748b;
            font-size: 1.05rem;
        }

        .aa-actions{
            display:flex;
            gap: 10px;
            justify-content:center;
            flex-wrap: wrap;
            margin-top: 18px;
        }

        .aa-btn{
            border-radius: 999px;
            padding: .62rem 1.05rem;
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .aa-btn--dark{
            border-radius: 12px;
            padding: .7rem 1rem;
            font-weight: 900;
        }

        .aa-social{
            display:flex;
            justify-content:center;
            gap: 10px;
            margin-top: 18px;
        }

        .aa-social__item{
            width: 40px;
            height: 40px;
            border-radius: 999px;
            display:grid;
            place-items:center;
            text-decoration:none;
            color:#0f172a;
            background: rgba(15,23,42,.03);
            border: 1px solid rgba(15,23,42,.07);
            transition: transform .15s ease, background .15s ease, border-color .15s ease;
        }

        .aa-social__item:hover{
            transform: translateY(-2px);
            background: rgba(13,110,253,.08);
            border-color: rgba(13,110,253,.18);
            color:#0b3ea8;
        }

        .aa-content{ padding: 22px 0 60px; }

        .aa-card{
            border-radius: 18px;
            background: #fff;
            border: 1px solid rgba(15,23,42,.08);
            box-shadow: 0 24px 70px rgba(15,23,42,.06);
            padding: 22px;
        }

        @media (min-width: 992px){
            .aa-card{ padding: 28px; }
            .aa-hero{ padding: 66px 0 38px; }
        }

        /* NEW: profile layout */
        .aa-profile{
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            align-items: start;
        }

        @media (min-width: 992px){
            .aa-profile{
                grid-template-columns: 240px 1fr;
                gap: 20px;
            }
        }

        .aa-photo{
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid rgba(15,23,42,.08);
            background: rgba(15,23,42,.02);
            box-shadow: 0 18px 50px rgba(15,23,42,.06);
        }

        .aa-photo img{
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .aa-profile__text h2{
            font-weight: 950;
            letter-spacing: -.03em;
            color:#0f172a;
            margin: 0 0 10px;
            line-height: 1.2;
        }

        .aa-lead{
            margin: 0 0 10px;
            color:#334155;
            line-height: 1.85;
            font-size: 1.02rem;
            font-weight: 700;
        }

        .aa-profile__text p{
            margin: 0 0 10px;
            color:#475569;
            line-height: 1.85;
            font-size: 1.02rem;
        }

        .aa-divider{
            height: 1px;
            background: rgba(15,23,42,.08);
            margin: 18px 0;
        }

        .aa-grid{
            display:grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        @media (min-width: 992px){
            .aa-grid{ grid-template-columns: 1fr 1fr; }
            .aa-box--soft{ grid-column: 1 / -1; }
        }

        .aa-box{
            border-radius: 16px;
            border: 1px solid rgba(15,23,42,.08);
            background: rgba(15,23,42,.02);
            padding: 16px;
        }

        .aa-box--soft{
            background:
                radial-gradient(900px 240px at 15% 0%, rgba(13,110,253,.12), transparent 60%),
                rgba(15,23,42,.02);
        }

        .aa-box__title{
            font-weight: 900;
            letter-spacing: -.02em;
            color:#0f172a;
            margin-bottom: 10px;
            display:flex;
            align-items:center;
        }

        .aa-list{
            margin: 0;
            padding-left: 18px;
            color:#475569;
            line-height: 1.85;
        }
    </style>
@endsection
