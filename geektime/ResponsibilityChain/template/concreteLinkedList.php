<?php

abstract class Handler
{
    /**
     * @var Handler
     */
    protected $successor = null;

    /**
     * @param $successor
     */
    public function setSuccessor($successor)
    {
        $this->successor = $successor;
    }

    //模板模式
    public function handle()
    {
        $handled = $this->doHandle();
        if (!$handled && !is_null($this->successor)) {
            $this->successor->handle();
        }
    }

    abstract public function doHandle();
}

class HandleA extends Handler
{
    public function doHandle()
    {
        $handled = false;

        echo 'handle A logic'.PHP_EOL;

        return $handled;
    }
}

class HandleB extends Handler
{
    public function doHandle()
    {
        $handled = false;

        echo 'handle B logic'.PHP_EOL;

        return $handled;
    }
}

class HandlerChain
{
    /**
     * @var Handler
     */
    private $head = null;

    /**
     * @var Handler
     */
    private $tail = null;

    public function addHandler(Handler $handler)
    {
        $handler->setSuccessor(null);

        if (is_null($this->head)) {
            $this->head = $handler;
            $this->tail = $handler;
            return;
        }

        $this->tail->setSuccessor($handler);
        $this->tail = $handler;
    }

    public function handle()
    {
        if (!is_null($this->head)) {
            $this->head->handle();
        }
    }
}

$chain = new HandlerChain();
$chain->addHandler(new HandleA());
$chain->addHandler(new HandleB());
$chain->handle();
