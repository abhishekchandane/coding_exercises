<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ApyHub Bank Verification</title>
  <style>
    body { font-family: Arial; margin: 30px; background: #f5f5f5; }
    .card { background: white; padding: 20px; border-radius: 10px; width: 400px; }
    input, button { padding: 10px; margin: 5px; width: 95%; }
    button { background: #007bff; color: white; border: none; cursor: pointer; }
    .result, .error { margin-top: 20px; background: #eee; padding: 15px; border-radius: 8px; }
  </style>
</head>
<body>
  <h2>🏦 ApyHub Bank Verification</h2>
  <div class="card">
        <form method="POST" action="{{ route('bank.verify.apy') }}">
            @csrf
            <input name="name" placeholder="Account Holder Name" required>
            <input name="account" placeholder="Bank Account Number" required>
            <input name="ifsc" placeholder="IFSC Code (e.g. HDFC0001234)" required>
            <button type="submit">Verify Account</button>
        </form>


    @if(session('error'))
      <div class="error">{{ session('error') }}</div>
    @endif

    @if(session('result'))
      <div class="result">
        <pre>{{ json_encode(session('result'), JSON_PRETTY_PRINT) }}</pre>
      </div>
    @endif
  </div>
</body>
</html>
