<tr>
    <th>SubTotal</th>
    <td class="product-subtotal">{{Cart::subtotal()}}</td>
</tr>
<tr>
    <th>VAT</th>
    <td class="product-subtotal">{{Cart::tax()}}</td>
</tr>
<tr>
    <th>Discount</th>
    <td class="product-subtotal">{{Cart::discount()}}</td>
</tr>
<tr>
    <th>Shipping</th>
    <td>{{ session()->get('shippingcharge') }}</td>
</tr>
<tr>
    <th>Total</th>
    <td class="product-subtotal">{{Cart::total()+session()->get('shippingcharge')}}</td>
</tr>