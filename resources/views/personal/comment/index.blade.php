@extends('layouts.wrapper-personal', ['title' => 'Yorumlarım'])

@section('content')
    <div class="container py-4 py-lg-5">

        {{-- HEADER --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-4">
            <div>
                <h2 class="p-title mb-1">Yorumlarım</h2>
                <div class="p-sub">Yaptığınız yorumları görüntüleyin, düzenleyin veya kaldırın.</div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary p-btn">
                    <i class="bi bi-box-arrow-up-right me-2"></i> Siteye Git
                </a>
            </div>
        </div>

        {{-- CARD / TABLE --}}
        <div class="p-card">
            <div class="p-card__head">
                <div>
                    <div class="p-card__title">Liste</div>
                    <div class="p-sub">Toplam: {{ $comments->count() }} kayıt</div>
                </div>
            </div>

            <div class="p-card__body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                        <tr>
                            <th style="width:90px;" class="ps-3">ID</th>
                            <th>Yorum</th>
                            <th>Yazı Başlığı</th>
                            <th class="text-end pe-3" style="width:280px;">İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($comments as $comment)
                            <tr>
                                <td class="ps-3 text-muted">#{{ $comment->id }}</td>

                                <td style="max-width:420px;">
                                    <div class="comment-text">
                                        {{ $comment->message }}
                                    </div>
                                </td>

                                <td style="max-width:360px;">
                                    <div class="fw-bold text-truncate" title="{{ $comment->post->title }}">
                                        {{ $comment->post->title }}
                                    </div>
                                    <div class="text-muted small">Yazı</div>
                                </td>

                                <td class="text-end pe-3">
                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route('personal.comment.edit', $comment->id) }}"
                                           class="btn btn-outline-success btn-sm p-pill">
                                            <i class="bi bi-pencil me-2"></i> Düzenle
                                        </a>

                                        <form action="{{ route('personal.comment.delete', $comment->id) }}" method="post"
                                              onsubmit="return confirm('Bu yorumu silmek istediğinize emin misiniz?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm p-pill">
                                                <i class="bi bi-trash me-2"></i> Sil
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="empty-ico mb-2"><i class="bi bi-chat-left-text"></i></div>
                                    <div class="empty-title">Henüz yorum yok</div>
                                    <div class="empty-sub mb-3">Bir yazıya yorum yaptığınızda burada görünecek.</div>
                                    <a href="{{ url('/') }}" class="btn btn-primary p-btn">
                                        <i class="bi bi-journal-text me-2"></i> Yazılara Git
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

    <style>
        /* =========================
           PERSONAL TABLE (Modern)
           ========================= */
        .p-title{
            font-weight: 950;
            letter-spacing: -.03em;
            color:#0f172a;
        }
        .p-sub{
            color:#64748b;
            font-weight: 650;
        }

        .p-card{
            border-radius: 18px;
            background:#fff;
            border: 1px solid rgba(15,23,42,.08);
            box-shadow: 0 22px 70px rgba(15,23,42,.06);
            overflow:hidden;
        }
        .p-card__head{
            padding: 16px 18px;
            border-bottom: 1px solid rgba(15,23,42,.08);
            background: rgba(15,23,42,.02);
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 12px;
        }
        .p-card__title{
            font-weight: 950;
            letter-spacing: -.02em;
            color:#0f172a;
        }

        .p-btn{
            border-radius: 999px;
            padding: .6rem 1rem;
            font-weight: 900;
            letter-spacing: -.01em;
        }

        .table thead th{
            background: rgba(15,23,42,.02);
            border-bottom: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            font-weight: 900;
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .p-pill{
            border-radius: 999px;
            padding: .48rem .9rem;
            font-weight: 900;
            letter-spacing: -.01em;
        }

        .comment-text{
            color:#0f172a;
            font-weight: 650;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .empty-ico{
            width: 54px;
            height: 54px;
            margin: 0 auto;
            border-radius: 16px;
            display:grid;
            place-items:center;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.10);
            color:#0f172a;
            font-size: 1.35rem;
        }
        .empty-title{
            font-weight: 950;
            letter-spacing: -.02em;
            color:#0f172a;
        }
        .empty-sub{
            color:#64748b;
        }
    </style>
@endsection
