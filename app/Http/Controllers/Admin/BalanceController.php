<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;
use App\Models\Historic;

class BalanceController extends Controller
{
    private $totalPages = 5;

    public function index()
    {
        $this->verificaAcesso('Ver Saldo');

        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if ($response['success']) {
            return redirect()->route('admin.balance')->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if ($response['success']) {
            return redirect()->route('admin.balance')->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }

    public function transfer()
    {
        $this->verificaAcesso('Transferir');
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user)
    {
        $this->verificaAcesso('Transferir');
        if (!$sender = $user->getSender($request->sender)) {
            return redirect()
                    ->back()
                    ->with('error', 'Usuário informado não encontrado!');
        }

        if ($sender->id === auth()->user()->id) {
            return redirect()
                    ->back()
                    ->with('error', 'Não é possível transferir para você mesmo!');
        }

        $balance = auth()->user()->balance;

        return view('admin.balance.transfer-confirm', compact('sender', 'balance'));
    }

    public function transferStore(MoneyValidationFormRequest $request, User $user)
    {
        $this->verificaAcesso('Transferir');

        if (!$sender = $user->find($request->sender_id)) {
            return redirect()
                        ->route('admin.balance')
                        ->with('success', 'Recebedor não encontrado!');
        }

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $sender);

        if ($response['success']) {
            return redirect()->route('admin.balance')->with('success', $response['message']);
        }

        return redirect()->route('balance.transfer')->with('error', $response['message']);
    }

    public function historic(Historic $historic)
    {
        $this->verificaAcesso('Ver Historico');

        $historics = $historic->first();
        
        $historics = $historic::paginate($this->totalPages);
        auth()->user()->historics()->with(['userSender'])->paginate($this->totalPages);
        
        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types'));
        
    }

    public function searchHistoric(Request $request, Historic $historic)
    {
        $dateForm = $request->except('_token');

        $historics = $historic->search($dateForm, $this->totalPages);

        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types', 'dateForm'));
    }

    public function verificaAcesso($acesso){
        if (!auth()->user()->hasPermissionTo($acesso))
         {
                abort('401');
            }
    }
}
