<?php
    return [
        'menu_title' =>'积分商品分类管理',
        'head_title'=>'积分商品分类管理',
    	'view_list'=>'积分商品分类列表',
    	'view_form'=>'积分商品分类表单',
        'columns'=>[
        		'id'=>'序号',
        		'catagory_name'=>'分类名称',
        		'icon_pc'=>'电脑端图标',
    			'icon_wap'=>'移动端图标',
        		'created_at'=>'创建时间',
        		'updated_at'=>'更新时间',
        		'operation'=>'操作'
        ],
    	'btns'=>[
    			'edit'=>'编辑',
    			'save'=>'保存',
    			'cancel'=>'取消',
    	],
    	'form'=>[
    		'catagory_name'=>'分类名称',
    		'type'=>[
    			'0'=>'实物',
        		'1'=>'优惠券',
    		],
    		'type_v'=>"值",			
    	],
    	'messages'=>[
    			'id.required'=>'分类不存在！'
    	],
    	'attributes'=>[
    			'id'=>'序号',
        		'catagory_name'=>'分类名称',
        		'icon_pc'=>'电脑端图标',
    			'icon_wap'=>'移动端图标',
        		'created_at'=>'创建时间',
        		'updated'=>'更新时间'
    	],
    	'placeholder'=>[
    			'catagory_name'=>'分类名称',
    			'icon_pc'=>'电脑端图标',
    			'icon_wap'=>'移动端图标',
    			'type'=>'类型',
    			'type_v'=>'类型值',
    	]
	];