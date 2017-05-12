<?php
/**
 * Created by Joaquín Marcher.
 * User: jmarcher
 * Date: 11.05.17
 * Time: 10:03
 */

namespace JMarcher\Assembler\Values;


class BinaryValue extends Value implements ValueInterface
{


    public function getValue()
    {
        return decbin($this->value);
    }

    public function setValue($value)
    {
        $this->value = bindec($value);
        return $this;
    }

    public function getIntValue()
    {
        return $this->value;
    }
}