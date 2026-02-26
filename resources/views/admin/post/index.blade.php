@extends('layouts.wrapper-admin', ['title' => 'Yazılar'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Yazılar</h2>
                <p class="corp-sub">Blog içeriklerini yönetin: görüntüleyin, düzenleyin, silin.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.post.create') }}"
                   class="btn btn-primary"
                   style="border-radius:12px; padding:.55rem .95rem;">
                    + Yeni Yazı
                </a>
            </div>
        </div>

        {{-- TABLE CARD --}}
        <div class="corp-card">
            <div class="corp-card__head">
                <div>
                    <div style="font-weight:800; letter-spacing:-.01em;">Yazı Listesi</div>
                    <div class="corp-sub">Toplam: {{ $posts->count() }} kayıt</div>
                </div>

                <a href="{{ route('admin.post.create') }}" class="btn btn-corp">
                    Yazı Ekle
                </a>
            </div>

            <div class="corp-card__body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead style="background: rgba(15,23,42,.02);">
                        <tr>
                            <th class="ps-3" style="width:90px;">ID</th>
                            <th>Başlık</th>
                            <th class="text-end pe-3" style="width:260px;">İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="ps-3 text-muted">#{{ $post->id }}</td>

                                <td>
                                    <div style="font-weight:800; color:#0f172a;">{{ $post->title }}</div>
                                    <div class="corp-sub">Yazı</div>
                                </td>

                                <td class="text-end pe-3">
                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route('admin.post.show', $post->id) }}"
                                           class="btn btn-corp btn-sm"
                                           title="Detay">
                                            Detay
                                        </a>

                                        <a href="{{ route('admin.post.edit', $post->id) }}"
                                           class="btn btn-success btn-sm"
                                           style="border-radius:12px;"
                                           title="Düzenle">
                                            Düzenle
                                        </a>

                                        <form action="{{ route('admin.post.delete', $post->id) }}"
                                              method="post"
                                              onsubmit="return confirm('Bu yazıyı silmek istediğinize emin misiniz?');">
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
                                    <div style="font-weight:900; color:#0f172a;">Henüz yazı yok</div>
                                    <div class="corp-sub mb-3">İlk yazınızı ekleyerek başlayabilirsiniz.</div>
                                    <a href="{{ route('admin.post.create') }}"
                                       class="btn btn-primary"
                                       style="border-radius:12px; padding:.55rem .95rem;">
                                        + Yeni Yazı
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
