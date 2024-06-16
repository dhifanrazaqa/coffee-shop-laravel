<!DOCTYPE html>
<html>

<head>
    <title>Product Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Product Report "The Coffee Cave"</h1>
    <p>Report Date Range: {{ \Carbon\Carbon::parse($startDate)->isoFormat('DD MMMM YYYY') }} to
        {{ \Carbon\Carbon::parse($endDate)->isoFormat('DD MMMM YYYY') }}</p>
    <table class="w-full table">
        <thead class="bproduct-b-2 border-2 bg-app_grey_high border-app_primary text-app_primary">
            <tr class="text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Unit Price</th>
                <th>Total Quantity</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="text-center bproduct-b-2 bproduct-app_primary border-2 border-app_primary">
                    <td class="w-4 p-2 border-2 border-app_primary">#{{ $product->id }}</td>
                    <td class="w-24 p-2 border-2 border-app_primary">{{ $product->title }}</td>
                    <td class="w-24 p-2 border-2 border-app_primary">
                        {{ $product->category->title }}
                    <td class="w-24 border-2 p-2 border-app_primary">
                        Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="w-6 border-2 p-2 border-app_primary">
                        {{ $product->total_quantity ? $product->total_quantity : '0' }}</td>
                    <td class="w-24 border-2 p-2 border-app_primary">
                        Rp{{ number_format($product->total_revenue, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total</td>
                <td>{{ $totalQuantity }}</td>
                <td>Rp{{ number_format($totalRevenue, 2, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
