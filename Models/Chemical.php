<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 22:46
 */

namespace Models;


class Chemical extends Product
{
    /**
     * @var bool
     */
    private $dangerous;

    /**
     * Chemical constructor.
     * @param string $name
     * @param int $itemNumber
     * @param int $price
     * @param Brand $brand
     * @param bool $dangerous
     */
    public function __construct(string $name, int $itemNumber, int $price, Brand $brand, bool $dangerous)
    {
        parent::__construct($itemNumber, $name, $price, $brand);
        $this->dangerous = $dangerous;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf('%s [%s, %d HUF, %d, %s]', $this->name, $this->brand->toString(),
            $this->price, $this->itemNumber, $this->dangerous);
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