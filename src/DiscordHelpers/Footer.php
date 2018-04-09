<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 30.01.2018
 * Time: 14:47
 */

namespace Forien\DiscordHelpers;
/**
 * Class Footer
 *
 * @package Forien\DiscordHelpers
 */
class Footer extends EmbedPart
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $icon_url;

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @param string $icon_url
     */
    public function setIconUrl(string $icon_url)
    {
        $this->icon_url = $icon_url;
    }
}