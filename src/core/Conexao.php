<?php
include __DIR__. '/config-banco-dados.php';
class Conexao{
    private static $conexao;

    private function __construct()
    {}

    public static function getInstance()
    {
        if (is_null(self::$conexao)) {
            self::$conexao = new \PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASS);
            self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('set names utf8');
        }
        return self::$conexao;
    }
}