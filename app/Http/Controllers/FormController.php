<?php

namespace App\Http\Controllers;

use App\Models\global_model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use RealRashid\SweetAlert\Facades\Alert;

use DB;
use Alert;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;

class FormController extends Controller
{
    public function __construct(){
        $this->link_path = 'https://dataupload.arline.tech/';
        $this->path = '../file_upload/'; //PROD
        // $this->path = 'file_upload/'; //LOCAL
    }

    public function index(){
        $dataUser = DB::select('SELECT * FROM master_user');
        $dataProduct = DB::select('SELECT * FROM product');
        $dataClient = DB::select('SELECT * FROM client');
        $dataGallery = DB::select('SELECT * FROM gallery');
        return view('master_layout.dashboard', compact('dataUser', 'dataProduct', 'dataClient', 'dataGallery'));
    }

    public function slider(){
        $dataSlider = global_model::getDataSlider();
        return view('form.slider', compact('dataSlider'));
    }

    public function saveInputDataSlider(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        // $file = $request->file('file');
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('slider');
        }else{
            $params = [
                'filename' => $filenameImage,
                'images' => $filename,
                'path' => $this->link_path . 'slider/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1'
            ];
            $path = $this->path;
            $insertData = global_model::insDataSlider($params);
            $file->move($path . 'slider/', $filename);
            
            Alert::success('Congrats', 'Data berhasil ditambahkan!');
            return redirect()->route('slider');
        }
    }

    public function saveDataClient(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;

        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('client');
        }else{
            $params = [
                'filename' => $filenameImage,
                'images' => $filename,
                'path' => $this->link_path . 'client/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1'
            ];
            $path = $this->path;
            $insertData = global_model::insDataClient($params);
            $file->move($path . 'client/', $filename);
            
            Alert::success('Congrats', 'Data berhasil ditambahkan!');
            return redirect()->route('client');
        }
    }

    public function About(){
        $dataAbout = global_model::getDataAbout();
        return view('form.about', compact('dataAbout'));
    }

    public function getDataEdit($idData){
        $query = DB::select('SELECT * FROM banner WHERE 1=1 AND id = :id', ['id' => $idData]);
        return $query;
    }

    public function getDataEditClient($idData){
        $query = DB::select('SELECT * FROM client WHERE 1=1 AND id = :id', ['id' => $idData]);
        return $query;
    }

    public function getDataAboutEdit($idData){
        $query = DB::select('SELECT * FROM about WHERE 1=1 AND content_code = :id', ['id' => $idData]);
        return $query;
    }

    public function UpdateDataAbout(Request $request){
        $id_data = $request->idData;
        $content = $request->dataContent;
        
        $params = [
            'create_by' => Auth::user()->role,
            'create_date' => date('Y-m-d'),
            'update_by' => Auth::user()->role,
            'update_date' => date('Y-m-d'),
            'description' => $content,
            'content_code' => $id_data
        ];

        $insUpdateData = global_model::updateDataAbout($params);

        if ($insUpdateData > 0) {
            return redirect()->route('about');
        }
    }

    public function UpdateDataSlider(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('slider');
        }else{
            $params = [
                'filename' => $filenameImage,
                'images' => $filename,
                'path' => $this->link_path . 'slider/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1',
                'id' => $request->id
            ];
            $path = $this->path;
            $insUpdateData = global_model::updateDataSlider($params);
            $file->move($path . 'slider/', $filename);

            if ($insUpdateData > 0) {
                Alert::success('Congrats', 'Data berhasil diubah!');
                return redirect()->route('slider');
            }
        }
    }

    public function UpdateDataClient(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('client');
        }else{
            $params = [
                'filename' => $filenameImage,
                'images' => $filename,
                'path' => $this->link_path . 'client/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1',
                'id' => $request->id
            ];
            $path = $this->path;
            $insUpdateData = global_model::updateDataClient($params);
            $file->move($path . 'client/', $filename);

            if ($insUpdateData > 0) {
                Alert::success('Congrats', 'Data berhasil diubah!');
                return redirect()->route('client');
            }
        }
    }

    // Gallery
    public function gallery(){
        $dataGallery = global_model::getDataGallery();
        return view('form.gallery', compact('dataGallery'));
    }

    public function saveInputDataGallery(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;

        $CategoryProject = str_replace(' ', '', $request->category_project);
        $LowerCategoryProject = strtolower($CategoryProject);
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('gallery');
        }else{
            $params = [
                'filename' => $filenameImage,
                'category_project' => $LowerCategoryProject,
                'images' => $filename,
                'path' => $this->link_path . 'gallery/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1'
            ];
            $path = $this->path;
            $insertData = global_model::insDataGallery($params);
            $file->move($path . 'gallery/', $filename);
            
            Alert::success('Congrats', 'Data berhasil ditambahkan!');
            return redirect()->route('gallery');
        }
    }

    public function updateDataGallery(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('gallery');
        }else{
            $params = [
                'filename' => $filenameImage,
                'category_project' => $request->category_project,
                'images' => $filename,
                'path' => $this->link_path . 'gallery/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1',
                'id' => $request->id
            ];
            $path = $this->path;
            $insUpdateData = global_model::updateDataGallery($params);
            $file->move($path . 'gallery/', $filename);

            if ($insUpdateData > 0) {
                Alert::success('Congrats', 'Data berhasil diubah!');
                return redirect()->route('gallery');
            }
        }
    }

    public function getDataEditGallery($idData){
        $query = DB::select('SELECT * FROM gallery WHERE 1=1 AND id = :id', ['id' => $idData]);
        return $query;
    }
    // End Gallery

    // Our Team
    public function ourteam(){
        $dataOurTeam = global_model::getDataOurTeam();
        return view('form.team', compact('dataOurTeam'));
    }

    public function saveInputDataTeam(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('our-team');
        }else{
            $params = [
                'filename' => $filenameImage,
                'jabatan' => $request->position,
                'images' => $filename,
                'path' => $this->link_path . 'team/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1'
            ];
            $path = $this->path;
            $insertData = global_model::insDataTeam($params);
            $file->move($path . 'team/', $filename);
            
            Alert::success('Congrats', 'Data berhasil ditambahkan!');
            return redirect()->route('our-team');
        }
    }

    public function updateDataOurTeam(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('our-team');
        }else{
            $params = [
                'filename' => $filenameImage,
                'images' => $filename,
                'path' => $this->link_path . 'team/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1',
                'id' => $request->id
            ];
            $path = $this->path;
            $insUpdateData = global_model::updateDataTeam($params);
            $file->move($path . 'team/', $filename);

            if ($insUpdateData > 0) {
                Alert::success('Congrats', 'Data berhasil diubah!');
                return redirect()->route('our-team');
            }
        }
    }

    public function getDataEditOurTeam($idData){
        $query = DB::select('SELECT * FROM our_team WHERE 1=1 AND id = :id', ['id' => $idData]);
        return $query;
    }
    // End Our Team

    public function category(){
        $dataCategory = global_model::getDataCategory();
        return view('form.category', compact('dataCategory'));
    }

    public function saveDataCategory(Request $request){
        $nama_kategori  = $request->nama_kategori;
        $publish_date   = $request->publish_date;

        $params = [
            'name_category' => $nama_kategori,
            'create_by' => Auth::user()->role,
            'create_date' => date('Y-m-d'),
            'update_by' => Auth::user()->role,
            'update_date' => date('Y-m-d'),
            'publish_date' => $publish_date,
            'is_active' => '1'
        ];
        $insertData = global_model::insDataCategory($params);
        
        Alert::success('Congrats', 'You\'ve Successfully Registered');
        return redirect()->route('category');
    }

    public function updateDataCategory(Request $request){
        $id_data = $request->id;
        $content = $request->nama_kategori;
        $publishDate = $request->publish_date;
        
        $params = [
            'nama_kategori' => $content,
            'create_by' => Auth::user()->role,
            'create_date' => date('Y-m-d'),
            'update_by' => Auth::user()->role,
            'update_date' => date('Y-m-d'),
            'publish_date' => $publishDate,
            'is_active' => '1',
            'id' => $id_data
        ];

        $insUpdateData = global_model::updateDataCategory($params);

        if ($insUpdateData > 0) {
            return redirect()->route('category');
        }
    }

    public function getDataEditCategory($idData){
        $query = DB::select('SELECT * FROM category WHERE 1=1 AND id = :id', ['id' => $idData]);
        return $query;
    }

    public function product(){
        $dataProduct = global_model::getDataProduct();
        $getDataCategory = global_model::getDataCategory();
        return view('form.product', compact('dataProduct', 'getDataCategory'));
    }

    public function saveDataProduct(Request $request){
        $product_cat    = $request->category_product;
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $description    = $request->description;

        $getDataCategoryName = DB::select('SELECT * FROM category WHERE 1=1 AND id = :id', ['id' => $product_cat]);

        $productCategory = $getDataCategoryName[0]->name_category;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('product');
        }else{
            $params = [
                'code_category' => $product_cat,
                'category_product' => $productCategory,
                'images' => $filename,
                'filename' => $filenameImage,
                'path' => $this->link_path . 'product/',
                'description' => $description,
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1'
            ];
            $path = $this->path;
            $insertData = global_model::insDataProduct($params);
            $file->move($path . 'product/', $filename);
            
            Alert::success('Congrats', 'Data berhasil ditambahkan!');
            return redirect()->route('product');
        }
    }

    public function getDataEditProduct($idData){
        $query = DB::select('SELECT * FROM product WHERE 1=1 AND id = :id', ['id' => $idData]);
        return $query;
    }

    public function UpdateDataProduct(Request $request){
        $product_cat    = $request->categoryEDIT == '' ? $request->categoryORIcode : $request->categoryEDIT;
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $description    = $request->description;

        $getDataCategoryName = DB::select('SELECT * FROM category WHERE 1=1 AND id = :id', ['id' => $product_cat]);

        $productCategory = $getDataCategoryName[0]->name_category;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('product');
        }else{
            $params = [
                'code_category' => $product_cat,
                'category_product' => $productCategory,
                'images' => $filename,
                'filename' => $filenameImage,
                'path' => $this->link_path . 'product/',
                'description' => $description,
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1',
                'id' => $request->idData
            ];

            $path = $this->path;
            $insertData = global_model::insDataProductEdit($params);
            $file->move($path . 'product/', $filename);
            
            Alert::success('Congrats', 'Data berhasil diubah!');
            return redirect()->route('product');
        }
    }

    // Contact
    public function Contact(){
        $dataContact = global_model::getDataContact();
        return view('form.contact', compact('dataContact'));
    }

    public function getDataEditContact($idData){
        $query = DB::select('SELECT * FROM contact WHERE 1=1 AND content_code = :id', ['id' => $idData]);
        return $query;
    }

    public function updateDataContact(Request $request){
        $id_data = $request->idData;
        $content = $request->dataContent;
        
        $params = [
            'create_by' => Auth::user()->role,
            'create_date' => date('Y-m-d'),
            'update_by' => Auth::user()->role,
            'update_date' => date('Y-m-d'),
            'description' => $content,
            'content_code' => $id_data
        ];

        $insUpdateData = global_model::updateDataContact($params);

        if ($insUpdateData > 0) {
            return redirect()->route('contact');
        }
    }
    // End Contact

    // Client
    public function client(){
        $dataClient = global_model::getDataClient();
        return view('form.client', compact('dataClient'));
    }

    public function saveInputDataCient(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('client');
        }else{
            $params = [
                'filename' => $filenameImage,
                'images' => $filename,
                'path' => $this->link_path . 'client/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1'
            ];
            $path = $this->path;
            $insertData = global_model::insDataCient($params);
            $file->move($path . 'client/', $filename);
            
            Alert::success('Congrats', 'Data berhasil ditambahkan!');
            return redirect()->route('client');
        }
    }

    public function UpdateDataCient(Request $request){
        $filenameImage  = $request->filenameImage;
        $file           = $request->filename;
        $ori_filename   = $file->getClientOriginalName();
        $filename       = date('YmdHi').$file->getClientOriginalName();
        $publish_date   = $request->publish_date;
        $sizeFile = $file->getSize();
        
        if ($sizeFile > 512000) {
            Alert::warning('Error', 'File yang ada upload melebihi 500kb!');
            return redirect()->route('slider');
        }else{
            $params = [
                'filename' => $filenameImage,
                'images' => $filename,
                'path' => $this->link_path . 'slider/',
                'create_by' => Auth::user()->role,
                'create_date' => date('Y-m-d'),
                'update_by' => Auth::user()->role,
                'update_date' => date('Y-m-d'),
                'publish_date' => $publish_date,
                'is_active' => '1',
                'id' => $request->id
            ];
            $path = $this->path;
            $insUpdateData = global_model::updateDataCient($params);
            $file->move($path . 'slider/', $filename);

            if ($insUpdateData > 0) {
                Alert::success('Congrats', 'Data berhasil diubah!');
                return redirect()->route('slider');
            }
        }
    }
    // End Client

    public function deleteDataSlider($idData){
        $id = decrypt($idData);
        $query = DB::select('DELETE FROM banner WHERE 1=1 AND id = :idData', ['idData' => $id]);
        return redirect()->route('slider');
    }

    public function deleteDataGallery($idData){
        $id = decrypt($idData);
        $query = DB::select('DELETE FROM gallery WHERE 1=1 AND id = :idData', ['idData' => $id]);
        return redirect()->route('gallery');
    }

    public function deleteDataTeam($idData){
        $id = decrypt($idData);
        $query = DB::select('DELETE FROM our_team WHERE 1=1 AND id = :idData', ['idData' => $id]);
        return redirect()->route('our-team');
    }

    public function deleteDataCategory($idData){
        $id = decrypt($idData);
        $query = DB::select('DELETE FROM category WHERE 1=1 AND id = :idData', ['idData' => $id]);
        return redirect()->route('category');
    }

    public function deleteDataProduct($idData){
        $id = decrypt($idData);
        $query = DB::select('DELETE FROM product WHERE 1=1 AND id = :idData', ['idData' => $id]);
        return redirect()->route('product');
    }

    public function deleteDataClient($idData){
        $id = decrypt($idData);
        $query = DB::select('DELETE FROM client WHERE 1=1 AND id = :idData', ['idData' => $id]);
        return redirect()->route('client');
    }

    public function userManagement(){
        $dataUser = DB::select('SELECT * FROM master_user WHERE 1=1 AND role = "admin" AND id = "2" ');
        return view('user_management', compact('dataUser'));
    }

    public function updateDataUser(Request $request){
        $data_username = $request->username;
        $data_role = $request->role;
        $data_password_ori = $request->password;
        $crypt_pass = bcrypt($data_password_ori);
        $data_mail = $request->email;

        $params = [
            'role' => $data_role,
            'username' => $data_username,
            'password' => $crypt_pass,
            'ori_password' => $data_password_ori,
            'email' => $data_mail,
            'remember_token' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'id' => 2
        ];

        $UpDataUser = global_model::updateDataUser($params);
        
        if ($UpDataUser > 0) {
            return redirect()->route('user.management');
        }
    }

    public function updateDataSEO(Request $request){
        $params = [
            'description' => $request->desc_seo,
            'create_by' => Auth::user()->role,
            'create_date' => date('Y-m-d'),
            'update_by' => Auth::user()->role,
            'update_date' => date('Y-m-d'),
            'idData' => 1
        ];

        $UpDataSEO = global_model::updateDataSEO($params);
        if ($UpDataSEO > 0) {
            return redirect()->route('DataSEO');
        }
    }

    public function DataSEO(){
        $dataSEO = DB::select('SELECT * FROM SEO WHERE 1=1 AND id = "1" ');
        return view('form.SEO', compact('dataSEO'));
    }
}