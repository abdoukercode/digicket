<?php


namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use AppBundle\Document\User;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @MongoDB\Document(repositoryClass="AppBundle\Repository\TicketRepository")
 */
class Ticket
{


    /**
     * @MongoDB\Field(type="string")
     */
    protected $shop;

    /**
     * @MongoDB\Field(type="string", nullable=true)
     */
    protected $url;



    /**
     *@MongoDB\Id
     */
    protected $md5sum;

    /**
     * @MongoDB\Field(type="date", nullable="true")
     */
    protected $print_time;


    /**
     * @MongoDB\Field(type="boolean")
     */
    protected $is_pro = false;


    /**
     * @MongoDB\Field(type="date", nullable=true)
     */
    protected $created_at;

    /**
     * @MongoDB\Field(type="date", nullable=true)
     */
    protected $updated_at;


    /**
     *
     * @MongoDB\ReferenceOne(targetDocument="User", inversedBy="tickets")
     *
     */
    protected $user;






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
     * Get md5sum
     *
     * @return id $md5sum
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
