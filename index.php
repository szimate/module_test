<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 16:33
 */

require_once 'Exceptions/StoreIsFullException.php';
require_once 'Exceptions/NoSuchProductInStores.php';

require_once 'Manager/StoreManager.php';

require_once 'Models/Store.php';
require_once 'Models/Product.php';
require_once 'Models/Brand.php';
require_once 'Models/Car.php';
require_once 'Models/Chemical.php';


/**
 * létrehoz 2 raktárat, felvesz x terméket, kikér y terméket
 */
function simulation_1()
{

    //storeManager & stores
    $storeManager = new \Manager\StoreManager();
    $storeManager->setStore(new \Models\Store('Chemical Store', 'Budapest Kapa út 3', 10));
    $storeManager->setStore(new \Models\Store('Car Store', 'Budapest István utca 3', 2));

    //brands
    $tesla = new Models\Brand('Tesla Manufactures', 234);
    $mercedes = new Models\Brand('Mercedes Benz Manufactures', 23);

    //product
    $car = new \Models\Car('Tesla Model 3', 78, 9900000, $tesla, 'red');

    try {
        $storeManager->addProduct(new \Models\Car('Tesla Model 3', 33, 11100000, $tesla, 'red'));
        $storeManager->addProduct(new \Models\Product(42, 'Windscreen', 300, $mercedes));

        $storeManager->addProduct($car);
        $storeManager->addProduct($car);
        $storeManager->addProduct($car);
    } catch (\Exception\StoreIsFullException $exception) {

        $storeManager->printProducts();
    }
    try {
        $storeManager->removeProduct($car);
        $storeManager->removeProduct($car);
    } catch (\Exception\NoSuchProductInStores $exception) {
        echo $exception->getMessage();
    }
    $storeManager->printProducts();

}

/**
 * létrehoz 2 raktárat, felvesz x terméket, de nincs elég hely a raktárakban,
 */
function simulation_2()
{
    //storageManager & stores
    $storeManager = new \Manager\StoreManager();
    $storeManager->setStore(new \Models\Store('Do not Store', 'Budapest', 30));
    $storeManager->setStore(new \Models\Store('Brothers', 'Vienna', 12));

    //brands
    $audi = new \Models\Brand('Audi LTD.', 34);
    $peugeot = new \Models\Brand('Peugeot Manufactures', 88);

    //products
    $car = new \Models\Car('Peugeot 308', 3, 5000000, $peugeot, 'red');

    try {
        $storeManager->addProduct(new \Models\Car('Peugeot 210', 3, 500000, $peugeot, 'blue'));
        $storeManager->addProduct(new \Models\Product(33, 'brake', 210, $audi));

        for ($i = 0; $i < 131; $i++) {
            $storeManager->addProduct($car);
        }
    } catch (\Exception\StoreIsFullException $exception) {
        echo $exception->getMessage();
    }
    $storeManager->printProducts();

    try {
        $storeManager->removeProduct($car);
        $storeManager->removeProduct($car);
    } catch (\Exception\NoSuchProductInStores $exception) {
        echo $exception->getMessage();
    }
    $storeManager->printProducts();


}

/**
 * létrehoz 2 raktárat, felvesz x terméket, majd kikér többet, mint amennyi elérhető.
 */
function simulation_3()
{
    $storeManager = new \Manager\StoreManager();
    $storeManager->setStore(new \Models\Store('Danube Arena', 'Recsk', 50));
    $storeManager->setStore(new \Models\Store('Center Garage', 'Szeged', 33));

    //brands
    $audi = new \Models\Brand('Audi LTD.', 34);
    $peugeot = new \Models\Brand('Peugeot Manufactures', 88);

    //products
    $car = new \Models\Car('Peugeot 308', 3, 5000000, $peugeot, 'red');

    try {
        $storeManager->addProduct(new \Models\Product(32, 'spoiler', 344, $audi));
        $storeManager->addProduct(new \Models\Product(2, 'audio', 20, $peugeot));

        for ($i = 0; $i < 3; $i++) {
            $storeManager->addProduct($car);
        }
    } catch (\Exception\StoreIsFullException $exception) {
        echo PHP_EOL . $exception->getMessage();
    }

    $storeManager->printProducts();

    try {
        for ($i = 0; $i < 22; $i++) {
            $storeManager->removeProduct($car);
        }
    } catch (\Exception\NoSuchProductInStores $exception) {
        echo PHP_EOL . $exception->getMessage();
    }

    $storeManager->printProducts();
}

include 'header.php';

simulation_1();
simulation_2();
simulation_3();

include 'footer.php';