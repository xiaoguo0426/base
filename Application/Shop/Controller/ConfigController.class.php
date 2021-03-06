<?php

namespace Shop\Controller;

/**
 * 商城配置控制器
 * User: 74064
 * Date: 2016/7/22
 * Time: 23:18
 */

use Admin\Controller\BaseController;
use Shop\Service\ConfigService;

class ConfigController extends BaseController
{

    private $config_service = '';

    public function __construct()
    {
        parent::__construct();
        $this->config_service = new ConfigService();
    }

    public function index()
    {

        if (IS_POST) {
            $config = D("Config");
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
                    $result = $this->config_service->insert($post);
                } else {
                    //edit
                    $map = [];
                    $map['id'] = $post['id'];
                    $result = $this->config_service->update($map, $post);
                }
                $result === false ? $this->error('操作失败！') : $this->success('操作成功！');
            }
        } else {
            $vo = $this->config_service->get_detail_list();
            $this->assign('vo', $vo);
            $this->assign('title', '商城设置');
            $this->assign('form_token', form_token(true, C('FORM_TYPE.INFO')));
            $this->display();
        }

    }

}