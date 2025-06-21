const DATA_COUNT = 7;
const FIXED_COLORS = ['#FF0000', '#1877F2', '#FF9900']; // đỏ, xanh dương, cam

function randomNumbers(count, min, max) {
  return Array.from({ length: count }, () => Math.floor(Math.random() * (max - min + 1)) + min);
}

function getMonthLabels(count) {
  const base = ['YouTube', 'Facebook', 'Amazon'];
  return base.slice(0, count); // lấy đúng số lượng
}

function hexToRgba(hex, alpha) {
  const r = parseInt(hex.slice(1, 3), 16);
  const g = parseInt(hex.slice(3, 5), 16);
  const b = parseInt(hex.slice(5, 7), 16);
  return `rgba(${r}, ${g}, ${b}, ${alpha})`;
}

function colorize(opaque, hover, ctx) {
  const idx = ctx.dataIndex ?? 0;
  const baseColor = FIXED_COLORS[idx % FIXED_COLORS.length];
  const opacity = hover ? 0.8 : 0.6;
  return opaque ? baseColor : hexToRgba(baseColor, opacity);
}

function hoverColorize(ctx) {
  return colorize(false, true, ctx);
}

function generateDataset(type) {
  const data = randomNumbers(DATA_COUNT, 0, 100);
  const dataset = {
    data,
    label: type === 'bar' ? 'Earning' : undefined
  };

  if (type === 'bar') {
    dataset.backgroundColor = data.map((_, i) => FIXED_COLORS[i % FIXED_COLORS.length]);
    dataset.hoverBackgroundColor = data.map((_, i) => hexToRgba(FIXED_COLORS[i % FIXED_COLORS.length], 0.8));
  }

  return {
    labels: getMonthLabels(DATA_COUNT),
    datasets: [dataset]
  };
}

function createChart(id, type) {
  const ctx = document.getElementById(id);
  if (!ctx) return;

  const config = {
    type,
    data: generateDataset(type),
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: true,
          position: 'top',
          labels: {
            color: '#333',
            font: {
              size: 14,
              weight: 'bold'
            }
          }
        },
        tooltip: {
          enabled: true
        }
      },
      elements: type === 'polarArea' ? {
        arc: {
          backgroundColor: colorize.bind(null, false, false),
          hoverBackgroundColor: hoverColorize
        }
      } : {}
    }
  };

  return new Chart(ctx, config);
}

const chart1 = createChart('chart-1', 'polarArea');
const chart2 = createChart('chart-2', 'bar');
