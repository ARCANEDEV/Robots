<?php namespace Arcanedev\Robots\Tests;

use Arcanedev\Robots\Robots;

/**
 * Class     RobotsTest
 *
 * @package  Arcanedev\Robots\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
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
        $this->assertEquals('', $this->robots->generate());
    }

    /** @test */
    public function it_can_add_sitemap()
    {
        $sitemap    = 'sitemap.xml';

        $this->isNotContain($sitemap);
        $this->robots->addSitemap($sitemap);
        $this->isContain('Sitemap: ' . $sitemap);
    }

    /** @test */
    public function it_can_add_user_agent()
    {
        $userAgent  = 'Google';

        $this->isNotContain('User-agent: ' . $userAgent);

        $this->robots->addUserAgent($userAgent);
        $this->isContain('User-agent: ' . $userAgent);
    }

    /** @test */
    public function it_can_add_host()
    {
        $host   = 'www.google.com';

        $this->isNotContain('Host: ' . $host);

        $this->robots->addHost($host);
        $this->isContain('Host: ' . $host);
    }

    /** @test */
    public function it_can_add_disallow()
    {
        $path   = '/dir/';

        $this->isNotContain('Disallow: ' . $path);

        $this->robots->addDisallow($path);
        $this->isContain('Disallow: ' . $path);

        // Test array of paths.
        $paths  = ['/dir-1/', '/dir-2/', '/dir-3/'];

        foreach ($paths as $p) {
            $this->isNotContain('Disallow: ' . $p);
        }

        $this->robots->addDisallow($paths);

        // Check the old path is still there
        $this->isContain('Disallow: ' . $path);

        foreach ($paths as $p) {
            $this->isContain('Disallow: ' . $p);
        }
    }


    /** @test */
    public function it_can_add_allow()
    {
        $path   = '/dir/';

        // Test a single path.
        $this->isNotContain('Allow: ' . $path);

        $this->robots->addAllow($path);
        $this->isContain('Allow: ' . $path);

        // Test array of paths.
        $paths  = ['/dir-1/', '/dir-2/', '/dir-3/'];
        foreach ($paths as $p) {
            $this->isNotContain('Allow: ' . $p);
        }

        // Add the array of paths
        $this->robots->addAllow($paths);

        // Check the old path is still there
        $this->isContain('Allow: ' . $path);

        foreach ($paths as $p) {
            $this->isContain('Allow: ' . $p);
        }
    }

    /** @test */
    public function it_can_add_comment()
    {
        $firstComment   = '1st comment';
        $secondComment  = '2nd comment';
        $thirdComment   = '3rd test comment';

        $this->isNotContain('# ' . $firstComment);
        $this->isNotContain('# ' . $secondComment);
        $this->isNotContain('# ' . $thirdComment);

        $this->robots->addComment($firstComment);
        $this->isContain('# ' . $firstComment);

        $this->robots->addComment($secondComment);
        $this->isContain('# ' . $firstComment);
        $this->isContain('# ' . $secondComment);

        $this->robots->addComment($thirdComment);
        $this->isContain('# ' . $firstComment);
        $this->isContain('# ' . $secondComment);
        $this->isContain('# ' . $thirdComment);
    }

    /** @test */
    public function it_can_add_spacer()
    {
        $lines = count(preg_split('/' . PHP_EOL . '/', $this->robots->generate()));
        $this->assertEquals(1, $lines); // Starts off with at least one line.

        $this->robots->addSpacer();
        $this->robots->addSpacer();
        $lines = count(preg_split('/' . PHP_EOL . '/', $this->robots->generate()));

        $this->assertEquals(2, $lines);
    }

    /** @test */
    public function it_can_reset()
    {
        $this->assertEquals('', $this->robots->generate());

        $this->robots->addComment('First Comment');
        $this->robots->addHost('www.google.com');
        $this->robots->addSitemap('sitemap.xml');
        $this->assertNotEquals('', $this->robots->generate());

        $this->robots->reset();
        $this->assertEquals('', $this->robots->generate());
    }

    /** @test */
    public function it_can_check_is_empty()
    {
        $this->assertTrue($this->robots->isEmpty());
        $this->assertEquals('', $this->robots->generate());

        $this->robots->addComment('First Comment');
        $this->robots->addHost('www.google.com');
        $this->robots->addSitemap('sitemap.xml');

        $this->assertFalse($this->robots->isEmpty());
        $this->assertNotEquals('', $this->robots->generate());

        $this->robots->reset();
        $this->assertTrue($this->robots->isEmpty());
        $this->assertEquals('', $this->robots->generate());
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if generated robots contains the needle
     *
     * @param string $needle
     */
    private function isContain($needle)
    {
        $this->assertContains($needle, $this->robots->generate());
    }

    /**
     * Check if generated robots contains the needle
     *
     * @param string $needle
     */
    private function isNotContain($needle)
    {
        $this->assertNotContains($needle, $this->robots->generate());
    }
}
