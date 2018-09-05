<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 22:45
 */

namespace Models;

class Car extends Product
{
    /**
     * @var string
     */
    private $color;

    /**
     * Car constructor.
     * @param string $name
     * @param int $itemNumber
     * @param int $price
     * @param Brand $brand
     * @param string $color
     */
    public function __construct(string $name, int $itemNumber, int $price, Brand $brand, string $color)
    {
        parent::__construct($itemNumber, $name, $price, $brand);
        $this->color = $color;
    }

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * @param int $color
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s [%s, %d HUF, %s]', $this->name, $this->brand->toString(),
            $this->price, $this->itemNumber, $this->color);
    }

}