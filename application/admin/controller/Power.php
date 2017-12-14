<?php
namespace app\admin\controller;
use app\common\model\MenuModel;
use app\common\model\RelRoleMenuModel;
use app\common\model\RoleModel;
use app\common\service\helperService;
use think\Controller;
use think\Validate;

class Power extends Base
{
    public function _initialize(){
        parent::_initialize();
    }

    /**
     * 菜单列表
     */
    public function menu(){

        $params = $this->request->param();
        $rule = [
            'parent_id' => 'number',
            'is_show'   => 'number',
            'menu_name' => 'max:100',
            'page'      => 'number',
        ];

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $where = [
            'parent_menu_id'=>isset($params['parent_id'])?$params['parent_id']:0,
            'is_show'=>isset($params['is_show'])?$params['is_show']:0
        ];
        $menu_name = isset($params['menu_name'])?$params['menu_name']:'';
        if($menu_name){
            $where['menu_name'] = ['like',"%{$menu_name}%"];
        }

        $where = array_filter($where);

        $menuModel = new MenuModel();

        $menuPage = $menuModel->getPage($page,$pageSize,$where,false);
        $totalCount = $menuModel->getPage(0,0,$where,true);
        //共用的分页方法
        $pageString = helperService::createPage($totalCount,
            $page ,'power/menu',$params,$pageSize
        );
        $this->assign('page',$pageString);
        $this->assign('menuList',$menuPage);

        //获取一级菜单
        $menuOneLevel = $menuModel->getChildByParentId(0,false);
        $this->assign('menuOneLevel',$menuOneLevel);

        //表单数据
        $this->assign('parent_id',isset($params['parent_id'])?$params['parent_id']:0);
        $this->assign('is_show',isset($params['is_show'])?$params['is_show']:0);
        $this->assign('menu_name',isset($params['menu_name'])?$params['menu_name']:'');

        return $this->fetch($this->_layout."/power/menu");
    }


    /**
     * 角色列表
     */
    public function role(){
        $params = $this->request->param();
        $rule = [
            'page'      => 'number',
        ];

        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $page = isset($params['page'])?intval($params['page']):1;
        $pageSize = 10;

        $roleModel = new RoleModel();
        $roleList = $roleModel->getPage($page,$pageSize,[],false);
        $totalCount = $roleModel->getPage(0,0,[],true);
        //共用的分页方法
        $pageString = helperService::createPage($totalCount,
            $page ,'power/role',$params,$pageSize
        );
        $this->assign('page',$pageString);
        $this->assign('roleList',$roleList);

        return $this->fetch($this->_layout."/power/role");
    }

    /**
     * 编辑角色
     */
    public function editRole(){
        $params = $this->request->param();

        $role_id = isset($params['role_id'])?intval($params['role_id']):0;

        $roleModel = new RoleModel();
        if($role_id){
            $roleInfo = $roleModel->getOne(['role_id'=>$role_id]);
        }else{
            $roleInfo = [
                'role_id'=>0,
                'role_name'=>'',
                'status'=>0,
            ];
        }

        $this->assign('role',$roleInfo);

        return $this->fetch($this->_layout."/power/edit_role");
    }

    /**
     * 保存角色信息
     */
    public function saveRole(){

        $params = $this->request->param();
        $rule = [
            'role_id' => 'number',
            'role_name|角色名称'=>'require|max:100',
            'status|状态'  => 'number',
        ];

        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $role_id = isset($params['role_id'])?$params['role_id']:0;

        $data = [
            'status'=>$params['status'],
            'role_name'=>$params['role_name'],
        ];

        $roleModel = new RoleModel();
        $return = $roleModel->saveData($data,array_filter(['role_id'=>$role_id]));
        if($return === false){
            $this->error('保存数据失败!',null,'',3);
        }

        $this->redirect("power/role");
    }

    /**
     * 用户菜单
     */
    public function relUserMenu(){
        $params = $this->request->param();
        $rule = [
            'role_id' => 'number',
        ];

        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        $roleModel = new RoleModel();
        //查询当前角色的名称
        $role_id = isset($params['role_id'])?intval($params['role_id']):0;
        $roleInfo = $roleModel->getOne(array_filter(['role_id'=>$role_id]));
        $this->assign('role_name',isset($roleInfo['role_name'])?$roleInfo['role_name']:'-未知-');

        //获取当前角色具有的菜单id和所有菜单的联结
        $menuModel = new MenuModel();
        $menu = $menuModel->getRoleMenuShow($role_id);
        $this->assign('menuList',$menu);
        $this->assign('role_id',$role_id);

        return $this->fetch($this->_layout."/power/rel_user_menu");
    }

    /**
     * 保存用户菜单
     */
    public function saveUserMenu(){

        $params = $this->request->param();
        $rule = [
            'role_id' => 'require|number',
            'select_menu' => 'require|array',
        ];

        $validate = new Validate($rule);
        if(!$validate->check($params)){
            $this->error($validate->getError(),null,'',3);
        }

        //去验证这个角色存在不
        $roleModel = new RoleModel();
        $role = $roleModel->getOne(['role_id'=>$params['role_id']]);
        if(empty($role)){
            $this->error('此角色不存在',null,'',3);
        }

        //remove此角色的全部权限
        $relRoleMenuModel = new RelRoleMenuModel();
        $relRoleMenuModel->startTrans();
        $result = $relRoleMenuModel->removeData(['role_id'=>$params['role_id']]);
        if($result === false){
            $this->error('更改角色权限失败',null,'',3);
        }
        foreach($params['select_menu'] as $select_menu){
            $result = $relRoleMenuModel->insertGetId([
                'menu_id'=>intval($select_menu),
                'role_id'=>intval($params['role_id'])
            ]);

            if($result === false){
                $this->error('更改角色权限失败',null,'',3);
            }
        }
        //事务提交
        $relRoleMenuModel->commit();

        $this->redirect("power/role");
    }

}
