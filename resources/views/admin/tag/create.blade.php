@extends('layouts.wrapper-admin', ['title' => 'Etiket Ekle'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Etiket Ekle</h2>
                <p class="corp-sub">Yazıların keşfedilebilirliğini artırmak için yeni bir etiket oluşturun.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.tag.index') }}" class="btn btn-corp">
                    ← Etiket Listesi
                </a>
            </div>
        </div>

        <div class="row g-3 g-lg-4">
            <div class="col-12 col-lg-7 col-xl-6">

                <div class="corp-card">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">Form</div>
                            <div class="corp-sub">Yeni etiket bilgilerini girin</div>
                        </div>
                        <span class="badge text-bg-light" style="border-radius:999px;">
                            Yeni Kayıt
                        </span>
                    </div>

                    <div class="corp-card__body">
                        <form method="post" action="{{ route('admin.tag.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Etiket Adı</label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                    value="{{ old('title') }}"
                                    placeholder="Örn: Laravel"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                >

                                @error('title')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    Bu alan zorunludur.
                                </div>
                                @else
                                    <div class="form-text" style="color:#64748b;">
                                        Kısa, tek kelimelik ve tutarlı etiketler kullanın.
                                    </div>
                                    @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="border-radius:12px; padding:.55rem .95rem;">
                                    Ekle
                                </button>

                                <a href="{{ route('admin.tag.index') }}"
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
                            <div class="corp-sub">Etiket stratejisi</div>
                        </div>
                    </div>

                    <div class="corp-card__body">
                        <div class="corp-sub" style="line-height:1.6;">
                            Etiket oluştururken:
                            <ul class="mt-2 mb-0" style="color:#64748b;">
                                <li>Çok genel etiketlerden kaçının (örn: “genel”).</li>
                                <li>Yazı konusunu net ifade eden etiketler seçin.</li>
                                <li>Benzer etiketleri çoğaltmak yerine standardize edin (örn: “laravel” / “Laravel”).</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
