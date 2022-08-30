<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Tax Invoice</title>
    <link rel="shortcut icon" type="image/RMGH.png" href="./RMGH.png" />
    <style>
        * {
            box-sizing: border-box;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            word-break: break-all;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        .h4-14 h4 {
            font-size: 12px;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .img {
            margin-left: "auto";
            margin-top: "auto";
            height: 30px;
        }

        pre,
        p {
            /* width: 99%; */
            /* overflow: auto; */
            /* bpicklist: 1px solid #aaa; */
            padding: 0;
            margin: 0;
        }

        table {
            font-family: arial, sans-serif;
            width: 80%;
            border-collapse: collapse;
            padding: 1px;
        }

        .hm-p p {
            text-align: left;
            padding: 1px;
            padding: 5px 4px;
        }

        td,
        th {
            text-align: left;
            padding: 8px 6px;
        }

        .table-b td,
        .table-b th {
            border: 1px solid #ddd;
        }

        th {
            /* background-color: #ddd; */
        }

        .hm-p td,
        .hm-p th {
            padding: 3px 0px;
        }

        .cropped {
            float: right;
            margin-bottom: 20px;
            height: 100px;
            /* height of container */
            overflow: hidden;
        }

        .cropped img {
            width: 300px;
            margin: 8px 0px 0px 80px;
        }

        .main-pd-wrapper {
            box-shadow: 0 0 10px #ddd;
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 15px;
            font-size: 14px;
        }

        .invoice-items {
            font-size: 14px;
            border-top: 1px dashed #ddd;
        }

        .invoice-items td {
            padding: 10px 0;

        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }

        @page {
            margin: 0;
        }
    </style>
</head>

<body>
    {{-- @php
        $discount = 0;
        $payment = 0;
        $payment_due = 0;
        foreach ($order->customers as $key => $value) {
            $discount += $value->discount;
            $payment_due += $value->due_amount;
            $payment += $value->pay_amount;
        }
    @endphp --}}
    <section class="main-pd-wrapper" style="width: 350px; margin: auto">
        <div
            style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                  <!--margin: 12px auto;-->
                ">
            <p style="font-weight: bold; color: #000; margin-top: 15px; font-size: 15px;">
                Razwan Mollah Pharmacy
            </p>
            <p style="font-weight: bold; color: #000;  font-size: 15px;">
                C&B Ghat Road <br>
                Faridpur Sadar, Faridpur
            </p>
            <p>
            <p style="font-weight: bold; color: #000;  font-size: 15px;">Help Line:</b> +8801700778311 </p>
            <p style="font-weight: bold; color: #000; font-size: 15px;">Customer:
                {{ $order->customer->name }}</p>

            <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
        </div>
        <table style="width: 100%; table-layout: fixed">
            <thead>
                <tr>
                    <th style="width: 30px; padding-left: 0;">Sn.</th>
                    <th style="width: 100px; padding-left: 0;">Medicine</th>
                    <th style="padding-left: 0;">QTY</th>
                    <th style="padding-left: 0;">Price</th>
                    <th style="padding-left: 0;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as  $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->medicine->name }}</td>
                        <td>{{ number_format($item->quantity) }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ number_format($item->total, 2) }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        <table style="width: 100%;
              background: #fcbd024f;
              border-radius: 4px;">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align: center;">Item ({{ $orderItems->sum('quantity') }})</th>
                    <th>Subtotal: {{ $order->subtotal }}</th>
                </tr>
            </thead>

        </table>

        <p style="margin-top: 5px">Discount: {{ $order->discount }}%</p>
        <p style="margin-top: 5px">GrandTotal: {{ $order->grandtotal }}</p>

        <button id="btnPrint" class="hidden-print " style="margin-top: 20px;">Print</button>

    </section>

    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>
</body>

</html>

