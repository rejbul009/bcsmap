<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body {
            color: #008374; /* Set text color of body */
        }
        .payment-details {
            margin-bottom: 20px;
        }
        .amount {
            display: block;
            margin-top: 5px;
            font-weight: bold;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-copy {
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="bg-light p-3 p-md-4 rounded">
        <label for="wallet" class="form-label">বিকাশ পেমেন্ট অপশন ব্যবহার করতে হবে:</label>
        <div class="payment-details">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">বিকাশ পেমেন্ট নাম্বার :</span>
        <span class="form-control">01742014282</span>
        <button class="btn btn-outline-secondary btn-copy" type="button" onclick="copyPhoneNumber()">Copy</button>
    </div>
    <div>
        <span class="amount">1000.00</span>
    </div>
</div>
        
        
<form method="POST" action="{{ route('process.payment') }}">
    @csrf
    <div class="mb-3">
        <input type="text" name="mobile_no" class="form-control" placeholder="যে নাম্বার থেকে পেমেন্ট করা হয়েছে">
    </div>
    <div class="mb-3">
        <label for="txid" class="form-label">Transaction ID (payment trnx no):</label>
        <input type="text" name="transaction_id" class="form-control" placeholder="10 characters">
    </div>
    <input type="hidden" name="success" value="true">
    <input type="hidden" name="active" value="true">
    <p class="fs-6 mt-4">Please recheck all information that is written in the deposit fields. If the relevant payment information like: [ TxID, No.] is wrong - the transaction can be delayed.</p>
    <button type="submit" class="btn btn-primary mt-3">CONFIRM</button>
</form>

    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function copyPhoneNumber() {
        var phoneNumber = "01742014282"; // Replace with your actual phone number
        navigator.clipboard.writeText(phoneNumber)
            .then(() => {
                alert('Phone number copied!');
            })
            .catch(err => {
                console.error('Failed to copy: ', err);
            });
    }
</script>
</body>
</html>