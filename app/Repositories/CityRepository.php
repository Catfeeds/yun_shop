<?php

namespace App\Repositories;

use App\Models\Cities;

use InfyOm\Generator\Common\BaseRepository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pid',
        'name',
        'level',
        'path'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cities::class;
    }

    //根据pid获取上级地区的路由
    public function getLastCitiesRouterByPid($pid){
        $parent_cities=Cities::find($pid);
        if($parent_cities->level==1){
            return route('cities.index');
        }else{
            $back_cities=Cities::find($pid)->ParentCitiesObj;
            if(!empty($back_cities)) {
                return route('cities.child.index', [$back_cities->id]);
            }
        }
    }

    //获取第一级城市
    public function getBasicLevelCities(){
        $cities=Cities::where('level',1)->get();
        if(!empty($cities)){
            return $cities;
        }else{
            return [];
        }
    }

    //根据id获取子集
    public function getChildCitiesById($cities_id){
        $cities=Cities::where('pid',$cities_id)->get();
        $cities_list=[];
        if(!empty($cities)){
            foreach ($cities as $key=>$city){
                $cities_list[$key]=['id'=>$city->id,'name'=>$city->name];
            }
            return $cities_list;
        }else{
            return $cities_list;
        }

    }


    //获取上一级区域
    public function getLastCity($id){
        $city = Cities::find($id);
        if(!empty($city)){
            return Cities::find($city->pid);
        }else{
            return null;
        }
        
    }

    //根据等级获取城市
    public function getLevelNumCities($level,$whether_filter=false){
        $cities=Cities::where('level',$level)->get();
        if(!empty($cities)){
            if($whether_filter){
                    #省级代理商
                    $admins = app('commonRepo')->adminRepo()->typeAgents($level);
                   
                        foreach ($cities as $key => $value) {
                            $value['selected'] = true;
                            if(count($admins)){
                                foreach ($admins as $key => $admin) {
                                    $admin_attr = $level ==1 ? $admin->province : $admin->city;
                                    if($value->id == $admin_attr){
                                         $value['selected'] = false;
                                    }
                                }
                        }
                    }

            }
            return $cities;
        }else{
            return [];
        }
    }


}
