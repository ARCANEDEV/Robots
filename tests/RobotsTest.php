<?php namespace Arcanedev\Robots\Tests;

use Arcanedev\Robots\Robots;

class RobotsTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var Robots */
    private $robots;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->robots = new Robots;
    }

    public function tearDown()
    {
        parent::tearDown();

        unset($this->robots);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $this->assertInstanceOf('Arcanedev\\Robots\\Robots', $this->robots);
    }
}
