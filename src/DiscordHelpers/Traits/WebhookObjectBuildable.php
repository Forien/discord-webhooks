<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 09.04.2018
 * Time: 23:18
 */

namespace Forien\DiscordHelpers\Traits;


use Forien\DiscordHelpers\WebhookObject;

/**
 * Trait WebhookObjectBuildable
 *
 * @package Forien\DiscordHelpers\Traits
 */
trait WebhookObjectBuildable
{
    /**
     * Returns object's in JSON – ready to publish
     *
     * @return string
     */
    public function build(): string
    {
        return json_encode($this);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $fields = [];
        foreach ($this as $key => $value) {
            if ($value instanceof WebhookObject) {
                $fields[$key] = $value->jsonSerialize();
            } else if ($value === null || $value === '' || $value === []) {
                continue;
            } else {
                $fields[$key] = $value;
            }
        }

        return $fields;
    }
}