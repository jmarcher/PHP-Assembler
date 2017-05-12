<?php
/**
 * Created by Joaquín Marcher.
 * User: jmarcher
 * Date: 11.05.17
 * Time: 10:01
 */

namespace JMarcher\Assembler\Values;

/**
 * Interface ValueInterface
 * 32 bit representation
 *
 * @package JMarcher\Assembler\Values
 */
interface ValueInterface
{
    public function getValue();

    public function getIntValue();

    public function setValue($value);

    public function setLowValue($value);

    public function setHighValue($value);

    public function setXValue($value);
}