<?php
namespace Post\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Shout
 * @package Post\Entity
 * @ORM\Entity
 * @ORM\Table(name="shouts")
 */
class Shout {
    /**
     * @ORM\Column(type="string", length=150)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", name="post_date")
     */
    private $postDate;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", length=20, name="shout_id")
     */
    private $shoutId;

    /**
     * @ORM\ManyToOne(targetEntity="\User\Entity\User", inversedBy="shouts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * @param mixed $postDate
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;
    }

    /**
     * @return mixed
     */
    public function getShoutId()
    {
        return $this->shoutId;
    }

    /**
     * @param mixed $shoutId
     */
    public function setShoutId($shoutId)
    {
        $this->shoutId = $shoutId;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


}