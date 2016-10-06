<?php namespace App\Http\Controllers\Backend\Office;

use Session;
use Redirect;
use App\Models\Office\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\Luster\StoreScheduleRequest;

class ScheduleController extends Controller {

    public function index()
    {
        $dataSource = Schedule::where('user_id',Auth::id())->get();
        $dataSource->map(function ($item, $key){
            $item->start = date("m/d/Y", $item->start);
            $item->end = date("m/d/Y",$item->end);
        });
        // dd($dataSource);
        return view('backend.office.schedule.index',compact('dataSource'));
    }

    public function store(StoreScheduleRequest $request) 
    {
        $id = $request->input('event-index');
        if ($id) {
            $schedule = Schedule::find($id);
            $schedule->title = $request->input('event-name');
            $schedule->location = $request->input('event-location');
            $schedule->remark = $request->input('remark');
            $schedule->start = strtotime($request->input('event-start-date'));
            $schedule->end = strtotime($request->input('event-end-date'));
            if ($schedule->update()) {
                return Redirect::to('admin/office/schedules')
                    ->withFlashSuccess('更新成功！');
            } else {
                return Redirect::back()->withInput()->withErrors('保存失败！');
            }
        }else{
            $schedule = new Schedule;
            $schedule->title = $request->input('event-name');
            $schedule->user_id = Auth::id();
            $schedule->location = $request->input('event-location');
            $schedule->remark = $request->input('remark');
            $schedule->start = strtotime($request->input('event-start-date'));
            $schedule->end = strtotime($request->input('event-end-date'));
            if ($schedule->save()) {
                return Redirect::to('admin/office/schedules')
                    ->withFlashSuccess('新建成功！');
            } else {
                return Redirect::back()->withInput()->withErrors('保存失败！');
            }

        }
    }
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return Redirect::to('admin/office/schedules')   
            ->withFlashSuccess('删除成功！');
    }
}
