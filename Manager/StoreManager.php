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

class StoreManager
{
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

    public function printProducts(): void
    {
        ?>

        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <th>Product</th>
                <th>Item Number</th>
            </tr>
            <?php
            foreach ($this->stores as $store) {
                echo $store->toString();
                foreach ($store->getProducts() as $product) {
                    ?>
                    <tr>
                        <?php echo sprintf("\t %s (%d db)\n", $product->product->toString(), $product->count); ?>
                        <td>
                            <?php echo $product->product->toString(); ?>
                        </td>
                        <td>
                            <?php echo $product->count; ?>
                        </td>
                    </tr>

                <?php }
            } ?>
        </table>
        <?php
    }

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