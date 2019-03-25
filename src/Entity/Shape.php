<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 22.03.19.
 * Time: 16:35
 */

namespace App\Entity;

abstract class Shape
{
    public $type;
    public $circumference;
    public $area;

    abstract protected function calculateCircumference();

    abstract protected function calculateArea();

    abstract protected function validateShape();

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCircumference()
    {
        return $this->circumference;
    }

    /**
     * @param mixed $circumference
     */
    public function setCircumference($circumference): void
    {
        $this->circumference = $circumference;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area): void
    {
        $this->area = $area;
    }
}
