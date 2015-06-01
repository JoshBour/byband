<?php
namespace Artist\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Artist
 * @package Artist\Entity
 * @ORM\Entity
 * @ORM\Table(name="artists")
 */
class Artist
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", length=10, name="artist_id")
     */
    private $artistId;

    /**
     * @ORM\Column(type="text", nullable=TRUE)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="artists")
     * @ORM\JoinColumn(name="genre_id", referencedColumnName="genre_id", nullable=TRUE)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="\Post\Entity\Post", mappedBy="artist")
     */
    private $referencedPosts;

    /**
     * @ORM\ManyToMany(targetEntity="Artist", inversedBy="relatedArtistsToMe")
     * @ORM\JoinTable(name="related_artists",
     *      joinColumns={@ORM\JoinColumn(name="artist_id", referencedColumnName="artist_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="related_artist_id", referencedColumnName="artist_id")}
     *      )
     */
    private $relatedArtists;

    /**
     * @ORM\ManyToMany(targetEntity="Artist", mappedBy="relatedArtists")
     */
    private $relatedArtistsToMe;

    /**
     * @ORM\OneToMany(targetEntity="UserArtist", mappedBy="artist", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $userArtists;

    /**
     * @ORM\Column(type="string", length=255, nullable=TRUE)
     */
    private $thumbnail;

    public function __construct()
    {
        $this->userArtists = new ArrayCollection();
        $this->referencedPosts = new ArrayCollection();
        $this->relatedArtists = new ArrayCollection();
        $this->relatedArtistsToMe = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getArtistId()
    {
        return $this->artistId;
    }

    /**
     * @param mixed $artistId
     */
    public function setArtistId($artistId)
    {
        $this->artistId = $artistId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function getListeners()
    {
        return array_map(
            function ($userArtist) {
                return $userArtist->getUser();
            },
            $this->userArtists->toArray()
        );
    }

    /**
     * @return mixed
     */
    public function getReferencedPosts()
    {
        return $this->referencedPosts;
    }

    /**
     * @param mixed $referencedPosts
     */
    public function setReferencedPosts($referencedPosts)
    {
        $this->referencedPosts = $referencedPosts;
    }

    public function addReferencedPosts($referencedPosts){
        foreach($referencedPosts as $post)
            if(!$this->referencedPosts->contains($post))
                $this->referencedPosts->add($post);
    }

    public function removeReferencedPosts($referencedPosts){
        foreach($referencedPosts as $post)
            if($this->referencedPosts->contains($post))
                $this->referencedPosts->removeElement($post);
    }

    /**
     * @return ArrayCollection
     */
    public function getRelatedArtists()
    {
        return $this->relatedArtists;
    }

    /**
     * @param ArrayCollection $relatedArtists
     */
    public function setRelatedArtists($relatedArtists)
    {
        $this->relatedArtists = $relatedArtists;
    }

    public function addRelatedArtists($relatedArtists)
    {
        foreach ($relatedArtists as $relatedArtist)
            if (!$this->relatedArtists->contains($relatedArtist))
                $this->relatedArtists->add($relatedArtist);
    }

    public function removeRelatedArtists($relatedArtists)
    {
        foreach ($relatedArtists as $relatedArtist)
            if ($this->relatedArtists->contains($relatedArtist))
                $this->relatedArtists->removeElement($relatedArtist);
    }

    /**
     * @return mixed
     */
    public function getRelatedArtistsToMe()
    {
        return $this->relatedArtistsToMe;
    }


    /**
     * @param mixed $relatedArtistsToMe
     */
    public function setRelatedArtistsToMe($relatedArtistsToMe)
    {
        $this->relatedArtistsToMe = $relatedArtistsToMe;
    }

    public function addRelatedArtistsToMe($relatedArtistsToMe)
    {
        foreach ($relatedArtistsToMe as $relatedArtist)
            if (!$this->relatedArtistsToMe->contains($relatedArtist))
                $this->relatedArtistsToMe->add($relatedArtist);
    }

    public function removeRelatedArtistsToMe($relatedArtistsToMe)
    {
        foreach ($relatedArtistsToMe as $relatedArtist)
            if ($this->relatedArtistsToMe->contains($relatedArtist))
                $this->relatedArtistsToMe->removeElement($relatedArtist);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
        foreach($userArtists as $userArtist) {
            if (!$this->userArtists->contains($userArtist)) {
                $this->userArtists->add($userArtist);
                $userArtist->setArtist($this);
            }
        }
    }

    public function removeUserArtists($userArtists)
    {
        foreach($userArtists as $userArtist) {
            if ($this->userArtists->contains($userArtist)) {
                $this->userArtists->removeElement($userArtist);
                $userArtist->setArtist(null);
            }
        }
    }

}