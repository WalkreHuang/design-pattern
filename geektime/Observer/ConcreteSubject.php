<?php


class ConcreteSubject implements Subject
{
    /**
     * @var Observer[]
     */
    private $observers = [];

    public function registerObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $target_observer)
    {
        foreach ($this->observers as $key => $observer) {
            if ($target_observer === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notifyObservers(Message $message)
    {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }

}