<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 14:14
 */

namespace Models;

use stdClass;

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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function toString()
    {
        return sprintf('%s [%s, %d/%d]', '<br/><strong>Store</strong>: ' . $this->name, $this->address, $this->getProductCount(), $this->capacity);
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product): void
    {
        $found = false;

        foreach ($this->products as $prod) {
            if ($prod->product->getId() === $product->getId()) {
                $prod->count++;

                $found = true;
                break;
            }
        }
        if (!$found) {
            $p = new stdClass();
            $p->product = $product;
            $p->count = 1;

            array_push($this->products, $p);
        }

    }

    /**
     * @param Product $product
     * @return bool
     */
    public function hasProduct(Product $product): bool
    {
        foreach ($this->products as $prod) {
            if ($prod->product->getId() === $product->getId()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function removeProduct(Product $product): bool
    {
        for ($i = 0; $i < count($this->products); $i++) {
            $prod = $this->products[$i];

            if ($prod->product->getId() === $product->getId()) {
                if ($prod->count === 1) {
                    unset($this->products[$i]);
                } else {
                    $prod->count--;
                }
                return true;
            }
        }
        return false;
    }


    /**
     * @return int
     */
    public function getProductCount(): int
    {
        $count = 0;

        foreach ($this->products as $product) {
            $count += $product->count;
        }
        return $count;
    }

    /**
     * @return bool
     */
    public function isFull(): bool
    {
        return $this->capacity === $this->getProductCount();
    }


}