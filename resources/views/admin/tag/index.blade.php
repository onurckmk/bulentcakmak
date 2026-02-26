@extends('layouts.wrapper-admin', ['title' => 'Etiketler'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Etiketler</h2>
                <p class="corp-sub">Etiketleri yönetin: görüntüleyin, düzenleyin, silin.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.tag.create') }}"
                   class="btn btn-primary"
                   style="border-radius:12px; padding:.55rem .95rem;">
                    + Yeni Etiket
                </a>
            </div>
        </div>

        {{-- TABLE CARD --}}
        <div class="corp-card">
            <div class="corp-card__head">
                <div>
                    <div style="font-weight:800; letter-spacing:-.01em;">Etiket Listesi</div>
                    <div class="corp-sub">Toplam: {{ $tags->count() }} kayıt</div>
                </div>

                <a href="{{ route('admin.tag.create') }}" class="btn btn-corp">
                    Etiket Ekle
                </a>
            </div>

            <div class="corp-card__body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead style="background: rgba(15,23,42,.02);">
                        <tr>
                            <th class="ps-3" style="width:90px;">ID</th>
                            <th>Etiket Adı</th>
                            <th class="text-end pe-3" style="width:280px;">İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($tags as $tag)
                            <tr>
                                <td class="ps-3 text-muted">#{{ $tag->id }}</td>

                                <td>
                                    <div style="font-weight:800; color:#0f172a;">{{ $tag->title }}</div>
                                    <div class="corp-sub">Etiket</div>
                                </td>

                                <td class="text-end pe-3">
                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route('admin.tag.show', $tag->id) }}"
                                           class="btn btn-corp btn-sm"
                                           title="Detay">
                                            Detay
                                        </a>

                                        <a href="{{ route('admin.tag.edit', $tag->id) }}"
                                           class="btn btn-success btn-sm"
                                           style="border-radius:12px;"
                                           title="Düzenle">
                                            Düzenle
                                        </a>

                                        <form action="{{ route('admin.tag.delete', $tag->id) }}"
                                              method="post"
                                              onsubmit="return confirm('Bu etiketi silmek istediğinize emin misiniz?');">
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
                                    <div style="font-weight:900; color:#0f172a;">Henüz etiket yok</div>
                                    <div class="corp-sub mb-3">İlk etiketi ekleyerek başlayabilirsiniz.</div>
                                    <a href="{{ route('admin.tag.create') }}"
                                       class="btn btn-primary"
                                       style="border-radius:12px; padding:.55rem .95rem;">
                                        + Yeni Etiket
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
