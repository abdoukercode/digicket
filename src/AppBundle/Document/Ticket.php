<?php


namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="AppBundle\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $shop;

    /**
     * @MongoDB\Field(type="string", nullable=true)
     */
    protected $url;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $user_id;


    /**
     *
     * @MongoDB\Field(type="string")
     */
    protected $md5sum;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $print_time;


    /**
     * @MongoDB\Field(type="boolean")
     */
    protected $is_pro = false;


    /**
     * @MongoDB\Field(type="date")
     */
    protected $created_at;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $updated_at;


    /**
     * @MongoDB\ReferenceOne(targetDocument="User", inversedBy="tickets")
     */
    protected $user;



    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set shop
     *
     * @param string $shop
     * @return $this
     */
    public function setShop($shop)
    {
        $this->shop = $shop;
        return $this;
    }

    /**
     * Get shop
     *
     * @return string $shop
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set userId
     *
     * @param string $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * Get userId
     *
     * @return string $userId
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set md5sum
     *
     * @param string $md5sum
     * @return $this
     */
    public function setMd5sum($md5sum)
    {
        $this->md5sum = $md5sum;
        return $this;
    }

    /**
     * Get md5sum
     *
     * @return string $md5sum
     */
    public function getMd5sum()
    {
        return $this->md5sum;
    }

    /**
     * Set printTime
     *
     * @param date $printTime
     * @return $this
     */
    public function setPrintTime($printTime)
    {
        $this->print_time = $printTime;
        return $this;
    }

    /**
     * Get printTime
     *
     * @return date $printTime
     */
    public function getPrintTime()
    {
        return $this->print_time;
    }

    /**
     * Set isPro
     *
     * @param boolean $isPro
     * @return $this
     */
    public function setIsPro($isPro)
    {
        $this->is_pro = $isPro;
        return $this;
    }

    /**
     * Get isPro
     *
     * @return boolean $isPro
     */
    public function getIsPro()
    {
        return $this->is_pro;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date $createdAt
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param date $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return date $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set user
     *
     * @param AppBundle\Document\User $user
     * @return $this
     */
    public function setUser(\AppBundle\Document\User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return AppBundle\Document\User $user
     */
    public function getUser()
    {
        return $this->user;
    }
}
