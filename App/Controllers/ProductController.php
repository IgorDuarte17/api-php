<?php

namespace App\Controllers;

use Exception;
use App\Models\Product;
use App\Utils\Request;
use App\Utils\Response;
use App\Dao\ProductDao;

class ProductController
{

    private $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function index()
    {
        try {
            $data = ProductDao::all();
            echo Response::success($data);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function store()
    {
        try {

            $data = $this->request->getBody();
            $user = new Product($data->id, $data->name, $data->price);
            $result = ProductDao::save($user);

            echo Response::success($result);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function update()
    {
        try {
            $data = $this->request->getBody();
            $user = new Product($data->id, $data->name, $data->price);
            $result = ProductDao::update($user);
            echo Response::success($result);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function show()
    {
        try {
            $data = $this->request->getBody();
            $user = ProductDao::get($data->id);
            echo Response::success($user);
        } catch (Exception $e) {
            echo Response::error();
        }
    }
}