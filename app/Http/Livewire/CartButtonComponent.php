<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartButtonComponent extends Component
{

    public $sellerSlug;
    public $productSlug;
    public $quantity;
    public $price;

    public function addToCart()
    {
        Cart::add($this->productSlug, $this->sellerSlug, $this->quantity, $this->price);
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('cart');
    }

    public function render()
    {
        return view('livewire.cart-button-component');
    }
}
