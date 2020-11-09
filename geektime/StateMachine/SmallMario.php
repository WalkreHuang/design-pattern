<?php


class SmallMario implements IMario
{
    private $stateMachine;
    public function __construct(MarioStateMachine $stateMachine)
    {
        $this->stateMachine = $stateMachine;
    }
    
    public function getName()
    {
        return 'Small';
    }

    public function obtainMushRoom()
    {
        $this->stateMachine->setCurrentState(new SuperMario($this->stateMachine));
        $this->stateMachine->setScore($this->stateMachine->getScore() + 100);
    }

    public function obtainCape()
    {
        // TODO: Implement obtainCape() method.
    }

    public function obtainFireFlower()
    {
        // TODO: Implement obtainFireFlower() method.
    }

    public function meetMonster()
    {
        // TODO: Implement meetMonster() method.
    }

}