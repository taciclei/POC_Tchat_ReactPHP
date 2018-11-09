<?php
namespace Infrastructure\Persistence\Doctrine\Entity;

/**
 * @Entity(repositoryClass="Infrastructure\Persistence\Doctrine\Repository\MessageRepository")
 * @Table(name="message")
 * @HasLifecycleCallbacks
 **/
class Message
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     **/
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $message;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="messages")
     */
    protected $user;

    /**
     * @Column(type="datetime")
     */
    protected $created;

    /**
     * @Column(type="datetime", nullable = true)
     */
    protected $updated;

    /**
     * @PrePersist
     */
    public function onPrePersist()
    {
        $this->created = new \DateTime("now");
    }

    /**
     * @PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated = new \DateTime("now");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Message
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
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
     * @return Message
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return Message
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     * @return Message
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

}