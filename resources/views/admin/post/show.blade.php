@extends('layouts.wrapper-admin', ['title' => $post->title])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Yazı Detayı</h2>
                <p class="corp-sub">Seçili yazının temel bilgilerini görüntülüyorsunuz.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.post.index') }}" class="btn btn-corp">
                    ← Yazı Listesi
                </a>

                <a href="{{ route('admin.post.edit', $post->id) }}"
                   class="btn btn-success"
                   style="border-radius:12px; padding:.55rem .95rem;">
                    Düzenle
                </a>

                <form action="{{ route('admin.post.delete', $post->id) }}"
                      method="post"
                      onsubmit="return confirm('Bu yazıyı silmek istediğinize emin misiniz?');"
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

        <div class="row g-3 g-lg-4">
            {{-- MAIN DETAILS --}}
            <div class="col-12 col-xl-8">
                <div class="corp-card">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">{{ $post->title }}</div>
                            <div class="corp-sub">Yazı bilgileri</div>
                        </div>

                        <span class="badge text-bg-light" style="border-radius:999px;">
                            ID: #{{ $post->id }}
                        </span>
                    </div>

                    <div class="corp-card__body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <tbody>
                                <tr>
                                    <td class="ps-3 text-muted" style="width:220px;">Yazı ID</td>
                                    <td style="font-weight:800; color:#0f172a;">#{{ $post->id }}</td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">Başlık</td>
                                    <td style="font-weight:800; color:#0f172a;">{{ $post->title }}</td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">Kategori</td>
                                    <td style="font-weight:800; color:#0f172a;">
                                        {{ optional($post->categories->first())->title ?? '—' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">Etiketler</td>
                                    <td>
                                        @if($post->tags && $post->tags->count())
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach($post->tags as $tag)
                                                    <span class="badge text-bg-light" style="border-radius:999px;">
                                                        {{ $tag->title }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">Oluşturulma Tarihi</td>
                                    <td style="font-weight:800; color:#0f172a;">{{ $post->created_at }}</td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">Güncellenme Tarihi</td>
                                    <td style="font-weight:800; color:#0f172a;">{{ $post->updated_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            {{-- SIDE PANEL --}}
            <div class="col-12 col-xl-4">
                <div class="corp-card corp-card--soft">
                    <div class="corp-card__head">
                        <div>
                            <div style="font-weight:800; letter-spacing:-.01em;">Hızlı İşlemler</div>
                            <div class="corp-sub">Kısayollar</div>
                        </div>
                    </div>

                    <div class="corp-card__body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-corp">
                                Yazıyı Düzenle
                            </a>
                            <a href="{{ route('admin.post.index') }}" class="btn btn-corp">
                                Yazı Listesine Dön
                            </a>
                            <a href="{{ url('/') }}" class="btn btn-corp">
                                Blog Anasayfa
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
