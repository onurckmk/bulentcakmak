@extends('layouts.wrapper-admin', ['title' => 'Kullanıcı Düzenle'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Kullanıcı Düzenle</h2>
                <p class="corp-sub">Kullanıcı bilgilerini ve rolünü güncelleyin.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.user.index') }}" class="btn btn-corp">
                    ← Kullanıcı Listesi
                </a>
            </div>
        </div>

        <div class="row g-3 g-lg-4">
            <div class="col-12 col-lg-7 col-xl-6">

                <div class="corp-card">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">Form</div>
                            <div class="corp-sub">Kullanıcı kaydını güncelleyin</div>
                        </div>
                        <span class="badge text-bg-light" style="border-radius:999px;">
                            ID: #{{ $user->id }}
                        </span>
                    </div>

                    <div class="corp-card__body">
                        <form method="post" action="{{ route('admin.user.update', $user->id) }}">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Ad Soyad</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Örn: Bülent Çakmak"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                >
                                @error('name')
                                <div class="invalid-feedback" style="font-weight:700;">Bu alan zorunludur.</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">E-posta</label>
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="Örn: kullanici@site.com"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                >
                                @error('email')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Rol</label>
                                <select
                                    name="role"
                                    class="form-select @error('role') is-invalid @enderror"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                >
                                    <option value="administrator"
                                        {{ old('role', $user->isAdministrator() ? 'administrator' : 'reader') === 'administrator' ? 'selected' : '' }}>
                                        Yönetici
                                    </option>
                                    <option value="reader"
                                        {{ old('role', $user->isAdministrator() ? 'administrator' : 'reader') === 'reader' ? 'selected' : '' }}>
                                        Okuyucu
                                    </option>
                                </select>

                                @error('role')
                                <div class="invalid-feedback" style="font-weight:700;">Bu alan zorunludur.</div>
                                @else
                                    <div class="form-text" style="color:#64748b;">
                                        Yönetici: panel yönetimi. Okuyucu: sadece içerik görüntüleme.
                                    </div>
                                    @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="border-radius:12px; padding:.55rem .95rem;">
                                    Güncelle
                                </button>

                                <a href="{{ route('admin.user.index') }}"
                                   class="btn btn-corp"
                                   style="padding:.55rem .95rem;">
                                    İptal
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            {{-- SIDE INFO --}}
            <div class="col-12 col-lg-5 col-xl-6">
                <div class="corp-card corp-card--soft">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">Bilgi</div>
                            <div class="corp-sub">Kullanıcı özeti</div>
                        </div>
                    </div>

                    <div class="corp-card__body">
                        <div style="font-weight:900; color:#0f172a;">{{ $user->name }}</div>
                        <div class="corp-sub mb-3">{{ $user->email }}</div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-corp">
                                Kullanıcı Detayı
                            </a>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-corp">
                                Listeye Dön
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
