<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bank Account Verification</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
  <div class="container">
    <h2 class="mb-4 text-center">🏦 Cashfree Sandbox - Bank Account Verification</h2>

    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('result'))
      <div class="alert alert-success">✅ Verification Completed</div>
      <pre class="bg-white p-3 rounded">{{ json_encode(session('result'), JSON_PRETTY_PRINT) }}</pre>
    @endif

    <form method="POST" action="{{ route('bank.verify') }}" class="card p-4 shadow-sm">
      @csrf
      <div class="mb-3">
        <label>Name as per Bank</label>
        <input type="text" name="name" class="form-control" required placeholder="e.g. Abhishek Chandane">
      </div>

      <div class="mb-3">
        <label>Bank Account Number</label>
        <input type="text" name="account" class="form-control" required placeholder="e.g. 123456789012">
      </div>

      <div class="mb-3">
        <label>IFSC Code</label>
        <input type="text" name="ifsc" class="form-control" required placeholder="e.g. HDFC0001234">
      </div>

      <button class="btn btn-primary w-100">Verify Account</button>
    </form>
  </div>
</body>
</html>
