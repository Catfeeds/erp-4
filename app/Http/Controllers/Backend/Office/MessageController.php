<?php namespace App\Http\Controllers\Backend\Office;

use Carbon\Carbon;
use App\Models\Office\Message;
use App\Models\Office\Participant;
use App\Models\Office\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Services\PusherWrapper as Pusher;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;

class MessageController extends Controller
{
    public function view()
    {   
        $name = Auth::user();
        // dd($name);
        $currentUserId = Auth::user()->id;
        // All threads that user is participating in
        $threads = Thread::forUser($currentUserId)->get();
        return view('backend.office.messenger.index', compact('threads', 'currentUserId'));
    }

    public function index()
    {   
        $name = Auth::user();
        // dd($name);
        $currentUserId = Auth::user()->id;
        // All threads that user is participating in
        $threads = Thread::forUser($currentUserId)->get();
        return view('backend.office.messenger.index', compact('threads', 'currentUserId'));
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('backend.office.messages');
        }
        // don't show the current user in list
        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('backend.office.messenger.show', compact('thread', 'users'));
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('backend.office.messenger.create', compact('users'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Message
        $message = Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipants($input['recipients']);
        }
        // $this->oooPushIt($message);
        return redirect('/admin/luster/messages');
    }
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('/admin/office/messages');
        }
        $thread->activateAllParticipants();
        // Message
        $message = Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );
        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipants(Input::get('recipients'));
        }
        // $this->oooPushIt($message);
        return redirect('/admin/office/messages/' . $id);
    }
    /**
     * Send the new message to Pusher in order to notify users.
     *
     * @param Message $message
     */
    protected function oooPushIt(Message $message)
    {
        $thread = $message->thread;
        $sender = $message->user;
        $data = [
            'thread_id' => $thread->id,
            'div_id' => 'thread_' . $thread->id,
            'sender_name' => $sender->first_name,
            'thread_url' => route('messages.show', ['id' => $thread->id]),
            'thread_subject' => $thread->subject,
            'html' => view('messenger.html-message', compact('message'))->render(),
            'text' => str_limit($message->body, 50),
        ];
        $recipients = $thread->participantsUserIds();
        if (count($recipients) > 0) {
            foreach ($recipients as $recipient) {
                if ($recipient == $sender->id) {
                    continue;
                }
                
                $this->pusher->trigger('for_user_' . $recipient, 'new_message', $data);
            }
        }
    }
    /**
     * Mark a specific thread as read, for ajax use.
     *
     * @param $id
     */
    public function read($id)
    {
        $thread = Thread::find($id);
        if (!$thread) {
            abort(404);
        }
        $thread->markAsRead(Auth::id());
    }
    /**
     * Get the number of unread threads, for ajax use.
     *
     * @return array
     */
    public function unread()
    {
        $count = Auth::user()->newMessagesCount();
        return ['msg_count' => $count];
    }
}

