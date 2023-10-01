<div class="w-32 h-10 custom-number-input">
    <div class="relative flex items-center px-2 border border-black rounded-lg">
        <div data-action="decrement" class="flex items-center justify-center h-6 text-gray-600 bg-white border border-black rounded-full outline-none cursor-pointer w-14 hover:text-gray-700 hover:bg-gray-400" onclick="decrement(this)">
            <span class="text-lg font-thin">-</span>
        </div>

        <input type="number" id="quantity" min="0" name="quantity" class="flex items-center w-full font-semibold text-center text-gray-700 bg-white border-none outline-none focus:outline-none text-md hover:text-black focus:text-black" name="custom-input-number" value="{{ $value }}"/>

        <div data-action="increment" class="flex items-center justify-center h-6 text-gray-600 bg-white border border-black rounded-full cursor-pointer w-14 hover:text-gray-700 hover:bg-gray-400" onclick="increment(this)">
            <span class="text-lg font-thin">+</span>
        </div>
    </div>
</div>

@section("styles")
<style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .custom-number-input input:focus {
      outline: none !important;
    }

    .custom-number-input div:focus {
      outline: none !important;
    }
</style>
@endsection

@push("scripts")
<script>
    const stock = {{ $stock }};
    function decrement(element) {
        const btn = element;
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if (value <= 0) {
            value = 0;
        } else {
            value--;
        }
        target.value = value;
    }

    function increment(element) {
        const btn = element;
        const target = btn.previousElementSibling;

        let value = Number(target.value);
        if (value < 0) {
            value = 0;
        } else if (value >= {{ $stock }}){

        } else {
            value++;
        }
        target.value = value;
    }
</script>
@endpush
