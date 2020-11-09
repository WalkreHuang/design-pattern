<?php

interface IHandler
{
    public function handle();
}

class HandleA implements IHandler
{
    public function handle()
    {
        $handle = false;

        echo 'do handleA logic';

        return $handle;
    }
}

class HandleB implements IHandler
{
    public function handle()
    {
        $handle = false;

        echo 'do handleB logic';

        return $handle;
    }
}

class HandlerChain
{
    /**
     * @var Handler[]
     */
    private $handlers = [];

    public function addHandler(IHandler $handler)
    {
        $this->handlers[] = $handler;
    }

    public function handle()
    {
        foreach ($this->handlers as $handler) {
            $handled = $handler->handle();
            if ($handled) {
                break;
            }
        }
    }
}

$chain = new HandlerChain();
$chain->addHandler(new HandleA());
$chain->addHandler(new HandleB());
$chain->handle();