<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 30.01.2018
 * Time: 14:51
 */

namespace Forien\DiscordHelpers;
/**
 * Class EmbedPart
 *
 * @package Forien\DiscordHelpers
 */
abstract class EmbedPart extends WebhookObject
{
    /**
     * EmbedPart constructor.
     *
     * @param null|array $params
     */
    public function __construct(array $params = null)
    {
        if ($params) {
            foreach ($params as $var => $val) {
                $this->{$var} = $val;
            }
        }
    }
}