# discord-webhooks
Simple wrapper for building and sending webhooks with Discord's webhook API

Allows for both simple small uses (single Webhook object to single Hook (url)) and mass dispatchers for multiple channels or with multiple Webhook object.

Built with simple end-user OOP approach in mind (method chaining for example).

@todo README & documentation

```php
// dispatcher manages building and sending webhooks
$dispatch = \Forien\WebhookDispatcher::getInstance();

// to create new Webhook object you can use either:
$webhook = $dispatch->createWebhook();
// or:
$webhook = new \Forien\DiscordHelpers\Webhook();


$webhook->setContent('some basic text');
$embed = $webhook->addEmbed();
$embed->addAuthor(['name' => 'Forien', 'icon_url' => '/*...*/']);
$embed->addField()->setName('name')->setValue('value');
$embed->addField()->setName('name2')->setValue('value2');
$embed->setColor('#cba');

// you can either add Hooks (Discord webhook urls) through either:
$dispatch->addHook('https://...');
$dispatch->setHooks(['https://...', ...])

// you can send attach Webhook object to Dispatcher if you created it independly:
$dispatch->addWebhook($webhook);

// you can send all attached Webhook objects at once (every will be sent to every Hook):
$dispatch->send()

// you can also specify single webhook-hook:
$dispatch->send($webhook, $hook);
```