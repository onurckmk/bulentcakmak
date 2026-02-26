<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary d-flex flex-column flex-shrink-0">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
         aria-labelledby="sidebarMenuLabel">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Yönetim Paneli</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                    aria-label="Kapat"></button>
        </div>

        <div class="offcanvas-body d-md-flex flex-column p-0 overflow-y-auto">

            {{-- MARKA --}}
            <div class="brand-block">
                <div class="d-flex align-items-center gap-3">
                    <div class="brand-mark">B</div>
                    <div>
                        <p class="brand-title">Blog Yönetim Paneli</p>
                        <p class="brand-sub">İçerik ve Kullanıcı Yönetimi</p>
                    </div>
                </div>
            </div>

            {{-- ANA MENÜ --}}
            <div class="nav-section">Yönetim</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.main.index') ? 'active' : '' }}"
                       href="{{ route('admin.main.index') }}">
                        <svg class="bi"><use xlink:href="#house"/></svg>
                        Gösterge Paneli
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.post.*') ? 'active' : '' }}"
                       href="{{ route('admin.post.index') }}">
                        <svg class="bi"><use xlink:href="#pencil-square"/></svg>
                        Yazılar
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"
                       href="{{ route('admin.category.index') }}">
                        <svg class="bi"><use xlink:href="#list-task"/></svg>
                        Kategoriler
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"
                       href="{{ route('admin.user.index') }}">
                        <svg class="bi"><use xlink:href="#people"/></svg>
                        Kullanıcılar
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.tag.*') ? 'active' : '' }}"
                       href="{{ route('admin.tag.index') }}">
                        <svg class="bi"><use xlink:href="#tags"/></svg>
                        Etiketler
                    </a>
                </li>
            </ul>

            <div class="divider"></div>

            {{-- KISAYOLLAR --}}
            <div class="nav-section">Kısayollar</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2"
                       href="{{ route('main.index') }}">
                        <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                        Blog Anasayfa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2"
                       href="{{ route('personal.main.index') }}">
                        <svg class="bi"><use xlink:href="#user"/></svg>
                        Profil
                    </a>
                </li>
            </ul>

            {{-- HESAP / ÇIKIŞ --}}
            <div class="mt-auto">
                <div class="account-card">
                    <p class="account-name">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="account-role">{{ auth()->user()->email ?? '' }}</p>

                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="logout-btn">
                            Çıkış Yap
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
