@if (session('cartAdded') == $product->id)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Product added into cart</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('cartExist') == $product->id)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Product already exists in cart</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
