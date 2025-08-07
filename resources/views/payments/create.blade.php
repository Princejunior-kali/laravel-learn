@extends('layouts.app')

@section('title', 'Create New Payment - School Payment System')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-plus-circle me-2"></i>
                    Create New Payment
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('payments.store') }}" method="POST" id="paymentForm">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="matricule" class="form-label">
                                    <i class="fas fa-id-card me-1"></i>
                                    Student Matricule <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('matricule') is-invalid @enderror" 
                                       id="matricule" 
                                       name="matricule" 
                                       value="{{ old('matricule') }}"
                                       placeholder="Enter student matricule"
                                       required>
                                @error('matricule')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Enter the unique student identification number
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">
                                    <i class="fas fa-dollar-sign me-1"></i>
                                    Payment Amount <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" 
                                           class="form-control @error('amount') is-invalid @enderror" 
                                           id="amount" 
                                           name="amount" 
                                           value="{{ old('amount') }}"
                                           placeholder="0.00"
                                           step="0.01"
                                           min="0"
                                           required>
                                    @error('amount')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Enter the payment amount (minimum: $0.00)
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Summary -->
                    <div class="card bg-light mb-3" id="paymentSummary" style="display: none;">
                        <div class="card-body">
                            <h6 class="card-title">
                                <i class="fas fa-receipt me-2"></i>
                                Payment Summary
                            </h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Student:</strong> <span id="summaryMatricule">-</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Amount:</strong> $<span id="summaryAmount">0.00</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Back to Payments
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-undo me-2"></i>
                                Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Create Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Help Card -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-question-circle me-2"></i>
                    Need Help?
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="fas fa-id-card me-1"></i> Matricule Guidelines:</h6>
                        <ul class="small">
                            <li>Must be unique for each student</li>
                            <li>Cannot be changed once created</li>
                            <li>Used as the primary identifier</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-dollar-sign me-1"></i> Payment Guidelines:</h6>
                        <ul class="small">
                            <li>Amount must be greater than $0.00</li>
                            <li>Use decimal format (e.g., 150.50)</li>
                            <li>Maximum 2 decimal places</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const matriculeInput = document.getElementById('matricule');
    const amountInput = document.getElementById('amount');
    const paymentSummary = document.getElementById('paymentSummary');
    const summaryMatricule = document.getElementById('summaryMatricule');
    const summaryAmount = document.getElementById('summaryAmount');

    function updateSummary() {
        const matricule = matriculeInput.value.trim();
        const amount = parseFloat(amountInput.value) || 0;

        if (matricule && amount > 0) {
            summaryMatricule.textContent = matricule;
            summaryAmount.textContent = amount.toFixed(2);
            paymentSummary.style.display = 'block';
        } else {
            paymentSummary.style.display = 'none';
        }
    }

    matriculeInput.addEventListener('input', updateSummary);
    amountInput.addEventListener('input', updateSummary);

    // Form validation
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        const matricule = matriculeInput.value.trim();
        const amount = parseFloat(amountInput.value);

        if (!matricule) {
            e.preventDefault();
            matriculeInput.focus();
            alert('Please enter a student matricule.');
            return;
        }

        if (!amount || amount <= 0) {
            e.preventDefault();
            amountInput.focus();
            alert('Please enter a valid payment amount greater than $0.00.');
            return;
        }
    });

    // Reset form functionality
    document.querySelector('button[type="reset"]').addEventListener('click', function() {
        setTimeout(function() {
            paymentSummary.style.display = 'none';
        }, 100);
    });
});
</script>
@endsection
