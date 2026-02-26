@extends('layouts.wrapper', ['title' => 'Kategoriler'])

@section('content')

    <main class="cats-page">
        {{-- HERO --}}
        <section class="cats-hero">
            <div class="container" data-aos="fade-up">
                <div class="cats-hero__inner">
                    <div class="cats-badge">
                        <i class="bi bi-grid-3x3-gap me-2"></i> Kategoriler
                    </div>
                    <h1 class="cats-title">İçerik Kategorileri</h1>
                    <p class="cats-sub">İlgi alanına göre filtrele, yazılara hızlıca ulaş.</p>
                </div>
            </div>
        </section>

        {{-- LIST --}}
        <section class="cats-content">
            <div class="container mb-5">
                <div class="row g-4">
                    @foreach($categories as $category)
                        <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
                            <a class="cat-card" href="{{ route('category.post.index', $category->id) }}">
                                <div class="cat-card__icon">
                                    <i class="bi bi-folder2-open"></i>
                                </div>

                                <div class="cat-card__body">
                                    <div class="cat-card__title">
                                        {{ $category->title }}
                                    </div>

                                    <div class="cat-card__meta">
                                        <span class="cat-card__hint">Yazıları görüntüle</span>

                                        {{-- Eğer ilişkide posts() varsa otomatik sayım gösterebiliriz --}}
                                        @if(isset($category->posts_count))
                                            <span class="cat-pill">
                                            {{ $category->posts_count }} yazı
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="cat-card__arrow" aria-hidden="true">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Boş durum --}}
                @if($categories->count() === 0)
                    <div class="empty-state">
                        <div class="empty-state__icon"><i class="bi bi-inboxes"></i></div>
                        <div class="empty-state__title">Henüz kategori yok</div>
                        <div class="empty-state__sub">Yeni kategori eklendiğinde burada görünecek.</div>
                    </div>
                @endif
            </div>
        </section>
    </main>

    <style>
        /* =========================
           FRONTEND: CATEGORIES LIST
           ========================= */

        .cats-page{ background:#fff; }

        /* HERO */
        .cats-hero{
            padding: 56px 0 24px;
            background:
                radial-gradient(1200px 420px at 50% 0%, rgba(13,110,253,.12), transparent 60%),
                linear-gradient(180deg, rgba(15,23,42,.04), rgba(15,23,42,0));
        }

        .cats-hero__inner{
            max-width: 920px;
            margin: 0 auto;
            text-align: center;
        }

        .cats-badge{
            display:inline-flex;
            align-items:center;
            padding: .45rem .85rem;
            border-radius: 999px;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            font-weight: 900;
            letter-spacing: -.01em;
            margin-bottom: 12px;
        }

        .cats-title{
            margin: 0 0 10px;
            font-weight: 950;
            letter-spacing: -.03em;
            color:#0f172a;
            line-height: 1.1;
        }

        .cats-sub{
            margin: 0;
            color:#64748b;
            font-size: 1.03rem;
        }

        /* CONTENT */
        .cats-content{
            padding: 18px 0 62px;
        }

        /* CARD */
        .cat-card{
            display:flex;
            align-items:center;
            gap: 14px;
            padding: 16px 16px;
            border-radius: 18px;
            border: 1px solid rgba(15,23,42,.08);
            background:#fff;
            box-shadow: 0 22px 60px rgba(15,23,42,.06);
            text-decoration:none;
            transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease;
            height: 100%;
        }

        .cat-card:hover{
            transform: translateY(-2px);
            border-color: rgba(13,110,253,.25);
            box-shadow: 0 28px 70px rgba(15,23,42,.10);
        }

        .cat-card__icon{
            width: 46px;
            height: 46px;
            border-radius: 14px;
            display:grid;
            place-items:center;
            background: rgba(13,110,253,.10);
            border: 1px solid rgba(13,110,253,.18);
            color:#0b3ea8;
            flex: 0 0 auto;
        }

        .cat-card__body{
            min-width: 0;
            flex: 1;
        }

        .cat-card__title{
            color:#0f172a;
            font-weight: 950;
            letter-spacing: -.02em;
            line-height: 1.2;
            margin-bottom: 6px;
            font-size: 1.02rem;
        }

        .cat-card__meta{
            display:flex;
            align-items:center;
            justify-content: space-between;
            gap: 10px;
            color:#64748b;
            font-size: .92rem;
        }

        .cat-card__hint{
            display:inline-flex;
            align-items:center;
            gap: .35rem;
        }

        .cat-pill{
            padding: .28rem .60rem;
            border-radius: 999px;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            font-weight: 900;
            letter-spacing: -.01em;
            white-space: nowrap;
        }

        .cat-card__arrow{
            width: 36px;
            height: 36px;
            border-radius: 999px;
            display:grid;
            place-items:center;
            background: rgba(15,23,42,.03);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            flex: 0 0 auto;
        }

        /* EMPTY */
        .empty-state{
            margin-top: 26px;
            border-radius: 18px;
            border: 1px dashed rgba(15,23,42,.18);
            background: rgba(15,23,42,.02);
            padding: 26px;
            text-align:center;
        }

        .empty-state__icon{
            width: 52px;
            height: 52px;
            margin: 0 auto 10px;
            border-radius: 16px;
            display:grid;
            place-items:center;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.10);
            color:#0f172a;
            font-size: 1.25rem;
        }

        .empty-state__title{
            font-weight: 950;
            letter-spacing: -.02em;
            color:#0f172a;
            margin-bottom: 4px;
        }

        .empty-state__sub{
            color:#64748b;
        }
    </style>

@endsection
