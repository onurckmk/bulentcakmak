<footer class="site-footer mt-5">
    <div class="container">

        {{-- TOP --}}
        <div class="footer-top">
            <div class="row g-4 g-lg-5 align-items-start">

                {{-- BRAND / ABOUT --}}
                <div class="col-12 col-lg-5">
                    <a href="{{ route('main.index') }}" class="footer-brand" aria-label="Ana sayfa">
                        <img
                            src="{{ asset('bulentcakmak_logo.png') }}"
                            alt="Bülent Çakmak"
                            class="footer-brand__logo"
                            loading="lazy"
                        >
                    </a>

                    <p class="footer-desc">
                        Finansal risk analizi ve banka kredibilitesi yönetimi alanında uzman bir danışmanın; güvenilir,
                        veriye dayalı ve uygulanabilir içerik paylaşımları.
                    </p>

                    <div class="footer-cta">
                        <a href="{{ route('main.index') }}" class="btn btn-footer-primary">
                            <i class="bi bi-house me-2"></i> Ana Sayfa
                        </a>
                        <a href="{{ route('contact.index') }}" class="btn btn-footer-soft">
                            <i class="bi bi-envelope me-2"></i> İletişim
                        </a>
                    </div>
                </div>

                {{-- NAVIGATION --}}
                <div class="col-6 col-lg-3">
                    <div class="footer-box">
                        <div class="footer-box__title">Gezinme</div>
                        <ul class="footer-links">
                            <li><a href="{{ route('main.index') }}"><i class="bi bi-chevron-right"></i> Ana Sayfa</a>
                            </li>
                            <li><a href="{{ route('about.index') }}"><i class="bi bi-chevron-right"></i> Uzman Hakkında</a>
                            </li>
                            <li><a href="{{ route('contact.index') }}"><i class="bi bi-chevron-right"></i> İletişim</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- SOCIAL --}}
                <div class="col-6 col-lg-4">
                    <div class="footer-box">
                        <div class="footer-box__title">Sosyal</div>

                        <div class="social-grid">

                            <a href="#" class="social-pill" aria-label="LinkedIn">
                                <i class="bi bi-linkedin"></i>
                                <span>LinkedIn</span>
                            </a>

                        </div>

                        <div class="footer-note mt-3">
                            <i class="bi bi-shield-check me-2"></i>
                            Güvenli oturum ve modern arayüz standartları ile hazırlanmıştır.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- BOTTOM --}}
        <div class="footer-bottom">
            <div class="d-flex flex-column flex-md-row gap-2 justify-content-between align-items-center">
                <div class="footer-copy">
                    © {{ date('Y') }} <strong>BÜLENT ÇAKMAK - Finans Ve Kredibilite Yönetimi sayfası - Eva Creatives
                        tarafından ❤️ ile tasarlanmıştır.</strong>. Tüm hakları saklıdır.
                </div>

                <div class="footer-mini-links">
                    <a href="{{ route('about.index') }}">Hakkında</a>
                    <span class="dot"></span>
                    <a href="{{ route('contact.index') }}">İletişim</a>
                </div>
            </div>
        </div>

    </div>
</footer>

