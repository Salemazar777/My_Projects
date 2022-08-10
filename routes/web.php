<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AdminController;
use App\Http\controllers\Pos\SupplierController;
use App\Http\controllers\Pos\CustomerController;
use App\Http\controllers\Pos\UnitController;
use App\Http\controllers\Pos\CategoryController;
use App\Http\controllers\Pos\ProductController;
use App\Http\controllers\Pos\PurchaseController;
use App\Http\controllers\Pos\DefaultController;
use App\Http\controllers\Pos\InvoiceController;
use App\Http\controllers\Pos\StockController;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/inventory', function () {
        return view('admin.index');
    });


    Route::controller(AdminController::class)->group(function (){
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'Editprofile')->name('edit.profile');
        Route::post('/update/profile', 'Updateprofile')->name('update.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/Update/password', 'UpdatePassword')->name('update.password');
    });
    
    Route::controller(SupplierController::class)->group(function (){
        Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
        Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');
        Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
        Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
        Route::post('/supplier/update','SupplierUpdate')->name('supplier.update');
        Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
    });
    
    Route::controller(CustomerController::class)->group(function (){
        Route::get('/customer/all', 'CustomerAll')->name('customer.all');
        Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
        Route::post('/customer/store/', 'CustomerStore')->name('customer.store');
        Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
        Route::post('/customer/update/', 'CustomerUpdate')->name('customer.update');
        Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');
        Route::get('/credit/customer', 'CreditCustomer')->name('credit.customer');
        Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');
        Route::get('/customer/edit/invoice/{id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
        Route::post('/customer/update/invoice/{id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');
        Route::get('/customer/invoice/details/pdf/{id}', 'CustomerInvoiceDetailsPdf')->name('customer.invoice.details.pdf');
        Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
        Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');
        Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
        Route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
        Route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');
        
    });
    
    Route::controller(UnitController::class)->group(function (){
        Route::get('/unit/all', 'UnitAll')->name('unit.all');
        Route::get('/unit/add', 'UnitAdd')->name('unit.add');
        Route::post('/unit/store/', 'UnitStore')->name('unit.store');
        Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
        Route::post('/unit/update/', 'UnitUpdate')->name('unit.update');
        Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete'); 
    });
    
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/category/all', 'CategoryAll')->name('category.all');
        Route::get('/category/add', 'CategoryAdd')->name('category.add');
        Route::post('/category/store/', 'CategoryStore')->name('category.store');
        Route::get('/categoryit/edit/{id}', 'CategoryEdit')->name('category.edit');
        Route::post('/category/update/', 'CategoryUpdate')->name('category.update');
        Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');
    });
    
    Route::controller(ProductController::class)->group(function (){
        Route::get('/product/all','ProductAll')->name('product.all');
        Route::get('/product/add','ProductAdd')->name('product.add');
        Route::post('/product/store/','ProductStore')->name('product.store');
        Route::get('/product/edit/{id}','ProductEdit')->name('product.edit');
        Route::post('/product/update/', 'ProductUpdate')->name('product.update');
        Route::get('/product/delete/{id}','ProductDelete')->name('product.delete');
    });
    
    Route::controller(PurchaseController::class)->group(function (){
        Route::get('/purchase/all','PurchaseAll')->name('purchase.all');
        Route::get('/purchase/add','PurchaseAdd')->name('purchase.add');
        Route::post('/purchase/store','PurchaseStore')->name('purchase.store');
        Route::get('/purchase/pending','PurchasePending')->name('purchase.pending');
        Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
        Route::get('/purchase/delete/{id}','PurchaseDelete')->name('purchase.delete');
        Route::get('/daily/purchase/report','DailyPurchaseReport')->name('daily.purchase.report');
        Route::get('/daily/purchase/pdf','DailyPurchasePdf')->name('daily.purchase.pdf');
         
    });
    
    Route::controller(DefaultController::class)->group(function (){
        Route::get('/get-category','GetCategory')->name('get-category');
        Route::get('/get-product','GetProduct')->name('get-product');
        Route::get('/check-product','GetStock')->name('check-product-stock');
        
    });
    
    Route::controller(InvoiceController::class)->group(function (){
        Route::get('/invoice/all','InvoiceAll')->name('invoice.all');
        Route::get('/invoice/add','InvoiceAdd')->name('invoice.add');
        Route::post('/invoice/store','InvoiceStore')->name('invoice.store');
        Route::get('/invoice/pending/list','PendingList')->name('invoice.pending.list'); 
        Route::get('/invoice/approve/{id}','InvoiceApprove')->name('invoice.approve');
        Route::post('/approval/store/{id}','ApprovalStore')->name('approval.store');
        Route::get('/invoice/delete/{id}','InvoiceDelete')->name('invoice.delete');
        Route::get('/print/invoice/list','PrintInvoiceList')->name('print.invoice.list');
        Route::get('/print/invoice/{id}','PrintInvoice')->name('print.invoice');
        Route::get('/daily/invoice/report','DailyInvoiceReport')->name('daily.invoice.report');
        Route::get('/daily/invoice/pdf','DailyInvoicePdf')->name('daily.invoice.pdf');
    });
    

    Route::controller(StockController::class)->group(function (){
        Route::get('/stock/report','StockReport')->name('stock.report');
        Route::get('/stock/report/pdf','StockReportPdf')->name('stock.report.pdf');
        Route::get('/stock/supplier/wise','StockSupplierWise')->name('stock.supplier.wise');
        Route::get('/supplier/wise/pdf','SupplierWisePdf')->name('supplier.wise.pdf');
        Route::get('/product/wise/pdf','ProductWisePdf')->name('product.wise.pdf');
        
    });
 
});

require __DIR__.'/auth.php';
