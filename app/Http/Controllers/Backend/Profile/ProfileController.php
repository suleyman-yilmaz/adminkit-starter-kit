<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Profile\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.profile.index');
    }

    public function update(ProfileUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $user = User::findOrFail($id);

        try {
            // Adı her durumda güncelle
            $user->name = $data['name'];

            // Eğer kullanıcı yeni şifre girmediyse sadece ad kaydedilsin
            if (empty($data['new_password'])) {
                $user->save();
                return back()->withSuccess('Profil bilgileri başarıyla güncellendi.');
            }

            // Şifre girmediyse, mevcut şifreyi doğrula
            if (!Hash::check($data['current_password'], $user->password)) {
                return back()
                    ->withErrors('Mevcut şifre hatalı.');
            }

            // Şifre doğruysa yeni şifreyi kaydet
            $user->password = Hash::make($data['new_password']);
            $user->save();

            return back()->withSuccess('Şifre başarıyla güncellendi.');
        } catch (\Exception $e) {
            return back()->withErrors('Bir hata oluştu');
        }
    }
}
