<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\User_has_invitationRequest as StoreRequest;
use App\Http\Requests\User_has_invitationRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class User_has_invitationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class User_has_invitationCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\User_has_invitation');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user_has_invitation');
        $this->crud->setEntityNameStrings('user_has_invitation', 'user_has_invitations');

        // Add column--------------------------------------------------
        $this->crud->addColumn([   // Select
            'label' => "Parent", //table column heading
            'type' => 'select',
            'name' => 'parent_id', // the db column for the foreign key
            'entity' => 'parent', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\BackpackUser", // foreign key model
        ]);

        $this->crud->addColumn([   // Select
            'label' => "Child", //table column heading
            'type' => 'select',
            'name' => 'child_id', // the db column for the foreign key
            'entity' => 'child', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\BackpackUser", // foreign key model
        ]);

        // add Field atau saat nambah ------------------------------------------------
        $this->crud->addField([   // Select
            'label' => "Parent",
            'type' => 'select2',
            'name' => 'parent_id', // the db column for the foreign key
            'entity' => 'parent', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\BackpackUser", // foreign key model
        ]);

        $this->crud->addField([   // Select
            'label' => "Child",
            'type' => 'select2',
            'name' => 'child_id', // the db column for the foreign key
            'entity' => 'child', // the method that defines the relationship in your Model
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

        // add asterisk for fields that are required in User_has_invitationRequest
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
