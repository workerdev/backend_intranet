<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Catalogo
 * @ORM\Table(name="cb_configuracion_catalogo", uniqueConstraints={@ORM\UniqueConstraint(name="cb_catalogo_id", columns={"cb_catalogo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CatalogoRepository")
 */
class Catalogo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_catalogo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_catalogo_sistema", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     */
    private $sistema;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_catalogo_descripcion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_catalogo_duenio", type="text", nullable=true)
     */
    private $duenio;

    /**
    * @var string
    *
    * @ORM\Column(name="cb_catalogo_url", type="text", nullable=true)
    */
   private $url;
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_catalogo_estado", type="integer", nullable=false)
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
    public function getSistema(): ?string
    {
        return $this->sistema;
    }

    public function setSistema(string $sistema): self
    {
        $this->sistema = $sistema;

        return $this;
    }
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

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
    
    public function getDuenio(): ?string
    {
        return $this->duenio;
    }

    public function setDuenio(string $duenio): self
    {
        $this->duenio = $duenio;

        return $this;
    }
    
    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }  
}
