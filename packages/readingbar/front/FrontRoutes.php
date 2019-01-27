<?php 
include 'routes/QrCodeRoutes.php';
/*
 * 前台网站首页   二级页面 关于我们、 用户指南、用户协议、加入我们、商务合作、注册、登录、个人中心、隐私保护声明
 * */

/*前台路由*/
	Route::group(['middleware'=>'web'],function(){
		/*首页*/
		Route::get('/','Readingbar\Front\Controllers\HomeController@index');
		Route::get('/home','Readingbar\Front\Controllers\HomeController@index');
		/*个人中心*/
		Route::group(['middleware'=>'member','prefix'=>'member'],function(){
			/*个人中心面板*/
			Route::get('/','Readingbar\Front\Controllers\MemberController@index');
			/*个人中心设置*/
			Route::get('/setting','Readingbar\Front\Controllers\MemberController@memberSetting');
			/*基础信息*/
			Route::get('/baseinfo','Readingbar\Front\Controllers\MemberController@baseinfo');
			/*完善信息*/
			Route::get('/baseinfoForm','Readingbar\Front\Controllers\MemberController@baseinfoForm');
			/*修改密码*/
			Route::get('/password','Readingbar\Front\Controllers\MemberController@passwordForm');
			/*修改邮箱*/
			Route::get('/email','Readingbar\Front\Controllers\MemberController@emailForm');
			/*修改手机*/
			Route::get('/phone','Readingbar\Front\Controllers\MemberController@phoneForm');
			/*安全问答*/
			Route::get('/qa','Readingbar\Front\Controllers\MemberController@qaForm');
			/*孩子信息*/
			Route::group(['prefix'=>'children'],function(){
				/*孩子信息*/
				Route::get('/','Readingbar\Front\Controllers\MemberController@children');
				/*孩子信息*/
				Route::get('/baseinfo/{id}','Readingbar\Front\Controllers\MemberController@childrenBaseinfo');
				/*孩子信息编辑界面*/
				Route::get('/create','Readingbar\Front\Controllers\MemberController@childrenForm');
				Route::get('/edit/{id}','Readingbar\Front\Controllers\MemberController@childrenForm');
				/*孩子基础问卷调查*/
				Route::get('/survey/{id}','Readingbar\Front\Controllers\SurveyController@index');
				/*孩子的阅读计划*/
				Route::get('/readplan','Readingbar\Front\Controllers\ReadPlanController@index');
				/*孩子的阅读计划-详情*/
				Route::get('/readplan/detail/{id}','Readingbar\Front\Controllers\ReadPlanController@detail');
				/*阅读计划-ar报告*/
				Route::get('/readplan/arreports/{id}/{lang}','Readingbar\Front\Controllers\ReadPlanController@arReports');
				/*我的报告（star评测报告）*/
				Route::get('/starReport','Readingbar\Front\Controllers\StarController@index');
				Route::get('/starReport/SRD/{id}','Readingbar\Front\Controllers\StarController@SRD');
				Route::get('/starReport/{id}/Booklist','Readingbar\Front\Controllers\StarController@Booklist');
				/*AR Quiz解读报告*/
				Route::get('/arquizReport/{id}','Readingbar\Front\Controllers\ArQuizController@index');
				/*孩子积分日志*/
				Route::get('/pointLog','Readingbar\Front\Controllers\Spoint\PointLogController@index');
				Route::get('/pointLog/getLogs','Readingbar\Front\Controllers\Spoint\PointLogController@getLogs');
				Route::get('/pointLog/{sid}','Readingbar\Front\Controllers\Spoint\PointLogController@logs');
			});
			/*站内消息*/
			Route::group(['prefix'=>'messages'],function(){
				/*站内消息  收件箱和留言选择*/
				Route::get('/','Readingbar\Front\Controllers\MessagesController@index');
				/*收件箱*/
				Route::get('/messagesBox','Readingbar\Front\Controllers\MessagesController@messagesBox');
				/*消息详情*/
				Route::get('/messageDetail/{id}','Readingbar\Front\Controllers\MessagesController@messageDetail');
				/*我要留言*/
				Route::get('/leaveMessage','Readingbar\Front\Controllers\MessagesController@leaveMessage');
			});
			
			/*推广*/
			Route::group(['prefix'=>'promotions'],function(){
				/*推广查询首页*/
				Route::get('/','Readingbar\Front\Controllers\Promotions\PromotionsController@index');
				
				/*蕊丁使者确认界面*/
				Route::get('/RDMessenger','Readingbar\Front\Controllers\Promotions\PromotionsController@RDMessenger');
				/*成为蕊丁吧使者*/
				Route::get('/becomPromoter','Readingbar\Front\Controllers\Promotions\PromotionsController@becomPromoter');
				/*手机端二级界面*/
				Route::get('/wapMenu','Readingbar\Front\Controllers\Promotions\PromotionsController@wapMenu');
				
				/*当前用户二维码下载*/
				Route::get('/downloadqrcode','Readingbar\Front\Controllers\Promotions\PromotionsController@downloadqrcode');
			});
			/*支付*/
			Route::group(['prefix'=>'pay'],function(){
				Route::get('/confirm','Readingbar\Front\Controllers\PayController@confirm');
				Route::get('/renewConfirm','Readingbar\Front\Controllers\PayController@renewConfirm');
			});
			/*账务中心*/
			Route::group(['prefix'=>'accountCenter'],function(){
				/*我的订单*/
				Route::get('/orders','Readingbar\Front\Controllers\OrderController@index');
				/*退押金申请*/
				Route::post('/orders/applyRefund','Readingbar\Front\Controllers\OrderController@applyRefundDeposit');
			});
			/*优惠券*/
			Route::group(['prefix'=>'discount'],function(){
				/*优惠券首页*/
				Route::get('/','Readingbar\Front\Controllers\Discount\DiscountController@index');
				/*获取优惠券列表*/
				Route::get('/getDiscountsList','Readingbar\Front\Controllers\Discount\DiscountController@getDiscountsList');
				/*转赠优惠券*/
				Route::get('/donation','Readingbar\Front\Controllers\Discount\DiscountController@donation');
				/*获取被推广的用户*/
				Route::get('/getPromotedMember','Readingbar\Front\Controllers\Discount\DiscountController@getPromotedMember');
			});
			/*书单检索*/
			Route::group(['prefix'=>'booksearch'],function(){
				/*列表*/
				Route::get('/','Readingbar\Front\Controllers\Book\BookSearchController@index');
				/*详情*/
				Route::get('/detail','Readingbar\Front\Controllers\Book\BookSearchController@detail');
				/*书单查询*/
				Route::get('/doSearchBooks','Readingbar\Front\Controllers\Book\BookSearchController@doSearchBooks');
			});
			/*积分关联*/
			Route::group(['prefix'=>'spoint'],function(){
				
				/*积分购物车*/
				Route::group(['prefix'=>'cart'],function(){
					/*购物车详情*/
					Route::get('/','Readingbar\Front\Controllers\Spoint\ShoppingCartController@index');
					/*添加商品*/
					Route::get('/add','Readingbar\Front\Controllers\Spoint\ShoppingCartController@add');
					/*修改商品数量*/
					Route::get('/update','Readingbar\Front\Controllers\Spoint\ShoppingCartController@update');
					/*全选*/
					Route::get('/selectAll','Readingbar\Front\Controllers\Spoint\ShoppingCartController@selectAll');
					/*移除商品*/
					Route::get('/remove','Readingbar\Front\Controllers\Spoint\ShoppingCartController@remove');
					/*清空购物车*/
					Route::get('/clear','Readingbar\Front\Controllers\Spoint\ShoppingCartController@clear');
					/*获取购物车信息*/
					Route::get('/getCart','Readingbar\Front\Controllers\Spoint\ShoppingCartController@getCart');
				});
				/*积分消费订单*/
				Route::group(['prefix'=>'order'],function(){
					/*单品消费订单确认*/
					Route::get('/confirmProduct','Readingbar\Front\Controllers\Spoint\OrderController@confirmProduct');
					/*购物车消费订单确认*/
					Route::get('/confirmCart','Readingbar\Front\Controllers\Spoint\OrderController@confirmCart');
					/*支付-单品*/
					Route::get('/payCart','Readingbar\Front\Controllers\Spoint\OrderController@payCart');
					/*支付-购物车*/
					Route::get('/payProduct','Readingbar\Front\Controllers\Spoint\OrderController@payProduct');
					/*订单支付完成提示界面*/
					Route::get('/completed','Readingbar\Front\Controllers\Spoint\OrderController@completed');
					
					/*消费日志*/
					Route::get('/log','Readingbar\Front\Controllers\Spoint\OrderController@log');
					/*获取订单列表*/
					Route::get('/getList','Readingbar\Front\Controllers\Spoint\OrderController@getList');
					/*消费日志*/
					Route::get('/delete','Readingbar\Front\Controllers\Spoint\OrderController@delete');
					/*订单详情*/
					Route::get('/detail/{id}','Readingbar\Front\Controllers\Spoint\OrderController@detail');
				});
				/*积分商品收藏*/
				Route::group(['prefix'=>'collection'],function(){
					/*收藏列表*/
					Route::get('/','Readingbar\Front\Controllers\Spoint\CollectionController@index');
					/*获取收藏数据*/
					Route::get('/getList','Readingbar\Front\Controllers\Spoint\CollectionController@getList');
					/*添加收藏数据*/
					Route::get('/add','Readingbar\Front\Controllers\Spoint\CollectionController@add');
					/*移除收藏数据*/
					Route::get('/remove','Readingbar\Front\Controllers\Spoint\CollectionController@remove');
				});
			});
		});
		/*登录*/
		Route::get('/login','Readingbar\Front\Controllers\LoginController@index');
		/*注册*/
		Route::get('/register','Readingbar\Front\Controllers\RegisterController@index');
		/*忘记密码*/
		Route::get('/forgoten','Readingbar\Front\Controllers\ForgotenController@index');
		/*关于我们*/
		Route::group(['prefix'=>'about'],function(){
			Route::get('/us','Readingbar\Front\Controllers\AboutController@us');
		});
		/*介绍*/
		Route::group(['prefix'=>'introduce'],function(){
			/*服务介绍*/
			Route::get('/service','Readingbar\Front\Controllers\IntroduceController@service');
			/*用户指南*/
			Route::get('/userGuide','Readingbar\Front\Controllers\IntroduceController@userGuide');
			/*加入我们*/
			Route::get('/joinus','Readingbar\Front\Controllers\IntroduceController@joinus');
			/*商务合作*/
			Route::get('/cooperation','Readingbar\Front\Controllers\IntroduceController@cooperation');
			/*蕊丁使者*/
			Route::get('/RDMessenger','Readingbar\Front\Controllers\IntroduceController@RDMessenger');
			/*服务理念*/
			Route::get('/service_idea','Readingbar\Front\Controllers\IntroduceController@service_idea');
			/*服务特色
			Route::get('/service_characteristic','Readingbar\Front\Controllers\IntroduceController@service_characteristic');
			*/
			/*一书一心*/
			Route::get('/oneBookOneHeart','Readingbar\Front\Controllers\IntroduceController@oneBookOneHeart');
		});
		/*活动*/
		Route::group(['prefix'=>'activity'],function(){
			/*复活节*/
			//Route::get('/easter','Readingbar\Front\Controllers\Activity\EasterController@index');
			/*感恩节*/
			//Route::get('/thanksgiving','Readingbar\Front\Controllers\Activity\ThanksgivingController@index');
			/*双12*/
			//Route::get('/double12','Readingbar\Front\Controllers\Activity\Double12Controller@index');
			/*50位知名作家*/
			Route::get('/50FamousWriters','Readingbar\Front\Controllers\Activity\FiftyFamousWritersController@index');
			/*50位知名作家*/
			Route::get('/PublicBenefitActivities','Readingbar\Front\Controllers\Activity\PublicBenefitActivitiesController@index');
		});
		
		/*协议*/
		Route::group(['prefix'=>'protocol'],function(){
			/*用户协议*/
			Route::get('/user','Readingbar\Front\Controllers\ProtocolController@user');
			/*用户注册协议*/
			Route::get('/register','Readingbar\Front\Controllers\ProtocolController@register');
		});
		/*声明*/
		Route::group(['prefix'=>'statement'],function(){
			/*用户隐私声明*/
			Route::get('/privacy','Readingbar\Front\Controllers\StatementController@privacy');
		});
		/*产品*/
		Route::group(['prefix'=>'product'],function(){
			/*产品列表*/
			//Route::get('/list','Readingbar\Front\Controllers\ProductController@product20171107');
			/*产品详情*/
			//Route::get('/detail/{id}','Readingbar\Front\Controllers\ProductController@productDetail');
			/*单次阅读体验*/
			//Route::get('/singleReadingExperience','Readingbar\Front\Controllers\ProductController@singleReadingExperience');
			/*购买须知*/
			//Route::get('/purchaseNotice','Readingbar\Front\Controllers\ProductController@purchaseNotice');
		});
		/*文章*/
		Route::group(['prefix'=>'article'],function(){
			/*文章列表首页*/
			Route::get('/','Readingbar\Front\Controllers\Article\ArticleController@index');
			/*获取文章列表数据*/
			Route::get('/getList','Readingbar\Front\Controllers\Article\ArticleController@getListOfWx');
		});
		/*礼品卡充值流程*/
		Route::get('/giftCardProcess','Readingbar\Front\Controllers\Gift\GiftCardController@index');
		/*排行榜*/
		Route::get('/ranking','Readingbar\Front\Controllers\Ranking\RankingController@index');
		
		/*写点想法*/
		Route::group(['prefix'=>'customer/idea'],function(){
			/*首页*/
			Route::get('/','Readingbar\Front\Controllers\Customer\CustomerIdeaController@index');
			/*获取列表数据*/
			Route::get('/getList','Readingbar\Front\Controllers\Customer\CustomerIdeaController@getList');
			/*提交想法*/
			Route::post('/submit','Readingbar\Front\Controllers\Customer\CustomerIdeaController@create');
		});
		/*积分商品*/
		Route::group(['prefix'=>'member/spoint/product'],function(){
			Route::get('/','Readingbar\Front\Controllers\Spoint\ProductController@index');
			Route::get('/detail','Readingbar\Front\Controllers\Spoint\ProductController@detail');
			Route::get('/getProducts','Readingbar\Front\Controllers\Spoint\ProductController@getProducts');
		});
		/*快递鸟接口测试*/
		Route::get('/kdniao','Readingbar\Front\Controllers\Kdniao\KdniaoController@getInfo');
		

		/*书评管理*/
		Route::group(['prefix'=>'book','middleware'=>'member'],function(){
			Route::group(['prefix'=>'/comment'],function(){
				// 书评界面
				Route::get('/','Readingbar\Front\Controllers\Book\BookCommentController@index');
				// 书评内容获取
				Route::get('/all','Readingbar\Front\Controllers\Book\BookCommentController@comment');
				// 书评提交接口
				Route::post('/','Readingbar\Front\Controllers\Book\BookCommentController@comment');
				// 获取孩子对某本书的书评
				Route::get('/{student_id}/{book_id}','Readingbar\Front\Controllers\Book\BookCommentController@getCommentBySBID');
			});
		});
		
		/*图书借阅服务*/
		Route::group(['prefix'=>'borrowService','middleware'=>'member'],function(){
			Route::group(['prefix'=>'/myBooks'],function(){
				// 我的书单
				Route::get('/plans','Readingbar\Front\Controllers\ReadPlan\BorrowServiceController@index');
				// 获取借阅服务的阅读计划
				Route::get('/getPlans','Readingbar\Front\Controllers\ReadPlan\BorrowServiceController@getPlans');
				// 借阅计划详情
				Route::get('/{sid}/{pid}/detail','Readingbar\Front\Controllers\ReadPlan\BorrowServiceController@detail');
			});
		});
		
		/*物流跟踪*/
		Route::group(['prefix'=>'express','middleware'=>'member'],function(){
				Route::get('/{id}','Readingbar\Back\Controllers\Express\ExpressController@getTracesByMember');
		});
	});
	
?>