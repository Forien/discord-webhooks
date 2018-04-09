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
     *
     * @return Footer
     */
    public function setText(string $text): Footer
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param string $icon_url
     *
     * @return Footer
     */
    public function setIconUrl(string $icon_url): Footer
    {
        $this->icon_url = $icon_url;

        return $this;
    }
}