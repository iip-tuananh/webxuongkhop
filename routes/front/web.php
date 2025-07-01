<?php
Route::group(['namespace' => 'Front'], function () {
    Route::get('/','FrontController@homePage')->name('front.home-page');
    Route::get('/gioi-thieu','FrontController@abouts')->name('front.abouts');
    Route::get('/ve-chung-toi','FrontController@about_page')->name('front.about_page');
    Route::get('/collections/','FrontController@getProducts')->name('front.products');
    Route::get('/chi-tiet-san-pham/{slug}','FrontController@getProductDetail')->name('front.get-product-detail');
    Route::get('/tin-tuc','FrontController@blogs')->name('front.blogs');
    Route::get('/chi-tiet-tin-tuc/{slug}','FrontController@blogDetail')->name('front.blogDetail');
    Route::get('/tuyen-dung','FrontController@hirings')->name('front.hirings');
    Route::get('/chi-tiet-tuyen-dung/{slug}','FrontController@hiringDetail')->name('front.hiringDetail');
    Route::get('/lien-he','FrontController@contact')->name('front.contact');
    Route::post('/send-rating','FrontController@submitRating')->name('front.submitRating');
    Route::get('/search','FrontController@search')->name('front.search');

    // giỏ hàng
    Route::post('/{productId}/add-product-to-cart','CartController@addItem')->name('cart.add.item');
    Route::get('/remove-product-to-cart','CartController@removeItem')->name('cart.remove.item');
    Route::get('/gio-hang.html','CartController@index')->name('cart.index');
    Route::post('/update-cart','CartController@updateItem')->name('cart.update.item');
    Route::get('/thanh-toan.html','CartController@checkout')->name('cart.checkout');
    Route::post('/checkout','CartController@checkoutSubmit')->name('cart.post.checkout');
    Route::get('/dat-hang-thanh-cong.html/','CartController@checkoutSuccess')->name('cart.checkout.success');





    Route::get('/dich-vu/{parentSlug}/{slug?}','FrontController@services')->name('front.services');
    Route::get('/chi-tiet-dich-vu/{slug}','FrontController@getServiceDetail')->name('front.getServiceDetail');
    Route::get('/kien-thuc/{slug?}','FrontController@knowledge')->name('front.knowledge');
    Route::get('/chi-tiet-bai-viet-kien-thuc/{slug}','FrontController@getKnowledgeDetail')->name('front.getKnowledgeDetail');

    Route::get('/du-an/{slug?}','FrontController@projects')->name('front.projects');
    Route::post('/postContact','FrontController@postContact')->name('front.submitContact');
    Route::get('/tim-kiem','FrontController@searchProducts')->name('front.search-products');

    Route::get('/tin-tuc/{slug?}','FrontController@blogs')->name('front.blogs');

    Route::get('onlyme/clear', 'FrontController@onlyme')->name('front.onlyme');

    Route::get('/{any}', function () {
        // Laravel tự load view errors/404.blade.php khi abort(404)
        abort(404);
    })
        ->where('any', '.*');

});




