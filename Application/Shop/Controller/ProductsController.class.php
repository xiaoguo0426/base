<?php
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/23
 * Time: 21:15
 */

namespace Shop\Controller;

use Admin\Controller\BaseController;
use Shop\Service\ProductsService;
use Shop\Service\CategoryService;
use Shop\Service\SpecificationsService;

class ProductsController extends BaseController
{
    private $products_service = '';
    protected $_bind_model = 'Products';
    protected $title = '商品管理';

    public function __construct()
    {
        parent::__construct();
        $this->products_service = new ProductsService();
    }

    public function index()
    {
        $list = $this->products_service->get_all_list();
        $this->assign('list', $list);
        $this->assign('title', $this->title);
        $this->display();
    }

    public function form()
    {
        if (IS_POST) {
            $config = D("Products");
            if (!$config->create()) {
                $this->error($config->getError());
            } else {
                $post = I('post.');

                $form_token = $post['form_token'];
                if (!validate_form_token($form_token)) {
                    $this->error('当前提交已过期，请刷新后再试！');
                } else {
                    //token验证通过后注销token
                    form_token(false);
                    unset($post['form_token']);
                }
                //拼装规格参数
                $params = $this->products_service->get_combine_params($post['params_name'], $post['params_value']);
                $post['params'] = json_encode($params);
                unset($post['params_name']);
                unset($post['params_value']);

                if (empty($post['id'])) {
                    //add
                    unset($post['id']);
                    $result = $this->products_service->insert($post);
                } else {
                    //edit
                    $map = [];
                    $map['id'] = $post['id'];
                    $result = $this->products_service->update($map, $post);
                }
                $result === false ? $this->error('操作失败！') : $this->success('操作成功！');
            }
        } else {
            $id = I('get.id');
            if (empty($id)) {
                $title = '商品添加';
            } else {
                $title = '商品编辑';
                $vo = $this->products_service->get_detail_list($id);
//                $vo['params'] = json_decode($vo['params'], true);

                $this->assign('vo', $vo);

            }
            $category_service = new CategoryService();
            $category = $category_service->get_active_list('id,name');

            $this->assign('category', $category);
            $this->assign('title', $title);
            $this->assign('form_token', form_token(true, C('FORM_TYPE.INFO')));
            $this->display();
        }
    }

    /**
     * 根据产品分类id获得该分类下的所有规格
     */
    public function getSpecifications()
    {
        $category_id = I('post.category_id');
        if (empty($category_id)) {
            $this->error('分类id不能为空！');
        }
        $specifications_service = new SpecificationsService();
        $specifications = $specifications_service->get_specifications($category_id, "id,name");

        $this->ajaxReturn($specifications, 'JSON');
    }

}