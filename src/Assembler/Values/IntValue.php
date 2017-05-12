<?php
/**
 * Created by Joaquín Marcher.
 * User: jmarcher
 * Date: 11.05.17
 * Time: 10:15
 */

namespace JMarcher\Assembler\Values;


class IntValue extends Value implements ValueInterface
{


    public function getValue()
    {
        return $this->getIntValue();
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getIntValue()
    {
        return $this->value;
    }
}