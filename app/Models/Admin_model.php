<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Admin_model extends Model
{
    public function __construct()
    {
        $this->db = new DB;
        $this->cmsTbl = 'tbl_cms';
        $this->pageTbl = 'tbl_page';
        $this->bannerTbl = 'tbl_banner';
        // $this->roleprivilegeTbl = 'tbl_role_privilege';

    }
    public function get_cms_list(){
        $builder = DB::table($this->cmsTbl.' AS c') ;
        // $builder->select('c.*',DB::raw('p.page_name'));
        $builder->select('c.*');
        // $builder->leftJoin($this->pageTbl.' AS p','c.page','=','p.id');
        $builder->orderBy('c.id','DESC');
        $value = $builder->get();
        return $value;
    }
    public function get_banner_list(){
        $builder = DB::table($this->bannerTbl.' AS b') ;
        $builder->select('b.*',DB::raw('p.page_name'));
        $builder->leftJoin($this->pageTbl.' AS p','b.page','=','p.id');
        // $builder->where('c.id', $id);
        $builder->orderBy('b.id','DESC');
        $value = $builder->get();
        return $value;
    }
    /*public function isvalidate($email){
        $value = $this->db::table($this->adminTbl)
        ->where('email', $email)
        //->orderBy('id','asc')
        ->first();
        return $value;

    }
    public function getAllRecord($table, $whereArr=null, $orderBy=null){
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