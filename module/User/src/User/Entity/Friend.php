<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Friend
 * @package User\Entity
 * @ORM\Entity
 * @ORM\Table(name="friends")
 */
class Friend {

    /**
     * @ORM\Column(type="smallint", length=1)
     */
    private $confirmed;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="User", inversedBy="friends")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="User", inversedBy="friendsToMe")
     * @ORM\JoinColumn(name="friend_user_id", referencedColumnName="user_id")
     */
    private $friend;

    /**
     * @return mixed
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @param mixed $confirmed
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
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

    /**
     * @return mixed
     */
    public function getFriend()
    {
        return $this->friend;
    }

    /**
     * @param mixed $friend
     */
    public function setFriend($friend)
    {
        $this->friend = $friend;
    }


}