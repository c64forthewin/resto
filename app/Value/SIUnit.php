<?php
/** 
 * code generated by vog
 * https://github.com/MarvinWank/vog
 */
declare(strict_types=1);

namespace App\Value;


use InvalidArgumentException;

final class SIUnit implements Enum
{
    public const OPTIONS = [ 
        'g' => 'gramm',
        'kg' => 'kilogramm',
        'ml' => 'millilitre',
        'l' => 'litre',
        'Stk' => 'pieces',
    ];

    public const g = 'gramm';               
    public const kg = 'kilogramm';               
    public const ml = 'millilitre';               
    public const l = 'litre';               
    public const Stk = 'pieces';                       
    private string $name;
    private string $value;
        
    private function __construct(string $name)
    {
        $this->name = $name;
        $this->value = self::OPTIONS[$name];
    }

    public static function g(): self
    {
        return new self('g');
    }
    
    public static function kg(): self
    {
        return new self('kg');
    }
    
    public static function ml(): self
    {
        return new self('ml');
    }
    
    public static function l(): self
    {
        return new self('l');
    }
    
    public static function Stk(): self
    {
        return new self('Stk');
    }
    
    public static function fromValue(string $value): self
    {
        foreach (self::OPTIONS as $key => $option) {
            if ($value === $option) {
                return new self($key);
            }
        }

        throw new InvalidArgumentException("Unknown enum value '$value' given");
    }
    
    public static function fromName(string $name): self
    {
        if(!array_key_exists($name, self::OPTIONS)){
             throw new InvalidArgumentException("Unknown enum name $name given");
        }
        
        return new self($name);
    }
    
    public function equals(?self $other): bool
    {
        return (null !== $other) && ($this->name() === $other->name());
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function toString(): string
    {
        return $this->name;
    }
}