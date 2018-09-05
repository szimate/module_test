<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 13:49
 */

namespace Models;


/**
 * Class Product
 * @package Models
 */
class Product
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
     * @var
     */
    protected $itemNumber;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $price;

    /**
     * @var
     */
    protected $brand;

    /**
     * Product constructor.
     * @param $itemNumber
     * @param $name
     * @param $price
     * @param $brand
     */
    public function __construct($itemNumber, $name, $price, $brand)
    {
        $this->id = Product::$ID++;
        $this->itemNumber = $itemNumber;
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
    }


    /**
     * @return string
     */
    public function getItemNumber(): string
    {
        return $this->itemNumber;
    }

    /**
     * @param string $itemNumber
     */
    public function setItemNumber(string $itemNumber): void
    {
        $this->itemNumber = $itemNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf('%s [%s, %d HUF, %s]', $this->name, $this->brand,
            $this->price, $this->itemNumber->toString());
    }

}

class Special extends Product
{
    private $dangerous;

    public function __construct($itemNumber, $name, $price, $brand, bool $dangerous)
    {
        parent::__construct($itemNumber, $name, $price, $brand);
        $this->dangerous = $dangerous;
    }

    public function __toString()
    {
        return sprintf('%s [%s, %d HUF, %s]', $this->name, $this->brand,
            $this->price, $this->itemNumber, $this->dangerous->toString());
    }


    /**
     * @return bool
     */
    public function isDangerous(): bool
    {
        return $this->dangerous;
    }

    /**
     * @param bool $dangerous
     */
    public function setDangerous(bool $dangerous): void
    {
        $this->dangerous = $dangerous;
    }


}

class EvcNumber extends Product
{
    private $evcNumber;

    public function __construct($itemNumber, $name, $price, $brand, int $evcNumber)
    {
        parent::__construct($itemNumber, $name, $price, $brand);
        $this->evcNumber = $evcNumber;
    }

    /**
     * @return int
     */
    public function getEvcNumber(): int
    {
        return $this->evcNumber;
    }

    /**
     * @param int $evcNumber
     */
    public function setEvcNumber(int $evcNumber): void
    {
        $this->evcNumber = $evcNumber;
    }

    public function __toString(): string
    {
        return sprintf('%s [%s, %d HUF, %s]', $this->name, $this->brand,
            $this->price, $this->itemNumber, $this->evcNumber->toString());
    }


}