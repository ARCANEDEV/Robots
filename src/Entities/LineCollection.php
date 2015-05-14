<?php namespace Arcanedev\Robots\Entities;

use Illuminate\Support\Collection;

/**
 * Class LineCollection
 * @package Arcanedev\Robots\Entities
 */
class LineCollection extends Collection
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var array */
    protected $items = [];

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Add a line
     *
     * @param string $line
     *
     * @return self
     */
    public function add($line)
    {
        $this->push((string) $line);

        return $this;
    }

    /**
     * Generate the line collection
     *
     * @return string
     */
    public function generate()
    {
        return implode(PHP_EOL, $this->items);
    }

    /**
     * Reset the line collection
     *
     * @return self
     */
    public function reset()
    {
        $this->items = [];

        return $this;
    }
}
