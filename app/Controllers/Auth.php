<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!$username) {
            return view('auth/login', ['error' => null]);
        }

        $model = new UserModel();
        $user = $model->where('username', $username)->first();

        if ($user) {
            // Login pakai md5
            if (md5($password) === $user['password']) {
                session()->set([
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'email'     => $user['email'],
                    'name'      => $user['name'],
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                return view('auth/login', ['error' => 'Password salah.']);
            }
        } else {
            return view('auth/login', ['error' => 'Username tidak ditemukan.']);
        }
    }

    public function profile()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('auth/profile', [
            'user' => [
                'nama_lengkap' => session()->get('name'),
                'email'        => session()->get('email'),
            ]
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}