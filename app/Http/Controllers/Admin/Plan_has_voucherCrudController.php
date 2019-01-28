<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Plan_has_voucherRequest as StoreRequest;
use App\Http\Requests\Plan_has_voucherRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class Plan_has_voucherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Plan_has_voucherCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Plan_has_voucher');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/plan_has_voucher');
        $this->crud->setEntityNameStrings('plan_has_voucher', 'plan_has_vouchers');

        // Add column--------------------------------------------------
        $this->crud->addColumn([   // Select
            'label' => "Plan", //table column heading
            'type' => 'select',
            'name' => 'plan_id', // the db column for the foreign key
            'entity' => 'plan', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Plan", // foreign key model
        ]);

        $this->crud->addColumn([   // Select
            'label' => "Voucher", //table column heading
            'type' => 'select',
            'name' => 'voucher_id', // the db column for the foreign key
            'entity' => 'voucher', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Voucher", // foreign key model
        ]);

        // add Field atau saat nambah ------------------------------------------------
        $this->crud->addField([   // Select
            'label' => "Plan",
            'type' => 'select2',
            'name' => 'plan_id', // the db column for the foreign key
            'entity' => 'plan', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Plan", // foreign key model
        ]);
        $this->crud->addField([   // Select
            'label' => "Voucher",
            'type' => 'select2',
            'name' => 'voucher_id', // the db column for the foreign key
            'entity' => 'voucher', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Voucher", // foreign key model
        ]);
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in Plan_has_voucherRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
