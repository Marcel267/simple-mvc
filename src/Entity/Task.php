<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'task')]
class Task
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $description;

    #[ORM\Column(type: "boolean")]
    private $isActive;

    /** Many tasks have one category. This is the owning side. */
    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'tasks')]
    #[ORM\JoinColumn(name: 'category_id', referencedColumnName: 'id')]
    private Category|null $category = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setIsActive(int $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getIsActive(): int
    {
        return $this->isActive;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
