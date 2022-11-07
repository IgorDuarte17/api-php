<?php

namespace App\Dao;

use Exception;
use App\Connection;
use App\Models\Product;

class ProductDao
{

    public static function save(Product $product)
    {
        try {
            $sql = 'INSERT INTO produtos (name, price) VALUES (?,?)';
            $stmt = Connection::getInstance()->prepare($sql);
            $result = $stmt->execute([$product->getName(), $product->getPrice()]);
            return $result;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function all()
    {
        $sql = 'SELECT * FROM produtos';
        $stmt = Connection::getInstance()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } else {
            return [];
        }
    }

    public static function get(int $id)
    {
        $sql = 'SELECT * FROM produtos WHERE id = ?';
        $stmt = Connection::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function update(Product $product)
    {
        $sql = 'UPDATE produtos SET name = :name, price = :price WHERE id = :id';
        $stmt = Connection::getInstance()->prepare($sql);
        $result = $stmt->execute([
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ]);
        return $result;
    }
}