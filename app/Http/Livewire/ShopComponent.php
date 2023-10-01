<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopComponent extends Component
{
    public function store($sellerSlug, $productSlug, $quantity)
    {
        Cart::add($productSlug, $sellerSlug, $quantity);
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('cart');
    }
}
