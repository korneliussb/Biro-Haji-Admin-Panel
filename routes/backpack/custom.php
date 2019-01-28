<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('person', 'PersonCrudController');
    CRUD::resource('passport', 'PassportCrudController');
    CRUD::resource('order', 'OrderCrudController');
    CRUD::resource('transaction', 'TransactionCrudController');
    CRUD::resource('plan', 'PlanCrudController');
    CRUD::resource('schedule', 'ScheduleCrudController');
    CRUD::resource('voucher', 'VoucherCrudController');
    CRUD::resource('person_has_passport', 'Person_Has_PassportCrudController');
    CRUD::resource('user_has_invitation', 'User_Has_InvitationCrudController');
    CRUD::resource('order_has_person', 'Order_Has_PersonCrudController');
    CRUD::resource('order_has_leader', 'Order_Has_LeaderCrudController');
    CRUD::resource('order_has_guide', 'Order_Has_GuideCrudController');
    CRUD::resource('order_has_status', 'Order_Has_StatusCrudController');
    CRUD::resource('order_status', 'Order_StatusCrudController');
    CRUD::resource('plan_has_schedule', 'Plan_Has_ScheduleCrudController');
    CRUD::resource('schedule_detail', 'Schedule_DetailCrudController');
    CRUD::resource('plan_feature', 'Plan_FeatureCrudController');
    CRUD::resource('plan_has_voucher', 'Plan_Has_VoucherCrudController');
}); // this should be the absolute last line of this file