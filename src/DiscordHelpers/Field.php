<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 30.01.2018
 * Time: 14:53
 */

namespace Forien\DiscordHelpers;
/**
 * Class Field
 *
 * @package Forien\DiscordHelpers
 */
class Field extends EmbedPart
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $value;
    /**
     * @var boolean
     */
    protected $inline = false;

    /**
     * @param string $name
     *
     * @return Field
     */
    public function setName(string $name): Field
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return Field
     */
    public function setValue(string $value): Field
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param bool $inline
     *
     * @return Field
     */
    public function setInline(bool $inline): Field
    {
        $this->inline = $inline;

        return $this;
    }
}