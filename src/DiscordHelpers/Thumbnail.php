<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 30.01.2018
 * Time: 14:47
 */

namespace Forien\DiscordHelpers;
/**
 * Class Thumbnail
 *
 * @package Forien\DiscordHelpers
 */
class Thumbnail extends EmbedPart
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }
}