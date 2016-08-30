<?php

namespace Raspberium\Http\Controllers;

class ActionsController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'actions',
            'title' => 'Raspberium - Actions',
            'description' => 'Available actions.'
        ];

        return response()->view('actions', $data, 200);
    }
}
