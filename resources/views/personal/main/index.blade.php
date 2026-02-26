@extends('layouts.wrapper-personal', ['title' => 'Profil'])

@section('content')
    <div class="container py-4 py-lg-5">

        {{-- HEADER --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="p-title mb-1">Profil</h2>
                <div class="p-sub">Hesap özetiniz ve hızlı erişimler.</div>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary p-btn">
                    <i class="bi bi-box-arrow-up-right me-2"></i> Siteyi Gör
                </a>

                @if(auth()->user()->isAdministrator())
                    <a href="{{ route('admin.main.index') }}" class="btn btn-primary p-btn">
                        <i class="bi bi-gear me-2"></i> Admin Panel
                    </a>
                @endif
            </div>
        </div>

        {{-- USER CARD --}}
        <div class="p-hero mb-4">
            <div class="p-hero__left">
                <div class="p-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div>
                    <div class="p-name">{{ auth()->user()->name ?? 'Kullanıcı' }}</div>
                    <div class="p-mail">{{ auth()->user()->email ?? '' }}</div>
                </div>
            </div>

            <div class="p-hero__right">
                <span class="p-pill">
                    <i class="bi bi-shield-check me-2"></i>
                    {{ auth()->user()->isAdministrator() ? 'Yönetici' : 'Üye' }}
                </span>
            </div>
        </div>

        {{-- KPI CARDS --}}
        <div class="row g-3 g-lg-4">

            {{-- Liked --}}
            <div class="col-12 col-md-6 col-xl-4">
                <div class="kpi-card kpi-card--blue">
                    <div class="kpi-head">
                        <div>
                            <div class="kpi-title">Beğendiklerim</div>
                            <div class="kpi-sub">Kaydedilmiş beğeniler</div>
                        </div>
                        <div class="kpi-ico">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                    </div>

                    <div class="kpi-value">{{ $data['countLiked'] }}</div>

                    <div class="kpi-actions">
                        <a href="{{ route('personal.liked.index') }}" class="btn btn-outline-primary kpi-btn">
                            Listeyi Gör <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Comments --}}
            <div class="col-12 col-md-6 col-xl-4">
                <div class="kpi-card kpi-card--green">
                    <div class="kpi-head">
                        <div>
                            <div class="kpi-title">Yorumlarım</div>
                            <div class="kpi-sub">Yaptığınız yorumlar</div>
                        </div>
                        <div class="kpi-ico">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                    </div>

                    <div class="kpi-value">{{ $data['countComments'] }}</div>

                    <div class="kpi-actions">
                        <a href="{{ route('personal.comment.index') }}" class="btn btn-outline-success kpi-btn">
                            Listeyi Gör <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Quick --}}
            <div class="col-12 col-xl-4">
                <div class="kpi-card kpi-card--soft">
                    <div class="kpi-head">
                        <div>
                            <div class="kpi-title">Hızlı İşlemler</div>
                            <div class="kpi-sub">Kısayollar</div>
                        </div>
                        <div class="kpi-ico">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                    </div>

                    <div class="quick-list">
                        <a class="quick-item" href="{{ route('personal.liked.index') }}">
                            <span><i class="bi bi-heart me-2"></i> Beğendiklerim</span>
                            <span class="arrow">→</span>
                        </a>
                        <a class="quick-item" href="{{ route('personal.comment.index') }}">
                            <span><i class="bi bi-chat-dots me-2"></i> Yorumlarım</span>
                            <span class="arrow">→</span>
                        </a>
                        <a class="quick-item" href="{{ url('/') }}">
                            <span><i class="bi bi-journal-text me-2"></i> Blog</span>
                            <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <style>
        /* =========================
           PERSONAL DASHBOARD (Modern)
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
        .p-btn{
            border-radius: 999px;
            padding: .62rem 1.05rem;
            font-weight: 900;
            letter-spacing: -.01em;
        }

        .p-hero{
            border-radius: 18px;
            background:
                radial-gradient(900px 260px at 20% 0%, rgba(13,110,253,.12), transparent 55%),
                rgba(15,23,42,.02);
            border: 1px solid rgba(15,23,42,.08);
            box-shadow: 0 22px 70px rgba(15,23,42,.06);
            padding: 16px 18px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 12px;
        }
        .p-hero__left{
            display:flex;
            align-items:center;
            gap: 12px;
            min-width:0;
        }
        .p-avatar{
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display:grid;
            place-items:center;
            background: rgba(13,110,253,.12);
            border: 1px solid rgba(13,110,253,.18);
            color:#0b3ea8;
            font-size: 1.2rem;
            flex:0 0 auto;
        }
        .p-name{
            font-weight: 950;
            letter-spacing: -.02em;
            color:#0f172a;
            line-height: 1.1;
        }
        .p-mail{
            color:#64748b;
            font-weight: 650;
            font-size: .95rem;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
            max-width: 520px;
        }
        .p-pill{
            display:inline-flex;
            align-items:center;
            padding: .45rem .8rem;
            border-radius: 999px;
            background: rgba(15,23,42,.04);
            border: 1px solid rgba(15,23,42,.08);
            color:#0f172a;
            font-weight: 900;
        }

        .kpi-card{
            border-radius: 18px;
            background:#fff;
            border: 1px solid rgba(15,23,42,.08);
            box-shadow: 0 22px 70px rgba(15,23,42,.06);
            padding: 16px 16px 14px;
            height: 100%;
            transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
        }
        .kpi-card:hover{
            transform: translateY(-2px);
            box-shadow: 0 28px 80px rgba(15,23,42,.10);
            border-color: rgba(15,23,42,.12);
        }

        .kpi-head{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 12px;
            margin-bottom: 10px;
        }
        .kpi-title{
            font-weight: 950;
            letter-spacing: -.02em;
            color:#0f172a;
        }
        .kpi-sub{
            color:#64748b;
            font-weight: 650;
            font-size: .95rem;
        }
        .kpi-ico{
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display:grid;
            place-items:center;
            border: 1px solid rgba(15,23,42,.08);
            background: rgba(15,23,42,.03);
            color:#0f172a;
            font-size: 1.1rem;
            flex:0 0 auto;
        }

        .kpi-card--blue .kpi-ico{
            background: rgba(13,110,253,.12);
            border-color: rgba(13,110,253,.18);
            color:#0b3ea8;
        }
        .kpi-card--green .kpi-ico{
            background: rgba(25,135,84,.12);
            border-color: rgba(25,135,84,.18);
            color:#0f5132;
        }
        .kpi-card--soft{
            background:
                radial-gradient(900px 260px at 20% 0%, rgba(13,110,253,.10), transparent 60%),
                rgba(15,23,42,.02);
        }

        .kpi-value{
            font-weight: 950;
            letter-spacing: -.03em;
            color:#0f172a;
            font-size: 2rem;
            margin: 6px 0 12px;
        }

        .kpi-actions{
            margin-top: auto;
        }
        .kpi-btn{
            border-radius: 999px;
            padding: .55rem .95rem;
            font-weight: 900;
            letter-spacing: -.01em;
        }

        .quick-list{
            display:flex;
            flex-direction:column;
            gap: 10px;
            margin-top: 6px;
        }
        .quick-item{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 10px;
            padding: 12px 12px;
            border-radius: 14px;
            text-decoration:none;
            color:#0f172a;
            font-weight: 900;
            background: rgba(255,255,255,.75);
            border: 1px solid rgba(15,23,42,.08);
        }
        .quick-item:hover{
            background: rgba(255,255,255,1);
            border-color: rgba(15,23,42,.12);
        }
        .arrow{
            color:#64748b;
            font-weight: 950;
        }
    </style>
@endsection
