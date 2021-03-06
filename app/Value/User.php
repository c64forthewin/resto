<?php
/** 
 * code generated by vog
 * https://github.com/MarvinWank/vog
 */
declare(strict_types=1);

namespace App\Value;


use UnexpectedValueException;

class User implements ValueObject
{
    private int $id;
    private string $name;
    private string $email;
    private IntegerSet $friends;

    public function __construct (
        int $id,
        string $name,
        string $email,
        IntegerSet $friends
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->friends = $friends;
    }
    
    public function id(): int 
    {
        return $this->id;
    }
    
    public function name(): string 
    {
        return $this->name;
    }
    
    public function email(): string 
    {
        return $this->email;
    }
    
    public function friends(): IntegerSet 
    {
        return $this->friends;
    }
    
    public function with_id(int $id): self 
    {
        return new self(
            $id,
            $this->name,
            $this->email,
            $this->friends
        );
    }
    
    public function with_name(string $name): self 
    {
        return new self(
            $this->id,
            $name,
            $this->email,
            $this->friends
        );
    }
    
    public function with_email(string $email): self 
    {
        return new self(
            $this->id,
            $this->name,
            $email,
            $this->friends
        );
    }
    
    public function with_friends(IntegerSet $friends): self 
    {
        return new self(
            $this->id,
            $this->name,
            $this->email,
            $friends
        );
    }
    
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'friends' =>  $this->valueToArray($this->friends),
        ];
    }
    
    public static function fromArray(array $array): self
    {
        if (!array_key_exists('id', $array)) {
            throw new UnexpectedValueException('Array key id does not exist');
        }
        
        if (!array_key_exists('name', $array)) {
            throw new UnexpectedValueException('Array key name does not exist');
        }
        
        if (!array_key_exists('email', $array)) {
            throw new UnexpectedValueException('Array key email does not exist');
        }
        
        if (!array_key_exists('friends', $array)) {
            throw new UnexpectedValueException('Array key friends does not exist');
        }
                if (is_string($array['friends']) && is_a(IntegerSet::class, Enum::class, true)) {
            $array['friends'] = IntegerSet::fromName($array['friends']);
        }
    
        if (is_array($array['friends']) && (is_a(IntegerSet::class, Set::class, true) || is_a(IntegerSet::class, ValueObject::class, true))) {
            $array['friends'] = IntegerSet::fromArray($array['friends']);
        }

        return new self(
            $array['id'],
            $array['name'],
            $array['email'],
            $array['friends']
        );
    }
        
    private function valueToArray($value)
    {
        if (method_exists($value, 'toArray')) {
            return $value->toArray();
        }
        
        if(is_a($value, \DateTime::class, true) || is_a($value, \DateTimeImmutable::class, true)){
            return $value->format('Y-m-d');
        }
        
        return (string) $value;
    }
        
    public function equals($value): bool
    {
        $ref = $this->toArray();
        $val = $value->toArray();
        
        return ($ref === $val);
    }
    
    public function __toString(): string
    {
        return $this->toString();
    }
    
    public function toString(): string
    {
        return (string) $this->id;
    }
    
}