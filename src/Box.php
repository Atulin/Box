<?php

namespace Eselt;

class Box
{
    /** @var float $x */
    private $x;
    /** @var float $y */
    private $y;
    /** @var float $z */
    private $z;

    /**
     * Box constructor.
     *
     * @param float $x The x dimension of the box
     * @param float $y The y dimension of the box
     * @param float $z The z dimension of the box
     */
    public function __construct(float $x, float $y, float $z) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @param Box $otherBox The outer box
     *
     * @return bool True if $this box can fit into $otherBox
     */
    public function fitsInto(Box $otherBox): bool
    {
        return $otherBox->x > $this->x
            && $otherBox->y > $this->y
            && $otherBox->z > $this->z;
    }
}
