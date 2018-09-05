<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 13:27
 */

namespace Models;


/**
 * Class Brand
 * @package Models
 */
/**
 * Class Brand
 * @package Models
 */
class Brand
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
     * @var int
     */
    private $category;

    /**
     * Brand constructor.
     * @param $name
     * @param $category
     */
    public function __construct(string $name, int $category)
    {
        $this->id = Brand::$ID++; //auto increment
        $this->name = $name;
        $this->category = $category;
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
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory(int $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s [%d]', $this->name, $this->category);
    }


}