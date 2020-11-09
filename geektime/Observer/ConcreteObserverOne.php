<?php


class ConcreteObserverOne implements Observer
{
    public function update(Message $message)
    {
        echo 'ConcreteObserverOne is notified.';
    }

}