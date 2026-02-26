<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * TODO Abolish.
 *
 * @deprecated
 */
class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            // Single category selection comes as category_id from the form.
            $categoryId = $data['category_id'] ?? null;
            unset($data['category_id']);

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if (isset($data['preview_image'])) {
                $path = Storage::disk('public')->put('images', $data['preview_image']);
                $data['preview_image'] = '/storage/' . $path;
            }
            if (isset($data['main_image'])) {
                $path = Storage::disk('public')->put('images', $data['main_image']);
                $data['main_image'] = '/storage/' . $path;
            }

            // Slug is required by DB schema.
            $data['slug'] = $this->uniqueSlug($data['title'] ?? 'post');

            $post = Post::create($data);

            if ($categoryId) {
                // The project schema uses category_post pivot.
                $post->categories()->sync([$categoryId]);
            }

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Post store failed', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw $e;
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            $categoryId = $data['category_id'] ?? null;
            unset($data['category_id']);
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if (isset($data['preview_image'])) {
                $path = Storage::disk('public')->put('images', $data['preview_image']);
                $data['preview_image'] = '/storage/' . $path;
            }
            if (isset($data['main_image'])) {
                $path = Storage::disk('public')->put('images', $data['main_image']);
                $data['main_image'] = '/storage/' . $path;
            }

            // Keep slug consistent with title.
            if (isset($data['title']) && $data['title'] !== $post->title) {
                $data['slug'] = $this->uniqueSlug($data['title']);
            }

            $post->update($data);

            if ($categoryId) {
                $post->categories()->sync([$categoryId]);
            }

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Post update failed', ['post_id' => $post->id, 'error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw $e;
        }

        return $post;
    }

    private function uniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i    = 2;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
