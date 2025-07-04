<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function view()
    {
        $userModel = new UserModel();
        $data = [
            'title'      => "User",
            'subtitle'   => "Manage Your User",
            'activePage' => 'user',
            'users'      => $userModel->findAll(),
        ];
        return view('Dashboard/pages/user', $data);
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        $data = [
            'title'      => "User",
            'subtitle'   => "Edit User",
            'activePage' => 'user',
            'users'      => $userModel->findAll(),
            'editUser'   => $user,
        ];
        return view('Dashboard/pages/user', $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $data = $this->request->getPost();
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $userModel->save($data);

        return redirect()->to('user')->with('success', 'User berhasil ditambahkan.');
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $data = $this->request->getPost();

        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }

        $userModel->update($id, $data);
        return redirect()->to('user')->with('success', 'User berhasil diperbarui.');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('user')->with('success', 'User berhasil dihapus.');
    }
}
