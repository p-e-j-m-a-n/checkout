<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Checkout extends Component
{
    public $user;
    public $amount;
    public $order_id;
    public $cards;
    public $newCard;

    protected $rules = [
        'newCard' => 'required|integer|digits:16',
    ];

    protected $messages = [
        'newCard.required' => 'شماره کارت را وارد کنید!!',
        'newCard.integer' => 'شماره کارت باید عددی باشد!!',
        'newCard.digits' => 'شماره کارت باید 16 رقم باشد!!',
    ];

    public function render()
    {
        return view('payment.checkout');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->amount = 5000;
        $this->order_id = Str::orderedUuid()->toString();
        $this->cards = $this->user->cards ?? [];
        $this->newCard = null;
    }

    public function updated()
    {
        $this->resetErrorBag();
    }

    public function addCard()
    {
        $this->validate();
        Card::create([
            'card_number' => $this->newCard,
            'confirmed' => true,
            'owner_id' => $this->user->id,
        ]);
        $this->mount();
        session()->flash('success', 'کارت اعتباری با موفقیت ثبت شد!');
    }
}
