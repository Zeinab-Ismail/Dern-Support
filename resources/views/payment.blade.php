<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('./css/bootstrap.min.css') }}>
    <title>Dern Support</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <h5 class="mb-3">Payment</h5>
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="amountOption" id="enterAmount">
                    <label class="form-check-label" for="enterAmount">
                        Enter amount
                    </label>
                    <input type="text" class="form-control mt-1" placeholder="0.00">
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="amountOption" id="unpaidBalance" checked>
                    <label class="form-check-label" for="unpaidBalance">
                        Unpaid balance <strong>${{ $ticket->price }}</strong>
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio"  id="card1" checked>
                    <label class="form-check-label" for="card1">
                        Ending in $8845 <br> 
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="card2">
                    <label class="form-check-label" for="card2">
                        Ending in $7172 <br> 
                    </label>
                </div>
            </div>

            <!-- Reference -->
            <div class="mb-3">
                <label class="form-label">Reference:</label>
                <input type="text" class="form-control" placeholder="Optionally,">
            </div>

            <div class="mb-3">
                <strong>Total:</strong> <span class="float-end">${{ $ticket->price }}</span>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href={{ route('tickets.index') }}>Cancel</a>
                <a class="btn text-light" style="background-color: rgb(59, 130, 246)" href={{ route('payment.process', $ticket->id) }}>Pay</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('./js/bootstrap.min.js') }}"></script>
</body>

</html>
