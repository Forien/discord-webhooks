<?php
/**
 * Created by PhpStorm.
 * User: Forien
 * Date: 29.01.2018
 * Time: 23:46
 */

namespace Forien\DiscordHelpers;


/**
 * Class Embed
 *
 * @package Forien\DiscordHelpers
 */
class Embed extends EmbedPart
{

    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string ISO8601 timestamp
     */
    protected $timestamp;

    /**
     * @var int
     */
    protected $color;

    /**
     * @var Footer
     */
    protected $footer;

    /**
     * @var Thumbnail
     */
    protected $thumbnail;

    /**
     * @var Image
     */
    protected $image;

    /**
     * @var Author
     */
    protected $author;

    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @param array $params
     *
     * @return Image
     */
    public function addImage(array $params = []): Image
    {
        $this->image = new Image($params);

        return $this->image;
    }

    /**
     * @param array $params
     *
     * @return Author
     */
    public function addAuthor(array $params = []): Author
    {
        $this->author = new Author($params);

        return $this->author;
    }

    /**
     * @param array $params
     *
     * @return Footer
     */
    public function addFooter(array $params = []): Footer
    {
        $this->footer = new Footer($params);

        return $this->footer;
    }

    /**
     * @param array $params
     *
     * @return Thumbnail
     */
    public function addThumbnail(array $params = []): Thumbnail
    {
        $this->thumbnail = new Thumbnail($params);

        return $this->thumbnail;
    }

    /**
     * @param array $params
     *
     * @return Field
     */
    public function addField(array $params = []): Field
    {
        $field = new Field($params);
        $this->fields[] = $field;

        return $field;
    }

    /**
     * @param string $rgb
     *
     * @return Embed
     */
    public function setColor(string $rgb): Embed
    {
        $rgb = str_replace('#', '', $rgb);
        $this->color = hexdec($rgb);

        return $this;
    }

    /**
     * @param string $title
     *
     * @return Embed
     */
    public function setTitle(string $title): Embed
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return Embed
     */
    public function setDescription(string $description): Embed
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $url
     *
     * @return Embed
     */
    public function setUrl(string $url): Embed
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param string $timestamp
     *
     * @return Embed
     */
    public function setTimestamp($timestamp = 'now'): Embed
    {
        if (!$timestamp instanceof \DateTime) {
            $timestamp = new \DateTime($timestamp);
        }

        $this->timestamp = $timestamp->format(\DateTime::ISO8601);

        return $this;
    }
}