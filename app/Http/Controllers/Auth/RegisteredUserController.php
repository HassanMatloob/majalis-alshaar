<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Agency;
use Illuminate\View\View;
use App\Enums\AgencyStatus;
use Illuminate\Http\Request;
use App\Models\AgencyDocument;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('pages.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(route('admin.dashboard', absolute: false));
    // }

    public function store(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'phone' => ['required', 'string', 'max:255'],
                'agency_name' => ['required', 'string', 'max:255'],
                'number_of_listing' => ['required', 'integer'],
                'country' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'document' => ['required', 'array'],
            ]);
    
            $agencyRequest = Agency::create([
                'agency_name' => $request->agency_name,
                'contact_person_first_name' => $request->first_name,
                'contact_person_last_name' => $request->last_name,
                'phone_number' => $request->phone,
                'email' => $request->email,
                'number_of_listing' => $request->number_of_listing,
                'country' => $request->country,
                'city' => $request->city,
                'status' => AgencyStatus::PENDING
            ]);

            Mail::send('mails.agency_registered', [], function ($message) use ($request) {
                $message->from(config('mail.from.address'));
                $message->to($request->email);
                $message->subject('Account Under Review');
            });
    
            foreach ($request->input('document', []) as $file) {
                AgencyDocument::create([
                    'file_name' => $file,
                    'file_path' => 'uploads/agencies/documents/' . $file,
                    'agency_id' => $agencyRequest->id
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Your registration request has been submitted successfully. Please wait for the admin to approve your registration.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.' . $e->getMessage());
        }
    }

    public function storeDocument(Request $request) {
        $path = public_path('uploads/agencies/documents');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
