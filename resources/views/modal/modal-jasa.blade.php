<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tbody>
        @foreach($jasa_orders as $jo)
        <tr>
            <td>Order Name </td>
            <td>{{ $jo->portofolio_name }}</td>
        </tr>
        <tr>
            <td>Order Buyer </td>
            <td>{{ $jo->users_orders['name'] }}</td>
        </tr>
        <tr>
            <td>Order Lokasi </td>
            <td>{{ $jo->jasa_order_lokasi }}</td>
        </tr>
        <tr>
            <td>Order Phone </td>
            <td>{{ $jo->jasa_order_phone }}</td>
        </tr>
        <tr>
            <td>Order Note </td>
            <td>{{ $jo->jasa_order_note }}</td>
        </tr>
        <tr>
            <td>Order Created </td>
            <td>{{ date('F j, Y H:i a', strtotime($jo->created_at)) }}</td>
        </tr>
        <tr>
            <td>Order Deadline </td>
            <td>{{ date('F j, Y H:i a', strtotime($jo->jasa_order_deadline)) }}</td>
        </tr>
        <tr>
            <td>Order Price </td>
            <td>IDR {{ number_format($jo->users_orders_details['jasa_order_price'], 0) }}</td>
        </tr>
        <tr>
            <td>Order Discount </td>
            <td>IDR {{ number_format($jo->users_orders_details['jasa_order_discount'], 0) }}</td>
        </tr>
        <tr>
            <td>Admin Fees </td>
            <td>IDR {{ number_format($jo->users_orders_details['jasa_order_adminfees'], 0) }}</td>
        </tr>
        <tr>
            <td>Order Total </td>
            <td>IDR {{ number_format($jo->jasa_order_total, 0) }}</td>
        </tr>
        <tr>
            <td>Order Status </td>
            <td>{{ $jo->jasa_order_status }}</td>
        </tr>
        <tr>
            <td>Payment Type</td>
            <td>{{ $jo->jasa_payment_type }}</td>
        </tr>
        <tr>
            <td>Payment Status</td>
            <td></{{ $jo->users_orders_details['jasa_payment_status'] }}td>
        </tr>
        @endforeach
    </tbody>
</table>