<?php
/**
 * Created by Joaquín Marcher.
 * User: jmarcher
 * Date: 11.05.17
 * Time: 09:55
 */

namespace JMarcher\Assembler;


use Illuminate\Contracts\Support\Arrayable;
use JMarcher\Assembler\Values\BinaryValue;
use JMarcher\Assembler\Values\NotInitializedValue;
use JMarcher\Assembler\Values\ValueInterface;

class Register implements Arrayable
{
    /**
     * @var string
     */
    protected $address;

    /**
     * @var ValueInterface
     */
    protected $value;

    /**
     * Register constructor.
     *
     * @param string $address
     */
    public function __construct($address)
    {
        $this->address = $address;
        $this->value = new NotInitializedValue;
    }


    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string       $haystack
     * @param  string|array $needles
     * @return bool
     */
    protected static function endsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if (substr($haystack, -strlen($needle)) === (string) $needle) {
                return true;
            }
        }

        return false;
    }

    public function getValue(): ValueInterface
    {
        return $this->value;
    }

    public function setValue(ValueInterface $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }


    function __toString()
    {
        $binaryValue = (new BinaryValue)->create($this->value);

        return "Address: {$this->address}, Value (Binary): {$binaryValue->getValue()}";
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return ['address' => $this->address, 'value' => $this->value];
    }
}