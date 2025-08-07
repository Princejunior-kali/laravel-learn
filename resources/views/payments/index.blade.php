@extends('layouts.app')

@section('title', 'All Payments - School Payment System')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-dark">
                <i class="fas fa-credit-card me-2"></i>
                Payment Records
            </h2>
            <a href="{{ route('payments.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Payment
            </a>
        </div>

        @if($payments->count() > 0)
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card payment-card bg-primary text-white">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x mb-2"></i>
                            <h4>{{ $payments->count() }}</h4>
                            <p class="mb-0">Total Students</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card payment-card bg-success text-white">
                        <div class="card-body text-center">
                            <i class="fas fa-dollar-sign fa-2x mb-2"></i>
                            <h4>${{ number_format($payments->sum('amount'), 2) }}</h4>
                            <p class="mb-0">Total Amount</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card payment-card bg-info text-white">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line fa-2x mb-2"></i>
                            <h4>${{ number_format($payments->avg('amount'), 2) }}</h4>
                            <p class="mb-0">Average Payment</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments Table -->
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-list me-2"></i>
                        Payment Details
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-id-card me-1"></i>Matricule</th>
                                    <th><i class="fas fa-dollar-sign me-1"></i>Amount</th>
                                    <th><i class="fas fa-calendar me-1"></i>Date Created</th>
                                    <th><i class="fas fa-clock me-1"></i>Last Updated</th>
                                    <th><i class="fas fa-cogs me-1"></i>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>
                                            <strong class="text-primary">{{ $payment->matricule }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge bg-success fs-6">
                                                ${{ number_format($payment->amount, 2) }}
                                            </span>
                                        </td>
                                        <td>
                                            <i class="fas fa-calendar-alt me-1 text-muted"></i>
                                            {{ $payment->created_at ? $payment->created_at->format('M d, Y') : 'N/A' }}
                                        </td>
                                        <td>
                                            <i class="fas fa-clock me-1 text-muted"></i>
                                            {{ $payment->updated_at ? $payment->updated_at->format('M d, Y H:i') : 'N/A' }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                                        data-bs-toggle="tooltip" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-warning"
                                                        data-bs-toggle="tooltip" title="Edit Payment">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="tooltip" title="Delete Payment">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="card text-center py-5">
                <div class="card-body">
                    <i class="fas fa-credit-card fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">No Payments Found</h4>
                    <p class="text-muted mb-4">There are no payment records in the system yet.</p>
                    <a href="{{ route('payments.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Create First Payment
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection
