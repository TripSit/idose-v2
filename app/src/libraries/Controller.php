<?php 

/**
 * The base class for all controllers
 * 
 * @package atomar
 * @author change <spr1t3-0@riseup.net>
 */

Class Controller {


    /**
     * Instantiate a model class
     *
     * @param string $model
     * @return mixed
     */
    public function model(string $model):mixed {
        $model = ucfirst($model);
        require_once(APP_ROOT . '/src/models/' . $model . '.php');
        return new $model();
    }

    /**
     * Render a view to the user
     *
     * @param string $layout Layout for the view
     * @param string $component Component to render
     * @param array $data Data to assign
     * @return void
     */
    public function render(array $data, string $component, string $layout = 'default') {
        
        $component = APP_ROOT . '/src/views/components/' . $component . '.tpl';
        $layout = APP_ROOT . '/src/views/layouts/' . $layout . '.tpl';
        
        $tpl = SmartySingleton::instance();

        if(file_exists($layout) && file_exists($component)) {
            $data['appComponent'] = $component; 
            $tpl->assign('data', $data);
            $tpl->display($layout);
        } else {
           die('404');
        }

    }


}