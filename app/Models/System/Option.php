<?php namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;
    
    protected $table = 'system_options';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    //生产模块
    public function scopeWorksheetType($query)
    {
        return $query->where('parent_tag','worksheetType');
    }
    public function scopeCheckResult($query)
    {
        return $query->where('parent_tag','checkResult');
    }
    public function scopeWorkstate($query)
    {
        return $query->where('parent_tag','workstate');
    }


    //进销存
    public function scopeInvocieState($query)
    {
        return $query->where('parent_tag','invocieState');
    }
    public function scopeExpressCompany($query)
    {
        return $query->where('parent_tag','expressCompany');
    }
    public function scopeProductType($query)
    {
        return $query->where('parent_tag','productType');
    }
    public function scopeStockState($query)
    {
        return $query->where('parent_tag','stockState');
    }
    public function scopeStockChangTypee($query)
    {
        return $query->where('parent_tag','stockChangType');
    }
    public function scopePurchaseState($query)
    {
        return $query->where('parent_tag','purchaseState');
    }
    public function scopeInvoiceType($query)
    {
        return $query->where('parent_tag','invoiceType');
    }
    public function scopePurchaseType($query)
    {
        return $query->where('parent_tag','purchaseType');
    }

    //客户管理
    public function scopeClientType($query)
    {
        return $query->where('parent_tag','clientType');
    }
    public function scopeClientSource($query)
    {
        return $query->where('parent_tag','clientSource');
    }
    public function scopeIndustryType($query)
    {
        return $query->where('parent_tag','industryType');
    }
    public function scopeClientLevel($query)
    {
        return $query->where('parent_tag','clientLevel');
    }
    public function scopeClientLicense($query)
    {
        return $query->where('parent_tag','clientLicense');
    }
    public function scopeServiceType($query)
    {
        return $query->where('parent_tag','serviceType');
    }
    public function scopeServiceState($query)
    {
        return $query->where('parent_tag','serviceState');
    }

    //人力资源

    public function scopeLeaveType($query)
    {
        return $query->where('parent_tag','leaveType');
    }
    public function scopeGender($query)
    {
        return $query->where('parent_tag','gender');
    }
    public function scopeMarriage($query)
    {
        return $query->where('parent_tag','marriage');
    }
    public function scopeDimissionType($query)
    {
        return $query->where('parent_tag','dimissionType');
    }
    public function scopeBloodType($query)
    {
        return $query->where('parent_tag','bloodType');
    }
    public function scopeNationality($query)
    {
        return $query->where('parent_tag','nationality');
    }
    public function scopeEducation($query)
    {
        return $query->where('parent_tag','education');
    }
    public function scopePoliticalStatus($query)
    {
        return $query->where('parent_tag','politicalStatus');
    }


    //财务管理

    public function scopeFinanceClass($query)
    {
        return $query->where('parent_tag','financeClass');
    }
    public function scopeCostType($query)
    {
        return $query->where('parent_tag','costType');
    }
    public function scopeFinanceType($query)
    {
        return $query->where('parent_tag','financeType');
    }
    public function scopeReceiptType($query)
    {
        return $query->where('parent_tag','receiptType');
    }
    public function scopeExpenseState($query)
    {
        return $query->where('parent_tag','expenseState');
    }
    public function scopeRevenueState($query)
    {
        return $query->where('parent_tag','revenueState');
    }

    //报表中心


    //协同办公
    public function scopeEconomicStyle($query)
    {
        return $query->where('parent_tag','economicStyle');
    }
    public function scopePosition($query)
    {
        return $query->where('parent_tag','position');
    }
    public function scopeContractState($query)
    {
        return $query->where('parent_tag','contractState');
    }
    public function scopePublicState($query)
    {
        return $query->where('parent_tag','publicState');
    }
    public function scopeCendState($query)
    {
        return $query->where('parent_tag','sendState');
    }
    public function scopeValidationState($query)
    {
        return $query->where('parent_tag','validationState');
    }
    public function scopeCertifyType($query)
    {
        return $query->where('parent_tag','certifyType');
    }
    public function scopeTaskLevel($query)
    {
        return $query->where('parent_tag','taskLevel');
    }
    public function scopeUnit($query)
    {
        return $query->where('parent_tag','unit');
    }

    //资产管理
    public function scopeAssetsType($query){
        return $query->where('parent_tag','assetsType');
    }
    public function scopeAssetsSource($query){
        return $query->where('parent_tag','assetsSource');
    }
    public function scopeAssetsState($query){
        return $query->where('parent_tag','assetsState');
    }
    public function scopeAssetsAddress($query){
        return $query->where('parent_tag','assetsAddress');
    }

    //系统管理
}
