@extends('layouts.app')

@section('title', 'Home - School Payment System')

@section('content')
<div class="row">
    <!-- Welcome Section -->
    <div class="col-12">
        <div class="card mb-4 bg-gradient text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="card-body text-center py-5">
                <i class="fas fa-graduation-cap fa-4x mb-3"></i>
                <h1 class="display-4 mb-3">School Payment System</h1>
                <p class="lead mb-4">Manage student payments efficiently and securely</p>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <a href="{{ route('payments.index') }}" class="btn btn-light btn-lg me-3">
                            <i class="fas fa-list me-2"></i>View Payments 
                        </a>
                        <a href="{{ route('payments.create') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-plus me-2"></i>New Payment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Quick Actions -->
    <div class="col-md-4 mb-4">
        <div class="card payment-card h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="fas fa-plus-circle fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Add New Payment</h5>
                <p class="card-text text-muted">
                    Record a new student payment quickly and easily with our streamlined form.
                </p>
                <a href="{{ route('payments.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create Payment
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card payment-card h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="fas fa-list-alt fa-3x text-success"></i>
                </div>
                <h5 class="card-title">View All Payments</h5>
                <p class="card-text text-muted">
                    Browse through all payment records with detailed information and statistics.
                </p>
                <a href="{{ route('payments.index') }}" class="btn btn-success">
                    <i class="fas fa-eye me-2"></i>View Payments
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card payment-card h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="fas fa-chart-bar fa-3x text-info"></i>
                </div>
                <h5 class="card-title">Payment Analytics</h5>
                <p class="card-text text-muted">
                    Get insights and analytics about payment trends and student data.
                </p>
                <a href="{{ route('payments.index') }}" class="btn btn-info">
                    <i class="fas fa-chart-line me-2"></i>View Analytics
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-star me-2"></i>
                    System Features
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-shield-alt fa-2x text-success me-3"></i>
                            </div>
                            <div>
                                <h6>Secure & Reliable</h6>
                                <p class="text-muted mb-0">
                                    Built with Laravel's robust security features to protect sensitive payment data.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-users fa-2x text-primary me-3"></i>
                            </div>
                            <div>
                                <h6>Student Management</h6>
                                <p class="text-muted mb-0">
                                    Track payments by student matricule with unique identification system.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-mobile-alt fa-2x text-warning me-3"></i>
                            </div>
                            <div>
                                <h6>Responsive Design</h6>
                                <p class="text-muted mb-0">
                                    Access the system from any device with our mobile-friendly interface.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-clock fa-2x text-info me-3"></i>
                            </div>
                            <div>
                                <h6>Real-time Updates</h6>
                                <p class="text-muted mb-0">
                                    Payment records are updated instantly with timestamp tracking.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card bg-light">
            <div class="card-body text-center">
                <h6 class="text-muted mb-3">Quick Access</h6>
                <div class="btn-group" role="group">
                    <a href="{{ route('payments.create') }}" class="btn btn-outline-primary">
                        <i class="fas fa-plus me-1"></i>Add Payment
                    </a>
                    <a href="{{ route('payments.index') }}" class="btn btn-outline-success">
                        <i class="fas fa-list me-1"></i>All Payments
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
