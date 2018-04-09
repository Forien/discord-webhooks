<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 09.04.2018
 * Time: 20:56
 */

namespace Forien;

use Forien\DiscordHelpers\Webhook;
use Forien\Exceptions\DiscordWebhookException;
use Forien\Interfaces\WebhookDispatcherInterface;

/**
 * Class WebhookDispatcher
 *
 * @package Forien
 */
final class WebhookDispatcher implements WebhookDispatcherInterface
{
    /**
     * @var WebhookDispatcherInterface
     */
    private static $dispatcher;
    /**
     * @var Webhook[]
     */
    private $webhooks;
    /**
     * @var string[]
     */
    private $hooks;
    /**
     * @var bool
     */
    private $wait = false;
    /**
     * @var bool
     */
    private $dry = false;

    /**
     * Singleton handler
     *
     * @return WebhookDispatcherInterface
     */
    public static function getInstance(): WebhookDispatcherInterface
    {
        return self::getDispatch();
    }

    /**
     * Singleton handler with option for Dependency Injection
     *
     * @param WebhookDispatcherInterface|null $dispatcher
     *
     * @return WebhookDispatcherInterface
     */
    public static function getDispatch(WebhookDispatcherInterface $dispatcher = null): WebhookDispatcherInterface
    {
        if ($dispatcher !== null) {
            self::$dispatcher = $dispatcher;
        }

        if (self::$dispatcher === null) {
            self::$dispatcher = new self();
        }

        return self::$dispatcher;
    }

    /**
     * @param string $url
     *
     * @return WebhookDispatcherInterface
     */
    public function addHook(string $url): WebhookDispatcherInterface
    {
        $this->hooks[] = $url;

        return $this;
    }

    /**
     * @param Webhook|null $webhook
     * @param string|null  $hook
     *
     * @return string
     * @throws DiscordWebhookException
     */
    public function send(Webhook $webhook = null, string $hook = null): string
    {
        if (!empty($webhook)) {
            return $this->sendWebhook($webhook->build(), $hook);
        }

        $webhooks = [];
        foreach ($this->webhooks as $webhook) {
            $webhooks[] = $webhook->build();
        }

        return $this->sendWebhookBulk($webhooks, $hook);
    }

    /**
     * @param string      $jsonEncodedWebhook
     * @param string|null $hook
     *
     * @return string
     * @throws DiscordWebhookException
     */
    private function sendWebhook(string $jsonEncodedWebhook, string $hook = null): string
    {
        if (!empty($hook)) {
            $hooks = [$hook];
        } else {
            $hooks = $this->hooks;
        }

        foreach ($hooks as $hook) {
            if (empty($jsonEncodedWebhook)) {
                throw new DiscordWebhookException("WebhookDispatcher attempted to publish empty post to hook {$hook}");
            }

            if ($this->dry) {
                return $jsonEncodedWebhook;
            }

            if ($this->wait) {
                $hook .= '?wait=true';
            }

            $curl = curl_init($hook);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                ["Content-type: application/json"]);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonEncodedWebhook);

            $json_response = curl_exec($curl);
            $respone = json_decode($json_response);
        }

        return $respone || '';
    }

    /**
     * @param array       $jsonEncodedWebhooks
     * @param string|null $hook
     *
     * @return string
     * @throws DiscordWebhookException
     */
    private function sendWebhookBulk(array $jsonEncodedWebhooks, string $hook = null): string
    {
        $result = '';

        foreach ($jsonEncodedWebhooks as $encodedWebhook) {
            $result .= $this->sendWebhook($encodedWebhook, $hook);
        }

        return $result;
    }

    /**
     * @return Webhook
     */
    public function createWebhook(): Webhook
    {
        $webhook = new Webhook();
        $this->addWebhook($webhook);

        return $webhook;
    }

    /**
     * @param Webhook $webhook
     *
     * @return WebhookDispatcherInterface
     */
    public function addWebhook(Webhook $webhook): WebhookDispatcherInterface
    {
        $this->webhooks[] = $webhook;

        return $this;
    }

    /**
     * @param array $urls
     *
     * @return WebhookDispatcherInterface
     */
    public function setHooks(array $urls): WebhookDispatcherInterface
    {
        $this->hooks = $urls;

        return $this;
    }

    /**
     * @return WebhookDispatcherInterface
     */
    public function clearWebhooks(): WebhookDispatcherInterface
    {
        $webhooks = $this->webhooks;
        $this->webhooks = [];
        foreach ($webhooks as $webhook) {
            unset($webhook);
        }

        return $this;
    }

    /**
     * @return WebhookDispatcherInterface
     */
    public function clearHooks(): WebhookDispatcherInterface
    {
        $this->hooks = [];

        return $this;
    }

    /**
     * @param bool $wait
     *
     * @return WebhookDispatcherInterface
     */
    public function setWait(bool $wait): WebhookDispatcherInterface
    {
        $this->wait = $wait;

        return $this;
    }

    /**
     * @param bool $dry
     *
     * @return WebhookDispatcherInterface
     */
    public function setDry(bool $dry): WebhookDispatcherInterface
    {
        $this->dry = $dry;

        return $this;
    }

}