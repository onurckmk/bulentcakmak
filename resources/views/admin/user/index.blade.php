@extends('layouts.wrapper-admin', ['title' => 'Kullanıcılar'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Kullanıcılar</h2>
                <p class="corp-sub">Kullanıcıları yönetin: görüntüleyin, düzenleyin, silin ve rol atayın.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.user.create') }}"
                   class="btn btn-primary"
                   style="border-radius:12px; padding:.55rem .95rem;">
                    + Yeni Kullanıcı
                </a>
            </div>
        </div>

        {{-- TABLE CARD --}}
        <div class="corp-card">
            <div class="corp-card__head">
                <div>
                    <div style="font-weight:800; letter-spacing:-.01em;">Kullanıcı Listesi</div>
                    <div class="corp-sub">Toplam: {{ $users->count() }} kayıt</div>
                </div>

                <a href="{{ route('admin.user.create') }}" class="btn btn-corp">
                    Kullanıcı Ekle
                </a>
            </div>

            <div class="corp-card__body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead style="background: rgba(15,23,42,.02);">
                        <tr>
                            <th class="ps-3" style="width:90px;">ID</th>
                            <th>Ad Soyad</th>
                            <th>E-posta</th>
                            <th style="width:160px;">Rol</th>
                            <th class="text-end pe-3" style="width:280px;">İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="ps-3 text-muted">#{{ $user->id }}</td>

                                <td>
                                    <div style="font-weight:800; color:#0f172a;">{{ $user->name }}</div>
                                    <div class="corp-sub">Kullanıcı</div>
                                </td>

                                <td class="text-muted" style="font-weight:700;">
                                    {{ $user->email }}
                                </td>

                                <td>
                                    @php
                                        $role = $user->role ?? null;
                                    @endphp

                                    @if($role === 'administrator')
                                        <span class="badge text-bg-light" style="border-radius:999px;">Yönetici</span>
                                    @elseif($role === 'reader')
                                        <span class="badge text-bg-light" style="border-radius:999px;">Okuyucu</span>
                                    @else
                                        <span class="badge text-bg-light" style="border-radius:999px;">—</span>
                                    @endif
                                </td>

                                <td class="text-end pe-3">
                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route('admin.user.show', $user->id) }}"
                                           class="btn btn-corp btn-sm"
                                           title="Detay">
                                            Detay
                                        </a>

                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                           class="btn btn-success btn-sm"
                                           style="border-radius:12px;"
                                           title="Düzenle">
                                            Düzenle
                                        </a>

                                        <form action="{{ route('admin.user.delete', $user->id) }}"
                                              method="post"
                                              onsubmit="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?');">
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
                                <td colspan="5" class="text-center py-5">
                                    <div style="font-weight:900; color:#0f172a;">Henüz kullanıcı yok</div>
                                    <div class="corp-sub mb-3">İlk kullanıcıyı ekleyerek başlayabilirsiniz.</div>
                                    <a href="{{ route('admin.user.create') }}"
                                       class="btn btn-primary"
                                       style="border-radius:12px; padding:.55rem .95rem;">
                                        + Yeni Kullanıcı
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
