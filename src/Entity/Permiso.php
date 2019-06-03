<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Permiso
 * @ORM\Table(name="cb_correlativo_permiso", uniqueConstraints={@ORM\UniqueConstraint(name="cb_permiso_id", columns={"cb_permiso_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\PermisoRepository")
 */

class Permiso
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_permiso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_permiso_fkusuario", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_permiso_tipo", type="string", length=200, nullable=false)
     */
    private $tipo;
    
    /**
     * @var \unidad
     *
     * @ORM\ManyToOne(targetEntity="Unidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_permiso_fkunidad", referencedColumnName="cb_unidad_id")
     * })
     *
     * @Assert\NotBlank
     */
    private $fkunidad;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_permiso_estado", type="integer", nullable=false)
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

    public function getFkusuario(): ?Usuario
    {
        return $this->fkusuario;
    }

    public function setFkusuario(?Usuario $fkusuario): self
    {
        $this->fkusuario = $fkusuario;

        return $this;
    }
    
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getFkunidad(): ?Unidad
    {
        return $this->fkunidad;
    }

    public function setFkunidad(?Unidad $fkunidad): self
    {
        $this->fkunidad = $fkunidad;

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