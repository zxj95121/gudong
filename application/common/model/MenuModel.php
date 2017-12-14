<?php
namespace app\common\model;

use think\Config;
use think\Session;

class MenuModel extends BaseModel
{
    protected $table = 'menu';

    /**
     * 获取侧边菜单
     * @return array
     */
    public function getSideMenu(){
        $sideMenu = [];
        //1、获取一级菜单
        $oneLevel = self::getChildByParentId(0);
        foreach($oneLevel as $oneItem){
            $sideMenu[$oneItem['menu_id']] = [
                'menu_name'=>$oneItem['menu_name'],
                'controller_name'=>strtolower($oneItem['controller_name']),
                'action_name'=>strtolower($oneItem['action_name']),
                'icon'=>$oneItem['icon']
            ];
            $menu_id = $oneItem['menu_id'];
            $secondLevel = self::getChildByParentId($menu_id);
            foreach($secondLevel as $secondItem){
                $sideMenu[$oneItem['menu_id']] ['child'][] = [
                    'menu_name'=>$secondItem['menu_name'],
                    'url_path'=>url($secondItem['controller_name']."/".$secondItem['action_name']),
                    'action_name'=>strtolower($secondItem['action_name']),
                    'controller_name'=>strtolower($secondItem['controller_name'])
                ];
            }
        }

        return $sideMenu;
    }

    /**
     * 获取角色菜单的展现形式
     * @param int $role_id 角色id
     * @return array
     */
    public function getRoleMenuShow($role_id){
        return $this->alias('menu')->field('menu.*,rel_role_menu.role_id')
                ->join('rel_role_menu rel_role_menu',
                    "rel_role_menu.menu_id = menu.menu_id and role_id = '{$role_id}'",
                    'LEFT')
            ->where(['is_show'=>1])
            ->order('parent_menu_id asc,list_order desc')->select();

    }

    /**
     * 通过菜单获取子菜单信息
     * @param $parentId
     * @param bool $is_cache 是否缓存
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getChildByParentId($parentId,$is_cache=true){
        $staff_id = Session::get('staff_id');
        $staffModel = new StaffModel();
        $staffInfo = $staffModel->getOne(['staff_id'=>$staff_id]);
        $role_id = $staffInfo['role_id'];
        //缓存5分钟
        $menuSelect = $this->alias('menu')
            ->field('menu.*,rel_role_menu.role_id as rel_role_id')
            ->join('rel_role_menu rel_role_menu',"rel_role_menu.menu_id = menu.menu_id and role_id = '{$role_id}'",'LEFT')
            ->where(['parent_menu_id'=>"{$parentId}",'is_show'=>1])->whereNotNull('rel_role_menu.role_id')->order('list_order desc,menu_id asc');

        if(Config::get('app_debug') == false){
           return $menuSelect->cache($is_cache,300)->select();
        }
        return  $menuSelect->select();
    }

}
