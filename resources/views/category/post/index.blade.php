@extends('layouts.wrapper', ['title' => $category->title])

@section('content')

    <main class="cat-page">
        {{-- HERO --}}
        <section class="cat-hero">
            <div class="container">
                <div class="cat-hero__inner" data-aos="fade-up">
                    <div class="cat-badge">
                        <i class="bi bi-folder2-open me-2"></i> Kategori
                    </div>

                    <h1 class="cat-title">
                        {{ $category->title }}
                    </h1>

                    <p class="cat-sub">
                        Bu kategorideki yazıları keşfet.
                    </p>
                </div>
            </div>
        </section>

        {{-- GRID --}}
        <section class="cat-content">
            <div class="container">
                <div class="row g-4">
                    @foreach($posts as $post)
                        <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">

                            <article class="post-card">
                                <a class="post-card__media" href="{{ route('post.show', $post->id) }}">
                                    <img src="{{ $post->preview_image }}" alt="{{ $post->title }}">
                                    <span class="post-card__overlay"></span>

                                    <span class="post-pill">
                                    {{ $category->title }}
                                </span>
                                </a>

                                <div class="post-card__body">
                                    <div class="post-card__meta">
                                    <span class="post-meta">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ optional($post->created_at)->format('d.m.Y') }}
                                    </span>

                                        {{-- LIKE --}}
                                        <div class="like-wrap">
                                            @auth()
                                                <form action="{{ route('post.likes.store', $post->id) }}" method="post" class="like-form">
                                                    @csrf
                                                    <span class="like-count">{{ $post->liked_users_count }}</span>

                                                    <button type="submit" class="like-btn" aria-label="Beğen">
                                                        @if(auth()->user()->likedPosts->contains($post->id))
                                                            <i class="fas fa-heart"></i>
                                                        @else
                                                            <i class="far fa-heart"></i>
                                                        @endif
                                                    </button>
                                                </form>
                                            @endauth

                                            @guest()
                                                <span class="like-count">{{ $post->liked_users_count }}</span>
                                                <span class="like-ghost" aria-hidden="true">
                                                <i class="far fa-heart"></i>
                                            </span>
                                            @endguest
                                        </div>
                                    </div>

                                    <a href="{{ route('post.show', $post->id) }}" class="post-card__title">
                                        {{ $post->title }}
                                    </a>

                                    <div class="post-card__actions">
                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary btn-sm post-read">
                                            Oku <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                        <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm post-back">
                                            <i class="bi bi-house me-1"></i> Ana Sayfa
                                        </a>
                                    </div>
                                </div>
                            </article>

                        </div>
                    @endforeach
                </div>

                {{-- PAGINATION --}}
                <div class="cat-pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    </main>

    <style>
        /* =========================
           FRONTEND: CATEGORY PAGE
           Modern card grid
           ========================= */

        .cat-page{
            background:#fff;
        }

        /* HERO */
        .cat-hero{
            padding: 54px 0 22px;
            background:
                radial-gradient(1200px 420px at 50% 0%, rgba(13,110,253,.12), transparent 60%),
                linear-gradient(180deg, rgba(15,23,42,.04), rgba(15,23,42,0));
        }

        .cat-hero__inner{
            max-width: 920px;
            margin: 0 auto;
            text-align: center;
        }

        .cat-badge{
            display:inline-flex;
            align-items:center;
            gap:.4rem;
            padding: .45rem .85rem;
            border-radius: 999px;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            font-weight: 800;
            letter-spacing: -.01em;
            margin-bottom: 12px;
        }

        .cat-title{
            margin: 0 0 8px;
            font-weight: 950;
            letter-spacing: -.03em;
            color:#0f172a;
            line-height: 1.1;
        }

        .cat-sub{
            margin: 0;
            color:#64748b;
            font-size: 1.03rem;
        }

        /* CONTENT */
        .cat-content{
            padding: 18px 0 60px;
        }

        /* CARD */
        .post-card{
            border-radius: 18px;
            overflow:hidden;
            border: 1px solid rgba(15,23,42,.08);
            box-shadow: 0 22px 60px rgba(15,23,42,.06);
            background:#fff;
            height: 100%;
            display:flex;
            flex-direction: column;
        }

        .post-card__media{
            position: relative;
            display:block;
            aspect-ratio: 16/10;
            overflow:hidden;
            background: rgba(15,23,42,.03);
        }

        .post-card__media img{
            width:100%;
            height:100%;
            object-fit: cover;
            transform: scale(1.02);
            transition: transform .22s ease;
        }

        .post-card__overlay{
            position:absolute;
            inset:0;
            background: linear-gradient(180deg, rgba(0,0,0,0) 40%, rgba(0,0,0,.18) 100%);
            opacity: .9;
        }

        .post-card:hover .post-card__media img{
            transform: scale(1.06);
        }

        /* pill */
        .post-pill{
            position:absolute;
            left: 14px;
            bottom: 14px;
            z-index: 2;
            padding: .35rem .70rem;
            border-radius: 999px;
            background: rgba(255,255,255,.92);
            border: 1px solid rgba(15,23,42,.10);
            color:#0f172a;
            font-weight: 900;
            letter-spacing: -.01em;
            font-size: .85rem;
        }

        /* BODY */
        .post-card__body{
            padding: 14px 14px 16px;
            display:flex;
            flex-direction: column;
            gap: 10px;
            flex: 1;
        }

        .post-card__meta{
            display:flex;
            align-items:center;
            justify-content: space-between;
            gap: 12px;
            color:#64748b;
            font-size: .92rem;
        }

        .post-meta{
            display:inline-flex;
            align-items:center;
            gap:.25rem;
        }

        .like-wrap{
            display:flex;
            align-items:center;
            gap: 8px;
        }

        .like-form{
            display:flex;
            align-items:center;
            gap: 8px;
            margin:0;
        }

        .like-count{
            font-weight: 900;
            color:#0f172a;
            min-width: 16px;
            text-align:right;
        }

        .like-btn{
            border: 0;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.10);
            width: 36px;
            height: 36px;
            border-radius: 999px;
            display:grid;
            place-items:center;
            cursor:pointer;
            transition: transform .15s ease, background .15s ease, border-color .15s ease;
            color:#0f172a;
        }

        .like-btn:hover{
            transform: translateY(-1px);
            background: rgba(220,53,69,.08);
            border-color: rgba(220,53,69,.20);
            color:#b4232f;
        }

        .like-ghost{
            width: 36px;
            height: 36px;
            border-radius: 999px;
            display:grid;
            place-items:center;
            background: rgba(15,23,42,.03);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
        }

        /* TITLE */
        .post-card__title{
            text-decoration:none;
            color:#0f172a;
            font-weight: 950;
            letter-spacing: -.02em;
            line-height: 1.25;
            font-size: 1.02rem;
        }

        .post-card__title:hover{
            color:#0b3ea8;
        }

        /* ACTIONS */
        .post-card__actions{
            margin-top: auto;
            display:flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .post-read, .post-back{
            border-radius: 999px;
            padding: .55rem .90rem;
            font-weight: 900;
            letter-spacing: -.01em;
        }

        /* PAGINATION */
        .cat-pagination{
            margin-top: 22px;
            display:flex;
            justify-content:center;
        }

        /* Laravel pagination (Bootstrap) ufak modern dokunuş */
        .pagination{
            gap: 6px;
        }
        .page-link{
            border-radius: 999px !important;
            border: 1px solid rgba(15,23,42,.10) !important;
            color:#0f172a;
            font-weight: 800;
        }
        .page-item.active .page-link{
            background: #0d6efd !important;
            border-color: #0d6efd !important;
        }
    </style>

@endsection
