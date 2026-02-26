<aside class="p-sidebar">
    <div class="p-sidebar__inner">

        {{-- BRAND --}}
        <div class="p-brand">
            <div class="p-brand__mark">MB</div>
            <div class="p-brand__text">
                <div class="p-brand__title">Kullanıcı Paneli</div>
                <div class="p-brand__sub">{{ auth()->user()->name ?? 'Kullanıcı' }}</div>
            </div>
        </div>

        {{-- NAV --}}
        <nav class="p-nav">
            <a href="{{ route('main.index') }}"
               class="p-link {{ request()->routeIs('main.index') ? 'is-active' : '' }}">
                <span class="p-ico"><i class="bi bi-journal-text"></i></span>
                <span>Blog</span>
            </a>

            <a href="{{ route('personal.main.index') }}"
               class="p-link {{ request()->routeIs('personal.main.index') ? 'is-active' : '' }}">
                <span class="p-ico"><i class="bi bi-house"></i></span>
                <span>Ana Menü</span>
            </a>

            <a href="{{ route('personal.liked.index') }}"
               class="p-link {{ request()->routeIs('personal.liked.index') ? 'is-active' : '' }}">
                <span class="p-ico"><i class="bi bi-heart"></i></span>
                <span>Beğendiklerim</span>
            </a>

            <a href="{{ route('personal.comment.index') }}"
               class="p-link {{ request()->routeIs('personal.comment.index') ? 'is-active' : '' }}">
                <span class="p-ico"><i class="bi bi-chat-dots"></i></span>
                <span>Yorumlarım</span>
            </a>

            @if(auth()->user()->isAdministrator())
                <div class="p-sep"></div>

                <a href="{{ route('admin.main.index') }}"
                   class="p-link p-link--admin {{ request()->routeIs('admin.*') ? 'is-active' : '' }}">
                    <span class="p-ico"><i class="bi bi-gear"></i></span>
                    <span>Admin Panel</span>
                    <span class="p-badge">Yönetici</span>
                </a>
            @endif
        </nav>

        {{-- FOOT --}}
        <div class="p-foot">
            <a href="{{ url('/') }}" class="p-foot__link">
                <i class="bi bi-box-arrow-up-right me-2"></i> Siteyi Gör
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="p-logout">
                    <i class="bi bi-box-arrow-right me-2"></i> Çıkış Yap
                </button>
            </form>
        </div>

    </div>
</aside>

<style>
    /* =========================
       PERSONAL SIDEBAR (Modern)
       ========================= */
    .p-sidebar{
        width: 280px;
        min-height: 100vh;
        background:
            radial-gradient(900px 320px at 20% 0%, rgba(13,110,253,.22), transparent 60%),
            linear-gradient(160deg, #0b1220 0%, #07101c 55%, #050a12 100%);
        border-right: 1px solid rgba(255,255,255,.10);
        box-shadow: 0 22px 90px rgba(0,0,0,.45);
    }

    .p-sidebar__inner{
        display:flex;
        flex-direction:column;
        height: 100%;
        padding: 16px 14px;
    }

    /* BRAND */
    .p-brand{
        display:flex;
        align-items:center;
        gap: 12px;
        padding: 12px 12px;
        border-radius: 18px;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.10);
        margin-bottom: 12px;
    }
    .p-brand__mark{
        width: 44px;
        height: 44px;
        border-radius: 16px;
        display:grid;
        place-items:center;
        background: rgba(13,110,253,.18);
        border: 1px solid rgba(13,110,253,.30);
        color:#cfe2ff;
        font-weight: 950;
        letter-spacing: -.03em;
    }
    .p-brand__title{
        color: rgba(255,255,255,.92);
        font-weight: 950;
        letter-spacing: -.02em;
        line-height: 1.1;
    }
    .p-brand__sub{
        color: rgba(255,255,255,.55);
        font-weight: 750;
        font-size: .92rem;
        margin-top: 2px;
    }

    /* NAV */
    .p-nav{
        display:flex;
        flex-direction:column;
        gap: 8px;
        padding: 8px 2px;
    }

    .p-link{
        display:flex;
        align-items:center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 14px;
        text-decoration:none;
        color: rgba(255,255,255,.82);
        font-weight: 850;
        border: 1px solid rgba(255,255,255,0);
        background: transparent;
        transition: background .15s ease, border-color .15s ease, transform .15s ease, color .15s ease;
    }

    .p-link:hover{
        background: rgba(255,255,255,.06);
        border-color: rgba(255,255,255,.10);
        transform: translateY(-1px);
        color:#fff;
    }

    .p-link.is-active{
        background: rgba(13,110,253,.18);
        border-color: rgba(13,110,253,.28);
        color:#cfe2ff;
    }

    .p-ico{
        width: 36px;
        height: 36px;
        border-radius: 12px;
        display:grid;
        place-items:center;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.10);
        color: rgba(255,255,255,.88);
    }
    .p-link.is-active .p-ico{
        background: rgba(13,110,253,.22);
        border-color: rgba(13,110,253,.30);
        color:#cfe2ff;
    }

    .p-sep{
        height: 1px;
        margin: 10px 10px;
        background: rgba(255,255,255,.10);
    }

    .p-link--admin{
        position: relative;
    }
    .p-badge{
        margin-left:auto;
        padding: .22rem .55rem;
        border-radius: 999px;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.75);
        font-weight: 900;
        font-size: .78rem;
    }

    /* FOOT */
    .p-foot{
        margin-top:auto;
        padding: 12px 10px;
        border-top: 1px solid rgba(255,255,255,.10);
    }

    .p-foot__link{
        display:inline-flex;
        align-items:center;
        text-decoration:none;
        color: rgba(255,255,255,.80);
        font-weight: 850;
    }
    .p-foot__link:hover{ color:#fff; }

    .p-logout{
        width: 100%;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding: .65rem .9rem;
        border-radius: 14px;
        background: rgba(220,53,69,.10);
        border: 1px solid rgba(220,53,69,.22);
        color: #ffd6db;
        font-weight: 950;
    }
    .p-logout:hover{
        background: rgba(220,53,69,.14);
        border-color: rgba(220,53,69,.28);
    }

    /* RESPONSIVE (optional) */
    @media (max-width: 992px){
        .p-sidebar{ width: 100%; min-height: auto; }
    }
</style>
