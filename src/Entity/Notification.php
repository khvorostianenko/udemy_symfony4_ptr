<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 * # тип наследования
 * @ORM\InheritanceType("SINGLE_TABLE")
 * # без нижних двух строк работать не будет
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"like" = "LikeNotification"})
 */
abstract class Notification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * Получатель сообщения
     * У одного получателя может быть много сообщений
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $user;
    
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
    public function setUser($user): void
    {
        $this->user = $user;
    }
    
    /**
     * @return mixed
     */
    public function getSeen()
    {
        return $this->seen;
    }
    
    /**
     * @param mixed $seen
     */
    public function setSeen($seen): void
    {
        $this->seen = $seen;
    }
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $seen;
    
    public function __construct()
    {
        $this->seen = false;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
}
