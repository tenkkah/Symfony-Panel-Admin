<?php

namespace App\Entity;

use App\Repository\PedidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidoRepository::class)
 */
class Pedido
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
    private $referencia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codigoPedido;

    /**
     * @ORM\ManyToOne(targetEntity=cliente::class, inversedBy="pedidos")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity=producto::class, inversedBy="pedidos")
     */
    private $Producto;

    public function __construct()
    {
        $this->Producto = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): self
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getCodigoPedido(): ?string
    {
        return $this->codigoPedido;
    }

    public function setCodigoPedido(string $codigoPedido): self
    {
        $this->codigoPedido = $codigoPedido;

        return $this;
    }

    public function getClient(): ?cliente
    {
        return $this->client;
    }

    public function setClient(?cliente $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|producto[]
     */
    public function getProducto(): Collection
    {
        return $this->Producto;
    }

    public function addProducto(producto $producto): self
    {
        if (!$this->Producto->contains($producto)) {
            $this->Producto[] = $producto;
        }

        return $this;
    }

    public function removeProducto(producto $producto): self
    {
        $this->Producto->removeElement($producto);

        return $this;
    }
}
