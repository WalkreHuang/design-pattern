<?php


class ConcreteObserverTwo implements Observer
{
    public function update(Message $message)
    {
        echo 'ConcreteObserverTwo is notified.';
    }

}