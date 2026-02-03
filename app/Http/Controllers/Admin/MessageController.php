<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use DataTables;

class MessageController extends Controller
{
    public function index() {
        return view('admin.messages.list');
    }

    public function fetch (Request $request) {
        if ($request->ajax()) {
            $messages = Message::latest()->get();

            return DataTables::of($messages)
                ->addColumn('check', function ($message) {
                    return '<input type="checkbox" name="ids[]" value="' . $message->id . '" class="checkbox">';
                })
                ->addColumn('date', function ($message) {
                    return '<span class="pt-10 text-sm font-medium text-secondary">' . $message  ->created_at->format('d M, Y') ?? '-' . '</span>';
                })
                ->addColumn('name', function ($message) {
                    return '<span class="pt-10 text-sm font-medium text-secondary">' . $message  ->name ?? '-' . '</span>';
                })
                ->addColumn('phone_number', function ($message) {
                    return '<span class="pt-10 text-sm font-medium text-primary">' .$message->phone_number ?? '-' . '</span>';
                })
                ->addColumn('email', function ($message) {
                    return '<span class="pt-10 text-sm text-black font-medium">' . $message->email ?? '-' . '</span>';
                })
                ->addColumn('subject', function ($message) {
                    return '<span class="pt-10 text-sm text-black font-medium">' . $message->subject ?? '-' . '</span>';
                })
                ->addColumn('message', function ($message) {
                    return '<span class="pt-10 text-sm text-black font-medium">' . $message->message ?? '-' . '</span>';
                })
                ->addIndexColumn()
                ->rawColumns(['check', 'date', 'name', 'phone_number', 'email', 'subject', 'message'])
                ->make(true);
        }
    }
}
