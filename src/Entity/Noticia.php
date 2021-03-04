<?php

namespace App\Entity;

use App\Repository\NoticiaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoticiaRepository::class)
 */
class Noticia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imagenDestacada;

    /**
     * @ORM\Column(type="text")
     */
    private $textoNoticia;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaPublicacion;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="noticias")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autorNoticia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getImagenDestacada(): ?string
    {
        return $this->imagenDestacada;
    }

    public function setImagenDestacada(string $imagenDestacada): self
    {
        $this->imagenDestacada = $imagenDestacada;

        return $this;
    }

    public function getTextoNoticia(): ?string
    {
        return $this->textoNoticia;
    }

    public function setTextoNoticia(string $textoNoticia): self
    {
        $this->textoNoticia = $textoNoticia;

        return $this;
    }

    public function getFechaPublicacion(): ?\DateTimeInterface
    {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion(\DateTimeInterface $fechaPublicacion): self
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    public function getAutorNoticia(): ?User
    {
        return $this->autorNoticia;
    }

    public function setAutorNoticia(?User $autorNoticia): self
    {
        $this->autorNoticia = $autorNoticia;

        return $this;
    }
}
