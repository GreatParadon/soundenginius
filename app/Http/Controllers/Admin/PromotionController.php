<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Promotion;

class PromotionController extends BaseController
{
    protected $page = ['title' => 'Promotion', 'content' => 'promotion'];
    protected $list_data = [['field' => 'id', 'type' => 'number', 'label' => 'ID'],
        ['field' => 'title', 'type' => 'text', 'label' => 'Title'],
        ['field' => 'image', 'type' => 'image', 'label' => 'Logo'],
        ['field' => 'active', 'type' => 'checkbox', 'label' => 'Active']];

    protected function feature()
    {
        return [
            'create' => true,
            'edit' => true,
            'delete' => true,
            'sort' => false
        ];
    }

    protected function model()
    {
        return new Promotion();
    }

    protected function formData()
    {
        $form_data = collect([['field' => 'id', 'type' => 'number', 'label' => 'ID', 'required' => false],
            ['field' => 'title', 'type' => 'text', 'label' => 'Title', 'required' => true],
            ['field' => 'image', 'type' => 'image', 'label' => 'Logo', 'required' => false],
            ['field' => 'content', 'type' => 'wysiwyg', 'label' => 'Content', 'required' => false],
            ['field' => 'active', 'type' => 'checkbox', 'label' => 'Active', 'required' => false]]);

        return $form_data;
    }

}
