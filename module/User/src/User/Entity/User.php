<?php
namespace User\Entity;

use Artist\Entity\UserArtist;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package User\Entity
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{

    /**
     * @ORM\OneToMany(targetEntity="\Post\Entity\Comment", mappedBy="user")
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Friend", mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $friends;

    /**
     * @ORM\OneToMany(targetEntity="Friend", mappedBy="friend", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $friendsToMe;

    /**
     * @ORM\Column(type="datetime", name="last_seen")
     */
    private $lastSeen;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="\Post\Entity\Post", mappedBy="user")
     */
    private $posts;

    /**
     * @ORM\Column(type="datetime", name="register_date")
     */
    private $registerDate;

    /**
     * @ORM\OneToMany(targetEntity="\Post\Entity\Shout", mappedBy="user")
     */
    private $shouts;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnail;

    /**
     * @ORM\OneToMany(targetEntity="\Artist\Entity\UserArtist", mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $userArtists;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", length=20, name="user_id")
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $username;

    public function __construct()
    {
        $this->friends = new ArrayCollection();
        $this->friendsToMe = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->shouts = new ArrayCollection();
        $this->userArtists = new ArrayCollection();
    }

    public function getArtists()
    {
        return array_map(
            function ($userArtist) {
                return $userArtist->getArtist();
            },
            $this->userArtists->toArray()
        );
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    public function addComments($comments)
    {
        foreach ($comments as $comment)
            if (!$this->comments->contains($comment))
                $this->comments->add($comment);
    }

    public function removeComments($comments)
    {
        foreach ($comments as $comment)
            if ($this->comments->contains($comment))
                $this->comments->removeElement($comment);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * @param mixed $friends
     */
    public function setFriends($friends)
    {
        $this->friends = $friends;
    }

    public function addFriends($friends)
    {
        foreach ($friends as $friend) {
            if (!$this->friends->contains($friend)) {
                $this->friends->add($friend);
                $friend->setUser($this);
            }
        }
    }

    public function removeFriends($friends)
    {
        foreach ($friends as $friend) {
            if ($this->friends->contains($friend)) {
                $this->friends->removeElement($friend);
                $friend->setUser(null);
            }
        }
    }

    public function getFriendlist()
    {
        return array_merge(
            array_map(
                function ($friend) {
                    return $friend->getFriend();
                },
                $this->friends->toArray()
            ),
            array_map(
                function ($friend) {
                    return $friend->getUser();
                },
                $this->friendsToMe->toArray()
            )
        );
    }

    /**
     * @return mixed
     */
    public function getFriendsToMe()
    {
        return $this->friendsToMe;
    }

    /**
     * @param mixed $friendsToMe
     */
    public function setFriendsToMe($friendsToMe)
    {
        $this->friendsToMe = $friendsToMe;
    }

    public function addFriendsToMe($friends)
    {
        foreach ($friends as $friend) {
            if (!$this->friendsToMe->contains($friend)) {
                $this->friendsToMe->add($friend);
                $friend->setFriend($this);
            }
        }
    }

    public function removeFriendsToMe($friends)
    {
        foreach ($friends as $friend) {
            if ($this->friendsToMe->contains($friend)) {
                $this->friendsToMe->removeElement($friend);
                $friend->setFriend(null);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getLastSeen()
    {
        return $this->lastSeen;
    }

    /**
     * @param mixed $lastSeen
     */
    public function setLastSeen($lastSeen)
    {
        $this->lastSeen = $lastSeen;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param mixed $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return mixed
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * @param mixed $registerDate
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }

    /**
     * @return mixed
     */
    public function getShouts()
    {
        return $this->shouts;
    }

    /**
     * @param mixed $shouts
     */
    public function setShouts($shouts)
    {
        $this->shouts = $shouts;
    }

    public function addShouts($shouts)
    {
        foreach ($shouts as $shout)
            if (!$this->shouts->contains($shout))
                $this->shouts->add($shout);
    }

    public function removeShouts($shouts)
    {
        foreach ($shouts as $shout)
            if ($this->shouts->contains($shout))
                $this->shouts->removeElement($shout);
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getUserArtists()
    {
        return $this->userArtists;
    }

    /**
     * @param mixed $userArtists
     */
    public function setUserArtists($userArtists)
    {
        $this->userArtists = $userArtists;
    }

    public function addUserArtists($userArtists)
    {
        foreach ($userArtists as $userArtist) {
            if (!$this->userArtists->contains($userArtist)) {
                $this->userArtists->add($userArtist);
                $userArtist->setUser($this);
            }
        }
    }

    public function removeUserArtists($userArtists)
    {
        foreach ($userArtists as $userArtist) {
            if ($this->userArtists->contains($userArtist)) {
                $this->userArtists->removeElement($userArtist);
                $userArtist->setUser(null);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Check if the user's password is the same as the provided one.
     *
     * @param User $user
     * @param string $password
     * @return bool
     */
    public static function verifyPassword($user, $password)
    {
        return password_verify($password, $user->getPassword());
    }

    /**
     * Get the bcrypt hash of the provided password.
     *
     * @param string $password
     * @return string
     */
    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, array('cost' => 11));
    }

}