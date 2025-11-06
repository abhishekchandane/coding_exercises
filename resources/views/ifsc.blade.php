<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IFSC Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4 text-center">🔍 IFSC Verification (Razorpay API)</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        <pre class="bg-white p-3 rounded">
{{ json_encode(session('bank_data'), JSON_PRETTY_PRINT) }}
        </pre>
    @endif

    <form method="POST" action="{{ route('ifsc.verify') }}" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label class="form-label">Enter IFSC Code</label>
            <input type="text" name="ifsc" class="form-control" placeholder="e.g. HDFC0001234" required>
        </div>
        <button class="btn btn-primary w-100">Verify IFSC</button>
    </form>
</div>
</body>
</html>
