<?php

namespace App\Http\Controllers;

use App\Models\ContactMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'sender_name' => 'required|string|max:100',
            'sender_contact' => 'required|string|max:100',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:1000',
        ]);

        try {
            // Create contact message
            $contactMessage = ContactMessages::create([
                'sender_name' => $request->sender_name,
                'sender_contact' => $request->sender_contact,
                'subject' => $request->subject,
                'message' => $request->message,
                'user_id' => Auth::id(),
            ]);

            // Success message with more details
            $successMessage = "پیام شما با موفقیت ارسال شد! شماره پیام: #" . $contactMessage->id;
            
            return redirect()->back()->with('success', $successMessage);
            
        } catch (\Exception $e) {
            // Error handling
            return redirect()->back()
                ->with('error', 'خطا در ارسال پیام. لطفاً دوباره تلاش کنید.')
                ->withInput();
        }
    }

    public function userChats()
    {
        $chats = ContactMessages::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('user.chats', compact('chats'));
    }

    public function showChat($id)
    {
        $chat = ContactMessages::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        return view('user.chat-show', compact('chat'));
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $chat = ContactMessages::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Create reply message
        ContactMessages::create([
            'sender_name' => Auth::user()->name,
            'sender_contact' => Auth::user()->email,
            'subject' => 'پاسخ به: ' . $chat->subject,
            'message' => $request->message,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'پاسخ شما ارسال شد!');
    }

    public function closeChat($id)
    {
        $chat = ContactMessages::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Update status to closed (you might need to add a status column)
        // $chat->update(['status' => 'closed']);

        return redirect()->back()->with('success', 'چت بسته شد!');
    }

    public function getNewMessages($id)
    {
        $messages = ContactMessages::where('parent_id', $id)
            ->where('user_id', Auth::id())
            ->where('is_read', false)
            ->get();

        return response()->json($messages);
    }
} 