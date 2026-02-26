@php
    /** @var \Illuminate\Support\Collection|\Illuminate\Pagination\LengthAwarePaginator $likedPosts */
@endphp

<div class="liked-feed">

    {{-- HEADER --}}
    <section class="lf-hero" data-aos="fade-up">
        <div class="container">
            <div class="lf-hero__inner">
                <div class="lf-badge">
                    <i class="bi bi-heart-fill me-2"></i> Beğenilen Yazılar
                </div>
                <h1 class="lf-title">Beğendiklerim</h1>
                <p class="lf-sub">Favori içeriklerinize hızlıca geri dönün.</p>
            </div>
        </div>
    </section>

    {{-- GRID --}}
    <section class="lf-content">
        <div class="container">
            @if($likedPosts->isNotEmpty())
                <div class="row g-4">
                    @foreach($likedPosts as $likedPost)
                        <div class="col-12 col-md-6 col-xl-4" data-aos="fade-up">
                            <article class="lf-card">

                                <a class="lf-card__media" href="{{ route('post.show', $likedPost->id) }}">
                                    <img src="{{ $likedPost->preview_image }}" alt="{{ $likedPost->title }}" loading="lazy">
                                    <span class="lf-card__overlay"></span>

                                    @php $c = $likedPost->categories->first(); @endphp
                                    @if($c)
                                        <span class="lf-pill">{{ $c->title ?? 'Kategori' }}</span>
                                    @endif
                                </a>

                                <div class="lf-card__body">
                                    <div class="lf-meta">
                                        <span class="lf-date">
                                            <i class="bi bi-calendar3 me-2"></i>
                                            {{ optional($likedPost->created_at)->format('d.m.Y') }}
                                        </span>

                                        <span class="lf-like" title="Beğeni">
                                            <i class="bi bi-heart-fill me-2"></i>
                                            {{ $likedPost->liked_users_count ?? 0 }}
                                        </span>
                                    </div>

                                    <h3 class="lf-card__title">
                                        <a href="{{ route('post.show', $likedPost->id) }}">
                                            {{ $likedPost->title }}
                                        </a>
                                    </h3>

                                    <p class="lf-card__desc">
                                        {{ $likedPost->shortBody() }}
                                    </p>

                                    <a href="{{ route('post.show', $likedPost->id) }}" class="lf-read">
                                        Devamını Oku <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>

                            </article>
                        </div>
                    @endforeach
                </div>

                {{-- Eğer paginator ise pagination göster --}}
                @if(method_exists($likedPosts, 'links'))
                    <div class="lf-pagination d-flex justify-content-center mt-4">
                        {{ $likedPosts->links() }}
                    </div>
                @endif
            @else
                <div class="lf-empty text-center py-5">
                    <div class="lf-empty__ico"><i class="bi bi-heart"></i></div>
                    <div class="lf-empty__title">Henüz beğendiğiniz yazı yok</div>
                    <div class="lf-empty__sub mb-3">Bir yazıyı beğendiğinizde burada görüntülenecek.</div>
                    <a href="{{ url('/') }}" class="btn btn-primary lf-btn">
                        <i class="bi bi-journal-text me-2"></i> Yazılara Git
                    </a>
                </div>
            @endif
        </div>
    </section>

</div>

<style>
    /* =========================
       LIKED FEED (Frontend)
       ========================= */

    .lf-hero{
        padding: 56px 0 20px;
        background:
            radial-gradient(1200px 420px at 50% 0%, rgba(13,110,253,.12), transparent 60%),
            linear-gradient(180deg, rgba(15,23,42,.04), rgba(15,23,42,0));
    }
    .lf-hero__inner{
        max-width: 920px;
        margin: 0 auto;
        text-align: center;
    }
    .lf-badge{
        display:inline-flex;
        align-items:center;
        padding: .45rem .85rem;
        border-radius: 999px;
        background: rgba(15,23,42,.04);
        border: 1px solid rgba(15,23,42,.08);
        color:#0f172a;
        font-weight: 950;
        letter-spacing: -.01em;
        margin-bottom: 12px;
    }
    .lf-title{
        margin: 0 0 10px;
        font-weight: 950;
        letter-spacing: -.03em;
        color:#0f172a;
        line-height: 1.1;
    }
    .lf-sub{
        margin: 0;
        color:#64748b;
        font-size: 1.03rem;
    }

    .lf-content{
        padding: 18px 0 62px;
    }

    /* CARD */
    .lf-card{
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
    .lf-card:hover{
        transform: translateY(-2px);
        box-shadow: 0 28px 80px rgba(15,23,42,.10);
        border-color: rgba(15,23,42,.12);
    }

    .lf-card__media{
        position: relative;
        display:block;
        aspect-ratio: 16/10;
        overflow:hidden;
        background: rgba(15,23,42,.03);
    }
    .lf-card__media img{
        width:100%;
        height:100%;
        object-fit: cover;
        transform: scale(1.02);
        transition: transform .2s ease;
    }
    .lf-card:hover .lf-card__media img{ transform: scale(1.06); }

    .lf-card__overlay{
        position:absolute;
        inset:0;
        background: linear-gradient(180deg, rgba(0,0,0,0) 35%, rgba(0,0,0,.22) 100%);
    }

    .lf-pill{
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

    .lf-card__body{
        padding: 14px 14px 16px;
        display:flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
    }

    .lf-meta{
        display:flex;
        align-items:center;
        justify-content: space-between;
        gap: 10px;
        color:#64748b;
        font-size: .92rem;
    }
    .lf-date{
        display:inline-flex;
        align-items:center;
        font-weight: 750;
    }
    .lf-like{
        display:inline-flex;
        align-items:center;
        padding: .28rem .6rem;
        border-radius: 999px;
        background: rgba(220,53,69,.08);
        border: 1px solid rgba(220,53,69,.14);
        color:#b4232f;
        font-weight: 950;
    }

    .lf-card__title{
        margin: 0;
        font-weight: 950;
        letter-spacing: -.02em;
        line-height: 1.25;
        font-size: 1.05rem;
    }
    .lf-card__title a{
        color:#0f172a;
        text-decoration:none;
    }
    .lf-card__title a:hover{ color:#0b3ea8; }

    .lf-card__desc{
        margin: 0;
        color:#475569;
        line-height: 1.7;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .lf-read{
        margin-top: auto;
        text-decoration:none;
        font-weight: 950;
        color:#0b3ea8;
    }
    .lf-read:hover{ text-decoration: underline; }

    /* pagination */
    .lf-pagination .pagination{ gap: 6px; }
    .lf-pagination .page-link{
        border-radius: 999px !important;
        border: 1px solid rgba(15,23,42,.12) !important;
        font-weight: 850;
    }
    .lf-pagination .page-item.active .page-link{
        background: #0d6efd !important;
        border-color: #0d6efd !important;
    }

    /* empty */
    .lf-empty__ico{
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
    .lf-empty__title{
        font-weight: 950;
        letter-spacing: -.02em;
        color:#0f172a;
    }
    .lf-empty__sub{
        color:#64748b;
    }
    .lf-btn{
        border-radius: 999px;
        padding: .68rem 1.05rem;
        font-weight: 950;
        letter-spacing: -.01em;
    }
</style>
