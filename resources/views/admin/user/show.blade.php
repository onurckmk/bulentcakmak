@extends('layouts.wrapper-admin', ['title' => $user->name])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Kullanıcı Detayı</h2>
                <p class="corp-sub">Seçili kullanıcının temel bilgileri.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.user.index') }}" class="btn btn-corp">
                    ← Kullanıcı Listesi
                </a>

                <a href="{{ route('admin.user.edit', $user->id) }}"
                   class="btn btn-success"
                   style="border-radius:12px; padding:.55rem .95rem;">
                    Düzenle
                </a>

                <form action="{{ route('admin.user.delete', $user->id) }}"
                      method="post"
                      onsubmit="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?');"
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
                            <div style="font-weight:800; letter-spacing:-.01em;">{{ $user->name }}</div>
                            <div class="corp-sub">Kullanıcı bilgileri</div>
                        </div>

                        <span class="badge text-bg-light" style="border-radius:999px;">
                            ID: #{{ $user->id }}
                        </span>
                    </div>

                    <div class="corp-card__body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <tbody>
                                <tr>
                                    <td class="ps-3 text-muted" style="width:220px;">Kullanıcı ID</td>
                                    <td style="font-weight:800; color:#0f172a;">#{{ $user->id }}</td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">Ad Soyad</td>
                                    <td style="font-weight:800; color:#0f172a;">{{ $user->name }}</td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">E-posta</td>
                                    <td style="font-weight:800; color:#0f172a;">{{ $user->email }}</td>
                                </tr>

                                <tr>
                                    <td class="ps-3 text-muted">Rol</td>
                                    <td>
                                        @if(($user->role ?? null) === 'administrator')
                                            <span class="badge text-bg-light" style="border-radius:999px;">Yönetici</span>
                                        @elseif(($user->role ?? null) === 'reader')
                                            <span class="badge text-bg-light" style="border-radius:999px;">Okuyucu</span>
                                        @else
                                            <span class="badge text-bg-light" style="border-radius:999px;">—</span>
                                        @endif
                                    </td>
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
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-corp">
                                Kullanıcıyı Düzenle
                            </a>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-corp">
                                Kullanıcı Listesi
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
