<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 14:14
 */

namespace Models;


/**
 * Class Store
 * @package Models
 */
class Store
{
    /**
     * @var int
     */
    private static $ID = 0;
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $address;
    /**
     * @var int
     */
    private $capacity;
    /**
     * @var array
     */
    private $products;

    /**
     * Store constructor.
     * @param $name
     * @param $address
     * @param $capacity
     */
    public function __construct(string $name, string $address, int $capacity)
    {
        $this->id = Store::$ID++;
        $this->name = $name;
        $this->address = $address;
        $this->capacity = $capacity;
        $this->products = [];
    }

    public function getId(): int
    {
        return $this->if;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s [%s, %d/%d]', $this->name, $this->capacity, $this->address);
    }

    public function addProduct(Product $product) : void {

    }


}