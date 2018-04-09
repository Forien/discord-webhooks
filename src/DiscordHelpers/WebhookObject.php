<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 30.01.2018
 * Time: 14:51
 */

namespace Forien\DiscordHelpers;
use Forien\DiscordHelpers\Traits\WebhookObjectBuildable;

/**
 * Class EmbedPart
 *
 * @package Forien\DiscordHelpers
 */
abstract class WebhookObject implements \JsonSerializable
{
    use WebhookObjectBuildable;
}