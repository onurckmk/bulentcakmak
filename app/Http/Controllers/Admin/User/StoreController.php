<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        // Şifre manuel alınıyor → hashle
        $data['password'] = Hash::make($data['password']);

        // Email unique mantığı: varsa güncelleme yapmadan döner, yoksa oluşturur
        User::firstOrCreate(['email' => $data['email']], $data);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Kullanıcı başarıyla oluşturuldu.');
    }
}
