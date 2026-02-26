@php
    /** @var \Illuminate\Support\Collection|\Illuminate\Pagination\LengthAwarePaginator $posts */
@endphp

<div class="mag-feed">

    @if($posts->isNotEmpty())
        @php
            $featuredPost = $posts->first();
            $otherPosts = $posts->slice(1);
        @endphp

        {{-- FEATURED HERO --}}
        <section class="mf-hero" data-aos="fade-up">
            <div class="mf-hero__media">
                <img src="{{ $featuredPost->preview_image }}" alt="{{ $featuredPost->title }}" loading="lazy">
                <span class="mf-hero__overlay"></span>
            </div>

            <div class="container mf-hero__content">
                <div class="mf-hero__inner">
                    <div class="mf-top">
                        <span class="mf-badge">
                            <i class="bi bi-star-fill me-2"></i> Öne Çıkan
                        </span>

                        @php $featuredCategory = $featuredPost->categories->first(); @endphp
                        @if($featuredCategory)
                            <a class="mf-badge mf-badge--soft"
                               href="{{ route('category.post.index', $featuredCategory->id) }}">
                                <i class="bi bi-folder2-open me-2"></i>
                                {{ $featuredCategory->title ?? 'Kategori' }}
                            </a>
                        @endif

                        <span class="mf-date">
                            <i class="bi bi-calendar3 me-2"></i>
                            {{ optional($featuredPost->created_at)->format('d.m.Y') }}
                        </span>
                    </div>

                    <h1 class="mf-title">
                        <a href="{{ route('post.show', $featuredPost->id) }}">
                            {{ $featuredPost->title }}
                        </a>
                    </h1>

                    <p class="mf-desc">
                        {{ $featuredPost->shortBody() }}
                    </p>

                    <div class="mf-actions">
                        <a href="{{ route('post.show', $featuredPost->id) }}" class="btn btn-primary mf-btn">
                            Devamını Oku <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                        <a href="{{ url('/') }}" class="btn btn-outline-light mf-btn mf-btn--ghost">
                            Tüm Yazılar <i class="bi bi-grid-3x3-gap ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- OTHER POSTS GRID --}}
        <section class="container mt-4">
            <div class="row g-4">
                @foreach($otherPosts as $post)
                    <div class="col-12 col-md-6 col-xl-4" data-aos="fade-up">
                        <article class="mf-card">

                            <a class="mf-card__media" href="{{ route('post.show', $post->id) }}">
                                <img src="{{ $post->preview_image }}" alt="{{ $post->title }}" loading="lazy">
                                <span class="mf-card__overlay"></span>

                                @php $c = $post->categories->first(); @endphp
                                @if($c)
                                    <span class="mf-pill">{{ $c->title ?? 'Kategori' }}</span>
                                @endif
                            </a>

                            <div class="mf-card__body">
                                <div class="mf-card__meta">
                                    <span class="mf-card__date">
                                        <i class="bi bi-calendar3 me-2"></i>
                                        {{ optional($post->created_at)->format('d.m.Y') }}
                                    </span>

                                    @auth
                                        <form action="{{ route('post.likes.store', $post->id) }}" method="post" class="mf-like">
                                            @csrf
                                            <span class="mf-like__count">{{ $post->liked_users_count ?? 0 }}</span>
                                            <button type="submit" class="mf-like__btn" aria-label="Beğen">
                                                @if(auth()->user()->likedPosts->contains($post->id))
                                                    <i class="fas fa-heart"></i>
                                                @else
                                                    <i class="far fa-heart"></i>
                                                @endif
                                            </button>
                                        </form>
                                    @endauth

                                    @guest
                                        <div class="mf-like">
                                            <span class="mf-like__count">{{ $post->liked_users_count ?? 0 }}</span>
                                            <span class="mf-like__ghost"><i class="far fa-heart"></i></span>
                                        </div>
                                    @endguest
                                </div>

                                <h3 class="mf-card__title">
                                    <a href="{{ route('post.show', $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <p class="mf-card__desc">
                                    {{ $post->shortBody() }}
                                </p>

                                <a href="{{ route('post.show', $post->id) }}" class="mf-read">
                                    Devamını Oku <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="mf-pagination d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        </section>

    @else
        <div class="container py-5 text-center">
            <div class="mf-empty">
                <div class="mf-empty__ico"><i class="bi bi-journal-x"></i></div>
                <div class="mf-empty__title">Henüz yazı yok</div>
                <div class="mf-empty__sub">Yeni içerikler eklendiğinde burada görünecek.</div>
            </div>
        </div>
    @endif

</div>

