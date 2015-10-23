<?php namespace Arcanedev\Robots\Entities;

use Arcanedev\Support\Collection;

/**
 * Class     LineCollection
 *
 * @package  Arcanedev\Robots\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LineCollection extends Collection
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Add a line.
     *
     * @param  string  $line
     *
     * @return self
     */
    public function add($line)
    {
        $this->push((string) $line);

        return $this;
    }

    /**
     * Generate the line collection.
     *
     * @return string
     */
    public function generate()
    {
        return implode(PHP_EOL, $this->items);
    }
}
