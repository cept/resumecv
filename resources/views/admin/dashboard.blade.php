@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card text-bg-primary mb-4">
                <div class="card-body d-flex align-items-center">
                    <div class="col-2 fs-1">
                        <i class="bi bi-person-check"></i>
                        
                    </div>
                    <div>
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text"><strong class="fs-4">{{ $totalUsers }}</strong> user yang sudah terdaftar.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-success mb-4">
                <div class="card-body d-flex align-items-center">
                    <div class="col-2 fs-1">
                        <i class="bi bi-file-earmark-diff"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Total Resumes</h5>
                        <p class="card-text"><strong class="fs-4">{{ $totalResumes }}</strong> resume yang sudah dibuat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    User Registration Statistics
                </div>
                <div class="card-body">
                    <canvas id="userChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Resume Creation Statistics
                </div>
                <div class="card-body">
                    <canvas id="resumeChart"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    var resumeData = @json($resumeData);
    var userData = @json($userData);

    var ctxResume = document.getElementById('resumeChart').getContext('2d');
    var resumeChart = new Chart(ctxResume, {
        type: 'line',
        data: {
            labels: resumeData.months,
            datasets: [{
                label: 'Total Resumes',
                data: resumeData.resumeCounts,
                borderColor: 'rgba(0, 255, 0, 0.6)',
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctxUser = document.getElementById('userChart').getContext('2d');
    var userChart = new Chart(ctxUser, {
        type: 'line',
        data: {
            labels: userData.months,
            datasets: [{
                label: 'Total Users',
                data: userData.userCounts,
                borderColor: 'rgba(54, 162, 235, 1)',
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush