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
     * @testdox Check if the return type of fitsInto() is a boolean
     */
    public function test_is_return_type_bool(): void
    {
        $box1 = new Box(7, 8, 4);
        $box2 = new Box(1, 29, 5);
        $this->assertIsBool($box1->fitsInto($box2));
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

    /**
     * @testdox Inner box with larger X dimension should not fit inside
     */
    public function test_fit_inner_x_larger(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(11, 9, 9);
        $this->assertFalse($innerBox->fitsInto($outerBox));
    }

    /**
     * @testdox Inner box with larger Y dimension should not fit inside
     */
    public function test_fit_inner_y_larger(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(9, 11, 9);
        $this->assertFalse($innerBox->fitsInto($outerBox));
    }

    /**
     * @testdox Inner box with larger Z dimension should not fit inside
     */
    public function test_fit_inner_z_larger(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(9, 9, 11);
        $this->assertFalse($innerBox->fitsInto($outerBox));
    }

    /**
     * @testdox Inner box with equal X dimension should not fit inside
     */
    public function test_fit_inner_x_equal(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(10, 9, 9);
        $this->assertFalse($innerBox->fitsInto($outerBox));
    }

    /**
     * @testdox Inner box with equal Y dimension should not fit inside
     */
    public function test_fit_inner_y_equal(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(9, 10, 9);
        $this->assertFalse($innerBox->fitsInto($outerBox));
    }

    /**
     * @testdox Inner box with equal Z dimension should not fit inside
     */
    public function test_fit_inner_z_equal(): void
    {
        $outerBox = new Box(10, 10, 10);
        $innerBox = new Box(9, 9, 10);
        $this->assertFalse($innerBox->fitsInto($outerBox));
    }
}
