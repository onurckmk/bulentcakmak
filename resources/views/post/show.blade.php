@extends('layouts.wrapper', ['title' => $post->title])

@section('content')
    <div class="post-page">

        {{-- HERO --}}
        <section class="pd-hero">
            <div class="pd-hero__media">
                <img src="{{ $post->main_image }}" alt="{{ $post->title }}" loading="lazy">
                <span class="pd-hero__overlay"></span>
            </div>

            <div class="container pd-hero__content">
                <div class="pd-hero__inner" data-aos="fade-up">

                    <div class="pd-top">
                        @php $c = $post->categories->first(); @endphp
                        @if($c)
                            <a class="pd-chip pd-chip--soft" href="{{ route('category.post.index', $c->id) }}">
                                <i class="bi bi-folder2-open me-2"></i> {{ $c->title ?? 'Kategori' }}
                            </a>
                        @endif

                        <span class="pd-chip">
                        <i class="bi bi-calendar3 me-2"></i>
                        {{ $date->day }} {{ $date->translatedFormat('F') }} {{ $date->year }} • {{ $date->format('H:i') }}
                    </span>

                        <span class="pd-chip">
                        <i class="bi bi-chat-dots me-2"></i>
                        {{ $post->comments->count() }} yorum
                    </span>
                    </div>

                    <h1 class="pd-title">{{ $post->title }}</h1>

                    <div class="pd-actions">
                        <a href="#comments" class="btn btn-outline-light pd-btn pd-btn--ghost">
                            Yorumlara Git <i class="bi bi-arrow-down ms-2"></i>
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-outline-light pd-btn pd-btn--ghost">
                            Ana Sayfa <i class="bi bi-house ms-2"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>

        {{-- CONTENT --}}
        <section class="pd-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-9">

                        {{-- ARTICLE --}}
                        <article class="pd-article" data-aos="fade-up">
                            <div class="pd-content">
                                {!! $post->content !!}
                            </div>

                            {{-- TAGS --}}
                            @if($post->tags && $post->tags->count())
                                <div class="pd-tags mt-4">
                                    @foreach($post->tags as $tag)
                                        <span class="pd-tag">
                                        <i class="bi bi-hash"></i> {{ $tag->title }}
                                    </span>
                                    @endforeach
                                </div>
                            @endif

                            {{-- LIKE --}}
                            <div class="pd-like mt-4">
                                <div class="pd-like__left">
                                    @auth()
                                        <form action="{{ route('post.likes.store', $post->id) }}" method="post" class="pd-like__form">
                                            @csrf
                                            <button type="submit" class="pd-like__btn">
                                                @if(auth()->user()->likedPosts->contains($post->id))
                                                    <i class="bi bi-heart-fill"></i>
                                                @else
                                                    <i class="bi bi-heart"></i>
                                                @endif
                                                <span>{{ $post->liked_users_count }}</span>
                                            </button>
                                        </form>
                                    @endauth

                                    @guest()
                                        <div class="pd-like__ghost">
                                            <i class="bi bi-heart"></i>
                                            <span>{{ $post->liked_users_count }}</span>
                                        </div>
                                    @endguest

                                    <div class="pd-like__text">
                                        Bu yazı <strong>{{ $post->liked_users_count }}</strong> kişi tarafından beğenildi.
                                    </div>
                                </div>
                            </div>
                        </article>

                        {{-- RELATED --}}
                        @if($relatedPosts->count() > 0)
                            <section class="pd-related mt-5" data-aos="fade-up">
                                <div class="pd-sec-head">
                                    <h2 class="pd-sec-title">Benzer Yazılar</h2>
                                    <div class="pd-sec-sub">İlgini çekebilecek içerikler</div>
                                </div>

                                <div class="row g-4">
                                    @foreach($relatedPosts as $relatedPost)
                                        <div class="col-12 col-md-6 col-xl-4">
                                            <article class="pd-rel-card">
                                                <a class="pd-rel-card__media" href="{{ route('post.show', $relatedPost->id) }}">
                                                    <img src="{{ $relatedPost->main_image }}" alt="{{ $relatedPost->title }}" loading="lazy">
                                                </a>
                                                <div class="pd-rel-card__body">
                                                    <a class="pd-rel-card__title" href="{{ route('post.show', $relatedPost->id) }}">
                                                        {{ $relatedPost->title }}
                                                    </a>
                                                    <a class="pd-rel-card__read" href="{{ route('post.show', $relatedPost->id) }}">
                                                        Oku <i class="bi bi-arrow-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        @endif

                        {{-- COMMENTS --}}
                        <section id="comments" class="pd-comments mt-5" data-aos="fade-up">
                            <div class="pd-sec-head">
                                <h2 class="pd-sec-title">Yorumlar ({{ $post->comments->count() }})</h2>
                                <div class="pd-sec-sub">Görüşlerini paylaş</div>
                            </div>

                            @foreach($post->comments as $comment)
                                <div class="pd-comment">
                                    <div class="pd-comment__avatar">
                                        <i class="bi bi-person-fill"></i>
                                    </div>

                                    <div class="pd-comment__body">
                                        <div class="pd-comment__top">
                                            <div class="pd-comment__name">{{ $comment->user->name }}</div>
                                            <div class="pd-comment__time">
                                                <i class="bi bi-clock me-1"></i>
                                                {{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Az önce' }}
                                            </div>
                                        </div>

                                        <div class="pd-comment__msg">
                                            {{ $comment->message }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>

                        {{-- ADD COMMENT --}}
                        @auth()
                            <section class="pd-add mt-5 mb-5" data-aos="fade-up">
                                <div class="pd-sec-head">
                                    <h2 class="pd-sec-title">Yorum Ekle</h2>
                                    <div class="pd-sec-sub">Nazik ve anlaşılır bir yorum yazın.</div>
                                </div>

                                <form action="{{ route('post.comments.store', $post->id) }}" method="post" class="pd-form">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="comment" class="form-label fw-bold">Yorumunuz</label>
                                        <textarea
                                            name="message"
                                            id="comment"
                                            class="form-control pd-input"
                                            rows="5"
                                            placeholder="Yorumunuzu buraya yazın..."
                                        >{{ old('message') }}</textarea>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary pd-btn">
                                            <i class="bi bi-send me-2"></i> Gönder
                                        </button>
                                    </div>
                                </form>
                            </section>
                        @endauth

                    </div>
                </div>
            </div>
        </section>

    </div>

    <style>
        /* =========================
           POST DETAIL (Premium)
           ========================= */

        .pd-hero{
            position: relative;
            min-height: 380px;
            border-bottom: 1px solid rgba(15,23,42,.10);
        }
        .pd-hero__media{
            position:absolute;
            inset:0;
        }
        .pd-hero__media img{
            width:100%;
            height:100%;
            object-fit: cover;
            transform: scale(1.02);
        }
        .pd-hero__overlay{
            position:absolute;
            inset:0;
            background:
                radial-gradient(1200px 520px at 40% 0%, rgba(13,110,253,.18), transparent 55%),
                linear-gradient(180deg, rgba(0,0,0,.10) 0%, rgba(0,0,0,.78) 100%);
        }
        .pd-hero__content{
            position:relative;
            z-index:2;
            height:100%;
        }
        .pd-hero__inner{
            padding: 34px 0 22px;
            max-width: 980px;
            color:#fff;
        }
        @media (min-width: 992px){
            .pd-hero{ min-height: 460px; }
            .pd-hero__inner{ padding: 54px 0 28px; }
        }

        .pd-top{
            display:flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items:center;
            margin-bottom: 14px;
        }
        .pd-chip{
            display:inline-flex;
            align-items:center;
            padding: .42rem .8rem;
            border-radius: 999px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.18);
            color:#fff;
            font-weight: 900;
            letter-spacing: -.01em;
            text-decoration:none;
        }
        .pd-chip--soft{
            background: rgba(13,110,253,.18);
            border-color: rgba(13,110,253,.28);
            color:#dbeafe;
        }

        .pd-title{
            margin: 0 0 16px;
            font-weight: 950;
            letter-spacing: -.03em;
            line-height: 1.08;
            font-size: clamp(2rem, 3.2vw, 3.2rem);
        }

        .pd-actions{
            display:flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .pd-btn{
            border-radius: 999px;
            padding: .68rem 1.05rem;
            font-weight: 950;
            letter-spacing: -.01em;
        }
        .pd-btn--ghost{
            color:#fff;
            border-color: rgba(255,255,255,.35);
        }
        .pd-btn--ghost:hover{
            background: rgba(255,255,255,.10);
            border-color: rgba(255,255,255,.45);
            color:#fff;
        }

        /* BODY */
        .pd-body{
            padding: 22px 0 0;
            background:#fff;
        }
        .pd-article{
            /* eskisi: margin-top: -42px; */
            margin-top: 18px;
        }
        @media (min-width: 992px){
            .pd-article{
                /* eskisi: margin-top: -54px; */
                margin-top: 24px;
            }
        }

        /* typography inside content */
        .pd-content{
            color:#0f172a;
            line-height: 1.9;
            font-size: 1.05rem;
        }
        .pd-content h1, .pd-content h2, .pd-content h3{
            font-weight: 950;
            letter-spacing: -.02em;
            line-height: 1.25;
            margin: 1.2rem 0 .6rem;
        }
        .pd-content p{ margin-bottom: 1rem; color:#334155; }
        .pd-content a{ color:#0b3ea8; font-weight: 850; }
        .pd-content img{ max-width:100%; border-radius: 14px; }

        /* tags */
        .pd-tags{
            display:flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .pd-tag{
            display:inline-flex;
            align-items:center;
            gap: 6px;
            padding: .35rem .70rem;
            border-radius: 999px;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            font-weight: 900;
        }

        /* like */
        .pd-like{
            border-top: 1px solid rgba(15,23,42,.08);
            padding-top: 16px;
        }
        .pd-like__left{
            display:flex;
            align-items:center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .pd-like__btn{
            display:inline-flex;
            align-items:center;
            gap: 10px;
            padding: .55rem .95rem;
            border-radius: 999px;
            border: 1px solid rgba(220,53,69,.22);
            background: rgba(220,53,69,.08);
            color:#b4232f;
            font-weight: 950;
        }
        .pd-like__btn:hover{ background: rgba(220,53,69,.12); }
        .pd-like__ghost{
            display:inline-flex;
            align-items:center;
            gap: 10px;
            padding: .55rem .95rem;
            border-radius: 999px;
            border: 1px solid rgba(15,23,42,.10);
            background: rgba(15,23,42,.03);
            color:#0f172a;
            font-weight: 900;
        }
        .pd-like__text{
            color:#64748b;
            font-weight: 650;
        }

        /* sections */
        .pd-sec-head{ margin-bottom: 14px; }
        .pd-sec-title{
            font-weight: 950;
            letter-spacing: -.02em;
            margin: 0 0 4px;
            color:#0f172a;
        }
        .pd-sec-sub{ color:#64748b; font-weight: 650; }

        /* related */
        .pd-rel-card{
            border-radius: 18px;
            overflow:hidden;
            border: 1px solid rgba(15,23,42,.08);
            background:#fff;
            box-shadow: 0 22px 70px rgba(15,23,42,.06);
            height: 100%;
        }
        .pd-rel-card__media{
            display:block;
            aspect-ratio: 16/10;
            overflow:hidden;
        }
        .pd-rel-card__media img{
            width:100%; height:100%;
            object-fit: cover;
            transform: scale(1.02);
            transition: transform .2s ease;
        }
        .pd-rel-card:hover .pd-rel-card__media img{ transform: scale(1.06); }
        .pd-rel-card__body{ padding: 14px 14px 16px; }
        .pd-rel-card__title{
            display:block;
            color:#0f172a;
            text-decoration:none;
            font-weight: 950;
            letter-spacing: -.02em;
            line-height: 1.25;
            margin-bottom: 10px;
        }
        .pd-rel-card__title:hover{ color:#0b3ea8; }
        .pd-rel-card__read{
            text-decoration:none;
            font-weight: 950;
            color:#0b3ea8;
        }
        .pd-rel-card__read:hover{ text-decoration: underline; }

        /* comments */
        .pd-comment{
            display:flex;
            gap: 12px;
            padding: 14px 14px;
            border-radius: 18px;
            border: 1px solid rgba(15,23,42,.08);
            background: rgba(15,23,42,.02);
            margin-bottom: 12px;
        }
        .pd-comment__avatar{
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display:grid;
            place-items:center;
            background: rgba(13,110,253,.10);
            border: 1px solid rgba(13,110,253,.16);
            color:#0b3ea8;
            flex:0 0 auto;
        }
        .pd-comment__top{
            display:flex;
            align-items:center;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 6px;
        }
        .pd-comment__name{
            font-weight: 950;
            letter-spacing: -.02em;
            color:#0f172a;
        }
        .pd-comment__time{
            color:#64748b;
            font-weight: 650;
            font-size: .95rem;
        }
        .pd-comment__msg{
            color:#334155;
            line-height: 1.75;
        }

        /* form */
        .pd-form{
            border-radius: 18px;
            border: 1px solid rgba(15,23,42,.08);
            background:#fff;
            box-shadow: 0 22px 70px rgba(15,23,42,.06);
            padding: 16px;
        }
        @media (min-width: 992px){
            .pd-form{ padding: 18px; }
        }
        .pd-input{
            border-radius: 14px;
            border-color: rgba(15,23,42,.12);
            padding: .75rem .9rem;
        }
        .pd-input:focus{
            border-color: rgba(13,110,253,.45);
            box-shadow: 0 0 0 .25rem rgba(13,110,253,.12);
        }
    </style>
@endsection
