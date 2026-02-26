@extends('layouts.wrapper', ['title' => 'İletişim'])

@section('content')

    <main class="contact-page">

        {{-- HERO --}}
        <section class="contact-hero">
            <div class="container" data-aos="fade-up">
                <div class="contact-hero__inner">
                    <div class="contact-badge">
                        <i class="bi bi-chat-dots me-2"></i> İletişim
                    </div>
                    <h1 class="contact-title">Bizimle İletişime Geç</h1>
                    <p class="contact-sub">Soruların, iş birliği taleplerin veya önerilerin için tek tık uzağındayız.</p>
                </div>
            </div>
        </section>

        {{-- CONTENT --}}
        <section class="contact-content">
            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-9">

                        <div class="contact-shell" data-aos="fade-up">
                            <div class="row g-3 g-lg-4">

                                {{-- EMAIL --}}
                                <div class="col-12 col-md-6">
                                    <a class="contact-card" href="mailto:mail@gmail.com">
                                        <div class="contact-card__icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        <div class="contact-card__body">
                                            <div class="contact-card__title">E-posta</div>
                                            <div class="contact-card__value">bilgi@bulentcakmak.com</div>
                                            <div class="contact-card__hint">Mail göndermek için tıklayınız.</div>
                                        </div>
                                        <div class="contact-card__arrow" aria-hidden="true">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>

                                {{-- WHATSAPP --}}
                                <div class="col-12 col-md-6">
                                    <a class="contact-card"
                                       href="https://wa.me/905323247357?text={{ urlencode('Merhaba, blog sayfanız üzerinden iletişime geçiyorum.') }}"
                                       target="_blank" rel="noopener">
                                        <div class="contact-card__icon wa">
                                            <i class="bi bi-whatsapp"></i>
                                        </div>
                                        <div class="contact-card__body">
                                            <div class="contact-card__title">WhatsApp</div>
                                            <div class="contact-card__value">+90 532 324 73 57</div>
                                            <div class="contact-card__hint">Mesaj gönder</div>
                                        </div>
                                        <div class="contact-card__arrow" aria-hidden="true">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="contact-foot">
                                <div class="contact-foot__note">
                                    <i class="bi bi-shield-check me-2"></i>
                                    Mesajların mümkün olan en kısa sürede yanıtlanır.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>

    <style>
        /* =========================
           FRONTEND: CONTACT PAGE
           ========================= */

        .contact-page{ background:#fff; }

        /* HERO */
        .contact-hero{
            padding: 56px 0 18px;
            background:
                radial-gradient(1200px 420px at 50% 0%, rgba(13,110,253,.12), transparent 60%),
                linear-gradient(180deg, rgba(15,23,42,.04), rgba(15,23,42,0));
        }
        .contact-hero__inner{
            max-width: 920px;
            margin: 0 auto;
            text-align: center;
        }
        .contact-badge{
            display:inline-flex;
            align-items:center;
            padding: .45rem .85rem;
            border-radius: 999px;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            font-weight: 900;
            letter-spacing: -.01em;
            margin-bottom: 12px;
        }
        .contact-title{
            margin: 0 0 10px;
            font-weight: 950;
            letter-spacing: -.03em;
            color:#0f172a;
            line-height: 1.1;
        }
        .contact-sub{
            margin: 0;
            color:#64748b;
            font-size: 1.03rem;
        }

        /* CONTENT */
        .contact-content{
            padding: 18px 0 62px;
        }

        /* SHELL */
        .contact-shell{
            border-radius: 22px;
            border: 1px solid rgba(15,23,42,.08);
            background: rgba(255,255,255,.82);
            box-shadow: 0 28px 80px rgba(15,23,42,.08);
            padding: 16px;
        }
        @media (min-width: 992px){
            .contact-shell{ padding: 22px; }
        }

        /* CARD */
        .contact-card{
            display:flex;
            align-items:center;
            gap: 14px;
            padding: 16px 16px;
            border-radius: 18px;
            border: 1px solid rgba(15,23,42,.08);
            background:#fff;
            box-shadow: 0 22px 60px rgba(15,23,42,.06);
            text-decoration:none;
            transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease;
            height: 100%;
        }
        .contact-card:hover{
            transform: translateY(-2px);
            border-color: rgba(13,110,253,.25);
            box-shadow: 0 28px 70px rgba(15,23,42,.10);
        }

        .contact-card__icon{
            width: 46px;
            height: 46px;
            border-radius: 14px;
            display:grid;
            place-items:center;
            background: rgba(13,110,253,.10);
            border: 1px solid rgba(13,110,253,.18);
            color:#0b3ea8;
            flex: 0 0 auto;
            font-size: 1.15rem;
        }
        .contact-card__icon.tg{
            background: rgba(13,202,240,.12);
            border-color: rgba(13,202,240,.22);
            color: #087990;
        }
        .contact-card__icon.vk{
            background: rgba(102,16,242,.10);
            border-color: rgba(102,16,242,.20);
            color: #4c1d95;
        }
        .contact-card__icon.wa{
            background: rgba(25,135,84,.12);
            border-color: rgba(25,135,84,.22);
            color: #0f5132;
        }

        .contact-card__body{
            min-width: 0;
            flex: 1;
        }
        .contact-card__title{
            color:#0f172a;
            font-weight: 950;
            letter-spacing: -.02em;
            line-height: 1.2;
            margin-bottom: 4px;
            font-size: 1.02rem;
        }
        .contact-card__value{
            color:#0f172a;
            font-weight: 800;
            letter-spacing: -.01em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .contact-card__hint{
            margin-top: 4px;
            color:#64748b;
            font-size: .92rem;
        }

        .contact-card__arrow{
            width: 36px;
            height: 36px;
            border-radius: 999px;
            display:grid;
            place-items:center;
            background: rgba(15,23,42,.03);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            flex: 0 0 auto;
        }

        /* FOOT */
        .contact-foot{
            margin-top: 14px;
            padding-top: 14px;
            border-top: 1px solid rgba(15,23,42,.08);
        }
        .contact-foot__note{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:.35rem;
            color:#64748b;
            font-size: .95rem;
            text-align:center;
        }
    </style>

@endsection
