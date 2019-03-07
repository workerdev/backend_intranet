<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Correo
 * @ORM\Table(name="correo")
 * @ORM\Entity(repositoryClass="App\Repository\CorreoRepository")
 */
class Correo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=50)
     */
    private $asunto;

    /**
     * @ORM\Column(type="string",length=150)
     */
    private $cuerpo;

    /**
     * @ORM\Column(type="string",length=150)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $enabled;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }
   
    public function getAsunto(): ?int
    {
        return $this->asunto;
    }

    public function setAsunto(int $asunto): self
    {
        $this->asunto = $asunto;

        return $this;
    }
   

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    public function getCuerpo(): ?string
    {
        return $this->cuerpo;
    }

    public function setCuerpo(string $cuerpo): self
    {
        $this->cuerpo = $cuerpo;

        return $this;
    }
    public function getEnabled(): ?int
    {
        return $this->enabled;
    }

    public function setEnabled(int $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

}
