<?php
/** 
 * code generated by vog
 * https://github.com/MarvinWank/vog
 */
declare(strict_types=1);

namespace App\Value;


use UnexpectedValueException;

final class Ingredient implements ValueObject
{
    private string $name;
    private float $amount;
    private SIUnit $unit;
    private ?int $kcal;

    public function __construct (
        string $name,
        float $amount,
        SIUnit $unit,
        ?int $kcal
    ) {
        $this->name = $name;
        $this->amount = $amount;
        $this->unit = $unit;
        $this->kcal = $kcal;
    }
    
    public function name(): string 
    {
        return $this->name;
    }
    
    public function amount(): float 
    {
        return $this->amount;
    }
    
    public function unit(): SIUnit 
    {
        return $this->unit;
    }
    
    public function kcal(): ?int 
    {
        return $this->kcal;
    }
    
    public function with_name(string $name): self 
    {
        return new self(
            $name,
            $this->amount,
            $this->unit,
            $this->kcal
        );
    }
    
    public function with_amount(float $amount): self 
    {
        return new self(
            $this->name,
            $amount,
            $this->unit,
            $this->kcal
        );
    }
    
    public function with_unit(SIUnit $unit): self 
    {
        return new self(
            $this->name,
            $this->amount,
            $unit,
            $this->kcal
        );
    }
    
    public function with_kcal(?int $kcal): self 
    {
        return new self(
            $this->name,
            $this->amount,
            $this->unit,
            $kcal
        );
    }
    
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'amount' => $this->amount,
            'unit' =>  $this->valueToArray($this->unit),
            'kcal' => $this->kcal,
        ];
    }
    
    public static function fromArray(array $array): self
    {
        if (!array_key_exists('name', $array)) {
            throw new UnexpectedValueException('Array key name does not exist');
        }
        
        if (!array_key_exists('amount', $array)) {
            throw new UnexpectedValueException('Array key amount does not exist');
        }
        
        if (!array_key_exists('unit', $array)) {
            throw new UnexpectedValueException('Array key unit does not exist');
        }
        
        if (is_string($array['unit']) && is_a(SIUnit::class, Enum::class, true)) {
            $array['unit'] = SIUnit::fromName($array['unit']);
        }
    
        if (is_array($array['unit']) && (is_a(SIUnit::class, Set::class, true) || is_a(SIUnit::class, ValueObject::class, true))) {
            $array['unit'] = SIUnit::fromArray($array['unit']);
        }

        if (!array_key_exists('kcal', $array)) {
            throw new UnexpectedValueException('Array key kcal does not exist');
        }
        
        return new self(
            $array['name'],
            $array['amount'],
            $array['unit'],
            $array['kcal']
        );
    }
        
    private function valueToArray($value)
    {
        if (method_exists($value, 'toArray')) {
            return $value->toArray();
        }
        
        return (string) $value;
    }    
    public function equals($value): bool
    {
        $ref = $this->toArray();
        $val = $value->toArray();
        
        return ($ref === $val);
    }
}