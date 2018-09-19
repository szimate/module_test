<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 13:49
 */

namespace Models;

use Exception\NoSuchProductInStores;


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
    public function __construct(int $itemNumber, string $name, int $price, Brand $brand)
    {
        $this->id = Product::$ID++;
        $this->itemNumber = $itemNumber;
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     */
    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf('%s [%d, %d HUF, %s]', '<br/><strong>Product/Car/Chemical:</strong>' . $this->name, $this->itemNumber, $this->price,
            $this->brand->toString());
    }

}