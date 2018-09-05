<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 15:12
 */

namespace Manager;

use Exception\NoSuchProductInStores;
use Exception\StoreIsFullException;
use Models\Store;
use Models\Product;

/**
 * Class StoreManager
 * @package Manager
 */
class StoreManager
{
    /**
     * @var array
     */
    private $stores;

    /**
     * StoreManager constructor.
     */
    public function __construct()
    {
        $this->stores = [];
    }

    /**
     * @return array
     */
    public function getStore(): array
    {
        return $this->stores;
    }

    /**
     * @param Store $store
     */
    public function setStore(Store $store): void
    {
        array_push($this->stores, $store);
    }

    /**
     * @param Product $product
     * @throws StoreIsFullException
     */
    public function addProduct(Product $product)
    {

        $added = false;

        foreach ($this->stores as $store) {
            if (!$store->isFull()) {
                $store->addProduct($product);

                $added = true;

                break;
            }
        }
        if (!$added)
            throw new StoreIsFullException();
    }

    /**
     *
     */
    public function printProducts(): void
    {
        ?>

        <table class='table table-hover table-responsive table-bordered'>

        <?php
        foreach ($this->stores as $store) {
            echo $store->toString() . PHP_EOL;
            foreach ($store->getProducts() as $product) {
                ?>
                <tr>
                    <?php echo sprintf("\t %s (%d db)\n", $product->product->toString(), $product->count); ?>
                </tr>

            <?php }
        } ?>

        </table>
        <?php echo PHP_EOL;
    }

    /**
     * @param Product $product
     * @throws NoSuchProductInStores
     */
    public function removeProduct(Product $product): void
    {
        foreach ($this->stores as $store) {
            if ($store->hasProduct($product)) {
                $store->removeProduct($product);
                return;
            }
        }
        throw new NoSuchProductInStores();
    }


}