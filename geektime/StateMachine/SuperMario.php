<?php


class SuperMario implements IMario
{
    private $stateMachine;

    public function __construct(MarioStateMachine $stateMachine)
    {
        $this->stateMachine = $stateMachine;
    }
    
    public function getName()
    {
        return 'Super';
    }

    public function obtainMushRoom()
    {
        $this->stateMachine->setCurrentState(new Super);
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