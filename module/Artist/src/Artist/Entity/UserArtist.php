<?php
namespace Artist\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserArtist
 * @package Artist\Entity
 * @ORM\Entity
 * @ORM\Table(name="users_artists")
 */
class UserArtist {

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="\User\Entity\User", inversedBy="userArtists")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="userArtists")
     * @ORM\JoinColumn(name="artist_id", referencedColumnName="artist_id")
     */
    private $artist;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $frequency;

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
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param mixed $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param mixed $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }


}