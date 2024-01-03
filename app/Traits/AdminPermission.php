<?php

namespace App\Traits;


Trait AdminPermission{

    public function checkRequestPermission(){
        if (
            empty(auth()->user()->role->permission['permission']['slider']['list'])  && \Route::is('sliders') ||
            empty(auth()->user()->role->permission['permission']['slider']['add'])  && \Route::is('sliders') ||
            empty(auth()->user()->role->permission['permission']['slider']['edit'])  && \Route::is('sliders') ||
            empty(auth()->user()->role->permission['permission']['slider']['view'])  && \Route::is('sliders') ||
            empty(auth()->user()->role->permission['permission']['slider']['delete'])  && \Route::is('sliders') ||

            empty(auth()->user()->role->permission['permission']['product']['list'])  && \Route::is('manage-product') ||
            empty(auth()->user()->role->permission['permission']['product']['add'])  && \Route::is('add-product')||


            empty(auth()->user()->role->permission['permission']['role']['add'])  && \Route::is('role.create')||
            empty(auth()->user()->role->permission['permission']['role']['edit'])  && \Route::is('role.edit')||
            empty(auth()->user()->role->permission['permission']['role']['delete'])  && \Route::is('role.destroy')||

            empty(auth()->user()->role->permission['permission']['permission']['add'])  && \Route::is('permission.create')||
            empty(auth()->user()->role->permission['permission']['permission']['view'])  && \Route::is('permission.index')||
            empty(auth()->user()->role->permission['permission']['permission']['edit'])  && \Route::is('permission.edit')||
            empty(auth()->user()->role->permission['permission']['permission']['delete'])  && \Route::is('permission.destroy')||

            empty(auth()->user()->role->permission['permission']['subadmin']['add'])  && \Route::is('subadmin.create')||
            empty(auth()->user()->role->permission['permission']['subadmin']['view'])  && \Route::is('subadmin.index')||
            empty(auth()->user()->role->permission['permission']['subadmin']['edit'])  && \Route::is('subadmin.edit')||
            empty(auth()->user()->role->permission['permission']['subadmin']['delete'])  && \Route::is('subadmin.destroy')
        ){
            return response()->view('admin.home');
        }
    }
}
