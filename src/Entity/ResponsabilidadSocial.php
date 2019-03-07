<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * ResponsabilidadSocial
 * @ORM\Table(name="cb_cfg_responsabilidad_social", uniqueConstraints={@ORM\UniqueConstraint(name="cb_responsabilidad_social_id", columns={"cb_responsabilidad_social_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ResponsabilidadSocialRepository")
 */
class ResponsabilidadSocial
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_responsabilidad_social_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_responsabilidad_social_contenido", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $contenido;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_responsabilidad_social_estado", type="integer", nullable=false)
     */
    private $estado;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

}
