<div class="nr-header">

    {{-- BREAKING TICKER --}}
    <div class="nr-ticker">
        <div class="container">
            <div class="nr-ticker__inner">
                <span class="nr-ticker__badge">
                    <i class="bi bi-lightning-charge-fill me-2"></i> SON DAKİKA
                </span>

                <div class="nr-ticker__track" aria-label="Haber şeridi">
                    <div class="nr-ticker__marquee">
                        <span>Yeni içerikler yayında • Güncel paylaşımlar için takipte kalın • </span>
                        <span>Yeni içerikler yayında • Güncel paylaşımlar için takipte kalın • </span>
                        <span>Yeni içerikler yayında • Güncel paylaşımlar için takipte kalın • </span>
                    </div>
                </div>

                <div class="nr-ticker__right d-none d-md-flex">
                    <span class="nr-pill">
                        <i class="bi bi-clock me-2"></i> {{ now()->format('d.m.Y') }}
                    </span>
                    <span class="nr-pill">
                        <i class="bi bi-arrow-repeat me-2"></i> Güncellendi
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- MAIN HEADER --}}
    <header class="nr-main">
        <div class="container">
            <div class="nr-main__inner">

                {{-- LEFT: Menu + quick --}}
                <div class="nr-left">
                    <button class="nr-menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#nrMenu" aria-controls="nrMenu">
                        <i class="bi bi-list"></i>
                        <span class="d-none d-md-inline">Menü</span>
                    </button>

                    <a class="nr-quick d-none d-md-inline-flex" href="{{ route('main.index') }}">
                        <i class="bi bi-house me-2"></i> Ana Sayfa
                    </a>
                </div>

                {{-- CENTER: Brand --}}
                <a class="nr-brand" href="{{ route('main.index') }}" aria-label="Ana sayfa">
                    <img
                        src="{{ asset('bulentcakmak_logo.png') }}"
                        alt="Bülent Çakmak"
                        class="nr-brand__logo"
                        loading="lazy"
                    >
                </a>

                {{-- RIGHT: Search + account --}}
                <div class="nr-right">
                    <div class="nr-search d-none d-lg-flex">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Ara: yazı, kategori, etiket...">
                    </div>


                </div>

            </div>
        </div>
    </header>

    {{-- CATEGORY NAV --}}


    {{-- OFFCANVAS MENU --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="nrMenu" aria-labelledby="nrMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="nrMenuLabel">Menü</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Kapat"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-grid gap-2">
                <a class="btn btn-outline-secondary" href="{{ route('main.index') }}">Ana Sayfa</a>
                <a class="btn btn-outline-secondary" href="{{ route('about.index') }}">Uzman Hakkında</a>
                <a class="btn btn-outline-secondary" href="{{ route('contact.index') }}">İletişim</a>
            </div>
        </div>
    </div>

</div>

<style>
    /* ========= Newsroom Header ========= */
    .nr-header{ position:relative; z-index:80; }

    /* ticker */
    .nr-ticker{
        background:
            radial-gradient(900px 240px at 20% 0%, rgba(13,110,253,.22), transparent 60%),
            linear-gradient(160deg, #0b1220 0%, #07101c 55%, #050a12 100%);
        border-bottom: 1px solid rgba(255,255,255,.10);
        color: rgba(255,255,255,.92);
    }
    .nr-ticker__inner{
        display:flex; align-items:center; gap:12px;
        padding: 10px 0;
    }
    .nr-ticker__badge{
        display:inline-flex; align-items:center;
        padding:.38rem .7rem;
        border-radius:999px;
        background: rgba(255,255,255,.10);
        border:1px solid rgba(255,255,255,.14);
        font-weight:950;
        white-space:nowrap;
    }
    .nr-ticker__track{
        flex:1; min-width:0;
        overflow:hidden;
        border-radius:999px;
        background: rgba(255,255,255,.06);
        border:1px solid rgba(255,255,255,.12);
    }
    .nr-ticker__marquee{
        display:inline-block;
        white-space:nowrap;
        padding: .45rem .8rem;
        color: rgba(255,255,255,.75);
        font-weight:750;
        animation: nr-marquee 18s linear infinite;
    }
    @keyframes nr-marquee{
        0%{ transform: translateX(0); }
        100%{ transform: translateX(-50%); }
    }
    .nr-ticker__right{ display:flex; gap:8px; }
    .nr-pill{
        display:inline-flex; align-items:center;
        padding:.38rem .7rem;
        border-radius:999px;
        background: rgba(255,255,255,.10);
        border:1px solid rgba(255,255,255,.14);
        font-weight:850;
        color: rgba(255,255,255,.88);
    }

    /* main */
    .nr-main{
        background:
            radial-gradient(1200px 360px at 50% -20%, rgba(13,110,253,.18), transparent 60%),
            linear-gradient(160deg, #0b1220 0%, #07101c 55%, #050a12 100%);
        border-bottom: 1px solid rgba(255,255,255,.10);
        box-shadow: 0 22px 80px rgba(0,0,0,.55);
    }
    .nr-main__inner{
        display:grid;
        grid-template-columns: 260px 1fr 320px;
        gap: 14px;
        align-items:center;
        padding: 14px 0;
    }

    /* left */
    .nr-left{ display:flex; align-items:center; gap:10px; }
    .nr-menu-btn{
        display:inline-flex; align-items:center; gap:10px;
        padding:.55rem .85rem;
        border-radius:999px;
        background: rgba(255,255,255,.08);
        border:1px solid rgba(255,255,255,.14);
        color: rgba(255,255,255,.92);
        font-weight:950;
    }
    .nr-menu-btn i{ font-size: 1.2rem; }
    .nr-quick{
        display:inline-flex; align-items:center;
        padding:.55rem .85rem;
        border-radius:999px;
        background: rgba(255,255,255,.06);
        border:1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.88);
        text-decoration:none;
        font-weight:900;
    }
    .nr-quick:hover{ background: rgba(255,255,255,.08); color:#fff; }

    /* brand */
    .nr-brand{
        display:flex; align-items:center; justify-content:center;
        gap:12px;
        text-decoration:none;
        color: rgba(255,255,255,.92);
        min-width:0;
    }
    .nr-brand__mark{
        width:44px; height:44px;
        border-radius:16px;
        display:grid; place-items:center;
        background: rgba(13,110,253,.18);
        border:1px solid rgba(13,110,253,.30);
        color:#cfe2ff;
        font-weight:950;
    }
    .nr-brand__text{ display:flex; flex-direction:column; line-height:1.1; min-width:0; }
    .nr-brand__title{
        font-weight:950;
        letter-spacing:-.03em;
        font-size:1.2rem;
        white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
    }
    .nr-brand__sub{ color: rgba(255,255,255,.58); font-size:.92rem; margin-top:2px; }

    /* right */
    .nr-right{ display:flex; align-items:center; justify-content:flex-end; gap:10px; }
    .nr-search{
        display:flex; align-items:center; gap:10px;
        padding: .55rem .85rem;
        border-radius:999px;
        background: rgba(255,255,255,.06);
        border:1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.70);
        min-width: 280px;
    }
    .nr-search input{
        border:none; outline:none; background:transparent;
        width:100%;
        color: rgba(255,255,255,.92);
        font-weight:750;
    }
    .nr-search input::placeholder{ color: rgba(255,255,255,.45); }

    .nr-login{
        display:inline-flex; align-items:center;
        padding:.58rem .95rem;
        border-radius:999px;
        background: linear-gradient(135deg, #0d6efd, #2b8cff);
        border:1px solid rgba(13,110,253,.35);
        color:#fff;
        text-decoration:none;
        font-weight:950;
    }
    .nr-login:hover{ filter: brightness(1.02); color:#fff; }

    .nr-account{
        display:inline-flex; align-items:center; gap:10px;
        padding:.48rem .7rem .48rem .58rem;
        border-radius:999px;
        background: rgba(255,255,255,.08);
        border:1px solid rgba(255,255,255,.14);
        color: rgba(255,255,255,.92);
        font-weight:950;
    }
    .nr-avatar{
        width:34px; height:34px;
        border-radius:999px;
        display:grid; place-items:center;
        background: rgba(255,255,255,.10);
        border:1px solid rgba(255,255,255,.14);
    }

    /* dropdown */
    .nr-dd{
        border-radius:16px;
        border:1px solid rgba(255,255,255,.12);
        background: rgba(8,14,24,.92);
        backdrop-filter: blur(10px);
        overflow:hidden;
        min-width: 260px;
    }
    .nr-dd .dropdown-item{ color: rgba(255,255,255,.85); }
    .nr-dd .dropdown-item:hover{ background: rgba(255,255,255,.06); color:#fff; }
    .nr-dd .dropdown-divider{ border-top-color: rgba(255,255,255,.10); }

    /* nav */
    .nr-nav{
        position: sticky;
        top: 0;
        background: rgba(7,16,28,.78);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255,255,255,.10);
    }
    .nr-nav__inner{
        display:flex; align-items:center; gap:10px;
        padding: 10px 0;
        overflow-x:auto;
        -webkit-overflow-scrolling: touch;
    }
    .nr-nav__inner::-webkit-scrollbar{ display:none; }
    .nr-nav__link{
        padding:.55rem .95rem;
        border-radius:999px;
        text-decoration:none;
        color: rgba(255,255,255,.86);
        font-weight:950;
        border:1px solid transparent;
    }
    .nr-nav__link:hover{
        background: rgba(255,255,255,.06);
        border-color: rgba(255,255,255,.12);
        color:#fff;
    }
    .nr-nav__link.is-active{
        background: rgba(13,110,253,.18);
        border-color: rgba(13,110,253,.28);
        color:#cfe2ff;
    }
    .nr-nav__spacer{ flex:1; }
    .nr-nav__chip{
        display:inline-flex; align-items:center;
        padding:.52rem .85rem;
        border-radius:999px;
        background: rgba(255,255,255,.06);
        border:1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.86);
        text-decoration:none;
        font-weight:950;
    }
    .nr-nav__chip:hover{ background: rgba(255,255,255,.08); color:#fff; }

    /* responsive */
    @media (max-width: 992px){
        .nr-main__inner{ grid-template-columns: 1fr auto; }
        .nr-left{ display:none; }
    }
    @media (max-width: 576px){
        .nr-brand__sub{ display:none; }
    }


    .nr-brand{
        display:flex;
        align-items:center;
        justify-content:center;
        text-decoration:none;
        min-width: 0;
    }

    .nr-brand__logo{
        height: 44px;           /* istersen 48/52 yapabiliriz */
        width: auto;
        max-width: 260px;       /* taşmayı engeller */
        object-fit: contain;
        display:block;
        filter: drop-shadow(0 14px 40px rgba(0,0,0,.35));
    }

    @media (max-width: 576px){
        .nr-brand__logo{
            height: 40px;
            max-width: 200px;
        }
    }

    /* Dropdown üst başlık (isim + mail) beyaz olsun */
    .nr-dd .fw-bold,
    .nr-dd .text-muted,
    .nr-dd .small,
    .nr-dd li.px-3.py-2 div{
        color: rgba(255,255,255,.92) !important;
    }

    /* Email satırı biraz daha soft beyaz */
    .nr-dd li.px-3.py-2 .text-muted{
        color: rgba(255,255,255,.70) !important;
    }

    /* İstersen başlık alanına hafif arkaplan */
    .nr-dd li.px-3.py-2{
        background: rgba(255,255,255,.06);
    }
</style>
