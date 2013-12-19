<?php
namespace Clem\Book\Database;

use \PDO;

/**
 * Class Database
 *
 * @author Clément Herreman <clement.herreman@gmail.com>
 */
class Database
{
    /** @var \PDO */
    private static $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null) {
            self::initConnection();
        }

        return self::$connection;
    }

    private static function initConnection()
    {
        self::$connection = new PDO('mysql:host=localhost;dbname=insset2013book', 'root', 'azerty');
        self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
