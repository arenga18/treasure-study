@extends('layouts.app')

@section('title', 'Grafik Lulusan | Labschool Cirendeu')

@section('content')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

  <div class="mt-28">
    <section class="py-14 bg-gray-100">
      <div class="container mx-auto px-4">
        <h1 id="judul" class="text-center font-bold text-2xl md:text-4xl mb-14 lg:mb-18 text-blue-600">Grafik Lulusan
          SMA Labschool Cirendeu</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach ($groupedData as $tahun => $dataPerTahun)
              <div class="flex justify-center items-center flex-col bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-center font-bold text-xl md:text-2xl mb-6">
                  Lulusan Angkatan {{ $dataPerTahun->pluck('nama_angkatan')->first() }} SMA Labschool
                  {{ $tahun }}
                </h3>
                <canvas id="chart-{{ $tahun }}" class="w-[200px] h-[200px] md:w-[300px] md:h-[300px]"></canvas>
              </div>
            @endforeach

          </div>

      </div>
    </section>
  </div>

  <script>
    @foreach ($groupedData as $tahun => $dataPerTahun)
      new Chart(document.getElementById('chart-{{ $tahun }}'), {
        type: 'pie',
        data: {
          labels: {!! json_encode($dataPerTahun->pluck('kategori_pt')) !!},
          datasets: [{
            label: 'Jumlah Alumni',
            data: {!! json_encode($dataPerTahun->pluck('jumlah')) !!},
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
            borderWidth: 1
          }]
        },
        options: {
          responsive: false,
          plugins: {
            legend: {
              position: 'bottom'
            },
            datalabels: {
              color: '#fff',
              formatter: (value, context) => {
                const sum = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                const percentage = (value * 100 / sum).toFixed(1) + '%';
                return percentage;
              },
              anchor: 'center', // Posisikan di tengah irisan
              align: 'center',
              font: {
                weight: 'bold',
                size: 14
              }
            }
          }
        },
        plugins: [ChartDataLabels]
      });
    @endforeach
  </script>


@endsection
