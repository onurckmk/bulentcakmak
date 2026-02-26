<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceholderController extends Controller
{
    public function generate(Request $request, int $width, int $height)
    {
        if ($width < 1 || $width > 2000) {
            return response('Width must be between 1 and 2000', 400);
        }
        if ($height < 1 || $height > 2000) {
            return response('Height must be between 1 and 2000', 400);
        }

        // Query params (Request::get deprecated -> query())
        $seed = (string) $request->query('seed', 'default');

        // Seed'den deterministik renk üret
        $hash = md5($seed);
        $bg   = '#' . substr($hash, 0, 6);
        $fg   = '#' . substr($hash, 6, 6);

        $label = "{$width}×{$height}";

        // Basit, hızlı SVG placeholder (ek paket yok)
        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="{$width}" height="{$height}" viewBox="0 0 {$width} {$height}" role="img" aria-label="{$label}">
  <defs>
    <linearGradient id="g" x1="0" y1="0" x2="1" y2="1">
      <stop offset="0" stop-color="{$bg}"/>
      <stop offset="1" stop-color="{$fg}"/>
    </linearGradient>
  </defs>
  <rect width="100%" height="100%" fill="url(#g)"/>
  <rect x="10" y="10" width="{$width}-20" height="{$height}-20" fill="rgba(255,255,255,0.08)" stroke="rgba(255,255,255,0.20)" />
  <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"
        font-family="Inter, Arial, sans-serif" font-size="24" fill="rgba(255,255,255,0.92)">
    {$label}
  </text>
</svg>
SVG;

        return response($svg, 200)
            ->header('Content-Type', 'image/svg+xml; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=31536000');
    }
}
