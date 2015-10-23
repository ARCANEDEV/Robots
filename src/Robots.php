<?php namespace Arcanedev\Robots;

use Arcanedev\Robots\Entities\LineCollection;

/**
 * Class     Robots
 *
 * @package  Arcanedev\Robots
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Robots implements Contracts\Robots
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The line collection.
     *
     * @var LineCollection
     */
    protected $lines;

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Make a Robots instance.
     */
    public function __construct()
    {
        $this->lines = new LineCollection;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Generate the robots.txt data.
     *
     * @return string
     */
    public function generate()
    {
        return $this->lines->generate();
    }

    /**
     * Add a Sitemap to the robots.txt.
     *
     * @param  string  $sitemap
     *
     * @return self
     */
    public function addSitemap($sitemap)
    {
        return $this->addRule('Sitemap', $sitemap);
    }

    /**
     * Add a User-agent to the robots.txt.
     *
     * @param  string  $userAgent
     *
     * @return self
     */
    public function addUserAgent($userAgent)
    {
        return $this->addRule('User-agent', $userAgent);
    }

    /**
     * Add a Host to the robots.txt
     *
     * @param  string  $host
     *
     * @return self
     */
    public function addHost($host)
    {
        return $this->addRule('Host', $host);
    }

    /**
     * Add a allow rule to the robots.txt.
     *
     * @param  string|array  $directories
     *
     * @return self
     */
    public function addAllow($directories)
    {
        return $this->addRuleLine($directories, 'Allow');
    }

    /**
     * Add a disallow rule to the robots.txt.
     *
     * @param  string|array  $directories
     *
     * @return self
     */
    public function addDisallow($directories)
    {
        return $this->addRuleLine($directories, 'Disallow');
    }

    /**
     * Add a comment to the robots.txt.
     *
     * @param  string  $comment
     *
     * @return self
     */
    public function addComment($comment)
    {
        return $this->addLine('# ' . $comment);
    }

    /**
     * Add a spacer to the robots.txt.
     *
     * @return self
     */
    public function addSpacer()
    {
        return $this->addLine('');
    }

    /**
     * Reset the lines.
     *
     * @return self
     */
    public function reset()
    {
        if ( ! $this->isEmpty()) {
            $this->lines->reset();
        }

        return $this;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if line collection is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->lines->isEmpty();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Add a rule to the robots.txt.
     *
     * @param  string|array  $directories
     * @param  string        $rule
     *
     * @return self
     */
    protected function addRuleLine($directories, $rule)
    {
        foreach ((array) $directories as $directory) {
            $this->addRule($rule, $directory);
        }

        return $this;
    }

    /**
     * Add a rule.
     *
     * @param  string  $rule
     * @param  string  $value
     *
     * @return self
     */
    protected function addRule($rule, $value)
    {
        return $this->addLine($rule . ': ' . $value);
    }

    /**
     * Add a line to the robots.txt.
     *
     * @param  string  $line
     *
     * @return self
     */
    protected function addLine($line)
    {
        $this->lines->add($line);

        return $this;
    }
}
