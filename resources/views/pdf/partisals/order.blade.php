<div class="container"> 
    <h2>PDF Slip Generation</h2>
    <h4>Order Details</h4>
    <div class="card p-3 mb-3 mx-auto" style="width: 30%">
        <p><strong>Order ID:</strong> {{ $oder['order_id'] }}</p>
        <p><strong>Customer Name:</strong> {{ $oder['customer_name'] }}</p>
        <p><strong>Customer Email:</strong> {{ $oder['customer_email'] }}</p>
        <p><strong>Customer Phone:</strong> {{ $oder['customer_phone'] }}</p>
        <p><strong>Customer Address:</strong> {{ $oder['customer_address'] }}</p>
        <p><strong>Order Date:</strong> {{ $oder['order_date'] }}</p>
        <h4>Order Items</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($oder['items'] as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p><strong>Total Amount:</strong> {{ $oder['total_amount'] }}</p>


       
    </div>
</div>