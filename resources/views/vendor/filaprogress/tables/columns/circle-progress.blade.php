@php
  $total = $getState()['total']; // Total semester yang tersedia (8)
  $progress = $getState()['progress']; // Semester yang sudah diisi berdasarkan data KinerjaSemester
  $progress = $total > 0 ? $progress : 0; // Mengatur progress jika total semester lebih besar dari 0

  // Tentukan warna berdasarkan progress
  if ($progress == $total) {
      $progressColor = '#2980b9'; // 100% progress
  } elseif ($progress > $total / 2) {
      $progressColor = '#27ae60'; // Lebih dari 50%
  } elseif ($progress > $total / 4) {
      $progressColor = '#f39c12'; // Lebih dari 25%
  } else {
      $progressColor = '#e74c3c'; // Kurang dari 25%
  }

  // Format display progress dalam bentuk x/8
  $displayProgress = "{$progress}/{$total}";
@endphp

<div class="progress-circle"
  style="
    background: conic-gradient(
        {{ $progressColor }} {{ ($progress / $total) * 100 }}%, 
        #e5e7eb {{ ($progress / $total) * 100 }}%
    );">
  @if ($column instanceof \IbrahimBougaoua\FilaProgress\Tables\Columns\CircleProgress && $column->getCanShow())
    <small>{{ $displayProgress }}</small> <!-- Menampilkan progress dalam format x/8 -->
  @endif
</div>

<style>
  .progress-circle {
    position: relative;
    width: 55px;
    height: 55px;
    margin: 10px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: #fff;
    font-weight: 600;
  }

  .progress-circle::before {
    content: '';
    position: absolute;
    width: 70%;
    height: 70%;
    background-color: #fff;
    border-radius: 50%;
    z-index: 1;
  }

  .progress-circle small {
    position: absolute;
    color: black;
    font-size: 8pt;
    z-index: 2;
  }
</style>
