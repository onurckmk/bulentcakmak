<header class="admin-topbar sticky-top" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="admin-topbar__inner">

            {{-- LEFT: BRAND --}}
            <a class="admin-brand" href="{{ route('admin.main.index') }}">
                <span class="admin-brand__mark">B</span>
                <span class="admin-brand__text">
                    <span class="admin-brand__title">Blog Admin</span>
                    <span class="admin-brand__sub d-none d-lg-inline">Yönetim Paneli</span>
                </span>
            </a>

            {{-- MOBILE: buttons --}}
            <ul class="navbar-nav flex-row d-md-none ms-auto">
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                            aria-label="Arama">
                        <svg class="bi"><use xlink:href="#search"/></svg>
                    </button>
                </li>
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                            aria-label="Menü">
                        <svg class="bi"><use xlink:href="#list"/></svg>
                    </button>
                </li>
            </ul>

            {{-- CENTER: SEARCH (desktop) --}}
            <div class="admin-search d-none d-md-flex">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Panel içinde ara..." aria-label="Arama">
                <span class="admin-kbd d-none d-lg-inline">Ara</span>
            </div>

            {{-- RIGHT: QUICK + USER --}}
            <div class="admin-actions d-none d-md-flex">
                <a href="{{ url('/') }}" class="admin-chip" title="Siteyi Gör">
                    <i class="bi bi-box-arrow-up-right me-2"></i> Site
                </a>

                <div class="dropdown">
                    <button class="admin-user dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="admin-avatar">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <span class="d-none d-lg-inline text-truncate" style="max-width:160px;">
                            {{ auth()->user()->name ?? 'Admin' }}
                        </span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end admin-menu shadow-sm">
                        <li class="px-3 py-2">
                            <div class="fw-bold text-white">{{ auth()->user()->name ?? 'Admin' }}</div>
                            <div class="text-white-50 small text-truncate">{{ auth()->user()->email ?? '' }}</div>
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
            </div>

        </div>

        {{-- MOBILE SEARCH (collapse) --}}
        <div id="navbarSearch" class="admin-search-mobile collapse d-md-none">
            <input class="form-control" type="text" placeholder="Panel içinde ara..." aria-label="Arama">
        </div>
    </div>
</header>

<style>
    /* =========================
       ADMIN TOPBAR (Modern)
       ========================= */
    .admin-topbar{
        background:
            radial-gradient(900px 320px at 20% 0%, rgba(13,110,253,.22), transparent 60%),
            linear-gradient(160deg, #0b1220 0%, #07101c 55%, #050a12 100%);
        border-bottom: 1px solid rgba(255,255,255,.10);
        box-shadow: 0 18px 70px rgba(0,0,0,.45);
    }

    .admin-topbar__inner{
        display:flex;
        align-items:center;
        gap: 14px;
        padding: 12px 0;
    }

    /* BRAND */
    .admin-brand{
        display:flex;
        align-items:center;
        gap: 12px;
        text-decoration:none;
        color: rgba(255,255,255,.92);
        min-width: 220px;
    }
    .admin-brand__mark{
        width: 42px; height: 42px;
        border-radius: 14px;
        display:grid; place-items:center;
        background: rgba(13,110,253,.18);
        border: 1px solid rgba(13,110,253,.30);
        color:#cfe2ff;
        font-weight: 950;
        letter-spacing: -.03em;
    }
    .admin-brand__text{ display:flex; flex-direction:column; line-height: 1.05; }
    .admin-brand__title{
        font-weight: 950;
        letter-spacing: -.03em;
        font-size: 1.05rem;
    }
    .admin-brand__sub{
        color: rgba(255,255,255,.58);
        font-size: .9rem;
        margin-top: 2px;
    }

    /* SEARCH (desktop) */
    .admin-search{
        flex: 1;
        display:flex;
        align-items:center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 999px;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.70);
    }
    .admin-search input{
        border:none;
        outline:none;
        background:transparent;
        width:100%;
        color: rgba(255,255,255,.92);
        font-weight: 750;
    }
    .admin-search input::placeholder{ color: rgba(255,255,255,.45); font-weight: 700; }
    .admin-kbd{
        padding: .25rem .55rem;
        border-radius: 999px;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.75);
        font-weight: 850;
        font-size: .85rem;
    }

    /* RIGHT ACTIONS */
    .admin-actions{
        display:flex;
        align-items:center;
        gap: 10px;
    }
    .admin-chip{
        display:inline-flex;
        align-items:center;
        padding: .55rem .85rem;
        border-radius: 999px;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.88);
        text-decoration:none;
        font-weight: 900;
    }
    .admin-chip:hover{ background: rgba(255,255,255,.08); color:#fff; }

    /* USER */
    .admin-user{
        display:inline-flex;
        align-items:center;
        gap: 10px;
        padding: .45rem .7rem .45rem .55rem;
        border-radius: 999px;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.14);
        color: rgba(255,255,255,.92);
        font-weight: 950;
    }
    .admin-avatar{
        width: 34px; height: 34px;
        border-radius: 999px;
        display:grid; place-items:center;
        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.14);
    }

    /* DROPDOWN */
    .admin-menu{
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,.12);
        background: rgba(8,14,24,.92);
        backdrop-filter: blur(10px);
        overflow:hidden;
        min-width: 260px;
    }
    .admin-menu .dropdown-item{ color: rgba(255,255,255,.85); }
    .admin-menu .dropdown-item:hover{ background: rgba(255,255,255,.06); color:#fff; }
    .admin-menu .dropdown-divider{ border-top-color: rgba(255,255,255,.10); }

    /* MOBILE SEARCH */
    .admin-search-mobile{
        padding: 10px 0 12px;
    }
    .admin-search-mobile .form-control{
        border-radius: 14px;
        border: 1px solid rgba(255,255,255,.14);
        background: rgba(255,255,255,.06);
        color: rgba(255,255,255,.92);
    }
    .admin-search-mobile .form-control::placeholder{ color: rgba(255,255,255,.45); }
</style>
