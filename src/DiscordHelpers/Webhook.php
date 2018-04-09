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
class Webhook extends WebhookObject
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
     *
     * @return Webhook
     */
    public function setContent(string $content): Webhook
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param string $username
     *
     * @return Webhook
     */
    public function setUsername(string $username): Webhook
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $avatar_url
     *
     * @return Webhook
     */
    public function setAvatarUrl(string $avatar_url): Webhook
    {
        $this->avatar_url = $avatar_url;

        return $this;
    }

    /**
     * @param bool $tts
     *
     * @return Webhook
     */
    public function setTts(bool $tts): Webhook
    {
        $this->tts = (bool)$tts;

        return $this;
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