<style>
    /* =========================
       FRONTEND FOOTER (Modern)
       ========================= */
    .site-footer {
        background: radial-gradient(800px 340px at 20% 0%, rgba(13, 110, 253, .22), transparent 55%),
        radial-gradient(700px 320px at 80% 20%, rgba(0, 195, 255, .14), transparent 55%),
        linear-gradient(160deg, #0b1220 0%, #070b13 70%, #060810 100%);
        border-top: 1px solid rgba(255, 255, 255, .08);
        padding: 46px 0 16px;
        position: relative;
        overflow: hidden;
    }

    .site-footer:before {
        content: "";
        position: absolute;
        inset: -1px;
        background: radial-gradient(600px 220px at 50% 0%, rgba(255, 255, 255, .06), transparent 60%);
        pointer-events: none;
    }

    .footer-top {
        position: relative;
        z-index: 2;
        padding-bottom: 26px;
    }

    .footer-bottom {
        position: relative;
        z-index: 2;
        border-top: 1px solid rgba(255, 255, 255, .10);
        padding-top: 16px;
    }

    /* BRAND */
    .footer-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        color: #fff;
        margin-bottom: 14px;
    }

    .footer-brand__mark {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: rgba(13, 110, 253, .16);
        border: 1px solid rgba(13, 110, 253, .20);
        font-weight: 950;
        letter-spacing: -.03em;
        color: #dbeafe;
    }

    .footer-brand__text {
        display: flex;
        flex-direction: column;
        line-height: 1.15;
    }

    .footer-brand__title {
        font-weight: 950;
        letter-spacing: -.03em;
        font-size: 1.15rem;
    }

    .footer-brand__sub {
        color: rgba(255, 255, 255, .70);
        font-size: .92rem;
        margin-top: 2px;
    }

    .footer-desc {
        color: rgba(255, 255, 255, .72);
        max-width: 520px;
        margin: 0 0 14px 0;
        line-height: 1.6;
    }

    .footer-cta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-footer-primary {
        display: inline-flex;
        align-items: center;
        padding: .55rem .95rem;
        border-radius: 999px;
        background: #0d6efd;
        color: #fff;
        text-decoration: none;
        font-weight: 850;
        border: 1px solid rgba(13, 110, 253, .55);
        box-shadow: 0 18px 60px rgba(13, 110, 253, .22);
    }

    .btn-footer-primary:hover {
        filter: brightness(.98);
        color: #fff;
    }

    .btn-footer-soft {
        display: inline-flex;
        align-items: center;
        padding: .55rem .95rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, .06);
        color: #fff;
        text-decoration: none;
        font-weight: 850;
        border: 1px solid rgba(255, 255, 255, .12);
    }

    .btn-footer-soft:hover {
        background: rgba(255, 255, 255, .09);
        color: #fff;
    }

    /* BOX */
    .footer-box {
        background: rgba(255, 255, 255, .04);
        border: 1px solid rgba(255, 255, 255, .10);
        border-radius: 18px;
        padding: 16px 16px;
        backdrop-filter: blur(10px);
    }

    .footer-box__title {
        color: #fff;
        font-weight: 950;
        letter-spacing: -.02em;
        margin-bottom: 12px;
    }

    /* LINKS */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .footer-links a {
        color: rgba(255, 255, 255, .74);
        text-decoration: none;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: transform .15s ease, color .15s ease, opacity .15s ease;
    }

    .footer-links a i {
        color: rgba(255, 255, 255, .40);
    }

    .footer-links a:hover {
        color: #fff;
        transform: translateX(2px);
    }

    /* SOCIAL */
    .social-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .social-pill {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: .6rem .75rem;
        border-radius: 14px;
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .12);
        color: #fff;
        text-decoration: none;
        font-weight: 850;
        transition: transform .15s ease, background .15s ease, border-color .15s ease;
    }

    .social-pill i {
        width: 34px;
        height: 34px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        background: rgba(13, 110, 253, .16);
        border: 1px solid rgba(13, 110, 253, .20);
    }

    .social-pill:hover {
        transform: translateY(-1px);
        background: rgba(255, 255, 255, .09);
        border-color: rgba(255, 255, 255, .18);
    }

    .footer-note {
        color: rgba(255, 255, 255, .66);
        font-size: .95rem;
    }

    /* BOTTOM */
    .footer-copy {
        color: rgba(255, 255, 255, .65);
    }

    .footer-mini-links {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, .55);
    }

    .footer-mini-links a {
        color: rgba(255, 255, 255, .72);
        text-decoration: none;
        font-weight: 800;
    }

    .footer-mini-links a:hover {
        color: #fff;
    }

    .footer-mini-links .dot {
        width: 5px;
        height: 5px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .30);
    }


    .footer-brand {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .footer-brand__logo {
        height: 42px; /* istersen 46-52 yapabiliriz */
        width: auto;
        max-width: 260px;
        object-fit: contain;
        display: block;
        filter: drop-shadow(0 14px 40px rgba(0, 0, 0, .45));
    }

    /* Footer koyu olduğu için logo koyuysa görünmeyebilir:
       gerekirse aşağıdakini aç */
    /* .footer-brand__logo{ filter: brightness(0) invert(1) drop-shadow(0 14px 40px rgba(0,0,0,.45)); } */

    @media (max-width: 576px) {
        .footer-brand__logo {
            height: 38px;
            max-width: 210px;
        }
    }
</style>
