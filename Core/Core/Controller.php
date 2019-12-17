<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/3/25
 * Time: 14:50
 */

namespace Core\Core;

/**
 * TODO 框架模板基类
 * Class Controller
 * @package Core\Core
 */
class Controller
{
    protected $view;

    protected $tpl_vars = array();

    /**
     * 模板变量赋值
     * @param $name
     * @param string $value
     */
    public function assign($name, $value = '')
    {
        if (is_array($name)) {
            $this->tpl_vars = array_merge($this->tpl_vars, $name);
        } else {
            $this->tpl_vars[$name] = $value;
        }
    }

    /**
     * 模板变量取值
     * @param string $name
     * @return array|bool|mixed
     */
    public function get($name = '')
    {
        if ($name === '') {
            return $this->tpl_vars;
        } else {
            return isset($this->tpl_vars[$name]) ? $this->tpl_vars[$name] : false;
        }
    }

    public function fetch(){}

    public function display($tpl)
    {

    }

}