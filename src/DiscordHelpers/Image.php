<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 29.01.2018
 * Time: 23:47
 */

namespace Forien\DiscordHelpers;

/**
 * Class Image
 *
 * @package Forien\DiscordHelpers
 */
class Image extends EmbedPart
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $url
     *
     * @return Image
     */
    public function setUrl(string $url): Image
    {
        $this->url = $url;

        return $this;
    }
}