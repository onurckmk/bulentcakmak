@extends('layouts.wrapper-admin', ['title' => 'Kategori Detayı'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Kategori Detayı</h2>
                <p class="corp-sub">Seçili kategoriye ait bilgileri görüntülüyorsunuz.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.category.index') }}" class="btn btn-corp">
                    ← Kategorilere Dön
                </a>

                <a href="{{ route('admin.category.edit', $category->id) }}"
                   class="btn btn-success"
                   style="border-radius:12px; padding:.55rem .95rem;">
                    Düzenle
                </a>

                <form action="{{ route('admin.category.delete', $category->id) }}"
                      method="post"
                      onsubmit="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?');"
                      style="display:inline;">
                    @csrf
                    @method('delete')
                    <button type="submit"
                            class="btn btn-outline-danger"
                            style="border-radius:12px; padding:.55rem .95rem;">
                        Sil
                    </button>
                </form>
            </div>
        </div>

        {{-- DETAILS CARD --}}
        <div class="row g-3 g-lg-4">
            <div class="col-12 col-lg-8">
                <div class="corp-card">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">{{ $category->title }}</div>
                            <div class="corp-sub">Kategori bilgileri</div>
                        </div>

                        <span class="badge text-bg-light" style="border-radius:999px;">
                            ID: #{{ $category->id }}
                        </span>
                    </div>

                    <div class="corp-card__body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <tbody>
                                <tr>
                                    <td class="ps-3 text-muted" style="width:220px;">Kategori ID</td>
                                    <td style="font-weight:800; color:#0f172a;">#{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-3 text-muted">Kategori Başlığı</td>
                                    <td style="font-weight:800; color:#0f172a;">{{ $category->title }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            {{-- SIDE CARD (INFO / HELP) --}}
            <div class="col-12 col-lg-4">
                <div class="corp-card corp-card--soft">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">İpuçları</div>
                            <div class="corp-sub">Hızlı yönlendirme</div>
                        </div>
                    </div>

                    <div class="corp-card__body">
                        <div class="corp-sub" style="line-height:1.55;">
                            Kategori adını güncellemek için <b>Düzenle</b> butonunu kullanın.
                            Kategoriyi kaldırmak için <b>Sil</b> butonunu kullanabilirsiniz.
                        </div>

                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-corp">
                                Kategoriyi Düzenle
                            </a>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-corp">
                                Kategori Listesi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
