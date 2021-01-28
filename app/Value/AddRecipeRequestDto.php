<?php
/** 
 * code generated by vog
 * https://github.com/MarvinWank/vog
 */
declare(strict_types=1);

namespace App\Value;


use UnexpectedValueException;

final class AddRecipeRequestDto implements ValueObject
{
    private string $title;
    private string $dietStyle;
    private string $cuisine;
    private int $timeToCook;
    private int $totalTime;
    private IngredientsSet $ingredients;

    public function __construct (
        string $title,
        string $dietStyle,
        string $cuisine,
        int $timeToCook,
        int $totalTime,
        IngredientsSet $ingredients
    ) {
        $this->title = $title;
        $this->dietStyle = $dietStyle;
        $this->cuisine = $cuisine;
        $this->timeToCook = $timeToCook;
        $this->totalTime = $totalTime;
        $this->ingredients = $ingredients;
    }
    
    public function title(): string 
    {
        return $this->title;
    }
    
    public function dietStyle(): string 
    {
        return $this->dietStyle;
    }
    
    public function cuisine(): string 
    {
        return $this->cuisine;
    }
    
    public function timeToCook(): int 
    {
        return $this->timeToCook;
    }
    
    public function totalTime(): int 
    {
        return $this->totalTime;
    }
    
    public function ingredients(): IngredientsSet 
    {
        return $this->ingredients;
    }
    
    public function with_title(string $title): self 
    {
        return new self(
            $title,
            $this->dietStyle,
            $this->cuisine,
            $this->timeToCook,
            $this->totalTime,
            $this->ingredients
        );
    }
    
    public function with_dietStyle(string $dietStyle): self 
    {
        return new self(
            $this->title,
            $dietStyle,
            $this->cuisine,
            $this->timeToCook,
            $this->totalTime,
            $this->ingredients
        );
    }
    
    public function with_cuisine(string $cuisine): self 
    {
        return new self(
            $this->title,
            $this->dietStyle,
            $cuisine,
            $this->timeToCook,
            $this->totalTime,
            $this->ingredients
        );
    }
    
    public function with_timeToCook(int $timeToCook): self 
    {
        return new self(
            $this->title,
            $this->dietStyle,
            $this->cuisine,
            $timeToCook,
            $this->totalTime,
            $this->ingredients
        );
    }
    
    public function with_totalTime(int $totalTime): self 
    {
        return new self(
            $this->title,
            $this->dietStyle,
            $this->cuisine,
            $this->timeToCook,
            $totalTime,
            $this->ingredients
        );
    }
    
    public function with_ingredients(IngredientsSet $ingredients): self 
    {
        return new self(
            $this->title,
            $this->dietStyle,
            $this->cuisine,
            $this->timeToCook,
            $this->totalTime,
            $ingredients
        );
    }
    
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'dietStyle' => $this->dietStyle,
            'cuisine' => $this->cuisine,
            'timeToCook' => $this->timeToCook,
            'totalTime' => $this->totalTime,
            'ingredients' =>  $this->valueToArray($this->ingredients),
        ];
    }
    
    public static function fromArray(array $array): self
    {
        if (!array_key_exists('title', $array)) {
            throw new UnexpectedValueException('Array key title does not exist');
        }
        
        if (!array_key_exists('dietStyle', $array)) {
            throw new UnexpectedValueException('Array key dietStyle does not exist');
        }
        
        if (!array_key_exists('cuisine', $array)) {
            throw new UnexpectedValueException('Array key cuisine does not exist');
        }
        
        if (!array_key_exists('timeToCook', $array)) {
            throw new UnexpectedValueException('Array key timeToCook does not exist');
        }
        
        if (!array_key_exists('totalTime', $array)) {
            throw new UnexpectedValueException('Array key totalTime does not exist');
        }
        
        if (!array_key_exists('ingredients', $array)) {
            throw new UnexpectedValueException('Array key ingredients does not exist');
        }
        
        if (is_string($array['ingredients']) && is_a(IngredientsSet::class, Enum::class, true)) {
            $array['ingredients'] = IngredientsSet::fromName($array['ingredients']);
        }
    
        if (is_array($array['ingredients']) && (is_a(IngredientsSet::class, Set::class, true) || is_a(IngredientsSet::class, ValueObject::class, true))) {
            $array['ingredients'] = IngredientsSet::fromArray($array['ingredients']);
        }

        return new self(
            $array['title'],
            $array['dietStyle'],
            $array['cuisine'],
            $array['timeToCook'],
            $array['totalTime'],
            $array['ingredients']
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