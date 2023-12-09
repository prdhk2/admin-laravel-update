<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class global_model extends Model
{
    public static function insDataSlider($params){
        $query = DB::select('INSERT INTO banner (images, filename, path, create_by, create_date, update_by, update_date, publish_date, is_active) values (?, ?, ?, ?, ?, ?, ?, ?, ?) ',
            [
                $params['images'],
                $params['filename'],
                $params['path'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active']
            ]
        );
        return $query;
    }

    public static function insDataClient($params){
        $query = DB::select('INSERT INTO client (images, filename, path, create_by, create_date, update_by, update_date, publish_date, is_active) values (?, ?, ?, ?, ?, ?, ?, ?, ?) ',
            [
                $params['images'],
                $params['filename'],
                $params['path'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active']
            ]
        );
        return $query;
    }

    public static function getDataSlider(){
        $query = DB::select('SELECT * FROM banner WHERE 1=1 AND is_active = "1"');
        return $query;
    }

    public static function getDataClient(){
        $query = DB::select('SELECT * FROM client WHERE 1=1 AND is_active = "1"');
        return $query;
    }

    public static function getDataAbout(){
        $query = DB::select('SELECT * FROM about');
        return $query;
    }

    public static function updateDataSlider($params){
        $query = DB::select('UPDATE banner SET images = ?, filename = ?, path = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ?, publish_date = ?, is_active = ? WHERE id = ?',
            [
                $params['images'],
                $params['filename'],
                $params['path'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active'],
                $params['id']
            ]
        );
        return $query;
    }

    public static function updateDataClient($params){
        $query = DB::select('UPDATE client SET images = ?, filename = ?, path = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ?, publish_date = ?, is_active = ? WHERE id = ?',
            [
                $params['images'],
                $params['filename'],
                $params['path'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active'],
                $params['id']
            ]
        );
        return $query;
    }

    // Gallery
    public static function insDataGallery($params){
        $query = DB::select('INSERT INTO gallery (images, category_project, filename, path, create_by, create_date, update_by, update_date, publish_date, is_active) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ',
            [
                $params['images'],
                $params['category_project'],
                $params['filename'],
                $params['path'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active']
            ]
        );
        return $query;
    }

    public static function getDataGallery(){
        $query = DB::select('SELECT * FROM gallery WHERE 1=1 AND is_active = "1"');
        return $query;
    }

    public static function updateDataGallery($params){
        $query = DB::select('UPDATE gallery SET images = ?, category_project = ?, filename = ?, path = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ?, publish_date = ?, is_active = ? WHERE id = ?',
            [
                $params['images'],
                $params['category_project'],
                $params['filename'],
                $params['path'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active'],
                $params['id']
            ]
        );
        return $query;
    }
    // End Gallery

    // Team
    public static function getDataOurTeam(){
        $query = DB::select('SELECT * FROM our_team WHERE 1=1 AND is_active = "1"');
        return $query;
    }

    public static function insDataTeam($params){
        $query = DB::select('INSERT INTO our_team (images, filename, jabatan, path, create_by, create_date, update_by, update_date, publish_date, is_active) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ',
            [
                $params['images'],
                $params['filename'],
                $params['jabatan'],
                $params['path'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active']
            ]
        );
        return $query;
    }

    public static function updateDataTeam($params){
        $query = DB::select('UPDATE our_team SET images = ?, filename = ?, path = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ?, publish_date = ?, is_active = ? WHERE id = ?',
            [
                $params['images'],
                $params['filename'],
                $params['path'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active'],
                $params['id']
            ]
        );
        return $query;
    }
    // End Team

    public static function getDataCategory(){
        $query = DB::select('SELECT * FROM category WHERE 1=1 AND is_active = "1"');
        return $query;
    }

    public static function insDataCategory($params){
        $query = DB::select('INSERT INTO category (name_category, create_by, create_date, update_by, update_date, publish_date, is_active) values (?, ?, ?, ?, ?, ?, ?) ',
            [
                $params['name_category'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active']
            ]
        );
        return $query;
    }

    public static function updateDataCategory($params){
        $query = DB::select('UPDATE category SET name_category = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ?, publish_date = ?, is_active = ? WHERE id = ?',
            [
                $params['nama_kategori'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active'],
                $params['id']
            ]
        );
        return $query;
    }

    public static function getDataProduct(){
        $query = DB::select('SELECT * FROM product WHERE 1=1 AND is_active = "1"');
        return $query;
    }

    public static function insDataProduct($params){
        $query = DB::select('INSERT INTO product (code_category, category_product, images, filename, path, description, create_by, create_date, update_by, update_date, publish_date, is_active) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ',
            [
                $params['code_category'],
                $params['category_product'],
                $params['images'],
                $params['filename'],
                $params['path'],
                $params['description'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active']
            ]
        );
        return $query;
    }

    public static function insDataProductEdit($params){
        $query = DB::select('UPDATE product SET code_category = ?, category_product = ?, images = ?, filename = ?, path = ?, description = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ?, publish_date = ?, is_active = ? WHERE id = ?',
            [
                $params['code_category'],
                $params['category_product'],
                $params['images'],
                $params['filename'],
                $params['path'],
                $params['description'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['publish_date'],
                $params['is_active'],
                $params['id']
            ]
        );
        return $query;
    }

    public static function getDataContact(){
        $query = DB::select('SELECT * FROM contact');
        return $query;
    }

    public static function updateDataContact($params){
        $query = DB::select('UPDATE contact SET description = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ? WHERE id = ?', 
            [
                $params['description'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['content_code']
            ]
        );
        return $query;
    }

    public static function updateDataAbout($params){
        $query = DB::select('UPDATE about SET description = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ? WHERE id = ?', 
            [
                $params['description'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['content_code']
            ]
        );
        return $query;
    }

    public static function updateDataUser($params){
        $query = DB::select('UPDATE master_user SET role = ?, username = ?, password = ?, ori_password = ?, email = ?, remember_token = ?, created_at = ?, updated_at = ? WHERE id = ?', 
            [
                $params['role'],
                $params['username'],
                $params['password'],
                $params['ori_password'],
                $params['email'],
                $params['remember_token'],
                $params['created_at'],
                $params['updated_at'],
                $params['id']
            ]
        );
        return $query;
    }

    public static function updateDataSEO($params){
        $query = DB::select('UPDATE SEO SET description = ?, create_by = ?, create_date = ?, update_by = ?, update_date = ? WHERE id = ?', 
            [
                $params['description'],
                $params['create_by'],
                $params['create_date'],
                $params['update_by'],
                $params['update_date'],
                $params['idData']
            ]
        );
        return $query;
    }

}
