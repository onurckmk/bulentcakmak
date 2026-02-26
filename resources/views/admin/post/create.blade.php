@extends('layouts.wrapper-admin', ['title' => 'Yazı Ekle'])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Yeni Yazı Ekle</h2>
                <p class="corp-sub">Yeni bir blog yazısı oluşturun ve yayınlamaya hazırlayın.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.post.index') }}" class="btn btn-corp">
                    ← Yazı Listesi
                </a>
            </div>
        </div>

        <form method="post" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row g-3 g-lg-4">

                {{-- LEFT: MAIN FORM --}}
                <div class="col-12 col-xl-8">
                    <div class="corp-card">
                        <div class="corp-card__head">
                            <div>
                                <div style="font-weight:800; letter-spacing:-.01em;">İçerik</div>
                                <div class="corp-sub">Başlık ve yazı metni</div>
                            </div>
                            <span class="badge text-bg-light" style="border-radius:999px;">Yeni</span>
                        </div>

                        <div class="corp-card__body">

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Yazı Başlığı</label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                    placeholder="Örn: Laravel 11 ile Modern Admin Panel"
                                    value="{{ old('title') }}"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                >
                                @error('title')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    {{ $message }}
                                </div>
                                @else
                                    <div class="form-text" style="color:#64748b;">
                                        Kısa, anlaşılır ve SEO uyumlu bir başlık yazın.
                                    </div>
                                    @enderror
                            </div>

                            <div class="mb-0">
                                <label class="form-label" style="font-weight:800;">Yazı Metni</label>
                                <textarea
                                    class="form-control @error('content') is-invalid @enderror"
                                    name="content"
                                    rows="10"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                    placeholder="Yazı içeriğini buraya girin..."
                                >{{ old('content') }}</textarea>

                                @error('content')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    {{ $message }}
                                </div>
                                @else
                                    <div class="form-text" style="color:#64748b;">
                                        Paragraflar ve başlıklarla okunabilirliği artırın.
                                    </div>
                                    @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- RIGHT: SETTINGS --}}
                <div class="col-12 col-xl-4">

                    {{-- MEDIA --}}
                    <div class="corp-card mb-3">
                        <div class="corp-card__head">
                            <div>
                                <div style="font-weight:800; letter-spacing:-.01em;">Medya</div>
                                <div class="corp-sub">Önizleme ve ana görsel</div>
                            </div>
                        </div>

                        <div class="corp-card__body">
                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Önizleme Görseli</label>
                                <input
                                    type="file"
                                    class="form-control @error('preview_image') is-invalid @enderror"
                                    name="preview_image"
                                    style="border-radius:12px; padding:.55rem .85rem;"
                                >
                                @error('preview_image')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <label class="form-label" style="font-weight:800;">Ana Görsel</label>
                                <input
                                    type="file"
                                    class="form-control @error('main_image') is-invalid @enderror"
                                    name="main_image"
                                    style="border-radius:12px; padding:.55rem .85rem;"
                                >
                                @error('main_image')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- META --}}
                    <div class="corp-card">
                        <div class="corp-card__head">
                            <div>
                                <div style="font-weight:800; letter-spacing:-.01em;">Sınıflandırma</div>
                                <div class="corp-sub">Kategori ve etiket</div>
                            </div>
                        </div>

                        <div class="corp-card__body">

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Kategori Seç</label>
                                <select
                                    class="form-select @error('category_id') is-invalid @enderror"
                                    name="category_id"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                >
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <label class="form-label" style="font-weight:800;">Etiket Seç</label>

                                {{-- select2 varsa çalışır; yoksa normal multiple select olarak çalışır --}}
                                <select
                                    class="form-select @error('tag_ids') is-invalid @enderror {{ class_exists('Illuminate\\Support\\Str') ? '' : '' }}"
                                    multiple
                                    name="tag_ids[]"
                                    style="border-radius:12px; padding:.65rem .85rem; min-height: 140px;"
                                >
                                    @foreach($tags as $tag)
                                        <option
                                            value="{{ $tag->id }}"
                                            {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                        >
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('tag_ids')
                                <div class="invalid-feedback" style="font-weight:700; display:block;">
                                    {{ $message }}
                                </div>
                                @else
                                    <div class="form-text" style="color:#64748b;">
                                        Birden fazla etiket seçebilirsiniz (Ctrl ile).
                                    </div>
                                    @enderror
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            {{-- ACTIONS --}}
            <div class="d-flex gap-2 mt-3">
                <button type="submit"
                        class="btn btn-primary"
                        style="border-radius:12px; padding:.65rem 1.05rem;">
                    Yazıyı Oluştur
                </button>

                <a href="{{ route('admin.post.index') }}"
                   class="btn btn-corp"
                   style="padding:.65rem 1.05rem;">
                    Vazgeç
                </a>
            </div>

        </form>
    </div>
@endsection
