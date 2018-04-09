<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 29.01.2018
 * Time: 23:47
 */

namespace Forien\DiscordHelpers;
/**
 * Class Author
 *
 * @package Forien\DiscordHelpers
 */
class Author extends EmbedPart
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $icon_url;

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $icon_url
     */
    public function setIconUrl(string $icon_url)
    {
        $this->icon_url = $icon_url;
    }
}