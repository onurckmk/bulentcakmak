@extends('layouts.wrapper-admin', ['title' => 'Kategori Ekle'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Kategori Ekle</h2>
                <p class="corp-sub">Blog içeriklerini sınıflandırmak için yeni bir kategori oluşturun.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.category.index') }}" class="btn btn-corp">
                    ← Kategori Listesi
                </a>
            </div>
        </div>

        <div class="row g-3 g-lg-4">
            <div class="col-12 col-lg-7 col-xl-6">

                <div class="corp-card">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">Form</div>
                            <div class="corp-sub">Yeni kategori bilgilerini girin</div>
                        </div>
                        <span class="badge text-bg-light" style="border-radius:999px;">
                            Yeni Kayıt
                        </span>
                    </div>

                    <div class="corp-card__body">
                        <form method="post" action="{{ route('admin.category.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Kategori Adı</label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                    value="{{ old('title') }}"
                                    placeholder="Örn: Teknoloji"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                >

                                @error('title')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    Bu alan zorunludur.
                                </div>
                                @else
                                    <div class="form-text" style="color:#64748b;">
                                        Kısa, anlaşılır ve tekil bir başlık kullanın.
                                    </div>
                                    @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="border-radius:12px; padding:.55rem .95rem;">
                                    Ekle
                                </button>

                                <a href="{{ route('admin.category.index') }}"
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
                            <div class="corp-sub">Daha iyi kategori yapısı</div>
                        </div>
                    </div>

                    <div class="corp-card__body">
                        <div class="corp-sub" style="line-height:1.6;">
                            Kategori oluştururken:
                            <ul class="mt-2 mb-0" style="color:#64748b;">
                                <li>Kısa ve net bir isim seçin.</li>
                                <li>Benzer bir kategori varsa tekrar açmayın.</li>
                                <li>Gereksiz “Genel” gibi isimlerden kaçının.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
