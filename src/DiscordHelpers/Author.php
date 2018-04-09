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
     *
     * @return Author
     */
    public function setName(string $name): Author
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $icon_url
     *
     * @return Author
     */
    public function setIconUrl(string $icon_url): Author
    {
        $this->icon_url = $icon_url;

        return $this;
    }
}