@extends('layouts.wrapper-admin', ['title' => 'Kategoriler'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Kategoriler</h2>
                <p class="corp-sub">Blog içeriklerini sınıflandırmak için kategorileri yönetin.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.category.create') }}"
                   class="btn btn-primary"
                   style="border-radius:12px; padding:.55rem .95rem;">
                    + Yeni Kategori
                </a>
            </div>
        </div>

        {{-- TABLE CARD --}}
        <div class="corp-card">
            <div class="corp-card__head">
                <div>
                    <div style="font-weight:800; letter-spacing:-.01em;">Kategori Listesi</div>
                    <div class="corp-sub">Toplam: {{ $categories->count() }} kayıt</div>
                </div>

                <a href="{{ route('admin.category.create') }}" class="btn btn-corp">
                    Kategori Ekle
                </a>
            </div>

            <div class="corp-card__body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead style="background: rgba(15,23,42,.02);">
                        <tr>
                            <th style="width: 90px;" class="ps-3">ID</th>
                            <th>Başlık</th>
                            <th style="width: 150px;" class="text-end pe-3">İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="ps-3 text-muted">#{{ $category->id }}</td>
                                <td>
                                    <div style="font-weight:800; color:#0f172a;">{{ $category->title }}</div>
                                    <div class="corp-sub">Kategori</div>
                                </td>

                                <td class="text-end pe-3">
                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route('admin.category.show', $category->id) }}"
                                           class="btn btn-corp btn-sm"
                                           title="Görüntüle">
                                            Görüntüle
                                        </a>

                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                           class="btn btn-success btn-sm"
                                           style="border-radius:12px;"
                                           title="Düzenle">
                                            Düzenle
                                        </a>

                                        <form action="{{ route('admin.category.delete', $category->id) }}"
                                              method="post"
                                              onsubmit="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                    class="btn btn-outline-danger btn-sm"
                                                    style="border-radius:12px;"
                                                    title="Sil">
                                                Sil
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <div style="font-weight:900; color:#0f172a;">Henüz kategori yok</div>
                                    <div class="corp-sub mb-3">İlk kategorinizi ekleyerek başlayabilirsiniz.</div>
                                    <a href="{{ route('admin.category.create') }}"
                                       class="btn btn-primary"
                                       style="border-radius:12px; padding:.55rem .95rem;">
                                        + Yeni Kategori
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
