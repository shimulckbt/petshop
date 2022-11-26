<div class="col-lg-3">
    <div id="order-summary" class="box">
        <div class="box-header">
            <h3 class="mb-0">Order summary</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have
            entered.</p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Order subtotal</td>
                        <th>{{ $subTotalPrice }} BDT</th>
                    </tr>
                    <tr>
                        <td>Shipping and handling</td>
                        <th>{{ $shippingPrice }} BDT</th>
                    </tr>
                    <tr class="total">
                        <td>Total</td>
                        <th>{{ $totalPrice }} BDT</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>