<style>
    /* =========================
       MAGAZINE FEED (Premium)
       ========================= */

    .mf-hero{
        position: relative;
        border-radius: 22px;
        overflow: hidden;
        margin-top: 18px;
        min-height: 360px;
        border: 1px solid rgba(15,23,42,.08);
        box-shadow: 0 28px 90px rgba(15,23,42,.10);
    }
    .mf-hero__media{ position:absolute; inset:0; }
    .mf-hero__media img{
        width:100%; height:100%;
        object-fit: cover;
        transform: scale(1.03);
    }
    .mf-hero__overlay{
        position:absolute; inset:0;
        background:
            radial-gradient(1200px 480px at 40% 0%, rgba(13,110,253,.18), transparent 55%),
            linear-gradient(180deg, rgba(0,0,0,.10) 0%, rgba(0,0,0,.72) 100%);
    }
    .mf-hero__content{ position: relative; z-index:2; height:100%; }
    .mf-hero__inner{
        padding: 26px 14px;
        max-width: 860px;
        color:#fff;
    }
    @media (min-width: 992px){
        .mf-hero{ min-height: 420px; }
        .mf-hero__inner{ padding: 44px 10px; }
    }

    .mf-top{
        display:flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items:center;
        margin-bottom: 14px;
    }
    .mf-badge{
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
    .mf-badge--soft{
        background: rgba(13,110,253,.18);
        border-color: rgba(13,110,253,.28);
        color:#dbeafe;
    }
    .mf-date{
        color: rgba(255,255,255,.78);
        font-weight: 800;
        display:inline-flex;
        align-items:center;
    }

    .mf-title{
        margin: 0 0 10px;
        font-weight: 950;
        letter-spacing: -.03em;
        line-height: 1.1;
        font-size: clamp(1.8rem, 3vw, 3rem);
    }
    .mf-title a{ color:#fff; text-decoration:none; }
    .mf-title a:hover{ text-decoration: underline; }

    .mf-desc{
        margin: 0 0 18px;
        color: rgba(255,255,255,.82);
        font-size: 1.05rem;
        line-height: 1.7;
        max-width: 720px;
    }
    .mf-actions{ display:flex; gap: 10px; flex-wrap: wrap; }
    .mf-btn{
        border-radius: 999px;
        padding: .68rem 1.05rem;
        font-weight: 950;
        letter-spacing: -.01em;
    }
    .mf-btn--ghost{
        color:#fff;
        border-color: rgba(255,255,255,.35);
    }
    .mf-btn--ghost:hover{
        background: rgba(255,255,255,.10);
        border-color: rgba(255,255,255,.45);
        color:#fff;
    }

    /* CARD */
    .mf-card{
        border-radius: 18px;
        overflow:hidden;
        border: 1px solid rgba(15,23,42,.08);
        background:#fff;
        box-shadow: 0 22px 70px rgba(15,23,42,.06);
        height: 100%;
        display:flex;
        flex-direction: column;
        transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
    }
    .mf-card:hover{
        transform: translateY(-2px);
        box-shadow: 0 28px 80px rgba(15,23,42,.10);
        border-color: rgba(15,23,42,.12);
    }
    .mf-card__media{
        position: relative;
        display:block;
        aspect-ratio: 16/10;
        overflow:hidden;
    }
    .mf-card__media img{
        width:100%; height:100%;
        object-fit: cover;
        transform: scale(1.02);
        transition: transform .2s ease;
    }
    .mf-card:hover .mf-card__media img{ transform: scale(1.06); }
    .mf-card__overlay{
        position:absolute; inset:0;
        background: linear-gradient(180deg, rgba(0,0,0,0) 35%, rgba(0,0,0,.22) 100%);
    }
    .mf-pill{
        position:absolute;
        left: 14px;
        bottom: 14px;
        z-index: 2;
        padding: .35rem .70rem;
        border-radius: 999px;
        background: rgba(255,255,255,.92);
        border: 1px solid rgba(15,23,42,.10);
        color:#0f172a;
        font-weight: 950;
        font-size: .85rem;
    }
    .mf-card__body{
        padding: 14px 14px 16px;
        display:flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
    }

    .mf-card__meta{
        display:flex;
        align-items:center;
        justify-content: space-between;
        gap: 10px;
        color:#64748b;
        font-size: .92rem;
    }
    .mf-card__date{
        display:inline-flex;
        align-items:center;
        font-weight: 750;
        color:#64748b;
    }

    .mf-like{
        display:flex;
        align-items:center;
        gap: 8px;
    }
    .mf-like__count{
        font-weight: 950;
        color:#0f172a;
    }
    .mf-like__btn{
        width: 36px;
        height: 36px;
        border-radius: 999px;
        border: 1px solid rgba(15,23,42,.10);
        background: rgba(15,23,42,.04);
        display:grid;
        place-items:center;
        transition: transform .15s ease, background .15s ease, border-color .15s ease;
        color:#0f172a;
    }
    .mf-like__btn:hover{
        transform: translateY(-1px);
        background: rgba(220,53,69,.08);
        border-color: rgba(220,53,69,.18);
        color:#b4232f;
    }
    .mf-like__ghost{
        width: 36px;
        height: 36px;
        border-radius: 999px;
        border: 1px solid rgba(15,23,42,.08);
        background: rgba(15,23,42,.03);
        display:grid;
        place-items:center;
        color:#0f172a;
    }

    .mf-card__title{
        margin: 0;
        font-weight: 950;
        letter-spacing: -.02em;
        line-height: 1.25;
        font-size: 1.05rem;
    }
    .mf-card__title a{ color:#0f172a; text-decoration:none; }
    .mf-card__title a:hover{ color:#0b3ea8; }

    .mf-card__desc{
        margin: 0;
        color:#475569;
        line-height: 1.7;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .mf-read{
        margin-top: auto;
        text-decoration:none;
        font-weight: 950;
        color:#0b3ea8;
    }
    .mf-read:hover{ text-decoration: underline; }

    /* PAGINATION */
    .mf-pagination .pagination{ gap: 6px; }
    .mf-pagination .page-link{
        border-radius: 999px !important;
        border: 1px solid rgba(15,23,42,.12) !important;
        font-weight: 850;
    }
    .mf-pagination .page-item.active .page-link{
        background: #0d6efd !important;
        border-color: #0d6efd !important;
    }

    /* EMPTY */
    .mf-empty__ico{
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display:grid;
        place-items:center;
        margin: 0 auto 10px;
        background: rgba(15,23,42,.04);
        border: 1px solid rgba(15,23,42,.10);
        color:#0f172a;
        font-size: 1.4rem;
    }
    .mf-empty__title{
        font-weight: 950;
        letter-spacing: -.02em;
        color:#0f172a;
    }
    .mf-empty__sub{ color:#64748b; }
</style>
