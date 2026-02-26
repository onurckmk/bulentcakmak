@extends('layouts.wrapper-admin', ['title' => 'Admin panel'])

@section('content')
    <div class="admin-container">

        <div class="dash-head">
            <div>
                <h2 class="corp-title">Gösterge Paneli</h2>
                <p class="corp-sub">Blog yönetimi için genel durum ve hızlı işlemler.</p>
            </div>

            <div class="dash-actions">
                <a class="btn btn-corp" href="{{ url('/') }}">Blog Anasayfa</a>
                <a class="btn btn-primary" style="border-radius:12px; padding:.55rem .95rem;" href="{{ route('admin.post.index') }}">Yazılar</a>
            </div>
        </div>

        {{-- KPI GRID --}}
        <div class="row g-3 g-lg-4">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-card__top">
                        <div>
                            <p class="stat-meta">Yazılar</p>
                            <div class="stat-value">{{ $data['countPost'] }}</div>
                        </div>
                        <div class="stat-icon">Y</div>
                    </div>
                    <div class="stat-card__actions">
                        <a href="{{ route('admin.post.index') }}" class="btn btn-primary btn-sm" style="border-radius:12px;">Yönet</a>
                        <a href="{{ route('admin.post.index') }}" class="btn btn-corp btn-sm">Detay</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-card__top">
                        <div>
                            <p class="stat-meta">Kullanıcılar</p>
                            <div class="stat-value">{{ $data['countUser'] }}</div>
                        </div>
                        <div class="stat-icon green">K</div>
                    </div>
                    <div class="stat-card__actions">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-success btn-sm" style="border-radius:12px;">Yönet</a>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-corp btn-sm">Detay</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-card__top">
                        <div>
                            <p class="stat-meta">Kategoriler</p>
                            <div class="stat-value">{{ $data['countCategory'] }}</div>
                        </div>
                        <div class="stat-icon amber">K</div>
                    </div>
                    <div class="stat-card__actions">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-warning btn-sm" style="border-radius:12px;">Yönet</a>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-corp btn-sm">Detay</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-card__top">
                        <div>
                            <p class="stat-meta">Etiketler</p>
                            <div class="stat-value">{{ $data['countTag'] }}</div>
                        </div>
                        <div class="stat-icon cyan">E</div>
                    </div>
                    <div class="stat-card__actions">
                        <a href="{{ route('admin.tag.index') }}" class="btn btn-info btn-sm text-white" style="border-radius:12px;">Yönet</a>
                        <a href="{{ route('admin.tag.index') }}" class="btn btn-corp btn-sm">Detay</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- LOWER GRID --}}
        <div class="row g-3 g-lg-4 mt-1">
            <div class="col-12 col-xl-8">
                <div class="corp-card corp-card--soft">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">Hızlı İşlemler</div>
                            <div class="corp-sub">Sık kullanılan işlemler</div>
                        </div>
                        <span class="badge text-bg-light" style="border-radius:999px;">Kısayollar</span>
                    </div>

                    <div class="corp-card__body">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <a class="quick-item" href="{{ route('admin.post.index') }}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="stat-icon" style="width:40px;height:40px;border-radius:12px;">Y</div>
                                        <div>
                                            <div style="font-weight:800;">Yazılar</div>
                                            <div class="corp-sub">Oluştur / Düzenle / Yayınla</div>
                                        </div>
                                    </div>
                                    <span class="text-muted">→</span>
                                </a>
                            </div>

                            <div class="col-12 col-md-6">
                                <a class="quick-item" href="{{ route('admin.category.index') }}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="stat-icon amber" style="width:40px;height:40px;border-radius:12px;">K</div>
                                        <div>
                                            <div style="font-weight:800;">Kategoriler</div>
                                            <div class="corp-sub">İçerikleri düzenle</div>
                                        </div>
                                    </div>
                                    <span class="text-muted">→</span>
                                </a>
                            </div>

                            <div class="col-12 col-md-6">
                                <a class="quick-item" href="{{ route('admin.tag.index') }}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="stat-icon cyan" style="width:40px;height:40px;border-radius:12px;">E</div>
                                        <div>
                                            <div style="font-weight:800;">Etiketler</div>
                                            <div class="corp-sub">Keşfedilebilirliği artır</div>
                                        </div>
                                    </div>
                                    <span class="text-muted">→</span>
                                </a>
                            </div>

                            <div class="col-12 col-md-6">
                                <a class="quick-item" href="{{ route('admin.user.index') }}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="stat-icon green" style="width:40px;height:40px;border-radius:12px;">K</div>
                                        <div>
                                            <div style="font-weight:800;">Kullanıcılar</div>
                                            <div class="corp-sub">Roller ve erişim</div>
                                        </div>
                                    </div>
                                    <span class="text-muted">→</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="corp-card">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">Sistem</div>
                            <div class="corp-sub">Oturum ve gezinme</div>
                        </div>
                    </div>

                    <div class="corp-card__body">
                        <div class="d-grid gap-2">
                            <a class="btn btn-corp" href="{{ url('/') }}">Blog Anasayfa</a>

                            @if(\Illuminate\Support\Facades\Route::has('profile.edit'))
                                <a class="btn btn-corp" href="{{ route('profile.edit') }}">Profil</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger" style="border-radius:12px; padding:.55rem .95rem;">
                                    Çıkış Yap
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
