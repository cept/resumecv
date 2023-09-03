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

    {{-- <div class="container"> --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-bg-info">
                        Resume CV Generator Statistics
                    </div>
                    <div class="card-body">
                        <canvas id="combinedChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    {{-- </div> --}}

@endsection

@push('scripts')
<script>
    let combinedData = @json($combinedData);

    let ctxCombined = document.getElementById('combinedChart').getContext('2d');
    let combinedChart = new Chart(ctxCombined, {
        type: 'line',
        data: {
            labels: combinedData.months,
            datasets: [
                {
                    label: 'Total Users',
                    data: combinedData.userCounts,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    fill: false
                },
                {
                    label: 'Total Resumes',
                    data: combinedData.resumeCounts,
                    borderColor: 'rgba(0, 255, 0, 0.6)',
                    fill: false
                }
            ]
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