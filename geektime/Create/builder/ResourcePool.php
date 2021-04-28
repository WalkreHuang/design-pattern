<?php
/**
 *
 * User: huangwalker
 * Date: 2021/4/27
 * Time: 14:11
 * Email: <huangwalker@qq.com>
 */

class ResourcePool
{
    private $name;
    private $maxTotal;
    private $minIdle;
    private $maxIdle;

    public function __construct(PoolBuilder $builder)
    {
        $this->name = $builder->getName();
        $this->maxTotal = $builder->getMaxTotal();
        $this->minIdle = $builder->getMinIdle();
        $this->maxIdle = $builder->getMaxIdle();
    }
}