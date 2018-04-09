<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 09.04.2018
 * Time: 21:15
 */

namespace Forien\Interfaces;


use Forien\DiscordHelpers\Webhook;
use Forien\Exceptions\DiscordWebhookException;

/**
 * Interface WebhookDispatcherInterface
 *
 * @package Forien\Interfaces
 */
interface WebhookDispatcherInterface
{
    /**
     * @param string $url
     *
     * @return WebhookDispatcherInterface
     */
    public function addHook(string $url): WebhookDispatcherInterface;

    /**
     * @param array $urls
     *
     * @return WebhookDispatcherInterface
     */
    public function setHooks(array $urls): WebhookDispatcherInterface;

    /**
     * Sends specified Webhook object. If none given, sends all from $this->webhooks.
     * Every Webhook is sent over the same Hooks (Discord Webhook URLs).
     *
     * @param Webhook|null $webhook
     * @param string|null  $hook
     *
     * @return string
     * @throws DiscordWebhookException
     */
    public function send(Webhook $webhook = null, string $hook = null): string;

    /**
     * @return Webhook
     */
    public function createWebhook(): Webhook;

    /**
     * @param Webhook $webhook
     *
     * @return WebhookDispatcherInterface
     */
    public function addWebhook(Webhook $webhook): WebhookDispatcherInterface;

    /**
     * @return WebhookDispatcherInterface
     */
    public function clearWebhooks(): WebhookDispatcherInterface;

    /**
     * @return WebhookDispatcherInterface
     */
    public function clearHooks(): WebhookDispatcherInterface;

    /**
     * Should cURL wait for server's response?
     *
     * @param bool $wait
     *
     * @return WebhookDispatcherInterface
     */
    public function setWait(bool $wait): WebhookDispatcherInterface;

    /**
     * Returns built webhook in JSON instead of publishing it
     *
     * @param bool $dry
     *
     * @return WebhookDispatcherInterface
     */
    public function setDry(bool $dry):WebhookDispatcherInterface;
}