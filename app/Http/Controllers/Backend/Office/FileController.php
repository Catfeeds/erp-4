<?php namespace App\Http\Controllers\Backend\Office;

use Session;
use Redirect;
use Storage;
use App\Models\Logistics\Product;
use App\Models\Office\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreFileRequest;

class FileController extends Controller {

    public function index()
    {   $dirPath = 'test';
Storage::deleteDirectory($dirPath);
$directories = Storage::directories('test');
dd($directories);
        return view('backend.office.file.index');

    }

    public function create()
    {
        return view('backend.office.file.create')->withProducts(Product::all());
    }

    public function store(StoreFileRequest $request){
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile('file')){
            exit('上传文件为空！');
        } 
        $file = $request->file('file');
        //判断文件上传过程中是否出错
        if(!$file->isValid()){
            exit('文件上传出错！');
        }
        $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
        $savePath = 'test/'.$newFileName;
        $bytes = Storage::put(
            $savePath,
            file_get_contents($file->getRealPath()));
        if(!Storage::exists($savePath)){
            exit('保存文件失败！');
        }
        header("Content-Type: ".Storage::mimeType($savePath));
        echo Storage::get($savePath);
    }

    public function show($id)
    {
        return view('backend.office.document.show')
            ->withFile(File::find($id));
    }

    public function edit($id)
    {
        return view('backend.office.document.edit')
            ->withFile(File::find($id));
    }

    public function update(StoreDocumentRequest $request,$id)
    {
        $project = $request->all();
            if ($request->hasFile('file'))
            { 
                $file            = $request->file('file');     
                $destinationPath = 'uploads/file';
                $extension       = $file->getClientOriginalExtension();
                $filename        = $file->getClientOriginalName();
                $upload_success  = $file->move($destinationPath,md5($filename).'.'.$extension);

                if ($upload_success)
                {
                    $file       = new File();
                    $file->url  = '/'.$destinationPath.'/'.md5($filename).'.'.$extension;
                    if ($file->save())
                    {
                        $request->file = $filename;
                    }
                }
                else
                {
                    return Redirect::back()->withErrors('上传文件失败！');
                }

            }      
        $project['url'] = $request->file;
        $file = File::find($id);
        if ($file->update($project)) {
            return Redirect::to('admin/office/documents')
                ->withFlashSuccess('文档更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return Redirect::to('admin/office/documents')
            ->withFlashSuccess('文档删除成功！');
    }
}
