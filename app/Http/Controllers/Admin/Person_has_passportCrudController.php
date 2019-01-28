<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Person_has_passportRequest as StoreRequest;
use App\Http\Requests\Person_has_passportRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class Person_has_passportCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Person_has_passportCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Person_has_passport');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/person_has_passport');
        $this->crud->setEntityNameStrings('person_has_passport', 'person_has_passports');


        // Add column
        $this->crud->addColumn([   // Select
            'label' => "Person", //table column heading
            'type' => 'select',
            'name' => 'person_id', // the db column for the foreign key
            'entity' => 'person', // the method that defines the relationship in your Model
            'attribute' => 'firstname', // foreign key attribute that is shown to user
            'model' => "App\Models\Person", // foreign key model
        ]);

        $this->crud->addColumn([   // Select
            'label' => "Passport", //table column heading
            'type' => 'select',
            'name' => 'passport_id', // the db column for the foreign key
            'entity' => 'passport', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Passport", // foreign key model
        ]);

        // add Field atau saat nambah
        $this->crud->addField([   // Select
            'label' => "Person",
            'type' => 'select',
            'name' => 'person_id', // the db column for the foreign key
            'entity' => 'person', // the method that defines the relationship in your Model
            'attribute' => 'firstname', // foreign key attribute that is shown to user
            'model' => "App\Models\Person", // foreign key model
        ]);

        $this->crud->addField([   // Select
            'label' => "Passport",
            'type' => 'select',
            'name' => 'passport_id', // the db column for the foreign key
            'entity' => 'passport', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Passport", // foreign key model
        ]);
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in Person_has_passportRequest
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
