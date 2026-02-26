@extends('layouts.wrapper-admin', ['title' => 'Kullanıcı Ekle'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Kullanıcı Ekle</h2>
                <p class="corp-sub">Yeni kullanıcı oluşturun ve rol atayın.</p>
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
                            <div class="corp-sub">Kullanıcı bilgilerini girin</div>
                        </div>
                        <span class="badge text-bg-light" style="border-radius:999px;">Yeni Kayıt</span>
                    </div>

                    <div class="corp-card__body">
                        <form method="post" action="{{ route('admin.user.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Ad Soyad</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
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
                                    value="{{ old('email') }}"
                                    placeholder="Örn: kullanıcı@site.com"
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
                                    <option value="administrator" {{ old('role') === 'administrator' ? 'selected' : '' }}>
                                        Yönetici
                                    </option>
                                    <option value="reader" {{ old('role') === 'reader' ? 'selected' : '' }}>
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
                                    Ekle
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

            {{-- SIDE HELP --}}
            <div class="col-12 col-lg-5 col-xl-6">
                <div class="corp-card corp-card--soft">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">İpucu</div>
                            <div class="corp-sub">Rol güvenliği</div>
                        </div>
                    </div>

                    <div class="corp-card__body">
                        <div class="corp-sub" style="line-height:1.6;">
                            Kullanıcı eklerken:
                            <ul class="mt-2 mb-0" style="color:#64748b;">
                                <li>Kurumsal e-posta kullanmayı tercih edin.</li>
                                <li>Yönetici rolünü sınırlı sayıda kullanıcıya verin.</li>
                                <li>Gereksiz yetki vermekten kaçının.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
