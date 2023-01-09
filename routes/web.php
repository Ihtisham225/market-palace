<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
Route::get('/select-shop', [App\Http\Controllers\Admin\HomeController::class, 'select_shop'])->name('select.shop');
Route::get('/shop-session/{id}', [App\Http\Controllers\Admin\HomeController::class, 'shop_session'])->name('shop.session');


/*******************************************************************************************
 * Admin Routes Starts
 * *****************************************************************************************
 */
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    /*****************************
     * Shops Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\ShopController::class)->group(function () {
        Route::get('/shops', 'index')->name('shops');
        Route::get('/shop-detail/{id}', 'record_detail')->name('shop.detail');
        Route::get('/add-shop', 'add_record')->name('shop.add');
        Route::post('/save-shop', 'save_record')->name('shop.save');
        Route::get('/edit-shop/{id}', 'edit_record')->name('shop.edit');
        Route::put('/update-shop/{id}', 'update_record')->name('shop.update');
        Route::delete('/delete-shop/{id}', 'delete_record')->name('shop.delete');
        Route::get('/trashed-shops', 'trashed_records')->name('shop.trashed');
        Route::delete('/delete-shop-permanent/{id}', 'delete_record_permanent')->name('shop.delete.permanent');
        Route::put('/restore-shop/{id}', 'restore_record')->name('shop.restore');
        Route::get('/generate-report', 'generate_report')->name('shop.generate_report');

        //Search and filters
        Route::post('/search-shop', 'search_record')->name('shop.search');
        Route::post('/shop-status', 'filter_status')->name('shop.status');
    });


    /*****************************
     * Shops Routes Ends
     * ***************************
     */




    /*****************************
     * Shop types Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\ShopTypeController::class)->group(function () {
        Route::get('/shop_types', 'index')->name('types');
        Route::get('/add-shop_type', 'add_record')->name('type.add');
        Route::post('/save-shop_type', 'save_record')->name('type.save');
        Route::get('/edit-shop_type/{id}', 'edit_record')->name('type.edit');
        Route::put('/update-shop_type/{id}', 'update_record')->name('type.update');
        Route::delete('/delete-shop_type/{id}', 'delete_record')->name('type.delete');
        Route::get('/trashed-shop_types', 'trashed_records')->name('type.trashed');
        Route::delete('/delete-shop_type-permanent/{id}', 'delete_record_permanent')->name('type.delete.permanent');
        Route::put('/restore-shop_type/{id}', 'restore_record')->name('type.restore');

        //Search and filters
        Route::post('/search-shop_type', 'search_record')->name('type.search');
        Route::post('/shop_type-status', 'filter_status')->name('type.status');
    });


    /*****************************
     * Shop types Routes Ends
     * ***************************
     */


    


     /*****************************
     * Brands Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/brands', 'index')->name('brands');
        Route::get('/add-brand', 'add_record')->name('brand.add');
        Route::post('/save-brand', 'save_record')->name('brand.save');
        Route::get('/edit-brand/{id}', 'edit_record')->name('brand.edit');
        Route::put('/update-brand/{id}', 'update_record')->name('brand.update');
        Route::delete('/delete-brand/{id}', 'delete_record')->name('brand.delete');
        Route::get('/trashed-brands', 'trashed_records')->name('brand.trashed');
        Route::delete('/delete-brand-permanent/{id}', 'delete_record_permanent')->name('brand.delete.permanent');
        Route::put('/restore-brand/{id}', 'restore_record')->name('brand.restore');

        //Search and filters
        Route::post('/search-brand', 'search_record')->name('brand.search');
        Route::post('/brand-status', 'filter_status')->name('brand.status');
    });


    /*****************************
     * Brands Routes Ends
     * ***************************
     */




    /*****************************
     * Companies Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\CompanyController::class)->group(function () {
        Route::get('/companies', 'index')->name('companies');
        Route::get('/add-company', 'add_record')->name('company.add');
        Route::post('/save-company', 'save_record')->name('company.save');
        Route::get('/edit-company/{id}', 'edit_record')->name('company.edit');
        Route::put('/update-company/{id}', 'update_record')->name('company.update');
        Route::delete('/delete-company/{id}', 'delete_record')->name('company.delete');
        Route::get('/trashed-companies', 'trashed_records')->name('company.trashed');
        Route::delete('/delete-company-permanent/{id}', 'delete_record_permanent')->name('company.delete.permanent');
        Route::put('/restore-company/{id}', 'restore_record')->name('company.restore');

        //Search and filters
        Route::post('/search-company', 'search_record')->name('company.search');
        Route::post('/company-status', 'filter_status')->name('company.status');
    });
 
 
 
     /*****************************
      * Companies Routes Ends
      * ***************************
      */




    /*****************************
     * Categories Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories');
        Route::get('/add-category', 'add_record')->name('category.add');
        Route::post('/save-category', 'save_record')->name('category.save');
        Route::get('/edit-category/{id}', 'edit_record')->name('category.edit');
        Route::put('/update-category/{id}', 'update_record')->name('category.update');
        Route::delete('/delete-category/{id}', 'delete_record')->name('category.delete');
        Route::get('/trashed-categories', 'trashed_records')->name('category.trashed');
        Route::delete('/delete-category-permanent/{id}', 'delete_record_permanent')->name('category.delete.permanent');
        Route::put('/restore-category/{id}', 'restore_record')->name('category.restore');

        //Search and filters
        Route::post('/search-category', 'search_record')->name('category.search');
        Route::post('/category-status', 'filter_status')->name('category.status');
    });
 
 
 
     /*****************************
      * Categories Routes Ends
      * ***************************
      */




    /*****************************
     * Areas Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\AreaController::class)->group(function () {
        Route::get('/areas', 'index')->name('areas');
        Route::get('/add-area', 'add_record')->name('area.add');
        Route::post('/save-area', 'save_record')->name('area.save');
        Route::get('/edit-area/{id}', 'edit_record')->name('area.edit');
        Route::put('/update-area/{id}', 'update_record')->name('area.update');
        Route::delete('/delete-area/{id}', 'delete_record')->name('area.delete');
        Route::get('/trashed-areas', 'trashed_records')->name('area.trashed');
        Route::delete('/delete-area-permanent/{id}', 'delete_record_permanent')->name('area.delete.permanent');
        Route::put('/restore-area/{id}', 'restore_record')->name('area.restore');

        //Search and filters
        Route::post('/search-area', 'search_record')->name('area.search');
        Route::post('/area-status', 'filter_status')->name('area.status');
    });
 
 
 
     /*****************************
      * Areas Routes Ends
      * ***************************
      */




    /*****************************
     * Salemans Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\SalemanController::class)->group(function () {
        Route::get('/salemans', 'index')->name('salemans');
        Route::get('/add-saleman', 'add_record')->name('saleman.add');
        Route::post('/save-saleman', 'save_record')->name('saleman.save');
        Route::get('/edit-saleman/{id}', 'edit_record')->name('saleman.edit');
        Route::put('/update-saleman/{id}', 'update_record')->name('saleman.update');
        Route::delete('/delete-saleman/{id}', 'delete_record')->name('saleman.delete');
        Route::get('/trashed-salemans', 'trashed_records')->name('saleman.trashed');
        Route::delete('/delete-saleman-permanent/{id}', 'delete_record_permanent')->name('saleman.delete.permanent');
        Route::put('/restore-saleman/{id}', 'restore_record')->name('saleman.restore');

        //Search and filters
        Route::post('/search-saleman', 'search_record')->name('saleman.search');
        Route::post('/saleman-status', 'filter_status')->name('saleman.status');
    });
 
 
 
     /*****************************
      * Salemans Routes Ends
      * ***************************
      */





    /*****************************
    * Customers Routes Starts
    * ***************************
    */

    Route::controller(App\Http\Controllers\Admin\CustomerController::class)->group(function () {
        Route::get('/customers', 'index')->name('customers');
        Route::get('/add-customer', 'add_record')->name('customer.add');
        Route::post('/save-customer', 'save_record')->name('customer.save');
        Route::get('/edit-customer/{id}', 'edit_record')->name('customer.edit');
        Route::put('/update-customer/{id}', 'update_record')->name('customer.update');
        Route::delete('/delete-customer/{id}', 'delete_record')->name('customer.delete');
        Route::get('/trashed-customers', 'trashed_records')->name('customer.trashed');
        Route::delete('/delete-customer-permanent/{id}', 'delete_record_permanent')->name('customer.delete.permanent');
        Route::put('/restore-customer/{id}', 'restore_record')->name('customer.restore');

        //Search and filters
        Route::post('/search-customer', 'search_record')->name('customer.search');
        Route::post('/customer-status', 'filter_status')->name('customer.status');
    });
 
 
 
    /*****************************
    * Customers Routes Ends
    * ***************************
    */





    /*****************************
     * Dealers Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\DealerController::class)->group(function () {
        Route::get('/dealers', 'index')->name('dealers');
        Route::get('/add-dealer', 'add_record')->name('dealer.add');
        Route::post('/save-dealer', 'save_record')->name('dealer.save');
        Route::get('/edit-dealer/{id}', 'edit_record')->name('dealer.edit');
        Route::put('/update-dealer/{id}', 'update_record')->name('dealer.update');
        Route::delete('/delete-dealer/{id}', 'delete_record')->name('dealer.delete');
        Route::get('/trashed-dealers', 'trashed_records')->name('dealer.trashed');
        Route::delete('/delete-dealer-permanent/{id}', 'delete_record_permanent')->name('dealer.delete.permanent');
        Route::put('/restore-dealer/{id}', 'restore_record')->name('dealer.restore');

        //Search and filters
        Route::post('/search-dealer', 'search_record')->name('dealer.search');
        Route::post('/dealer-status', 'filter_status')->name('dealer.status');
    });
 
 
 
     /*****************************
      * Dealers Routes Ends
      * ***************************
      */




    /*****************************
     * Expenses Routes Starts
     * ***************************
     */

    Route::controller(App\Http\Controllers\Admin\ExpenseController::class)->group(function () {
        Route::get('/expenses', 'index')->name('expenses');
        Route::get('/add-expense', 'add_record')->name('expense.add');
        Route::post('/save-expense', 'save_record')->name('expense.save');
        Route::get('/edit-expense/{id}', 'edit_record')->name('expense.edit');
        Route::put('/update-expense/{id}', 'update_record')->name('expense.update');
        Route::delete('/delete-expense/{id}', 'delete_record')->name('expense.delete');
        Route::get('/trashed-expenses', 'trashed_records')->name('expense.trashed');
        Route::delete('/delete-expense-permanent/{id}', 'delete_record_permanent')->name('expense.delete.permanent');
        Route::put('/restore-expense/{id}', 'restore_record')->name('expense.restore');

        //Search and filters
        Route::post('/search-expense', 'search_record')->name('expense.search');
        Route::post('/expense-status', 'filter_status')->name('expense.status');
    });
 
 
 
     /*****************************
      * Expenses Routes Ends
      * ***************************
      */

    



    /*****************************
     * Products Routes Starts
     * ***************************
     */

    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'add_record'])->name('product.add');
    Route::post('/save-product', [App\Http\Controllers\ProductController::class, 'save_record'])->name('product.save');
    Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit_record'])->name('product.edit');
    Route::post('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'update_record'])->name('product.update');
    Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'delete_record'])->name('product.delete');


    /*****************************
     * Products Routes Ends
     * ***************************
     */




    /*****************************
     * Sales Routes Starts
     * ***************************
     */


    Route::get('/sales', [App\Http\Controllers\SaleController::class, 'index'])->name('sales');
    Route::get('/add-sale', [App\Http\Controllers\SaleController::class, 'add_record'])->name('sale.add');
    Route::post('/save-sale', [App\Http\Controllers\SaleController::class, 'save_record'])->name('sale.save');
    Route::get('/edit-sale/{id}', [App\Http\Controllers\SaleController::class, 'edit_record'])->name('sale.edit');
    Route::post('/update-sale/{id}', [App\Http\Controllers\SaleController::class, 'update_record'])->name('sale.update');
    Route::get('/delete-sale/{id}', [App\Http\Controllers\SaleController::class, 'delete_record'])->name('sale.delete');


    /*****************************
     * Sales Routes Ends
     * ***************************
     */


});
    /*******************************************************************************************
 * Admin Routes Ends
 * *****************************************************************************************
 */


