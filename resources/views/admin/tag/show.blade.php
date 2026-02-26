@extends('layouts.wrapper-admin', ['title' => $tag->title])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Etiket Detayı</h2>
                <p class="corp-sub">Seçili etiketin bilgilerini görüntülüyorsunuz.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.tag.index') }}" class="btn btn-corp">
                    ← Etiket Listesi
                </a>

                <a href="{{ route('admin.tag.edit', $tag->id) }}"
                   class="btn btn-success"
                   style="border-radius:12px; padding:.55rem .95rem;">
                    Düzenle
                </a>

                <form action="{{ route('admin.tag.delete', $tag->id) }}"
                      method="post"
                      onsubmit="return confirm('Bu etiketi silmek istediğinize emin misiniz?');"
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
                            <div style="font-weight:800; letter-spacing:-.01em;">{{ $tag->title }}</div>
                            <div class="corp-sub">Etiket bilgileri</div>
                        </div>

                        <span class="badge text-bg-light" style="border-radius:999px;">
                            ID: #{{ $tag->id }}
                        </span>
                    </div>

                    <div class="corp-card__body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <tbody>
                                <tr>
                                    <td class="ps-3 text-muted" style="width:220px;">Etiket ID</td>
                                    <td style="font-weight:800; color:#0f172a;">#{{ $tag->id }}</td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">Etiket Adı</td>
                                    <td style="font-weight:800; color:#0f172a;">{{ $tag->title }}</td>
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
                            <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-corp">
                                Etiketi Düzenle
                            </a>
                            <a href="{{ route('admin.tag.index') }}" class="btn btn-corp">
                                Etiket Listesine Dön
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
