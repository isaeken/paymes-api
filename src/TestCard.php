<?php


namespace IsaEken\Paymes;


/**
 * Class TestCard
 * @package IsaEken\Paymes
 * @method static static firstName()
 * @method static static lastName()
 * @method static static name()
 * @method static static number()
 * @method static static expiryMonth()
 * @method static static expiryYear()
 * @method static static expiryDate()
 * @method static static cvv()
 */
class TestCard
{
    /**
     * @var string $firstName
     */
    protected static string $firstName = 'John';

    /**
     * @var string $lastName
     */
    protected static string $lastName = 'Doe';

    /**
     * @var string $name
     */
    protected static string $name = 'John Doe';

    /**
     * @var string $number
     */
    protected static string $number = '1111222233334444';

    /**
     * @var string $expiryMonth
     */
    protected static string $expiryMonth = '12';

    /**
     * @var string $expiryYear
     */
    protected static string $expiryYear = '30';

    /**
     * @var string $expiryDate
     */
    protected static string $expiryDate = '12/30';

    /**
     * @var string $cvv
     */
    protected string $cvv = '000';

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        if (isset(static::$name)) {
            return static::$name;
        }

        return static::$name(...$arguments);
    }
}
