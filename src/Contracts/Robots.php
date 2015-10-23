<?php namespace Arcanedev\Robots\Contracts;

/**
 * Interface  Robots
 *
 * @package   Arcanedev\Robots\Contracts
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Robots
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Generate the robots.txt data.
     *
     * @return string
     */
    public function generate();

    /**
     * Add a Sitemap to the robots.txt.
     *
     * @param  string  $sitemap
     *
     * @return self
     */
    public function addSitemap($sitemap);

    /**
     * Add a User-agent to the robots.txt.
     *
     * @param  string  $userAgent
     *
     * @return self
     */
    public function addUserAgent($userAgent);

    /**
     * Add a Host to the robots.txt
     *
     * @param  string  $host
     *
     * @return self
     */
    public function addHost($host);

    /**
     * Add a allow rule to the robots.txt.
     *
     * @param  string|array  $directories
     *
     * @return self
     */
    public function addAllow($directories);

    /**
     * Add a disallow rule to the robots.txt.
     *
     * @param  string|array  $directories
     *
     * @return self
     */
    public function addDisallow($directories);

    /**
     * Add a comment to the robots.txt.
     *
     * @param  string  $comment
     *
     * @return self
     */
    public function addComment($comment);

    /**
     * Add a spacer to the robots.txt.
     *
     * @return self
     */
    public function addSpacer();

    /**
     * Reset the lines.
     *
     * @return self
     */
    public function reset();

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if line collection is empty.
     *
     * @return bool
     */
    public function isEmpty();
}
