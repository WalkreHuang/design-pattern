<?php
/**
 *
 * User: huangwalker
 * Date: 2021/4/27
 * Time: 14:13
 * Email: <huangwalker@qq.com>
 */

class PoolBuilder
{
    private $name;
    private $maxTotal;
    private $minIdle;
    private $maxIdle;

    /**
     * @return ResourcePool
     * @author clh
     * @time 2021/4/27
     */
    public function build()
    {
        //校验逻辑放到这里来做，包括必填项校验、依赖关系校验、约束条件校验等
        if (empty($this->getName())) {
            throw new InvalidArgumentException('empty name');
        }
        if ($this->getMinIdle() > $this->getMaxIdle()) {
            throw new InvalidArgumentException('illegal min_idle should lte max_idle');
        }

        return new ResourcePool($this);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  mixed  $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxTotal()
    {
        return $this->maxTotal;
    }

    /**
     * @param  mixed  $maxTotal
     * @return $this
     */
    public function setMaxTotal($maxTotal)
    {
        $this->maxTotal = $maxTotal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinIdle()
    {
        return $this->minIdle;
    }

    /**
     * @param  mixed  $minIdle
     * @return $this
     */
    public function setMinIdle($minIdle)
    {
        $this->minIdle = $minIdle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxIdle()
    {
        return $this->maxIdle;
    }

    /**
     * @param  mixed  $maxIdle
     * @return $this
     */
    public function setMaxIdle($maxIdle)
    {
        $this->maxIdle = $maxIdle;
        return $this;
    }

}