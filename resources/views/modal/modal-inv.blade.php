<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tbody>
        @foreach($inv_orders as $jo)
        <tr>
            <td>Order Name </td>
            <td>{{ $jo->portofolio_name }}</td>
        </tr>
        <tr>
            <td>Order Buyer </td>
            <td>{{ $jo->users_inv_orders['name'] }}</td>
        </tr>
        <tr>
            <td>Order Type </td>
            <td>{{ $jo->inv_order_type }}</td>
        </tr>
        <tr>
            <td>Order Links </td>
            <td>{{ $jo->inv_order_links }}</td>
        </tr>
        <tr>
            <td>Order Created </td>
            <td>{{ date('F j, Y H:i a', strtotime($jo->created_at)) }}</td>
        </tr>
        <tr>
            <td>Order Ended </td>
            <td>{{ date('F j, Y H:i a', strtotime($jo->inv_order_ended)) }}</td>
        </tr>
        <tr>
            <td>Order Price </td>
            <td>IDR {{ number_format($jo->inv_orders_details['inv_order_price'], 0) }}</td>
        </tr>
        <tr>
            <td>Order Discount </td>
            <td>IDR {{ number_format($jo->inv_orders_details['inv_order_discount'], 0) }}</td>
        </tr>
        <tr>
            <td>Admin Fees </td>
            <td>IDR {{ number_format($jo->inv_orders_details['inv_order_adminfees'], 0) }}</td>
        </tr>
        <tr>
            <td>Order Total </td>
            <td>IDR {{ number_format($jo->inv_order_total, 0) }}</td>
        </tr>
        <tr>
            <td>Order Status </td>
            <td>{{ $jo->inv_order_status }}</td>
        </tr>
        <tr>
            <td>Payment Type</td>
            <td>{{ $jo->inv_orders_details['inv_payment_type'] }}</td>
        </tr>
        <tr>
            <td>Payment Status</td>
            <td>{{ $jo->inv_orders_details['jasa_payment_status'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>