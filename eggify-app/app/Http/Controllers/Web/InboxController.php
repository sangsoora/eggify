<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Budget;
use App\Models\BudgetMessage;
use App\Models\BudgetStatus;
use App\Models\Note;
use App\Models\Operator;
use App\Models\OperatorCompany;
use App\Models\OperatorEmployee;
use App\Models\OperatorJob;
use App\Models\OperatorJobTag;
use App\Models\OperatorPosition;
use App\Models\Provider;
use App\Models\ProviderCategory;
use App\Models\ProviderCompany;
use App\Models\ProviderEmployee;
use App\Models\ProviderType;
use App\Models\Role;
use App\Models\User;
use App\Models\UserType;
use Carbon\Carbon;
use Database\Seeders\BudgetsUsersTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InboxController extends Controller
{
    //

    public function index(Request $request)
    {
        $bodyClass = 'page-messages';

        if (!(auth()->check())) {
            return redirect()->route('web.index');
        }

        $user = User::findOrFail(auth()->user()->id);
        $messages = BudgetMessage::where('user_to_id', $user->id)->get();

        return view('web.inbox', compact('bodyClass', 'user', 'messages'));
    }

    public function messageGet(Request $request, $id)
    {
        $bodyClass = 'page-messages';

        if (!(auth()->check())) {
            return redirect()->route('web.index');
        }

        $user = User::findOrFail(auth()->user()->id);
        $message = BudgetMessage::findOrFail($id);

        return view('web.message', compact('bodyClass', 'user', 'message'));
    }

    public function messageStore(Request $request)
    {
        $arrMessage = [
            'message' => $request->message,
            'user_from_id' => auth()->user()->id,
            'user_to_id' => $request->user_to_id,
            'budget_id' => $request->budget_id,
        ];

        $message = BudgetMessage::create($arrMessage);

        return response()->json(array(
            'status' => 200,
            'message' => ''
        ));
    }
}
