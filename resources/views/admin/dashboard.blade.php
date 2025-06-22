@extends('admin.layouts.admin')

@section('title', 'Bảng điều khiển')


@section('styles')
      <link rel="stylesheet" href="{{ asset('admin/css/dashboard.css') }}">
@endsection

@section('content')

<style>
    :root {
      --primary-gradient: linear-gradient(135deg,#a4508b,#5f0a87 60%);
      --secondary-gradient: linear-gradient(135deg,#ff8c68,#ff3c6a 80%);
      --user-gradient: linear-gradient(135deg,#43cea2,#185a9d 80%);
      --doc-gradient: linear-gradient(135deg,#f7971e,#ffd200 80%);
      --white: #fff;
      --shadow: 0 4px 16px 0 rgba(0,0,0,0.12),0 1.5px 4px 0 rgba(0,0,0,0.07);
      --radius: 20px;
    }
    
    .admin-dashboard {
      padding: 32px 0 0 0;
      max-width: 1200px;
      margin: 0 auto;
      margin-left: 18px; /* Dịch dashboard sang phải */
    }
    .dashboard-section {
      margin-bottom: 38px;
    }
    .section-title {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 18px;
      color: #222;
      letter-spacing: 1px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .section-title i {
      font-size: 1.1em;
      color: #5f0a87;
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .dashboard-cards {
      display: flex;
      gap: 32px;
      flex-wrap: wrap;
      justify-content: flex-start;
    }
    
    .dashboard-card {
      background: var(--white);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px 32px 28px 32px;
      min-width: 220px;
      flex: 1 1 220px;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      overflow: hidden;
      transition: transform 0.4s cubic-bezier(.5,1.7,.36,1), box-shadow 0.4s;
      z-index: 1;
    }
    .dashboard-card::before {
      content: "";
      position: absolute;
      width: 180%;
      height: 160%;
      top: -50%;
      left: -40%;
      background: var(--primary-gradient);
      opacity: 0.14;
      z-index: 0;
      transition: opacity 0.4s;
      pointer-events: none;
    }
    .dashboard-card[data-type="pending"]::before {
      background: var(--secondary-gradient);
    }
    .dashboard-card[data-type="today"]::before {
      background: var(--doc-gradient);
    }
    .dashboard-card[data-type="user"]::before {
      background: var(--user-gradient);
    }
    .dashboard-card[data-type="newuser"]::before {
      background: linear-gradient(135deg,#4ecca3,#2e86de 80%);
    }
    .dashboard-card:hover {
      transform: translateY(-10px) scale(1.025) rotate(-1deg);
      box-shadow: 0 8px 30px 0 rgba(112,13,112,0.18),0 2px 8px 0 rgba(0,0,0,0.13);
    }
    .dashboard-card .icon-wrap {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 54px;
      width: 54px;
      margin-bottom: 12px;
      border-radius: 50%;
      background: var(--primary-gradient);
      color: #fff;
      font-size: 2rem;
      box-shadow: 0 4px 12px rgba(164,80,139,0.07);
      z-index: 3;
      transition: background 0.4s;
      position: relative;
    }
    .dashboard-card[data-type="pending"] .icon-wrap {
      background: var(--secondary-gradient);
    }
    .dashboard-card[data-type="today"] .icon-wrap {
      background: var(--doc-gradient);
    }
    .dashboard-card[data-type="user"] .icon-wrap {
      background: var(--user-gradient);
    }
    .dashboard-card[data-type="newuser"] .icon-wrap {
      background: linear-gradient(135deg,#4ecca3,#2e86de 80%);
    }
    .dashboard-card:hover .icon-wrap {
      filter: brightness(1.1) drop-shadow(0 1px 7px rgba(253,76,176,0.18));
    }
    .dashboard-card .number {
      font-size: 2.8rem;
      font-weight: bold;
      color: #5f0a87;
      padding: 8px 0 5px 0;
      letter-spacing: 1px;
      position: relative;
      z-index: 3; /* Đảm bảo số luôn ở trên nền mờ */
      min-height: 48px;
      transition: color 0.3s;
      background: none;
      -webkit-background-clip: unset;
      -webkit-text-fill-color: unset;
    }
    .dashboard-card .number::after {
      content: "";
      display: block;
      position: absolute;
      left: 50%; top: 50%;
      transform: translate(-50%,-50%) scale(0);
      width: 120%;
      height: 120%;
      border-radius: 50%;
      opacity: 0.28;
      z-index: 2;
      pointer-events: none;
      transition: transform 0.4s, opacity 0.4s;
    }
    .dashboard-card:hover .number::after {
      transform: translate(-50%,-50%) scale(1.15);
      opacity: 0.5;
    }
    .dashboard-card[data-type="approved"] .number::after { background: var(--primary-gradient);}
    .dashboard-card[data-type="pending"] .number::after { background: var(--secondary-gradient);}
    .dashboard-card[data-type="today"] .number::after { background: var(--doc-gradient);}
    .dashboard-card[data-type="user"] .number::after { background: var(--user-gradient);}
    .dashboard-card[data-type="newuser"] .number::after { background: linear-gradient(135deg,#4ecca3,#2e86de 80%);}
    .dashboard-card[data-type="pending"] .number { color: #ff3c6a; }
    .dashboard-card[data-type="today"] .number { color: #f7971e; }
    .dashboard-card[data-type="user"] .number { color: #185a9d; }
    .dashboard-card[data-type="newuser"] .number { color: #4ecca3; }
    .dashboard-card:hover .number {
      color: #fff;
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
 
    .dashboard-card .label {
      font-size: 1.1rem;
      color: #333;
      letter-spacing: 0.2px;
      z-index: 3;
      margin-top: 2px;
      font-weight: 500;
      transition: color 0.3s;
      position: relative;
    }
    .dashboard-card:hover .label { color: #fff; }
    /* Divider line between sections */
    .section-divider {
      width: 90%;
      height: 2px;
      margin: 28px auto 38px auto;
      border-radius: 1.5px;
      background: linear-gradient(90deg,#5f0a87 25%,#ff3c6a 75%);
      opacity: 0.15;
    }
    @media (max-width: 980px) {
      .dashboard-cards { gap: 18px; }
      .dashboard-card { min-width: 170px; padding: 22px 12px; }
      .admin-dashboard { margin-left: 8px;}
    }
    @media (max-width: 700px) {
      .dashboard-cards { flex-direction: column; gap: 18px; }
      .dashboard-card { min-width: unset; width: 100%; }
      .admin-dashboard { padding: 14px 2vw 0 2vw; margin-left: 0;}
    }
    </style>
    
    <!-- Font Awesome CDN for icons: -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    
    <div class="admin-dashboard">
      <div class="dashboard-section">
        <div class="section-title">
          <i class="fas fa-file-alt"></i> Thống kê doanh thu
        </div>
        <div class="dashboard-cards">
          <div class="dashboard-card" data-type="approved">
            <div class="icon-wrap"><i class="fas fa-check-circle"></i></div>
            <div class="number" data-count="{{ $productCount ?? 0 }}">{{ number_format($productCount ?? 0) }}</div>
            <div class="label">Đã đăng</div>
          </div>
          <div class="dashboard-card" data-type="pending">
            <div class="icon-wrap"><i class="fas fa-hourglass-half"></i></div>
            <div class="number" data-count="{{ $orderPending ?? 0 }}">{{ number_format($orderPending ?? 0) }}</div>
            <div class="label">Chờ duyệt</div>
          </div>
          <div class="dashboard-card" data-type="today">
            <div class="icon-wrap"><i class="fas fa-calendar-day"></i></div>
            <div class="number" data-count="{{ $orderToday ?? 0 }}">{{ number_format($orderToday ?? 0) }}</div>
            <div class="label">Mới hôm nay</div>
          </div>
        </div>
      </div>
      <div class="section-divider"></div>
      <div class="dashboard-section">
        <div class="section-title">
          <i class="fas fa-user-friends"></i> Thống kê người dùng
        </div>
        <div class="dashboard-cards">
          <div class="dashboard-card" data-type="user">
            <div class="icon-wrap"><i class="fas fa-users"></i></div>
            <div class="number" data-count="{{ $userCount ?? 0 }}">{{ number_format($userCount ?? 0) }}</div>
            <div class="label">Tổng hiện tại</div>
          </div>
          <div class="dashboard-card" data-type="newuser">
            <div class="icon-wrap"><i class="fas fa-user-plus"></i></div>
            <div class="number" data-count="{{ $newUserToday ?? 0 }}">{{ number_format($newUserToday ?? 0) }}</div>
            <div class="label">Mới hôm nay</div>
          </div>
        </div>
      </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      function animateCount(el, target, duration = 950) {
        let start = 0;
        let startTime = null;
        target = parseInt(target);
        if(isNaN(target)) return;
        function step(timestamp) {
          if (!startTime) startTime = timestamp;
          let progress = timestamp - startTime;
          let percent = Math.min(progress / duration, 1);
          let value = Math.floor(percent * (target - start) + start);
          el.textContent = value.toLocaleString();
          if (percent < 1) {
            requestAnimationFrame(step);
          } else {
            el.textContent = target.toLocaleString();
          }
        }
        requestAnimationFrame(step);
      }
      document.querySelectorAll('.dashboard-card .number').forEach(function(numEl) {
        let target = numEl.getAttribute('data-count');
        animateCount(numEl, target, 950 + Math.random()*400);
      });
    });
    </script>
@endsection