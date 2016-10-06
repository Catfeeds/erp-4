<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Carbon\Carbon;
use App\Http\Requests;
use App\Models\Logistics\Product;
use App\Models\Access\User\User;
use App\Models\Logistics\Check;
use App\Models\Logistics\StockChange;
use App\Models\Logistics\Application;
use App\Models\Logistics\ApplicationDetail;
use App\Models\Logistics\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

 class BaseController extends Controller {

    public function makeEntryNumber($number =''){
        $prefix = 'CGRK';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $itemNumber = $number;
            $itemDate = $date;
        }else{
            $max = StockChange::where('type','采购入库')->max('id'); 
            // dd($max);
            if (!empty($max)) {
                $itemNumber = StockChange::find($max)->number;
                $year = StockChange::find($max)->created_at->format('Y');
                $week = StockChange::find($max)->created_at->format('W')+1;
                $itemDate = (int)$year.$week;
            }
        }
        if (!empty($itemNumber)) {
            $number = str_pad(((int)substr($itemNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$itemDate) {
                $number = '001';
            }elseif($date<$itemDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $itemNumber = $prefix.$date.$number;
        }else{
            $itemNumber = $prefix.$date.'001';
        }
        // dd($itemNumber);
        return $itemNumber;
    }

    public function makeCheckNumber($number =''){
        $prefix = 'JCJL';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $itemNumber = $number;
            $itemDate = $date;
        }else{
            $max = Check::max('id'); 
            if (!empty($max)) {
                $itemNumber = Check::find($max)->number;
                $year = Check::find($max)->created_at->format('Y');
                $week = Check::find($max)->created_at->format('W')+1;
                $itemDate = (int)$year.$week;
            }
        }
        if (!empty($itemNumber)) {
            $number = str_pad(((int)substr($itemNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$itemDate) {
                $number = '001';
            }elseif($date<$itemDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $itemNumber = $prefix.$date.$number;
        }else{
            $itemNumber = $prefix.$date.'001';
        }
        // $data['number'] = $itemNumber;
        // Check::create($data);
        return $itemNumber;
    }
    public function setApplicationState($id){
        $state = 0;
        $detail = ApplicationDetail::where('application_id',$id)->get();
        foreach ($detail as $key => $value) {
            if($value->state_buy == 0){
                $state = 0;
                break;
            }else{
                $state = 1;
            }
        }
        if ($state == 1) {
            $appState = Application::find($id);
            $appState->state_id = 70;
            $appState->save();
        }
    }
    public function makePurchaseNumber($number =''){
        $prefix = 'CGDD';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $itemNumber = $number;
            $itemDate = $date;
        }else{
            $max = Purchase::max('id'); 
            if (!empty($max)) {
                $itemNumber = Purchase::find($max)->number;
                $year = Purchase::find($max)->created_at->format('Y');
                $week = Purchase::find($max)->created_at->format('W')+1;
                $itemDate = (int)$year.$week;
            }
        }
        if (!empty($itemNumber)) {
            $number = str_pad(((int)substr($itemNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$itemDate) {
                $number = '001';
            }elseif($date<$itemDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $itemNumber = $prefix.$date.$number;
        }else{
            $itemNumber = $prefix.$date.'001';
        }
        return $itemNumber;
    }

    public function makeImportNumber($number =''){
        $prefix = 'QTRK';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $itemNumber = $number;
            $itemDate = $date;
        }else{
            $max = StockChange::where('type','其它入库')->max('id'); 
            if (!empty($max)) {
                $itemNumber = StockChange::find($max)->number;
                $year = StockChange::find($max)->created_at->format('Y');
                $week = StockChange::find($max)->created_at->format('W')+1;
                $itemDate = (int)$year.$week;
            }
        }
        if (!empty($itemNumber)) {
            $number = str_pad(((int)substr($itemNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$itemDate) {
                $number = '001';
            }elseif($date<$itemDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $itemNumber = $prefix.$date.$number;
        }else{
            $itemNumber = $prefix.$date.'001';
        }
        return $itemNumber;
    }

    public function makeExportNumber($number =''){
        $prefix = 'QTCK';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $itemNumber = $number;
            $itemDate = $date;
        }else{
            $max = StockChange::where('type','其它出库')->max('id'); 
            if (!empty($max)) {
                $itemNumber = StockChange::find($max)->number;
                $year = StockChange::find($max)->created_at->format('Y');
                $week = StockChange::find($max)->created_at->format('W')+1;
                $itemDate = (int)$year.$week;
            }
        }
        if (!empty($itemNumber)) {
            $number = str_pad(((int)substr($itemNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$itemDate) {
                $number = '001';
            }elseif($date<$itemDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $itemNumber = $prefix.$date.$number;
        }else{
            $itemNumber = $prefix.$date.'001';
        }
        return $itemNumber;
    }

    public function makeApplicationNumber($number =''){
        $prefix = 'CGSQ';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $itemNumber = $number;
            $itemDate = $date;
        }else{
            $max = Application::max('id'); 
            if (!empty($max)) {
                $itemNumber = Application::find($max)->number;
                // dd($itemNumber);
                $year = Application::find($max)->created_at->format('Y');
                $week = Application::find($max)->created_at->format('W')+1;
                $itemDate = (int)$year.$week;
            }
        }
        if (!empty($itemNumber)) {
            $number = str_pad(((int)substr($itemNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$itemDate) {
                $number = '001';
            }elseif($date<$itemDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $itemNumber = $prefix.$date.$number;
        }else{
            $itemNumber = $prefix.$date.'001';
        }
        return $itemNumber;
    }
}
