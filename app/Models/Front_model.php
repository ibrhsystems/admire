<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
class Front_model extends Model
{
    public function __construct()
    {
        $this->db = new DB;
        $this->locationsTbl = 'tbl_locations';
        $this->packageTbl = 'tbl_package';
        $this->visaTbl = 'tbl_visa';
        $this->countriesTbl = 'tbl_countries';
        $this->hotelTbl = 'tbl_hotel';
        $this->heilightTbl = 'tbl_heilight';
        $this->facilitiesTbl = 'tbl_facilities';
        $this->blogTbl = 'tbl_blog';
        
    }
    public function get_locations(){
        $builder = DB::table($this->locationsTbl.' AS l') ;
        $builder->select('l.*');
        // $builder->select('c.*',DB::raw('p.page_name'));
        // $builder->leftJoin($this->pageTbl.' AS p','c.page','=','p.id');
        $builder->where('l.status', 'Y');
        $builder->orderBy('l.id','DESC');
        $value = $builder->get();
        return $value;
    }
    public function get_count_package_by_location($destId){
        $builder = DB::table($this->packageTbl) ;
        $builder->where('destination', $destId);
        $builder->where('status', 'Y');
        $value = $builder->count();
        return $value;
    }
    public function get_packages(){
        $builder = DB::table($this->packageTbl) ;
        $builder->select('*');
        // $builder->select('c.*',DB::raw('p.page_name'));
        // $builder->leftJoin($this->pageTbl.' AS p','c.page','=','p.id');
        $builder->where('status', 'Y');
        $builder->where('is_front', 'Y');
        $builder->where(function (Builder $query) {
            $query->where('is_featured', 'Y')
                ->orWhere('is_popular', 'Y');
        });
        $builder->orderBy('p_id','DESC');
        $value = $builder->get();
        return $value;
    }
    public function get_packages_by_destination_and_destination_type($type=null, $location_url=null){
        $builder = DB::table($this->packageTbl.' AS p') ;
        $builder->select('p.*');
        // $builder->select('c.*',DB::raw('p.page_name'));
        $builder->leftJoin($this->locationsTbl.' AS l','p.destination','=','l.id');
        $builder->where('p.status', 'Y');
        if($type != null){
            if($type == 'd'){
                $builder->where('l.type', 'Domestic');
            }else{
                $builder->where('l.type', 'International');
            }
        }
        if($location_url != null){
            $builder->where('l.url', $location_url);
        }
        
        $builder->orderBy('p.p_id','DESC');
        $value = $builder->get();
        return $value;
    }
    public function get_all_visa(){
        $builder = DB::table($this->visaTbl.' AS v') ;
        // $builder->select('v.*');
        $builder->select('v.*',DB::raw('c.countries_name'));
        $builder->leftJoin($this->countriesTbl.' AS c','v.country','=','c.countries_id');
        $builder->where('v.status', 'Y');
        $builder->orderBy('v.id','DESC');
        $value = $builder->get();
        return $value;
    }
    public function get_recent_two_blog(){
        $builder = DB::table($this->blogTbl) ;
        $builder->select('*');
        $builder->where('blog_status', 'Y');
        $builder->orderBy('post_date','DESC');
        $builder->limit(2);
        $value = $builder->get();
        return $value;
    }
    public function get_hotel($url=null){
        $builder = DB::table($this->hotelTbl) ;
        // $builder->select('v.*');
        $builder->select('*');
        if($url != null){
            $builder->where('url', $url);
        }
        $builder->where('status', 'Y');
        $builder->orderBy('h_id','DESC');
        if($url != null)
            $value = $builder->first();
        else
            $value = $builder->get();
        return $value;
    }
    public function get_highlights($ids){
        $builder = DB::table($this->heilightTbl) ;
        // $builder->select('v.*');
        $builder->select('*');
        $builder->where('status', 'Y');
        foreach(json_decode($ids) as $k=>$id){
            if($k<1)
                $builder->where('id', $id);
            else
                $builder->orWhere('id', $id);
        }
        $builder->orderBy('id','DESC');
        $value = $builder->get();
        return $value;
    }
    public function get_facilities($ids){
        $builder = DB::table($this->facilitiesTbl) ;
        // $builder->select('v.*');
        $builder->select('*');
        $builder->where('status', 'Y');
        foreach(json_decode($ids) as $k=>$id){
            if($k<1)
                $builder->where('id', $id);
            else
                $builder->orWhere('id', $id);
        }
        $builder->orderBy('id','DESC');
        $value = $builder->get();
        return $value;
    }
    
    /*public function getAllRecord($table, $whereArr=null, $orderBy=null){
        $builder = DB::table($table);
        if($whereArr != null){
            $builder->where($whereArr);
        }
        if($orderBy != null){
            $builder->orderBy($orderBy[0],$orderBy[1]);
        }
        $result = $builder->get();
        return $result;
    }
    public function updateRecord($table, $data, $whereArr){
        $result = DB::table($table)
            ->where($whereArr)
            ->update($data);
        return $result;
    }
    public function insertRecord($table, $data){
        $builder = DB::table($table);
        $builder->insertOrIgnore($data);
        return DB::getPdo()->lastInsertId();
    }
    public function getOneRecord($table, $whereArr = null){
        $builder = DB::table($table);
        $builder->where($whereArr);
        $result = $builder->first();
        return $result;
    }
    /************************************************************************** */
   /* public function hybrid($type, $table, $data=null, $where=null, $order=null){
        $result = null;
        $builder = DB::table($table);
        if($where != null){
            $builder->where($where);
        }
        if($order != null){
            $builder->orderBy($order[0],$order[1]);
        }
        if($type == 'C'){
            $builder->insertOrIgnore($data);
            $result = DB::getPdo()->lastInsertId();
        }elseif($type == 'R1'){
            $result = $builder->first();
        }elseif($type == 'RA'){
            $result = $builder->get();
        }elseif($type == 'U'){
            $result = $builder->update($data);
        }elseif($type == 'D'){
            $result = $builder->delete();
        }
        return $result;
    }
    /**************************settings********************** */
    /*public function get_setting(){
        $builder = DB::table($this->settingTbl);
        $builder->where('id',1);
        $result = $builder->first();
        return $result;
    }
    public function update_setting($data=''){
        $builder = DB::table($this->settingTbl);
        $builder->where('id',1);
        $result = $builder->update($data);
        return $result;
    }*/
}