<?php namespace Arcanedev\Robots\Tests\Laravel;

use Arcanedev\Robots\Laravel\Facade as Robots;
use Arcanedev\Robots\Tests\LaravelTestCase;

/**
 * Class     FacadeTest
 *
 * @package  Arcanedev\Robots\Tests\Laravel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FacadeTest extends LaravelTestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_add_sitemap()
    {
        $sitemap    = 'sitemap.xml';

        $this->isNotContain($sitemap);

        Robots::addSitemap($sitemap);
        $this->isContain('Sitemap: ' . $sitemap);
    }

    /** @test */
    public function it_can_add_user_agent()
    {
        $userAgent  = 'Google';

        $this->isNotContain('User-agent: ' . $userAgent);

        Robots::addUserAgent($userAgent);
        $this->isContain('User-agent: ' . $userAgent);
    }

    /** @test */
    public function it_can_add_host()
    {
        $host   = 'www.google.com';

        $this->isNotContain('Host: ' . $host);

        Robots::addHost($host);
        $this->isContain('Host: ' . $host);
    }

    /** @test */
    public function it_can_add_disallow()
    {
        $path   = '/dir/';

        $this->isNotContain('Disallow: ' . $path);

        Robots::addDisallow($path);
        $this->isContain('Disallow: ' . $path);

        // Test array of paths.
        $paths  = ['/dir-1/', '/dir-2/', '/dir-3/'];

        foreach ($paths as $p) {
            $this->isNotContain('Disallow: ' . $p);
        }

        Robots::addDisallow($paths);

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

        Robots::addAllow($path);
        $this->isContain('Allow: ' . $path);

        // Test array of paths.
        $paths  = ['/dir-1/', '/dir-2/', '/dir-3/'];
        foreach ($paths as $p) {
            $this->isNotContain('Allow: ' . $p);
        }

        // Add the array of paths
        Robots::addAllow($paths);

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

        Robots::addComment($firstComment);
        $this->isContain('# ' . $firstComment);

        Robots::addComment($secondComment);
        $this->isContain('# ' . $firstComment);
        $this->isContain('# ' . $secondComment);

        Robots::addComment($thirdComment);
        $this->isContain('# ' . $firstComment);
        $this->isContain('# ' . $secondComment);
        $this->isContain('# ' . $thirdComment);
    }

    /** @test */
    public function it_can_add_spacer()
    {
        $lines = count(preg_split('/' . PHP_EOL . '/', Robots::generate()));
        $this->assertEquals(1, $lines); // Starts off with at least one line.

        Robots::addSpacer();
        Robots::addSpacer();
        $lines = count(preg_split('/' . PHP_EOL . '/', Robots::generate()));

        $this->assertEquals(2, $lines);
    }

    /** @test */
    public function it_can_reset()
    {
        $this->assertEquals('', Robots::generate());

        Robots::addComment('First Comment');
        Robots::addHost('www.google.com');
        Robots::addSitemap('sitemap.xml');
        $this->assertNotEquals('', Robots::generate());

        Robots::reset();
        $this->assertEquals('', Robots::generate());
    }

    /** @test */
    public function it_can_check_is_empty()
    {
        $this->assertTrue(Robots::isEmpty());
        $this->assertEquals('', Robots::generate());

        Robots::addComment('First Comment');
        Robots::addHost('www.google.com');
        Robots::addSitemap('sitemap.xml');

        $this->assertFalse(Robots::isEmpty());
        $this->assertNotEquals('', Robots::generate());

        Robots::reset();
        $this->assertTrue(Robots::isEmpty());
        $this->assertEquals('', Robots::generate());
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
        $this->assertContains($needle, Robots::generate());
    }

    /**
     * Check if generated robots contains the needle
     *
     * @param string $needle
     */
    private function isNotContain($needle)
    {
        $this->assertNotContains($needle, Robots::generate());
    }
}
