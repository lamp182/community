<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\Adverts;
use DB;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * 获取广告
     */
    public function getAdverts() {
    	// 获取广告
    	return Adverts::where('position_id', '>', 0) -> orderby('position_id', 'asc') -> get();
    }
    
    /**
     * 获取友情链接
     */
    public function getLinks() {
    	// 获取友情链接
    	return DB::table('links') -> get();
    }
    
    /**
     * 获取网站信息
     */
    public function getWeb() {
    	// 获取友情链接
    	return DB::table('website') -> get()[0];
    }
}
