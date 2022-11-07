<?php

namespace App\Dao;

use Exception;
use App\Connection;
use App\Models\User;

class UserDao
{

    public static function save(User $user)
    {
        try {
            $sql = 'INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?,?,?,?)';
            $stmt = Connection::getInstance()->prepare($sql);
            $result = $stmt->execute([$user->getName(), $user->getEmail(), $user->getCpf(), $user->getPassword()]);
            return $result;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function all()
    {
        $sql = 'SELECT * FROM usuarios';
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
        $sql = 'SELECT * FROM usuarios WHERE id = ?';
        $stmt = Connection::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function update(User $user)
    {
        $sql = 'UPDATE usuarios SET nome = :name, email = :email, cpf = :cpf, senha = :password WHERE id = :id';
        $stmt = Connection::getInstance()->prepare($sql);
        $result = $stmt->execute([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'cpf' => $user->getCpf(),
            'password' => $user->getPassword(),
        ]);
        return $result;
    }

    public static function getUserProducts(int $id)
    {
        $sql = "SELECT 
                    u.nome AS nome_usuario,
                    u.cpf AS cpf_usuario,
                    u.email AS email_usuario,
                    p.nome AS nome_produto,
                    p.preco AS preço_produto
                FROM produtos_usuarios pu
                LEFT JOIN produtos p ON p.id = pu.id_produto
                LEFT JOIN usuarios u ON u.id - pu.id_usuario
                WHERE pu.id_produto = p.id AND pu.id_usuario = $id";

        $stmt = Connection::getInstance()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } else {
            return [];
        }
    }
}