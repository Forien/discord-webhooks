<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 29.01.2018
 * Time: 23:46
 */

namespace Forien\DiscordHelpers;
/**
 * Class Webhook
 *
 * @package Forien\DiscordHelpers
 */
class Webhook
{
    /**
     * @var string
     */
    protected $content = '';
    /**
     * @var Embed[]
     */
    protected $embeds = [];
    /**
     * @var string
     */
    protected $username = '';
    /**
     * @var string
     */
    protected $avatar_url = '';
    /**
     * @var bool
     */
    protected $tts = false;
    /**
     * @var
     */
    protected $file = null;

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param string $avatar_url
     */
    public function setAvatarUrl(string $avatar_url)
    {
        $this->avatar_url = $avatar_url;
    }

    /**
     * @param bool $tts
     */
    public function setTts(bool $tts)
    {
        $this->tts = (bool)$tts;
    }

    /**
     * @param array $params
     *
     * @return Embed
     */
    public function addEmbed(array $params = []): Embed
    {
        $embed = new Embed($params);
        $this->embeds[] = $embed;

        return $embed;
    }

    /**
     * @param int $n
     *
     * @return Embed
     */
    public function getEmbed($n = 0): Embed
    {
        return $this->embeds[$n];
    }
}