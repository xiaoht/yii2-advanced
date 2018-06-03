<?php

use mdm\admin\components\MenuHelper;
use dmstr\widgets\Menu;

$callback = function($menu){
    $data = json_decode($menu['data'], true);
    $items = $menu['children'];
    $return = [
        'label' => $menu['name'],
        'url' => [$menu['route']],
        'class' => 'multitabs',
        'data-iframe' => true,
    ];

    if ($data) {
        //visible
        isset($data['visible']) && $return['visible'] = $data['visible'];
        //icon
        isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon'];
        //other attribute e.g. class...
        $return['options'] = $data;
    }

    //没配置图标的显示默认图标，默认图标大家可以自己随便修改
    (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'circle-o';
    $items && $return['items'] = $items;

    return $return;
}; ?>

<aside class="main-sidebar">
    <section class="sidebar">
        <?=Menu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
            'items'   => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback),
        ]); ?>
    </section>
</aside>