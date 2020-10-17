<?php


class Espresso
{
    public $cost;

    public function cost()
    {
        $this->cost = 2.5;
    }
}

class Dressing
{
    public function cost(Espresso $espresso, Closure $closure)
    {
        return $closure($espresso);
    }
}

class Whip extends Dressing
{
    public function cost(Espresso $espresso, Closure $closure)
    {
        $espresso->cost = $espresso->cost() + 0.1;

        return $closure($espresso);
    }
}

class Mocha extends Dressing
{
    public function cost(Espresso $espresso, Closure $closure)
    {
        $espresso->cost = $espresso->cost() + 0.5;

        return $closure($espresso);
    }
}


class Demo
{
    public static function main()
    {
        $coffee = new Espresso();
        $fun = function($coffee) use ($fuc, $dressing) {
            $dressing->cost($coffee, $fuc);
        };

        $fuc = function($fuc, $dressing) use ($fun) {
            return $fun;
        };


        $fuc0 = function($coffee) {
            return $coffee;
        };

        $fuc1 = $fuc($fuc0, (new Mocha()));

        $fuc2 = $fuc($fuc1, (new Mocha()));

        $fuc3 = $fuc($fuc2, (new Whip()));

        $coffee = $fuc3($coffee);

        //3.6(2.5 + 0.5 + 0.5 + 0.1)
        echo $coffee->cost();
    }
}

Demo::main();