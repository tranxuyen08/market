<?php

namespace App\Controllers;

use App\Core\App;
use PDO;

session_start();

class AdminController
{
    /**
     * Show all users.
     */
    public function index()
    {
        // Neu $_SESSION['admin_info'] ton tai thi admin da login
        // thi tra ve trang admin/home
        if (!empty($_SESSION['admin_info'])) {
            return redirect('admin/home');
        }
        return view('admin/login');
    }

    /**
     * Show all users.
     */
    public function home()
    {
        // Neu $_SESSION['admin_info'] ko ton tai thi admin chua login
        // thi tra ve trang admin/
        if (empty($_SESSION['admin_info'])) {
            return redirect('admin/');
        }
        return view('admin/home');
    }

    /**
     * Show all users.
     */
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $sql = "SELECT * FROM admins WHERE email = ? AND password = ?";
        $query = App::get('database')->sqlQuery($sql, array(
            $email,
            $password
        ));
        $user = $query->fetch();
        if (!empty($user)) {
            // Vao trang admin page va login

            $_SESSION['admin_info'] = $user;
            return redirect('admin/home');
        }

        // Tra ve trang admin login
        return redirect('admin/');
    }

    public function logout()
    {
        if (!empty($_SESSION['admin_info'])) {
            unset($_SESSION['admin_info']);
        }
        return redirect('admin/');
    }

    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (empty($id)) {
            return redirect('admin/user');
        }
        $sql = "SELECT * FROM users WHERE id = ?";
        $query = APP::get('database')->sqlQuery($sql, array(
            $id
        ));
        $user = $query->fetch();
        return view('admin/detail', array(
            'user' => $user
        ));
    }
    public function update()
    {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $gender = $_POST['gender']; 
        $sql = "UPDATE users SET email = ?, password = ?, name = ?, phone_number = ?, gender = ?
            WHERE id = ?";
        $query = App::get('database')->sqlQuery($sql, array(
            $email,
            md5($password),
            $name,
            $phone_number,
            $gender,
            $id
        ));
        $user = $query->execute();
        return redirect('admin/user');
    }
    public function delete()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id = ?";
        $query = App::get('database')->sqlQuery($sql, array(
            $id
        ));
        $query->execute();
        return redirect('admin/user');

    }
    
    public function insert()
    {
        return view('admin/insert');
    }

    public function insert_sql()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $sql = "INSERT INTO users (email, password, name, phone_number, gender ) VALUES(?, ?, ?, ?, ?) ";
        $query = App::get('database')->sqlQuery($sql, array(
            $email,
            $password,
            $name,
            $phone_number,
            $gender
        ));
        return redirect('admin/user');
    }

    public function list_users()
    {
        $sql = "SELECT count(*) as count FROM users";
        $query = App::get('database')->sqlQuery($sql);
        $totalUsers = $query->fetch(PDO::FETCH_ASSOC);
        if (!empty($totalUsers)) {
            $totalUsers = $totalUsers['count'];
        } else {
            $totalUsers = 0;
        }
        $limit = 10;
        $page = 1;
        if (!empty($_GET['page'])) {
            $page = (int) $_GET['page'];
        }
        list($totalPage, $offset) = pagination($totalUsers, $page, $limit);
        
        $sql = "SELECT * FROM users LIMIT ? OFFSET ?";
        $query = App::get('database')->sqlQuery($sql, array(
            array($limit, PDO::PARAM_INT),
            array($offset, PDO::PARAM_INT),
        ));
        $listUsers = $query->fetchAll(PDO::FETCH_ASSOC);
        if (empty($listUsers)) {
            $listUsers = array();
        }
        
        return view('admin/users', array(
            'totalUsers' => $totalUsers,
            'listUsers' => $listUsers,
            'totalPage' => $totalPage,
            'page' => $page,
            'limit' => $limit
        ));
    }
}
