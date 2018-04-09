<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 09.04.2018
 * Time: 20:56
 */

namespace Forien;
use Forien\DiscordHelpers\Webhook;

/**
 * Class WebhookDispatcher
 *
 * @package Forien
 */
class WebhookDispatcher
{
    /**
     * @var Webhook[]
     */
    protected $webhooks;

    /**
     * @var string[]
     */
    protected $hooks;

    /**
     * @var bool
     */
    protected $wait = false;
}