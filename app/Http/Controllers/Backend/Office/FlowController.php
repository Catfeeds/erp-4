<?php namespace App\Http\Controllers\Backend\Office;

use Session;
use Redirect;
use App\Models\Office\Flow;
use App\Models\Office\FlowProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreFlowRequest;
use App\Http\Requests\Backend\Luster\StoreFlowProcessRequest;

class FlowController extends Controller {

    public function index()
    {
        return view('backend.office.flow.index')
            ->withflows(Flow::paginate(config('access.users.default_per_page')));
    }

    public function edit($id)
    {
        $list = FlowProcess::where('flow_id',$id)->get();
        //改变步骤格式，适应 js
        $process_data = array();
        $process_total = 0;
        foreach($list as $value)
        {
            $process_total +=1;
            $style = json_decode($value['style'],true);
            $process_data[] = array(
                'id'=>$value['id'],
                'flow_id'=>$value['flow_id'], 
                'process_name'=>$value['process_name'],
                'process_to'=>$value['process_to'],
                'icon'=>$style['icon'],//图标
                'style'=>'width:'.$style['width'].'px;height:'.$style['height'].'px;line-height:'.$style['height'].'px;color:'.$style['color'].';left:'.$value['setleft'].'px;top:'.$value['settop'].'px;',
            );
        }
        //传到模板渲染
        $process_data= json_encode(array('total'=>$process_total, 'list'=>$process_data));
        // dd($process_data);
        $id = $id;
     
        return view('backend.office.flow.edit',compact('process_data','id'));
    }
    //添加步骤
    public function getAdd()
    { 
        //获取参数

        $flow_id = intval($_GET['flow_id']);
        $left  = intval($_GET['left']);
        $top  = intval($_GET['top']);
        // $flow_id = 2;
        // $left  = 562;
        // $top  = 367;
        // $flow_id = intval($_POST['flow_id']);
        // $left  = intval($_POST['left']);
        // $top  = intval($_POST['top']);
        $data = array(
           'flow_id'=>$flow_id, 
           'process_name'=>'新建步骤',
           'setleft'=>$left,
           'settop'=>$top,
           'process_to'=>'',
           'style'=>json_encode(array(
                'icon'=>'icon-star',//图标
                'width'=>'120',
                'height'=>'30',
                'color'=>'#0e76a8',
           )),
        );

        if(!FlowProcess::create($data))
        {
         //返回 json 数据
            $data=array(
                'status'=>1,
                'msg'=>'success',
                'info'=>array(
                    'flow_id'=>$flow_id, 
                    'process_name'=>'新建步骤',
                    'process_to'=>'',
                    'icon'=>'',//图标
                    'style'=>'left:'.$left.'px;top:'.$top.'px;color:#0e76a8;'//样式 
                ),
            );
        }

        echo json_encode($data);

    }


    public function attribute($id)
    {
        $process = FlowProcess::find($id);
        return view('backend.luster.office.flow.attribute',compact('process'));
    }

