<?php
declare(strict_types=1);

use OxidProfessionalServices\EasyCredit\Core\Dto\EasyCreditStorage;
use PHPUnit\Framework\TestCase;

final class EasyCreditStorageTest extends TestCase
{
    /**
     * Verifies that the return value of the getStorageExpiredTimeRange function is correct.
     */
    public function testGetStorageExpiredTimeRange()
    {
        $easyCreditStorage = new EasyCreditStorage('tbVorgangskennung', 'fachlicheVorgangskennung', 'authorizationHash', 100.0);
        $this->assertEquals(60 * 29, $this->invokeMethod($easyCreditStorage, 'getStorageExpiredTimeRange'));
    }

    /**
     * Invoke protected/private method of a class.
     *
     * @param object $object Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array $parameters Array of parameters to pass into method.
     *
     * @return   mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
