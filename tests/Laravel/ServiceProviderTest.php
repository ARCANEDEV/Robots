<?php namespace Arcanedev\Robots\Tests\Laravel;

use Arcanedev\Robots\Laravel\ServiceProvider;
use Arcanedev\Robots\Tests\LaravelTestCase;

/**
 * Class     ServiceProviderTest
 *
 * @package  Arcanedev\Robots\Tests\Laravel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ServiceProviderTest extends LaravelTestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * @var ServiceProvider
     */
    private $serviceProvider;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();
        $this->serviceProvider = new ServiceProvider($this->app);
    }

    public function tearDown()
    {
        parent::tearDown();
        unset($this->serviceProvider);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * @test
     */
    public function testCanGetWhatHeProvides()
    {
        // This is for 100% code converge
        $this->assertEquals([
            'arcanedev.robots'
        ], $this->serviceProvider->provides());
    }
}
