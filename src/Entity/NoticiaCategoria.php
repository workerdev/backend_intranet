<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * NoticiaCategoria
 * @ORM\Table(name="cb_comunicacion_noticiacategoria", uniqueConstraints={@ORM\UniqueConstraint(name="cb_noticiacategoria_id", columns={"cb_noticiacategoria_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\NoticiaCategoriaRepository")
 */
class NoticiaCategoria
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_noticiacategoria_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    
    /**
     * @var \noticia
     *
     * @ORM\ManyToOne(targetEntity="Noticia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_noticiacategoria_fknoticia", referencedColumnName="cb_noticia_id")
     * })
     */
    private $fknoticia;
    
    /**
     * @var \categoria
     *
     * @ORM\ManyToOne(targetEntity="CategoriaNoticia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_noticiacategoria_fkcategoria", referencedColumnName="cb_categorianoticia_id")
     * })
     */
    private $fkcategoria;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    
    public function getFknoticia(): ?Noticia
    {
        return $this->fknoticia;
    }
    
    public function setFknoticia(?Noticia $fknoticia): self
    {
        $this->fknoticia = $fknoticia;

        return $this;
    }
    
    public function getFkcategoria(): ?CategoriaNoticia
    {
        return $this->fkcategoria;
    }
    
    public function setFkcategoria(?CategoriaNoticia $fkcategoria): self
    {
        $this->fkcategoria = $fkcategoria;

        return $this;
    }
}