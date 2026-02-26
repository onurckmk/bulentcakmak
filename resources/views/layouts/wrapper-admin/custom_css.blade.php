<!-- Custom styles for this template -->
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }

    .bi {
        display: inline-block;
        width: 1rem;
        height: 1rem;
    }

    /*
     * Sidebar
     */

    @media (min-width: 768px) {
        .sidebar .offcanvas-lg {
            position: -webkit-sticky;
            position: sticky;
            top: 48px;
        }

        .navbar-search {
            display: block;
        }
    }

    .sidebar .nav-link {
        font-size: .875rem;
        font-weight: 500;
    }

    .sidebar .nav-link.active {
        color: #2470dc;
    }

    .sidebar-heading {
        font-size: .75rem;
    }

    /*
     * Navbar
     */

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .form-control {
        padding: .75rem 1rem;
    }


    :root{
        --corp-bg:#f6f8fb;
        --corp-card:#ffffff;
        --corp-text:#0f172a;
        --corp-muted:#64748b;
        --corp-border:rgba(15,23,42,.08);
        --corp-shadow:0 18px 45px rgba(2,6,23,.08);
        --corp-radius:16px;
    }

    body{ background: var(--corp-bg); }

    /* content width discipline */
    .admin-container{
        max-width:1180px;
        margin:0 auto;
        padding:24px;
    }

    /* card system */
    .corp-card{
        background:var(--corp-card);
        border:1px solid var(--corp-border);
        border-radius:var(--corp-radius);
        box-shadow:var(--corp-shadow);
        overflow:hidden;
    }
    .corp-card--soft{ background: rgba(255,255,255,.92); }
    .corp-card__head{
        padding:16px 18px;
        border-bottom:1px solid rgba(15,23,42,.06);
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:12px;
        background: rgba(15,23,42,.02);
    }
    .corp-card__body{ padding:18px; }

    /* typography */
    .corp-title{
        font-weight:800;
        letter-spacing:-0.02em;
        color:var(--corp-text);
        margin:0;
    }
    .corp-sub{
        color:var(--corp-muted);
        margin:0;
        font-size:.95rem;
    }

    /* header row */
    .dash-head{
        display:flex;
        align-items:flex-end;
        justify-content:space-between;
        gap:16px;
        margin-bottom:18px;
    }
    .dash-actions{
        display:flex;
        gap:10px;
        flex-wrap:wrap;
    }

    /* buttons */
    .btn-corp{
        border-radius:12px;
        padding:.55rem .95rem;
        border:1px solid rgba(15,23,42,.08);
        background:rgba(15,23,42,.02);
    }
    .btn-corp:hover{ background:rgba(15,23,42,.05); }

    /* stat cards */
    .stat-card{
        border-radius:var(--corp-radius);
        border:1px solid var(--corp-border);
        background:var(--corp-card);
        box-shadow:0 10px 30px rgba(15,23,42,.06);
        transition:transform .15s ease, box-shadow .15s ease;
        height:100%;
    }
    .stat-card:hover{
        transform:translateY(-2px);
        box-shadow:0 18px 50px rgba(15,23,42,.10);
    }
    .stat-card__top{
        padding:16px 16px 10px;
        display:flex;
        align-items:flex-start;
        justify-content:space-between;
        gap:12px;
    }
    .stat-meta{
        color:var(--corp-muted);
        font-size:.9rem;
        margin:0;
    }
    .stat-value{
        font-weight:900;
        font-size:2.1rem;
        margin:2px 0 0;
        letter-spacing:-.02em;
        color:var(--corp-text);
        line-height:1;
    }
    .stat-icon{
        width:44px;
        height:44px;
        border-radius:14px;
        display:flex;
        align-items:center;
        justify-content:center;
        background:rgba(99,102,241,.12);
        color:rgb(79,70,229);
        font-weight:900;
        flex:0 0 auto;
    }
    .stat-icon.green{ background:rgba(34,197,94,.12); color:rgb(22,163,74); }
    .stat-icon.amber{ background:rgba(245,158,11,.14); color:rgb(217,119,6); }
    .stat-icon.cyan{ background:rgba(6,182,212,.14); color:rgb(8,145,178); }

    .stat-card__actions{
        padding:0 16px 16px;
        display:flex;
        gap:10px;
        flex-wrap:wrap;
    }

    /* quick items */
    .quick-item{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:12px;
        padding:14px 14px;
        border-radius:14px;
        border:1px solid rgba(15,23,42,.08);
        background:rgba(15,23,42,.02);
        text-decoration:none;
        color:inherit;
        transition:transform .15s ease, background .15s ease;
    }
    .quick-item:hover{
        transform:translateY(-1px);
        background:rgba(99,102,241,.08);
        text-decoration:none;
        color:inherit;
    }

    /* OPTIONAL: sidebar make it look more corporate (if using .sidebar .nav-link) */
    .sidebar .nav-link{
        border-radius:12px;
        padding:.55rem .75rem;
        margin:.15rem .4rem;
    }
    .sidebar .nav-link.active{
        color:rgb(79,70,229);
        background:rgba(99,102,241,.12);
        font-weight:700;
    }


    /* ===========================
   SIDEBAR (CORPORATE)
   =========================== */
    .sidebar{
        background: #ffffff !important;
        border-right: 1px solid rgba(15,23,42,.08) !important;
    }

    .sidebar .offcanvas-md,
    .sidebar .offcanvas-body{
        background: #ffffff !important;
    }

    .brand-block{
        padding: 18px 16px 10px;
        border-bottom: 1px solid rgba(15,23,42,.06);
    }
    .brand-mark{
        width: 42px; height: 42px;
        border-radius: 14px;
        display:flex; align-items:center; justify-content:center;
        background: rgba(99,102,241,.12);
        color: rgb(79,70,229);
        font-weight: 900;
        letter-spacing: -0.02em;
        flex: 0 0 auto;
    }
    .brand-title{
        margin:0;
        font-weight: 900;
        letter-spacing: -0.02em;
        color:#0f172a;
        font-size: .98rem;
        line-height: 1.1;
    }
    .brand-sub{
        margin:2px 0 0;
        color:#64748b;
        font-size: .82rem;
    }

    .sidebar .nav{
        padding: 10px 10px 0;
    }

    .sidebar .nav-link{
        border-radius: 14px;
        padding: .65rem .75rem;
        margin: .18rem 0;
        color: rgba(15,23,42,.82);
        border: 1px solid transparent;
        transition: background .15s ease, transform .15s ease, border-color .15s ease;
    }
    .sidebar .nav-link:hover{
        background: rgba(15,23,42,.03);
        border-color: rgba(15,23,42,.06);
        transform: translateY(-1px);
        color: rgba(15,23,42,.92);
    }

    .sidebar .nav-link.active{
        background: rgba(99,102,241,.12);
        border-color: rgba(99,102,241,.18);
        color: rgb(79,70,229) !important;
        font-weight: 800;
    }

    .sidebar .nav-link .bi,
    .sidebar .nav-link svg.bi{
        width: 18px;
        height: 18px;
        opacity: .9;
    }

    .sidebar .nav-section{
        padding: 10px 14px 6px;
        color:#94a3b8;
        font-size: .72rem;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .sidebar .divider{
        margin: 10px 14px;
        border-top: 1px solid rgba(15,23,42,.06);
    }

    .account-card{
        margin: 10px 10px 14px;
        border-radius: 16px;
        border: 1px solid rgba(15,23,42,.08);
        background: rgba(15,23,42,.02);
        padding: 12px;
    }
    .account-name{
        font-weight: 800;
        color:#0f172a;
        margin:0;
        font-size: .92rem;
    }
    .account-role{
        margin:2px 0 0;
        color:#64748b;
        font-size: .82rem;
    }

    .logout-btn{
        width:100%;
        border-radius: 12px;
        border: 1px solid rgba(239,68,68,.22);
        background: rgba(239,68,68,.06);
        color: rgb(220,38,38);
        padding: .55rem .8rem;
        font-weight: 800;
    }
    .logout-btn:hover{
        background: rgba(239,68,68,.10);
        border-color: rgba(239,68,68,.30);
    }
</style>
