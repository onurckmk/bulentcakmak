@extends('layouts.wrapper-personal', ['title' => 'Yorum Düzenle'])

@section('content')
    <div class="container py-4 py-lg-5">

        {{-- HEADER --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-4">
            <div>
                <h2 class="p-title mb-1">Yorum Düzenle</h2>
                <div class="p-sub">Yorum metnini güncelleyin ve kaydedin.</div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('personal.comment.index') }}" class="btn btn-outline-secondary p-btn">
                    <i class="bi bi-arrow-left me-2"></i> Yorumlara Dön
                </a>
            </div>
        </div>

        {{-- FORM CARD --}}
        <div class="p-card">
            <div class="p-card__head">
                <div>
                    <div class="p-card__title">Form</div>
                    <div class="p-sub">Yorum ID: #{{ $comment->id }}</div>
                </div>
                <span class="badge text-bg-light" style="border-radius:999px;">Düzenleme</span>
            </div>

            <div class="p-card__body">
                <form method="post" action="{{ route('personal.comment.update', $comment->id) }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold">Yorum</label>
                        <textarea
                            class="form-control p-input @error('message') is-invalid @enderror"
                            name="message"
                            id="message"
                            rows="6"
                            placeholder="Yorumunuzu yazın..."
                        >{{ old('message', $comment->message) }}</textarea>

                        @error('message')
                        <div class="invalid-feedback" style="font-weight:700;">
                            Bu alan zorunludur.
                        </div>
                        @else
                            <div class="form-text text-muted">
                                Kısa ve anlaşılır bir ifade kullanmanız önerilir.
                            </div>
                            @enderror
                    </div>

                    <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4">
                        <a href="{{ route('personal.comment.index') }}" class="btn btn-outline-secondary p-btn">
                            Vazgeç
                        </a>

                        <button type="submit" class="btn btn-primary p-btn">
                            <i class="bi bi-save me-2"></i> Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <style>
        /* =========================
           PERSONAL FORM (Modern)
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
        .p-card__body{
            padding: 18px;
        }

        .p-btn{
            border-radius: 999px;
            padding: .62rem 1.05rem;
            font-weight: 900;
            letter-spacing: -.01em;
        }

        .p-input{
            border-radius: 14px;
            border-color: rgba(15,23,42,.12);
            padding: .75rem .9rem;
        }
        .p-input:focus{
            border-color: rgba(13,110,253,.45);
            box-shadow: 0 0 0 .25rem rgba(13,110,253,.12);
        }
    </style>
@endsection
