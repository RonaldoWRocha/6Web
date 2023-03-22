<?php

/**
 * ClasseDB()
 *
 * Classe de conexão. Padrão SingleTon.
 * Retorna um objeto PDO pelo método estático getConn();
 *
 */
class DB
{

    private static $conn = null;

    /**
     * Retorna objeto PDO
     * @return null|PDO
     */
    private static function connect($connection)
    {
        try {
            $db = database($connection);
                self::$conn = new PDO("mysql:dbname=" . $db['database'] . ";port=" . $db['port'] . ";charset=" . $db['charset'] . ";host=" . $db['host'], $db['username'], $db['password'], $db['options']);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, $db['errmode']);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $db['fetch_mode']);
        } catch (PDOException $e) {
            throw new PDOException("Reveja suas credênciais de conexão ao banco de dados!<br />Contate o administrador!");
        }
        return self::$conn;
    }

    /**
     * Executa método connect()
     * @return null|PDO
     */
    public static function getConn($connection)
    {
        return static::connect($connection);
    }

    /**
     * Construtor do tipo privado previne que uma nova instância da
     * Classe seja criada através do operador `new` de fora dessa classe.
     */
    private function __construct()
    {

    }

    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe
     *
     * @return void
     */
    private function __clone()
    {

    }

    /**
     * Método unserialize do tipo privado  para reestabelecer qualquer
     * conexão com banco de dados que podem ter sido perdidas
     * durante a serialização,
     * e realizar outras tarefas de reinicialização
     *
     * @return void
     */
    private function __wakeup()
    {
        static::getConn();
    }

}
