<?php
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/23
 * Time: 21:15
 */

namespace Shop\Controller;

use Admin\Controller\BaseController;
use Shop\Service\DeliveryService;

class DeliveryController extends BaseController
{
    private $delivery_service = '';
    protected $_bind_model = 'Delivery';
    protected $title = '快递管理';

    public function __construct()
    {
        parent::__construct();
        $this->delivery_service = new DeliveryService();
    }

    public function index()
    {
        $list = $this->delivery_service->get_all_list();
        $this->assign('list', $list);
        $this->assign('title', $this->title);
        $this->display();
    }

    public function form()
    {
        if (IS_POST) {
            $config = D("Delivery");
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
                if (empty($post['id'])) {
                    //add
                    unset($post['id']);
                    $result = $this->delivery_service->insert($post);
                } else {
                    //edit
                    $map = [];
                    $map['id'] = $post['id'];
                    $result = $this->delivery_service->update($map, $post);
                }
                $result === false ? $this->error('操作失败！') : $this->success('操作成功！');
            }
        } else {
            $id = I('get.id');
            if (empty($id)) {
                $title = '快递添加';
            } else {
                $title = '快递编辑';
                $vo = $this->delivery_service->get_detail_list($id);
                $this->assign('vo', $vo);
            }
            $this->assign('title', $title);
            $this->assign('form_token', form_token(true, C('FORM_TYPE.INFO')));
            $this->display();
        }
    }

}