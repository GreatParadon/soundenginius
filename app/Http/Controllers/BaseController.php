<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $page = [];
    protected $list_data = [];
    protected $list_view = 'list';
    protected $form_view = 'form';
    protected $gallery_id_name = 'test_id';

    protected function feature()
    {
        return [
            'create' => false,
            'edit' => false,
            'delete' => false,
            'sort' => false
        ];
    }

    protected function model()
    {
        return new Test();
    }

    protected function model_gallery()
    {
        return new Test();
    }

    protected function formData()
    {
        $form_data = collect([]);
        return new $form_data;
    }

    protected function listQuery($list_data)
    {
        return $this->model()->select($list_data->pluck('field')->all())->get();
    }

    protected function storeQuery($data)
    {
        return $this->model()->create($data);
    }

    protected function updateQuery($id, $data)
    {
        return $this->model()->find($id)->update($data);
    }

    protected function destroyQuery($id)
    {
        return $this->model()->destroy($id);
    }

    protected function dashboard()
    {
        return view('layouts.app', ['page' => ['title' => 'Dashboard']]);
    }

    protected function tab()
    {
        return [];
    }

    protected function index()
    {
        $page = $this->page;
        $page['type'] = 'List';

        $list_data = collect($this->list_data);

        $feature = $this->feature();
        $create = $feature['create'];
        $sort = $feature['sort'];
        $edit = $feature['edit'];
        $delete = $feature['delete'];
        $list_view = $this->list_view;

        $select = $this->listQuery($list_data);

        foreach ($select as $r) {
            foreach ($list_data->values() as $l) {
                if ($l['type'] == 'image') {
                    if (!$r->{$l['field']}) {
                        $r->{$l['field']} = 'No Image';
                    } else {
                        $r->{$l['field']} = '<a href="' . filePath($this->page['content'], $r->{$l['field']}) . '" data-lightbox="' . $l['field'] . '">
                        <img src="' . filePath($this->page['content'], $r->{$l['field']}) . '" width="50">
                        </a>';
                    }
                }

                if ($l['type'] == 'checkbox') {
                    if ($r->{$l['field']} == 1) {
                        $r->{$l['field']} = '<span class="label label-success">' . $l['label'] . '</span>';
                    } else {
                        $r->{$l['field']} = '<span class="label label-danger">' . $l['label'] . '</span>';
                    }
                }
            }
        }

        return view('admin.' . $list_view, compact('list_data', 'page', 'select', 'create', 'edit', 'delete', 'sort'));
    }

    protected function create()
    {
        $page = $this->page;
        $page['type'] = 'Description';
        $page['subtitle'] = 'Create new ' . $this->page['content'];

        $form_data = $this->formData();
        $form_view = $this->form_view;

        return view('admin.' . $form_view, compact('page', 'form_data'));
    }

    protected function store(Request $request)
    {
        $data = $request->all();

        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        $image = $this->formData()->where('type', 'image')->pluck('field')->all();

        foreach ($image as $r) {
            $file = $request->file($r);

            if ($file) {
                $image = fileUpload($file, $this->page['content']);
                if ($image['success'] == true) {
                    $data[$r] = $image['filename'];
                } else {
                    return back()->with('failed', 'Failed to Store');
                }
            }
        }

        $create = $this->storeQuery($data);
        if ($create) {
            return redirect('admin/' . $this->page['content'] . '/' . $create->id . '/edit')->with('success', 'Stored');
        } else {
            return back()->with('failed', 'Failed to Store');
        }
    }

    protected function show($id)
    {
        $select = $this->model()->find($id);
        if ($select) {
            return success(compact('select'));
        } else {
            return error('Failed to load data');
        }
    }

    protected function edit($id)
    {
        $page = $this->page;
        $page['type'] = 'Description';
        $page['subtitle'] = 'Edit ' . $this->page['content'];
        $gallery_id_name = $this->gallery_id_name;

        $tab = $this->tab();

        $galleries = (in_array('gallery', $tab) == true) ? $this->galleryQuery($gallery_id_name, $id) : ['gallery' => [], 'count' => 0];
        $form_data = $this->formData()->values()->all();
        $form_view = $this->form_view;

        $select = $this->model()->find($id);

        return view('admin.' . $form_view, compact('page', 'select', 'form_data', 'tab', 'galleries'));
    }

    protected function update(Request $request)
    {
        $data = $request->all();

        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        $image = $this->formData()->where('type', 'image')->pluck('field')->all();

        foreach ($image as $r) {
            $file = $request->file($r);

            if ($file) {
                $image = fileUpload($file, $this->page['content']);
                if ($image['success'] == true) {
                    $data[$r] = $image['filename'];
                } else {
                    return back()->with('failed', 'Failed to Store');
                }
            }
        }

        $update = $this->updateQuery($data['id'], $data);
        if ($update) {
            return back()->with('success', 'Updated');
        } else {
            return back()->with('failed', 'Failed to Update');
        }
    }

    protected function destroy($id)
    {
        $delete = $this->destroyQuery($id);
        if ($delete) {
            return success('Deleted');
        } else {
            return error('Failed to Delete');
        }
    }

    protected function wysiwygUpload(Request $request)
    {
        $file = $request->file('file');
        $uploadPath = 'wysiwyg';
        $file_upload = fileUpload($file, $uploadPath);
        if ($file_upload['success'] == true) {
            return success(['filepath' => filePath('wysiwyg', $file_upload['filename'])]);
        }
        return error($file_upload['message']);
    }

    protected function sortPage()
    {
        $page = $this->page;
        $page['type'] = 'Sort';

        $list_data = collect($this->list_data);

        $select = $this->listQuery($list_data);

        foreach ($select as $r) {
            foreach ($list_data->values() as $l) {
                if ($l['type'] == 'image') {
                    $r->{$l['field']} = '<a href="' . filePath($this->page['content'], $r->{$l['field']}) . '" data-lightbox="' . $l['field'] . '">
                        <img src="' . filePath($this->page['content'], $r->{$l['field']}) . '" width="20">
                        </a>';
                }

                if ($l['type'] == 'checkbox') {
                    if ($r->{$l['field']} == 1) {
                        $r->{$l['field']} = '<span class="label label-success">' . $l['label'] . '</span>';
                    } else {
                        $r->{$l['field']} = '<span class="label label-danger">' . $l['label'] . '</span>';
                    }
                }
            }
        }
        return view('admin.sort', compact('list_data', 'page', 'select'));
    }

    protected function sort(Request $request)
    {
        $data = $request->input('data');
        $seq = 0;

        foreach ($data as $r) {
            $this->model()->where('id', $r)->update(['seq' => $seq]);
            $seq++;
        }

        return success(['message' => 'Succeed']);
    }

    protected function galleryQuery($gallery_id_name, $id)
    {
        $gallery = $this->model_gallery()->where($gallery_id_name, $id)->get();
        foreach ($gallery as $g) {
            $g->image = filePath($this->page['content'], $g->image);
        }

        $count = $gallery->count();
        return compact('gallery', 'count');
    }

    protected function galleryUpload(Request $request)
    {
        $files = $request->file('gallery');
        $file_count = count($files);
        $count = 0;
        foreach ($files as $file) {
            $image = fileUpload($file, $this->page['content']);
            if ($image['success'] == true) {
                $data['image'] = $image['filename'];
                $data[$this->gallery_id_name] = $request->input('id');
                $this->model_gallery()->create($data);
            } else {
                return error('Upload Failed');
            }
            $count++;
        }
        if ($count == $file_count) {
            return success('Uploaded');
        }
    }

    protected function galleryDestroy($id)
    {
        $RoomImage = $this->model_gallery()->where('id', $id)->delete();
        if ($RoomImage) {
            return success('Deleted');
        } else {
            return error('Delete Failed');
        }
    }

}