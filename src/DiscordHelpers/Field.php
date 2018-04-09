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
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param bool $inline
     */
    public function setInline(bool $inline)
    {
        $this->inline = $inline;
    }
}