<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Personal Blog') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    {{-- Global tokens (frontend) --}}
    <style>
        :root{
            --bg-0:#ffffff;
            --text:#0f172a;
            --muted:#64748b;

            --dark-1:#0b1220;
            --dark-2:#07101c;
            --line:rgba(15,23,42,.10);
            --lineW:rgba(255,255,255,.10);

            --radius:18px;
        }
        body{
            background: var(--bg-0);
            color: var(--text);
        }
        /* sayfa içeriklerinde ortak boşluk */
        .page-wrap{
            min-height: 70vh;
        }
    </style>
</head>

<body>

{{-- =========================
   FRONTEND NEWS HEADER
   ========================= --}}
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
                </div>
            </div>
        </div>
    </div>

    {{-- MAIN HEADER --}}
    <header class="nr-main">
        <div class="container">
            <div class="nr-main__inner">

                {{-- LEFT: menu --}}
                <div class="nr-left d-none d-lg-flex">
                    <a class="nr-quick" href="{{ route('main.index') }}">
                        <i class="bi bi-house me-2"></i> Ana Sayfa
                    </a>
                </div>

                {{-- BRAND --}}
                <a class="nr-brand" href="{{ route('main.index') }}">
                    <span class="nr-brand__mark">MB</span>
                    <span class="nr-brand__text">
                            <span class="nr-brand__title" style="font-family:'Playfair Display', serif;">My Personal Blog</span>
                            <span class="nr-brand__sub d-none d-lg-block">Gündem • Analiz • Notlar</span>
                        </span>
                </a>

                {{-- RIGHT: search + account --}}
                <div class="nr-right">
                    <div class="nr-search d-none d-lg-flex">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Ara: yazı, kategori, etiket...">
                    </div>

                    @auth
                        <div class="dropdown">
                            <button class="nr-account dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="nr-avatar"><i class="bi bi-person-fill"></i></span>
                                <span class="d-none d-sm-inline text-truncate" style="max-width:140px;">
                                        {{ Auth::user()->name }}
                                    </span>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end nr-dd shadow-sm">
                                <li class="px-3 py-2">
                                    <div class="fw-bold text-white">{{ Auth::user()->name }}</div>
                                    <div class="text-white-50 small text-truncate">{{ Auth::user()->email ?? '' }}</div>
                                </li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('personal.main.index') }}">
                                        <i class="bi bi-person"></i> Profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger">
                                            <i class="bi bi-box-arrow-right"></i> Çıkış Yap
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="nr-login" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Giriş
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </header>

    {{-- NAV --}}
    <div class="nr-nav">
        <div class="container">
            <nav class="nr-nav__inner">
                <a class="nr-nav__link {{ request()->routeIs('main.index') ? 'is-active' : '' }}"
                   href="{{ route('main.index') }}">Ana Sayfa</a>

                <a class="nr-nav__link {{ request()->routeIs('about.index') ? 'is-active' : '' }}"
                   href="{{ route('about.index') }}">Yazar</a>

                <a class="nr-nav__link {{ request()->routeIs('contact.index') ? 'is-active' : '' }}"
                   href="{{ route('contact.index') }}">İletişim</a>

                <span class="nr-nav__spacer"></span>

                <a class="nr-nav__chip d-none d-md-inline-flex" href="{{ route('main.index') }}">
                    <i class="bi bi-rss me-2"></i> Akış
                </a>
            </nav>
        </div>
    </div>

</div>

{{-- CONTENT --}}
<main class="page-wrap">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- Header CSS --}}
<style>
    .nr-header{ position:relative; z-index:80; }

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

    .nr-main{
        background:
            radial-gradient(1200px 360px at 50% -20%, rgba(13,110,253,.18), transparent 60%),
            linear-gradient(160deg, #0b1220 0%, #07101c 55%, #050a12 100%);
        border-bottom: 1px solid rgba(255,255,255,.10);
        box-shadow: 0 22px 80px rgba(0,0,0,.55);
    }
    .nr-main__inner{
        display:grid;
        grid-template-columns: 220px 1fr 360px;
        gap: 14px;
        align-items:center;
        padding: 14px 0;
    }

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

    @media (max-width: 992px){
        .nr-main__inner{ grid-template-columns: 1fr auto; }
        .nr-left{ display:none !important; }
        .nr-search{ display:none !important; }
    }
    @media (max-width: 576px){
        .nr-brand__sub{ display:none; }
    }
</style>
</body>

</html>
