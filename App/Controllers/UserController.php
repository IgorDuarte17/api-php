<?php

namespace App\Controllers;

use Exception;
use App\Models\User;
use App\Utils\Request;
use App\Utils\Response;
use App\Dao\UserDao;

class UserController
{

    private $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function index()
    {
        try {
            $data = UserDao::all();
            echo Response::success($data);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function store()
    {
        try {

            $data = $this->request->getBody();
            $user = new User($data->id, $data->name, $data->email, $data->cpf, $data->password);
            $result = UserDao::save($user);

            echo Response::success($result);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function update()
    {
        try {
            $data = $this->request->getBody();
            $user = new User($data->id, $data->name, $data->email, $data->cpf, $data->password);
            $result = UserDao::update($user);
            echo Response::success($result);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function show()
    {
        try {
            $data = $this->request->getBody();
            $user = UserDao::get($data->id);
            echo Response::success($user);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function userProducts()
    {
        try {
            $data = $this->request->getBody();
            $user = UserDao::getUserProducts($data->id);
            echo Response::success($user);
        } catch (Exception $e) {
            echo Response::error();
        }
    }
}