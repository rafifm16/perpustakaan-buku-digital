<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Kalau sudah login, langsung lempar ke halaman buku
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/buku');
        }

        return view('auth/login', ['title' => 'Login']);
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'user_id'      => $user['id'],
                'username'     => $user['username'],
                'nama_lengkap' => $user['nama_lengkap'],
                'isLoggedIn'   => true,
            ];
            session()->set($sessionData);

            return redirect()->to('/buku')
                ->with('success', 'Login berhasil, selamat datang ' . $user['nama_lengkap']);
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')->with('success', 'Anda telah logout');
    }
}
