<?php namespace Arcanedev\Robots\Tests;

use Arcanedev\Robots\RobotsServiceProvider;

/**
 * Class     RobotsServiceProviderTest
 *
 * @package  Arcanedev\Robots\Tests\Laravel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class RobotsServiceProviderTest extends LaravelTestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var RobotsServiceProvider */
    private $provider;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(RobotsServiceProvider::class);
    }

    public function tearDown()
    {
        parent::tearDown();

        unset($this->provider);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Arcanedev\Support\ServiceProvider::class,
            \Arcanedev\Support\PackageServiceProvider::class,
            \Arcanedev\Robots\RobotsServiceProvider::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->provider);
        }
    }

    /** @test */
    public function it_can_provides()
    {
        $expected = [
            'arcanedev.robots',
            \Arcanedev\Robots\Contracts\Robots::class,
        ];

        $this->assertEquals($expected, $this->provider->provides());
    }
}
