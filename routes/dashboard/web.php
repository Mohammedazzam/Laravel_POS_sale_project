<?php

Route::prefix('dashboard')->name('dashboard.')->group(function (){

    Route::get('/check',function (){
        return "this is Dashboard";
    });

});//end of dashboard routes