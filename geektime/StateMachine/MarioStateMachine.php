<?php


class MarioStateMachine
{
    private $score;
    private $currentState;

    public function __construct()
    {
        $this->score = 0;
        $this->currentState = new SmallMario($this);
    }

    public function obtainMushRoom()
    {
        $this->currentState->obtainMushRoom();
    }

    public function obtainCape()
    {
        $this->currentState->obtainCape();
    }

    public function obtainFireFlower()
    {
        $this->currentState->obtainFireFlower();
    }

    public function meetMonster()
    {
        $this->currentState->meetMonster();
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getCurrentState()
    {
        return $this->currentState->getName();
    }

    public function setCurrentState(IMario $currentState)
    {
        $this->currentState = $currentState;
    }
}