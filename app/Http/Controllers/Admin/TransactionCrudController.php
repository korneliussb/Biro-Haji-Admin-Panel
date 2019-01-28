<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TransactionRequest as StoreRequest;
use App\Http\Requests\TransactionRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class TransactionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TransactionCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Transaction');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transaction');
        $this->crud->setEntityNameStrings('transaction', 'transactions');

        // ADD COLUMN -----------------------------------------------------------
        $this->crud->addColumn([   // Select
            'label' => "Order", //table column heading
            'type' => 'select',
            'name' => 'order_id', // the db column for the foreign key
            'entity' => 'order', // the method that defines the relationship in your Model
            'attribute' => 'id', // foreign key attribute that is shown to user //user_id
            'model' => "App\Models\Order", // foreign key model 
        ]);
        // ADD FIELD------------------------------------------------------------
        $this->crud->addField([   // Select
            'label' => "Order",
            'type' => 'select2', // 1-n-relationship
            'name' => 'order_id', // the db column for the foreign key
            'entity' => 'order', // the method that defines the relationship in your Model
            'attribute' => 'id', // foreign key attribute that is shown to user
            'model' => "App\Models\Order", // foreign key model
        ]);
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in TransactionRequest
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
