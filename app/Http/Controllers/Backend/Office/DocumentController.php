<?php namespace App\Http\Controllers\Backend\Office;

use Session;
use Redirect;
use App\Models\Logistics\Product;
use App\Models\Office\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreDocumentRequest;

class DocumentController extends Controller {

    public function index()
    {
        return view('backend.office.document.index')
            ->withDocuments(Document::with('belongsToProduct')->paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        return view('backend.office.document.create')->withProducts(Product::all());
    }

    public function store(StoreDocumentRequest $request)
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
                    $file       = new Document();
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
        if (Document::create($project)) {
            return Redirect::to('admin/luster/documents')
                ->withFlashSuccess('文档创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.office.document.show')
            ->withDocument(Document::find($id));
    }

    public function edit($id)
    {
        return view('backend.office.document.edit')
            ->withDocument(Document::find($id));
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
                    $file       = new Document();
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
        $document = Document::find($id);
        if ($document->update($project)) {
            return Redirect::to('admin/office/documents')
                ->withFlashSuccess('文档更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $document = Contact::find($id);
        $document->delete();
        return Redirect::to('admin/office/documents')
            ->withFlashSuccess('文档删除成功！');
    }
}
