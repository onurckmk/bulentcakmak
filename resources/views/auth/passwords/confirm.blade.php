@extends('layouts.wrapper-auth')

@section('content')
    <div class="auth-wrap">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center align-items-stretch g-0">
                <div class="col-12 col-lg-10 col-xl-9">
                    <div class="auth-card shadow-lg border-0">

                        <div class="row g-0">
                            {{-- LEFT / BRAND --}}
                            <div class="col-12 col-lg-5 auth-side d-none d-lg-flex">
                                <div class="auth-side__inner">
                                    <div class="brand">
                                        <div class="brand-mark">B</div>
                                        <div>
                                            <div class="brand-title">Blog Yönetim</div>
                                            <div class="brand-sub">Kurumsal Panel</div>
                                        </div>
                                    </div>

                                    <div class="side-copy mt-auto">
                                        <div class="side-title">Güvenlik doğrulaması</div>
                                        <div class="side-sub">
                                            Devam etmeden önce şifrenizi doğrulayın.
                                        </div>

                                        <div class="side-badges">
                                            <span class="badge rounded-pill text-bg-light">Secure</span>
                                            <span class="badge rounded-pill text-bg-light">Session</span>
                                            <span class="badge rounded-pill text-bg-light">Confirm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- RIGHT / FORM --}}
                            <div class="col-12 col-lg-7">
                                <div class="auth-main p-4 p-lg-5">

                                    <div class="auth-head mb-4">
                                        <h2 class="auth-title">Şifreyi Doğrula</h2>
                                        <p class="auth-sub">
                                            Devam etmek için lütfen mevcut şifrenizi girin.
                                        </p>
                                    </div>

                                    <div class="alert alert-light border mb-4" style="border-radius:14px;">
                                        <div class="d-flex align-items-start gap-2">
                                            <i class="bi bi-shield-check text-muted" style="font-size:1.1rem;"></i>
                                            <div class="text-muted" style="line-height:1.55;">
                                                Güvenliğiniz için bu işlem öncesinde şifre doğrulaması istenir.
                                            </div>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('password.confirm') }}">
                                        @csrf

                                        {{-- PASSWORD --}}
                                        <div class="mb-3">
                                            <label for="password" class="form-label auth-label">Şifre</label>
                                            <div class="input-group auth-input">
                                            <span class="input-group-text">
                                                <i class="bi bi-lock"></i>
                                            </span>

                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="current-password"
                                                       placeholder="••••••••">
                                            </div>

                                            @error('password')
                                            <div class="invalid-feedback d-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>

                                        {{-- ACTIONS --}}
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3">
                                            @if (Route::has('password.request'))
                                                <a class="auth-link" href="{{ route('password.request') }}">
                                                    Şifremi unuttum
                                                </a>
                                            @else
                                                <span></span>
                                            @endif

                                            <button type="submit" class="btn btn-primary auth-btn">
                                                <i class="bi bi-check2-circle me-2"></i> Doğrula
                                            </button>
                                        </div>

                                        <div class="auth-foot mt-4">
                                            <div class="text-muted small">
                                                Bu doğrulama yalnızca bu oturum için geçerlidir.
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .auth-wrap{
            min-height: calc(100vh - 40px);
            display:flex;
            align-items:center;
        }

        .auth-card{
            border-radius: 18px;
            overflow:hidden;
            background: #fff;
        }

        .auth-side{
            background:
                radial-gradient(1200px 600px at 20% 20%, rgba(13,110,253,.18), transparent 55%),
                radial-gradient(900px 500px at 80% 30%, rgba(17,24,39,.12), transparent 60%),
                linear-gradient(135deg, #0b1220 0%, #101c3a 55%, #0b1220 100%);
            color:#fff;
        }

        .auth-side__inner{
            padding: 34px 28px;
            display:flex;
            flex-direction:column;
            height:100%;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:12px;
        }
        .brand-mark{
            width:44px;height:44px;border-radius:14px;
            display:grid;place-items:center;
            font-weight:900;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.14);
            backdrop-filter: blur(6px);
        }
        .brand-title{ font-weight:900; letter-spacing:-.02em; }
        .brand-sub{ opacity:.75; font-size:.95rem; }

        .side-title{
            font-weight:900;
            font-size:1.2rem;
            letter-spacing:-.02em;
            margin-bottom:.35rem;
        }
        .side-sub{
            opacity:.82;
            line-height:1.6;
            margin-bottom:1rem;
        }
        .side-badges{ display:flex; gap:.5rem; flex-wrap:wrap; }

        .auth-main{ background:#fff; }
        .auth-title{
            font-weight: 950;
            letter-spacing:-.03em;
            margin:0;
        }
        .auth-sub{ color:#64748b; margin:.35rem 0 0; }

        .auth-label{
            font-weight:800;
            color:#0f172a;
            margin-bottom:.35rem;
        }

        .auth-input .input-group-text{
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            background: rgba(15,23,42,.04);
            border-color: rgba(15,23,42,.10);
            color:#475569;
            padding: .65rem .85rem;
        }

        .auth-input .form-control{
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
            border-color: rgba(15,23,42,.10);
            padding: .65rem .85rem;
        }

        .auth-input .form-control:focus{
            box-shadow: 0 0 0 .25rem rgba(13,110,253,.12);
            border-color: rgba(13,110,253,.45);
        }

        .auth-link{
            color:#475569;
            text-decoration:none;
            font-weight:700;
            font-size:.95rem;
        }
        .auth-link:hover{ text-decoration:underline; }

        .auth-btn{
            border-radius: 12px;
            padding: .75rem 1rem;
            font-weight: 900;
            letter-spacing: -.01em;
        }

        .auth-foot{
            border-top: 1px solid rgba(15,23,42,.08);
            padding-top: 14px;
        }
    </style>
@endsection
