<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;

class ArticleCrudController extends CrudController
{

    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Article');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/article');
        $this->crud->setEntityNameStrings('article', 'articles');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */


        $this->crud->addField([
            'name'  => 'name',
            'label' => 'Title'
        ]);

        $this->crud->addField([
            'name'  => 'body',
            'label' => 'Body',
            'type'  => 'ckeditor'
        ]);

        $admins = User::select('id','name')->where('role', 1)->get();
        $adminsArray = [];
        foreach ($admins as $admin) {
            $adminsArray[$admin->id] = $admin->name;
        }

        $this->crud->addField([
            'name'        => 'admin_id',
            'label'       => "Created By",
            'type'        => 'select_from_array',
            'options'     => $adminsArray,
            'allows_null' => false,

        ]);

        $this->crud->addColumn('name');
        $this->crud->addColumn('body');
        $this->crud->addColumn('created_at');
        $this->crud->addColumn('updated_at');

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
