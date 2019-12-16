<?php

use Eselt\Box;
use PHPUnit\Framework\TestCase;


class BoxTest extends TestCase
{
    public function test_it_can_be_instantiated(): void
    {
        $box = new Box(10, 5, 20);
        $this->assertNotNull($box);
    }

    /**
     * @testdox Inner smaller box should fit into outer larger box
     */
    public function test_fit_inner_smaller(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(9, 9, 9);
        $this->assertTrue($innerBox->fitsInto($outerBox));
    }

    /**
     * @testdox Inner larger box should not fit into outer smaller box
     */
    public function test_fit_inner_larger(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(11, 11, 11);
        $this->assertFalse($innerBox->fitsInto($outerBox));
    }

    /**
     * @testdox Inner box of the same size as the outer box should not fit inside
     */
    public function test_fit_inner_same(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(10, 10, 10);
        $this->assertFalse($innerBox->fitsInto($outerBox));
    }
}
