<?php

    $router->group(['prefix' => 'client','namespace' => 'Client'], function() use ($router){
        Route::resource('services', 'ServiceController');
        Route::resource('clients', 'ClientController');
        Route::resource('quoteprices', 'QuotepriceController');
    });

    $router->group(['prefix' => 'equipment','namespace' => 'Equipment'], function() use ($router){
        Route::resource('equipments', 'EquipmentController');
    });

    $router->group(['prefix' => 'finance','namespace' => 'Finance'], function() use ($router){
        Route::resource('plans', 'PlanController');
        Route::resource('bills', 'BillController'); 
    });

    $router->group(['prefix' => 'logistics','namespace' => 'Logistics'], function() use ($router){
        get('getPurchaseId', 'PurchaseController@getPurchaseId')->name('amdin.logistics.getPurchaseId');
        get('getAppDetail/{number}', 'LogisticsController@getAppDetail')->name('amdin.logistics.getAppDetail');
        get('getProducts/{name}', 'LogisticsController@getProducts')->name('amdin.logistics.getProducts');
        Route::controller('logistics', 'LogisticsController');
        Route::resource('carriers', 'CarrierController');
        Route::resource('checks', 'CheckController');
        Route::resource('classifications', 'ClassificationController');
        Route::resource('storehouses', 'StorehouseController');
        Route::resource('products', 'ProductController');
        Route::resource('alarms', 'AlarmController'); 
        Route::resource('defects', 'DefectController');
        Route::resource('defectives', 'DefectiveController');
        Route::resource('imports', 'ImportController');
        Route::resource('invoices', 'InvoiceController');
        Route::resource('exports', 'ExportController');
        Route::resource('files', 'FileController');
        Route::resource('flits', 'FlitController');
        Route::resource('applications', 'ApplicationController');
        Route::resource('purchases', 'PurchaseController');
        Route::resource('entrys', 'EntryController');
    });

    $router->group(['prefix' => 'manufacture','namespace' => 'Manufacture'], function() use ($router){
        // get('autoPlan', 'MrpController@autoplan')->name('amdin.manufacture.autoplan');
        get('planJson', 'PlanController@planJson')->name('amdin.manufacture.planJson');
        get('getPlanId', 'PlanController@getPlanId')->name('amdin.manufacture.plaqnJeson');
        get('getWorksheetId', 'WorksheetController@getWorksheetId')->name('amdin.manufacture.getWorksheetId');
        get('planMrp/{id}/{quantity}', 'MrpController@planMrp')->name('amdin.manufacture.planMrp');
        get('worksheetMrp/{id}/{quantity}', 'MrpController@worksheetMrp')->name('amdin.manufacture.worksheetMrp');
        get('getWorksheetProduct/{id}', 'WorksheetController@getWorksheetProduct');
        get('getPlanMrpState/{id}/{quantity}', 'ManufactureController@getPlanMrpState')->name('manufacture.getPlanMrpState');
        get('stucture/{id}', 'StuctureController@index')->name('manufacture.stucture');
        get('stucture/view/{name}/{num?}', 'StuctureController@view');
        Route::resource('mrps', 'MrpController');
        Route::resource('plans', 'PlanController');
        Route::resource('worksheets', 'WorksheetController');
        Route::resource('jerques', 'JerqueController');
        Route::resource('collects', 'CollectController');
        Route::resource('retours', 'RetourController');
        Route::resource('receives', 'ReceiveController');
        Route::resource('outsources', 'OutsourceController');
        Route::resource('processes', 'ProcessController');
        Route::resource('stuctures', 'StuctureController');
    });

    $router->group(['prefix' => 'office','namespace' => 'Office'], function() use ($router){
        Route::resource('task', 'TaskController');
        Route::resource('emails', 'EmailController');
        Route::resource('memos', 'MemoController');
        Route::resource('notifications', 'NotificationController');
        Route::resource('schedules', 'ScheduleController');
        Route::resource('documents', 'DocumentController');
        Route::resource('contacts', 'ContactController');
        Route::controller('flow', 'FlowController');
        Route::get('flowattr/{id?}', 'FlowController@attribute');
        Route::resource('flows', 'FlowController');
        // Route::controller('office', 'OfficeController');
        // Route::group(['prefix' => 'messages', 'before' => 'auth'], function () {
        //     Route::get('/', ['as' => 'messages', 'uses' => 'MessageController@index']);
        //     Route::get('create', ['as' => 'messages.create', 'uses' => 'MessageController@create']);
        //     Route::get('view/{id}', ['as' => 'messages.view', 'uses' => 'MessageController@view']);
        //     Route::get('{id}/read', ['as' => 'messages.read', 'uses' => 'MessageController@read']);
        //     Route::get('unread', ['as' => 'messages.unread', 'uses' => 'MessageController@unread']);
        //     Route::post('/', ['as' => 'messages.store', 'uses' => 'MessageController@store']);
        //     Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessageController@show']);
        //     Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessageController@update']);
        // }); 
    });

    $router->group(['prefix' => 'personnel','namespace' => 'Personnel'], function() use ($router){
        Route::resource('personnels', 'PersonnelController');
    });

    $router->group(['prefix' => 'report','namespace' => 'Report'], function() use ($router){
        Route::get('report/stock/{name}/{method}', 'ReportController@stock'); 
    });

    $router->group(['prefix' => 'system','namespace' => 'System'], function() use ($router){
        // Route::get('system/user/{name}', 'SystemController@user');
        get('system/user/{name}', ['as' => 'backend.luster.system.user', 'uses' => 'SystemController@user']);
        get('system/theme/{color}', ['as' => 'backend.luster.system.theme', 'uses' => 'SystemController@theme']);
        get('getOption/{id}', ['as' => 'getOption', 'uses' => 'OptionController@getOption']);
        Route::resource('options', 'OptionController');
        Route::get('databases/{database}', 'DatabaseController@index');
    });




