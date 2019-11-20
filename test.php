<?php
/**
 * TODO 类反射学习
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/11/11
 * Time: 14:54
 */

interface Log
{
    public function write();
}

class FileLog implements Log
{

    public function write()
    {
        // TODO: Implement write() method.
        echo "write file log";
    }
}

class DatabaseLog implements Log
{
    public function write()
    {
        // TODO: Implement write() method.
        echo "write database log";
    }
}

class User
{

    protected $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function writeLog()
    {
        echo "success";
        $this->log->write();
    }
}

class Ioc
{
    protected $binding = [];

    /**
     * 绑定依赖关系，并不生成实例
     * @param $abstract
     * @param $class_name
     * @return Closure
     */
    public function binding($abstract, $class_name)
    {
        return $this->binding[$abstract] = function ($ioc) use ($class_name) {
            return $ioc->build($class_name);
        };
    }

    /**
     * 
     * @param $abstract
     * @return mixed
     */
    public function make($abstract)
    {
        $a = $this->binding[$abstract];
        return $a($this);
    }


    /**
     * 生成类实例
     * @param $class_name
     * @return object
     * @throws ReflectionException
     */
    public function build($class_name)
    {
        $reflect = new ReflectionClass($class_name);
        $contract = $reflect->getConstructor();
        if (is_null($contract)) {
            return $reflect->newInstance();
        } else {
            $params = $contract->getParameters();
            $dependence = $this->getDependence($params);
            return $reflect->newInstanceArgs($dependence);
        }
    }


    /**
     * 获取反射参数的依赖关系
     * @param $params
     * @return array
     */
    public function getDependence($params){
        $dependence = [];
        foreach ($params as $param){
            $dependence[] = $this->make($param->getClass()->name);
        }
        return $dependence;
    }
}

$ioc = new  Ioc();
$ioc->binding('Log','FileLog');
$ioc->binding('user','User');
$user = $ioc->make('user');
$user->writeLog();




