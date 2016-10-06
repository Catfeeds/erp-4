<?php namespace App\Http\Controllers\Backend\Logistics;

use Redirect,Image;
use App\Models\Office\File;
use App\Models\Client\Client;
use App\Models\Office\Picture;
use App\Models\Logistics\Product;
use App\Models\System\Option;
use App\Models\Logistics\Storehouse;
use App\Models\System\SystemOption;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreProductRequest;

class ProductController extends Controller {

    public function index()
    {   
        $all = Product::with('hasOnePicture')->orderBy('order')->get();
        $materials = Product::Material()->get();
        $parts = Product::part()->get();
        $subassemblys = Product::subassembly()->get();
        $products = Product::product()->get();
        return view('backend.logistics.product.index',compact('all','materials','parts','subassemblys','products'));
    }

    public function create()
    {
        $types = Option::productType()->get();
        $units = Option::unit()->get();
        $supplys = Client::supplier()->get();
        $storehouses = Storehouse::all();
        return view('backend.logistics.product.create', compact('storehouses','types','supplys','units'));
    }

    public function store(StoreProductRequest $request)
    { 
        $project = $request->all();
            if ($request->hasFile('image_id'))
            { 
                $file            = $request->file('image_id');     
                $destinationPath = 'uploads/product/image';
                $extension       = $file->getClientOriginalExtension();
                $filename        = head(explode('.',$file->getClientOriginalName()));
                $newfilename     = md5($filename).'.'.$extension;
                $upload_success  = $file->move($destinationPath,$newfilename);
                $imagepath       = $destinationPath.'/'.$newfilename;

                if ($upload_success)
                {
                    $bigpath        = $destinationPath.'/big/'.$newfilename;
                    $logopath       = $destinationPath.'/logo/'.$newfilename;
                    $thumbnailpath  = $destinationPath.'/small/'.$newfilename;
                    $big            = Image::make($imagepath)->resize(800, 700)->save($bigpath);
                    $logo           = Image::make($imagepath)->resize(80, 70)->save($logopath);
                    $thumbnail      = Image::make($imagepath)->resize(24, 21)->save($thumbnailpath);

                    $image          = new Picture();
                    $image->name    = $filename;
                    $image->small   = '/'.$thumbnailpath;
                    $image->logo    = '/'.$logopath;
                    $image->big     = '/'.$bigpath;
                    $image->source  = '/'.$imagepath;

                        // dd($image->id);
                    if ($image->save())
                    {
                        $project['image_id'] = Picture::max('id');
                    }
                }
                else
                {
                    return Redirect::back()->withErrors('上传图片失败！');
                }

            }      
        $project['order'] = 9999;
        
        if (Product::create($project)) {
            return Redirect::to('admin/logistics/products')
                ->withFlashSuccess('部品创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.logistics.product.show')
            ->withProduct(Product::find($id));
    }

    public function edit($id)
    {
        $units = Option::unit()->get();
        $types = Option::productType()->get();
        $supplys = Client::supplier()->get();
        $storehouses = Storehouse::all();
        $product = Product::find($id);
        return view('backend.logistics.product.edit',compact('storehouses','types','supplys','product','units'));
    }

    public function update(StoreProductRequest $request,$id)
    {
        // dd($request->all());
        $product = Product::find($id);
        $content = $request->all();
          if ($product->update($content)) {
            return Redirect::to('admin/logistics/products')
                ->withFlashSuccess('部品更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return Redirect::to('admin/logistics/products')
            ->withFlashSuccess('部品删除成功！');
    }

}
