<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Order_has_guideRequest as StoreRequest;
use App\Http\Requests\Order_has_guideRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class Order_has_guideCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Order_has_guideCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Order_has_guide');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order_has_guide');
        $this->crud->setEntityNameStrings('order_has_guide', 'order_has_guides');

        // ADD COLUMN
        $this->crud->addColumn([   // Select
            'label' => "Order", //table column heading
            'type' => 'select',
            'name' => 'order_id', // the db column for the foreign key
            'entity' => 'order', // the method that defines the relationship in your Model
            'attribute' => 'user_id', // foreign key attribute that is shown to user
            'model' => "App\Models\Order", // foreign key model
        ]);
        $this->crud->addColumn([   // Select
            'label' => "User", //table column heading
            'type' => 'select',
            'name' => 'user_id', // the db column for the foreign key
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\BackpackUser", // foreign key model
        ]);
        // ADD FIELD------------------------------------------------------------
        $this->crud->addField([   // Select
            'label' => "Order",
            'type' => 'select',
            'name' => 'order_id', // the db column for the foreign key
            'entity' => 'order', // the method that defines the relationship in your Model
            'attribute' => 'user_id', // foreign key attribute that is shown to user
            'model' => "App\Models\Order", // foreign key model
        ]);
        $this->crud->addField([   // Select
            'label' => "User",
            'type' => 'select',
            'name' => 'user_id', // the db column for the foreign key
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\BackpackUser", // foreign key model
        ]);
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in Order_has_guideRequest
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
