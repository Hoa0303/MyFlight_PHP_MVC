<?php

namespace App\Controllers;

class ProfileController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $profileModel = new \App\Models\Profile($connection);
            $profiles = $profileModel->all();
            require VIEWS_DIR . '/admin/profile.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function myprofile($id)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $profileModel = new \App\Models\Profile($connection);
            $lists = $profileModel->findById($id);
            if (!$lists) {
                redirect('/');
            }
            require VIEWS_DIR . '/user/myprofile.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $profileModel = new \App\Models\Profile($connection);
            $profileModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật thông tin thành công.';

            redirect('/myprofile/'.$_SESSION['id']);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy(int $id)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $profileModel = new \App\Models\Profile($connection);
            $profile = $profileModel->findById($id);

            $profile?->delete();

            $_SESSION['flash_message'] = 'Đã xóa profile thành công.';

            redirect('/profile');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