    public function postAttr(StoreFlowProcessRequest $request)
    {   
        $flow_id = $request->input('flow_id');
        $process_id = $request->input('process_id');
        $process = FlowProcess::find($process_id);
        $process->process_name = $request->input('name');
        $process->save();
        if ($process->update()) {
            return Redirect::to('admin/luster/flows/'.$flow_id.'/edit')
                ->withFlashSuccess('作业流程创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
    
    public function store(StoreFlowRequest $request)
    {   
        if (Flow::create($request->all())) {
            return Redirect::to('admin/luster/flows')
                ->withFlashSuccess('作业流程创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
    
    public function create()
    {
        return view('backend.luster.office.flow.create');
    }
    
    //删除步骤
    function getDelete()
    {
        $process_id = intval($_GET['process_id']);
        $flow_id = intval($_GET['flow_id']);
        FlowProcess::destroy($process_id);
        // $list = FlowProcess::where('process_to','$process_id')->get();
        // dd($list);
        // foreach($list as $value)
        // {
        //     //把 process_to 去除 $process_id 再保存
        //     $arr = explode(',',$value['process_to']);
        //     $k = array_search($process_id,$arr);
        //     unset($arr[$k]);
            
        //     $process_to = '';
        //     if(!empty($arr))
        //     {
        //         $process_to = implode(',',$arr);
        //     }

        //     $map =array(
        //         'id'=>$value['id'],
        //     );
        //     $data = array(
        //         'process_to'=>$process_to,
        //         'updatetime'=>$this->_timestamp,
        //     );
        //     $trans = $process_model->where($map)->save($data);
        //     if(!$trans)//有错误，跳出
        //     {
        //         break;
        //     }
        // }
        
        $data = array(
            'status'=>1,
            'msg'=>'删除成功',
            'info'=>'',
        );

        echo json_encode($data);
        
    }
    
    
    /* 保存布局  位置 和 步骤连接*/
    public function getSave()
    {  
        $flow_id = $_GET['flow_id'];
        $process_info = trim($_GET['process_info']);
        // $flow_id = $_POST['flow_id'];
        // $process_info = trim($_POST['process_info']);
        $process_info = json_decode($process_info,true);
        // dd($process_info);
        //保存数据
        foreach($process_info as $process_id=>$value)
        {
            $process_to = implode(",",$value['process_to']);
            $process_model = FlowProcess::find($process_id);
            $data = array(
                'setleft'=>(int)$value['left'],
                'settop'=>(int)$value['top'],
                'process_to'=> $process_to,
            );
            $process_model->update($data);
        }
        
        $data = array(
                'status'=>1,
                'msg'=>'^_^ 保存成功',
                'info'=>'',
            );
        echo json_encode($data);

    }
    
    
    // //右键属性
    // public function attribute()
    // {
    //     //步骤ID
    //     $process_id = intval($_GET['id']);
    //     $op = trim($_GET['op']);
    //     if(!$op)
    //         $op = 'basic';
        
    //     //连接数据表用的。表 model 
    //     $flow_model = D('flow');
    //     $process_model = D('flow_process');
    //     $form_model = D('form');
        
    //     //map查询条件  验证步骤
    //     $map = array(
    //         'id'=>$process_id,
    //         'is_del'=>0,
    //     );
    //     $one = $process_model->where($map)->find();
    //     if(!$one)
    //     {
    //         exit('T_T 未找到步骤信息');
    //     }
    //     //验证流程
    //     $map = array(
    //         'id'=>$one['flow_id'],//流程ID
    //         'is_del'=>0,
    //     );
        
    //     $flow_one = $flow_model->where($map)->find();
    //     if(!$flow_one)
    //     {
    //         exit('T_T 未找到流程信息');
    //     }
        
    //     if($flow_one['flow_type']==1)
    //     {
    //         exit('^_^ 亲，自由流程不用设置步骤的喔');
    //     }
        
    //     //验证 表单    $flow_one['form_id']
    //     $map = array(
    //         'id'=>$flow_one['form_id'],
    //         'is_del'=>0,
    //     );
    //     $form_one = $form_model->field('id,form_name,content_data,fields')->where($map)->find();
    //     if(!$form_one)
    //     {
    //         exit('T_T 未找到表单信息');
    //     }
        
    //     //初始化必须字段
    //     $one['process_to'] = $one['process_to']=='' ? array() : explode(',',$one['process_to']);
        

    //     //转出条件 但没 process_to
    //     if($op=='judge' && empty($one['process_to']))
    //     {
    //         exit('T_T 请先设置属性 -> 选择下一步步骤');
    //     }
        
    //     $one['style'] = json_decode($one['style'],true);
    //     $one['write_fields'] = $one['write_fields']=='' ? array() : explode(',',$one['write_fields']);//可写字段
    //     $one['secret_fields'] = $one['secret_fields']=='' ? array() : explode(',',$one['secret_fields']);//保密 隐藏的字段
    //     //$one['lock_fields'] = $one['lock_fields']=='' ? array() : explode(',',$one['lock_fields']);//锁定 字段
        
        
    //     $form_one['content_data'] = $form_one['content_data']=='' ? array() : unserialize($form_one['content_data']);
        
    //     $one['out_condition'] = self::parse_out_condition($one['out_condition'],$form_one['content_data']);//json

        
    //     /* 设计表 你可以提示一下
    //     if(!$form_one['content_data'])
    //     {
    //         exit('T_T 请先设计表单');
    //     }*/
    //     //print_R($form_one['content_data']);exit;
        
        
        
        
        
        
    //     //备选步骤  同一个流程全部步骤
    //     $map = array(
    //         'flow_id'=>$one['flow_id'],//流程ID
    //         //'id'=>array('neq',$one['id']),//不用排除当前步骤ID    子流程结束后 返回步骤  要用
    //         'is_del'=>0,
    //     );
    //     $process_to_list = $process_model->field('id,process_name,process_type')->where($map)->select();

        
    //     //子流程 列表
    //     $map = array(
    //         'is_del'=>0,
    //     );
    //     $child_flow_list = $flow_model->field('id,flow_name')->where($map)->select();
        
        
        
        
        
        
    //     //赋值到模板上
    //     $this->assign('op',$op);
    //     $this->assign('one',$one);
    //     $this->assign('form_one',$form_one);
    //     //这个在配置文件中配置，\Application\Common\Conf\config.php
    //     $this->assign('form_plugins',C('FORM_PLUGINS'));
        
    //     $this->assign('process_to_list',$process_to_list);
    //     $this->assign('child_flow_list',$child_flow_list);
        
    //     //渲染显示模板
    //     $this->display();
    // }
    
    //$json_data is json    
    //return json
    public function parse_out_condition($json_data,$field_data)
    {
        $array = json_decode($json_data,true);
        if(!$array)
        {
            return '[]';
        }
        
        $json_data = array();//重置
        foreach($array as $key=>$value)
        {
            $condition = '';
            foreach($value['condition'] as $val)
            {
                //匹配 $field_data 
                //把data_x 替换回 中文名称
                $preg =  "/'(data_[0-9]?|checkboxs_[0-9]?)'/s";
                preg_match_all($preg,$val,$temparr);
                $val_text = '';
                foreach($temparr[0] as $k=>$v)
                {
                    $field_name = self::get_field_name($temparr[1][$k],$field_data);
                    if($field_name)
                        $val_text = str_replace($v,"'".$field_name."'",$val);
                    else
                        $val_text = $val;
                }
                
                $condition.='<option value="'.$val.'">'.$val_text.'</option>';
            }
            
            $value['condition'] = $condition;
            $json_data[$key] = $value;
        }
        
        return json_encode($json_data);
        
        /*
        $flow_id  = intval($_POST['flow_id']);
        $process_id  = intval($_POST['process_id']);
        
        $arr = array(
            //步骤ID => desc 不符合条件时的提示   option 显示文本   value 值 
            '59'=>array(
                'condition_desc'=>'不符合条件时的提示',
                'condition'=>"<option value=\"'data_1' = '33'  AND\">'爱好' = '33' AND</option><option value=\"'data_2' = '44'\">'姓名' = '44'</option>"
            ),
        );
        echo json_encode($arr);
        */
    }
    
    //通过 name  data_x 找到 title
    public function get_field_name($field,$field_data)
    {
        $field = trim($field);
        if(!$field) return '';
        $title = '';
        foreach($field_data as $value)
        {
            if($value['leipiplugins'] =='checkboxs' && $value['parse_name']==$field)
            {
                $title = $value['title'];
                break;
            }else if($value['name']==$field)
            {
                $title = $value['title'];
                break;
            }
        }
        return $title;
    }
    
    //右键属性 iframe 提交保存
    public function save_attribute()
    {
        //print_R($_POST);exit;
        //start 避免出错，都列出来先
        $flow_id = intval(I('post.flow_id'));//流程ID
        $process_id = intval(I('post.process_id'));//步骤ID
        //常规
        $process_name = trim(I('post.process_name'));//步骤名称
        $process_type = trim(I('post.process_type'));//类型
        $process_to = ids_parse(I('post.process_to'));//下一步
        $child_id = intval(I('post.child_id'));//子流程ID
        $child_after = intval(I('post.child_after'));//子流程结束后动作
        $child_back_process = intval(I('post.child_back_process'));//结束返回
        //表单
        
        $write_fields = I('post.write_fields','') ? implode(',',I('post.write_fields','')) :'';//可写字段
        $secret_fields = I('post.secret_fields','') ? implode(',',I('post.secret_fields','')) :'';//保密字段
        //权限
        $auto_person = intval(I('post.auto_person'));//自动选人
        $auto_unlock = intval(I('post.auto_unlock'));//>预先设置自动选人，更方便转交工作
        $auto_sponsor_ids = trim(I('post.auto_sponsor_ids'));//指定主办人
        $auto_sponsor_text = trim(I('post.auto_sponsor_text'));
        $auto_respon_ids = trim(I('post.auto_respon_ids'));//指定经办人
        $auto_respon_text = trim(I('post.auto_respon_text'));
        $auto_role_ids = trim(I('post.auto_role_ids'));//指定角色
        $auto_role_text = trim(I('post.auto_role_text'));
        $range_user_ids = trim(I('post.range_user_ids'));//授权人员
        $range_user_text = trim(I('post.range_user_text'));
        $range_dept_ids = trim(I('post.range_dept_ids'));//授权部门
        $range_dept_text = trim(I('post.range_dept_text'));
        $range_role_ids = trim(I('post.range_role_ids'));//授权角色
        $range_role_text = trim(I('post.range_role_text'));
        //操作
        $receive_type = intval(I('post.receive_type'));//交接方式
        $is_user_end = intval(I('post.is_user_end'));//允许主办人办结流程
        $is_userop_pass = intval(I('post.is_userop_pass'));//经办人可以转交下一步
        $is_sing = intval(I('post.is_sing'));//会签方式
        $sign_look = intval(I('post.sign_look'));//可见性
        $is_back = intval(I('post.is_back'));//回退方式
        //转出条件
       $process_condition =  trim(I('post.process_condition'),',');//process_to
       $process_condition = explode(',',$process_condition);
       $out_condition = array();
       foreach($process_condition as $value)
       {
           $value = intval($value);
           if($value>0)
           {
               $condition = trim($_POST['process_in_set_'.$value],"@leipi@");
               $condition = $condition ? explode("@leipi@",$condition) : array();
               $out_condition[$value] = array(
                     'condition'=>$condition,
                     'condition_desc'=>trim($_POST['process_in_desc_'.$value]),
               );
           }
       }
       //样式
       $style_width = intval(I('post.style_width'));
       $style_height = intval(I('post.style_height'));
       $style_color = trim(I('post.style_color'));
       $style_icon = trim(I('post.style_icon'));
//end 避免出错，都列出来先
       
       $process_model = D('flow_process');
       //对数据进行判断
       if($flow_id<=0 or $process_id<=0)
       {
           self::return_iframe_ajax(array(
                'status'=>0,
                'msg'=>'保存失败',
                'info'=>'',
            ));
       }
       
       //检查步骤是否存在
        $map = array(
            'id'=>$process_id,
            'flow_id'=>$flow_id,
            'is_del'=>0,
        );
        $process_one = $process_model->where($map)->find();
        if(!$process_one){
            self::return_iframe_ajax(array(
                'status'=>0,
                'msg'=>'未找到步骤，请刷新再试',
                'info'=>'',
            ));
        }
        
        //保存数据， 不列出来的，直接写这里也可以呀
        $data = array(
            //常规
            'process_name'=>$process_name,
            'process_type'=>$process_type,
            'process_to'=>$process_to,
            'child_id'=>$child_id,
            'child_after'=>$child_after,
            'child_back_process'=>$child_back_process,
            //表单
            'write_fields'=>$write_fields,
            'secret_fields'=>$secret_fields,
            //权限
            'auto_person'=>$auto_person,
            'auto_unlock'=>$auto_unlock,
            'auto_sponsor_ids'=>$auto_sponsor_ids,
            'auto_sponsor_text'=>$auto_sponsor_text,
            'auto_respon_ids'=>$auto_respon_ids,
            'auto_respon_text'=>$auto_respon_text,
            'auto_role_ids'=>$auto_role_ids,
            'auto_role_text'=>$auto_role_text,
            'range_user_ids'=>$range_user_ids,
            'range_user_text'=>$range_user_text,
            'range_dept_ids'=>$range_dept_ids,
            'range_dept_text'=>$range_dept_text,
            'range_role_ids'=>$range_role_ids,
            'range_role_text'=>$range_role_text,
            //操作
            'receive_type'=>$receive_type,
            'is_user_end'=>$is_user_end,
            'is_userop_pass'=>$is_userop_pass,
            'is_sing'=>$is_sing,
            'sign_look'=>$sign_look,
            'is_back'=>$is_back,
            //转出条件
            'out_condition'=>json_encode($out_condition),
            //样式
            'style'=>json_encode(array(
                'width'=>$style_width,
                'height'=>$style_height,
                'color'=>$style_color,
                'icon'=>$style_icon,
            )),
           
        );
//print_r($data);exit;
        $map = array(
            'id'=>$process_id,
            'is_del'=>0,
        );
        $process_model->where($map)->save($data);
        
        
        
        //成功返回
        self::return_iframe_ajax(array(
            'status'=>1,
            'msg'=>'保存成功',
            'info'=>'',
        ));
    }
    //返回给firame提交的表单
    public function return_iframe_ajax($ajax_return)
    {
        //返回格式
        /*
        $ajax_return = array(
            'status'=>1,
            'msg'=>'保存成功',
            'info'=>'',
        );*/
        //回调页面的函数
        echo '<script type="text/javascript">parent.saveAttribute('.json_encode($ajax_return).');</script>';
        exit;
    }



    public function show($id)
    {
        $flow = Flow::find($id);
        return view('backend.luster.office.flow.show',compact('flow'));
    }


    public function update(StoreFlowRequest $request,$id)
    {
        $flow = Flow::find($id);
        if ($flit->update($request->all())) {
            return Redirect::to('admin/luster/flows?page='. Session::get('currentPage'))
            ->withFlashSuccess('作业流程更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $flow = Flow::find($id);
        $flow->delete();
        return Redirect::to('admin/luster/flows?page='. Session::get('currentPage'))
            ->withFlashSuccess('采购入库记录删除成功！');
    }
}
