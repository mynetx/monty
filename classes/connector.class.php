<?php

/**
 * monty is a simple database wrapper.
 *
 * PHP version 5
 *
 * @category  Database
 * @package   Monty
 * @author    Jublo IT Solutions <support@jublo.net>
 * @copyright 2011-2014 Jublo IT Solutions <support@jublo.net>
 * @license   http://opensource.org/licenses/LGPL-3.0 GNU Lesser Public License 3.0
 * @link      https://github.com/jublonet/monty
 */

define('MONTY_ALL_ARRAY', 1);
define('MONTY_ALL_OBJECT', 2);

define('MONTY_ERROR_STRING', 1);
define('MONTY_ERROR_ARRAY', 2);
define('MONTY_ERROR_OBJECT', 3);
define('MONTY_ERROR_NUMERIC', 4);

define('MONTY_INSERT_NORMAL', 1);
define('MONTY_INSERT_IGNORE', 2);
define('MONTY_INSERT_REPLACE', 3);

define('MONTY_JOIN_NORMAL', 1);
define('MONTY_JOIN_LEFT', 2);
define('MONTY_JOIN_RIGHT', 3);

define('MONTY_NEXT_ARRAY', MONTY_ALL_ARRAY);
define('MONTY_NEXT_OBJECT', MONTY_ALL_OBJECT);

define('MONTY_OPEN_NORMAL', 1);
define('MONTY_OPEN_PERSISTENT', 2);

define('MONTY_QUERY_SELECT', 1);
define('MONTY_QUERY_INSERT', 2);
define('MONTY_QUERY_UPDATE', 3);
define('MONTY_QUERY_DELETE', 4);
define('MONTY_QUERY_TRUNCATE', 5);

/**
 * Monty_Connector
 *
 * @category  Database
 * @package   Monty
 * @author    Jublo IT Solutions <support@jublo.net>
 * @copyright 2011 Jublo IT Solutions <support@jublo.net>
 * @license   http://opensource.org/licenses/LGPL-3.0 GNU Lesser Public License 3.0
 * @link      https://github.com/jublonet/monty
 */
abstract class Monty_Connector
{

    protected $return_type;
    protected $number_rows;
    protected $query_handle;
    protected $query_string;

    /**
     * Monty_Connector::error()
     * Get the last operation error.
     *
     * @param int $type Error message return type
     *
     * @return undefined
     */
    public abstract function error($type = MONTY_ERROR_STRING);

    /**
     * Monty_Connector::id()
     * Get the last inserted auto-id.
     *
     * @return undefined
     */
    public abstract function id();

    /**
     * Monty_Connector::next()
     * Walk through the result set.
     *
     * @return undefined
     */
    public abstract function next();

    /**
     * Monty_Connector::nextfield()
     * Walk through the result set and get the next field.
     *
     * @return undefined
     */
    public abstract function nextfield();

    /**
     * Monty_Connector::open()
     * Open a database connection.
     *
     * @param string $user     The database user name
     * @param string $password The database password
     * @param string $database Name of the database to connect to
     * @param string $host     Host name of database server
     *
     * @return undefined
     */
    public abstract function open(
        $user,
        $password,
        $database,
        $host = 'localhost'
    );

    /**
     * Monty_Connector::query()
     * Run a raw database query.
     *
     * @param string $query_string The SQL query to execute
     *
     * @return undefined
     */
    public abstract function query($query_string);

    /**
     * Monty_Connector::rows()
     * Get the number of rows in the result set.
     *
     * @return undefined
     */
    public abstract function rows();

    /**
     * Monty_Connector::seek()
     * Seek a certain row in the result set.
     *
     * @param int $row_number The row number to set the pointer to
     *
     * @return undefined
     */
    public abstract function seek($row_number);

    /**
     * Monty_Connector::setReturnType()
     * Store default return type for database results
     *
     * @param int $return_type The wanted return type
     *
     * @return undefined
     */
    public abstract function setReturnType($return_type);

    /**
     * Monty_Connector::table()
     *
     * @param string $table_name     The name of the table to get
     * @param string $table_shortcut Optional shortcut character
     *
     * @return undefined
     */
    public abstract function table($table_name, $table_shortcut = null);

    /**
     * Monty_Connector::tableExists()
     * Checks whether the given table exists
     *
     * @param string $table_name The name of table to check for
     *
     * @return undefined
     */
    public abstract function tableExists($table_name);
}
