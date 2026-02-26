@extends('layouts.wrapper-admin', ['title' => $post->title])

@section('content')
    <div class="admin-container">

        {{-- HEADER --}}
        <div class="dash-head">
            <div>
                <h2 class="corp-title">Yazıyı Düzenle</h2>
                <p class="corp-sub">Mevcut yazının içeriğini, görsellerini ve sınıflandırmasını güncelleyin.</p>
            </div>

            <div class="dash-actions">
                <a href="{{ route('admin.post.index') }}" class="btn btn-corp">
                    ← Yazı Listesi
                </a>
                <a href="{{ url('/posts/' . $post->id) }}" class="btn btn-corp">
                    Yazıyı Gör
                </a>
            </div>
        </div>

        <form method="post" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="row g-3 g-lg-4">

                {{-- LEFT: CONTENT --}}
                <div class="col-12 col-xl-8">
                    <div class="corp-card">
                        <div class="corp-card__head">
                            <div>
                                <div style="font-weight:800; letter-spacing:-.01em;">İçerik</div>
                                <div class="corp-sub">Başlık ve yazı metni</div>
                            </div>
                            <span class="badge text-bg-light" style="border-radius:999px;">ID: #{{ $post->id }}</span>
                        </div>

                        <div class="corp-card__body">

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Yazı Başlığı</label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                    value="{{ old('title', $post->title) }}"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                    placeholder="Örn: Laravel 11 ile Modern Admin Panel"
                                >
                                @error('title')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <label class="form-label" style="font-weight:800;">Yazı Metni</label>
                                <textarea
                                    name="content"
                                    class="form-control @error('content') is-invalid @enderror"
                                    rows="10"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                    placeholder="Yazı içeriğini buraya girin..."
                                >{{ old('content', $post->content) }}</textarea>

                                @error('content')
                                <div class="invalid-feedback" style="font-weight:700;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- RIGHT: MEDIA + META --}}
                <div class="col-12 col-xl-4">

                    {{-- MEDIA --}}
                    <div class="corp-card mb-3">
                        <div class="corp-card__head">
                            <div>
                                <div style="font-weight:800; letter-spacing:-.01em;">Medya</div>
                                <div class="corp-sub">Mevcut görseller ve güncelleme</div>
                            </div>
                        </div>

                        <div class="corp-card__body">

                            {{-- Preview image --}}
                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Önizleme Görseli</label>

                                @if(!empty($post->preview_image))
                                    <div class="mb-2 p-2" style="border:1px solid rgba(15,23,42,.08); border-radius:14px; background: rgba(15,23,42,.02);">
                                        <img src="{{ $post->preview_image }}"
                                             alt="Önizleme Görseli"
                                             style="width:100%; max-height:170px; object-fit:cover; border-radius:12px;">
                                    </div>
                                @endif

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

                            {{-- Main image --}}
                            <div class="mb-0">
                                <label class="form-label" style="font-weight:800;">Ana Görsel</label>

                                @if(!empty($post->main_image))
                                    <div class="mb-2 p-2" style="border:1px solid rgba(15,23,42,.08); border-radius:14px; background: rgba(15,23,42,.02);">
                                        <img src="{{ $post->main_image }}"
                                             alt="Ana Görsel"
                                             style="width:100%; max-height:170px; object-fit:cover; border-radius:12px;">
                                    </div>
                                @endif

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
                                <div class="corp-sub">Kategori ve etiketler</div>
                            </div>
                        </div>

                        <div class="corp-card__body">

                            <div class="mb-3">
                                <label class="form-label" style="font-weight:800;">Kategori</label>

                                @php
                                    $selectedCategoryId = old('category_id') ?? optional($post->categories->first())->id;
                                @endphp

                                <select
                                    class="form-select @error('category_id') is-invalid @enderror"
                                    name="category_id"
                                    style="border-radius:12px; padding:.65rem .85rem;"
                                >
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ (int) $selectedCategoryId === (int) $category->id ? 'selected' : '' }}>
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
                                <label class="form-label" style="font-weight:800;">Etiketler</label>

                                {{-- select2 varsa çalışır; yoksa normal multiple select olarak çalışır --}}
                                <select
                                    class="form-select @error('tag_ids') is-invalid @enderror"
                                    multiple
                                    name="tag_ids[]"
                                    style="border-radius:12px; padding:.65rem .85rem; min-height: 140px;"
                                >
                                    @php
                                        $selectedTags = old('tag_ids', $post->tags->pluck('id')->toArray());
                                        $selectedTags = is_array($selectedTags) ? $selectedTags : [];
                                    @endphp

                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
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
            <div class="d-flex gap-2 mt-3 mb-5">
                <button type="submit"
                        class="btn btn-primary"
                        style="border-radius:12px; padding:.65rem 1.05rem;">
                    Güncelle
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
