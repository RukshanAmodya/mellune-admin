@extends('include.app')
@section('header')
<script src="{{ asset('asset/script/index.js') }}"></script>
@endsection

@section('content') 
<div class="omnia-dashboard-container">
    
    <!-- Row 1: Environmental Quality Index Style Stat Cards (Omnia 4-column Grid) -->
    <div class="row g-4 mb-4">
        <!-- 1. Wallpapers Card (Blue) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="omnia-eq-card">
                <div class="omnia-eq-main">
                    <div class="omnia-eq-info">
                        <span class="omnia-eq-title">Total Wallpapers</span>
                        <div class="omnia-eq-value-wrap">
                            <span class="omnia-eq-value">{{ $allWallpapers }}</span>
                            <span class="omnia-eq-denom">/{{ $wallpapers }} Static</span>
                        </div>
                        <div class="omnia-eq-trend text-emerald">
                            <span>↖</span>
                            <span>{{ $allWallpapers > 0 ? 'Active' : 'Empty' }}</span>
                            <span class="text-muted-eq">cloud library</span>
                        </div>
                    </div>
                    <div class="omnia-eq-mini-bars">
                        <span class="eq-bar bar-blue" style="height: 45%;"></span>
                        <span class="eq-bar bar-gray" style="height: 65%;"></span>
                        <span class="eq-bar bar-blue" style="height: 55%;"></span>
                        <span class="eq-bar bar-gray" style="height: 90%;"></span>
                        <span class="eq-bar bar-blue active" style="height: 75%;"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Live Wallpapers (Green) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="omnia-eq-card">
                <div class="omnia-eq-main">
                    <div class="omnia-eq-info">
                        <span class="omnia-eq-title">Live Wallpapers</span>
                        <div class="omnia-eq-value-wrap">
                            <span class="omnia-eq-value">{{ $liveWallpapers }}</span>
                            <span class="omnia-eq-denom">Videos</span>
                        </div>
                        <div class="omnia-eq-trend text-emerald">
                            <span>↖</span>
                            <span>{{ $liveWallpapers }} Live</span>
                            <span class="text-muted-eq">interactive video engine</span>
                        </div>
                    </div>
                    <div class="omnia-eq-mini-bars">
                        <span class="eq-bar bar-green" style="height: 40%;"></span>
                        <span class="eq-bar bar-gray" style="height: 70%;"></span>
                        <span class="eq-bar bar-green" style="height: 85%;"></span>
                        <span class="eq-bar bar-gray" style="height: 50%;"></span>
                        <span class="eq-bar bar-green active" style="height: 95%;"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Categories (Purple / Blue) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="omnia-eq-card">
                <div class="omnia-eq-main">
                    <div class="omnia-eq-info">
                        <span class="omnia-eq-title">Categories</span>
                        <div class="omnia-eq-value-wrap">
                            <span class="omnia-eq-value">{{ $allCategories }}</span>
                            <span class="omnia-eq-denom">/{{ $category }} Std</span>
                        </div>
                        <div class="omnia-eq-trend text-emerald">
                            <span>↖</span>
                            <span>{{ $liveCategory }} Live Cats</span>
                            <span class="text-muted-eq">tagged collections</span>
                        </div>
                    </div>
                    <div class="omnia-eq-mini-bars">
                        <span class="eq-bar bar-purple" style="height: 50%;"></span>
                        <span class="eq-bar bar-gray" style="height: 60%;"></span>
                        <span class="eq-bar bar-purple" style="height: 40%;"></span>
                        <span class="eq-bar bar-gray" style="height: 75%;"></span>
                        <span class="eq-bar bar-purple active" style="height: 65%;"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Monetization Access Ratio (Coral / Red) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="omnia-eq-card">
                <div class="omnia-eq-main">
                    <div class="omnia-eq-info">
                        <span class="omnia-eq-title">Premium vs Free</span>
                        <div class="omnia-eq-value-wrap">
                            <span class="omnia-eq-value">{{ $premiumWallpapers }}</span>
                            <span class="omnia-eq-denom">/{{ $freeWallpapers }} Free</span>
                        </div>
                        <div class="omnia-eq-trend {{ $premiumWallpapers > 0 ? 'text-emerald' : 'text-rose' }}">
                            <span>{{ $premiumWallpapers > 0 ? '↖' : '↘' }}</span>
                            <span>{{ $allWallpapers > 0 ? round(($premiumWallpapers / $allWallpapers) * 100) : 0 }}% Locked</span>
                            <span class="text-muted-eq">monetization</span>
                        </div>
                    </div>
                    <div class="omnia-eq-mini-bars">
                        <span class="eq-bar bar-coral" style="height: 35%;"></span>
                        <span class="eq-bar bar-gray" style="height: 55%;"></span>
                        <span class="eq-bar bar-coral" style="height: 65%;"></span>
                        <span class="eq-bar bar-gray" style="height: 45%;"></span>
                        <span class="eq-bar bar-coral active" style="height: 80%;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2: Performance Chart & Content Distribution Arc (Omnia PerformanceOverviewChart) -->
    <div class="row g-4 mb-4">
        <!-- Performance Overview Big Chart Card -->
        <div class="col-12 col-lg-8">
            <div class="omnia-white-card h-100">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="omnia-card-title">Library Overview</h2>
                        <p class="omnia-card-subtitle">Distribution of static and live multimedia assets</p>
                    </div>
                    <div class="omnia-badge-pill">
                        <span class="dot-blue"></span> Live Cloud Data
                    </div>
                </div>

                <!-- Custom Styled Interactive Visual Bars (Matching Omnia Performance Bar Graph) -->
                <div class="omnia-chart-visual-wrap">
                    <div class="omnia-y-axis">
                        <span>100%</span>
                        <span>75%</span>
                        <span>50%</span>
                        <span>25%</span>
                        <span>0%</span>
                    </div>
                    <div class="omnia-bars-grid">
                        @php
                            $days = [
                                ['label' => 'Static Wallpapers', 'val' => $wallpapers, 'max' => max($allWallpapers, 10), 'color' => 'blue'],
                                ['label' => 'Live Wallpapers', 'val' => $liveWallpapers, 'max' => max($allWallpapers, 10), 'color' => 'green'],
                                ['label' => 'Standard Cats', 'val' => $category, 'max' => max($allCategories, 10), 'color' => 'purple'],
                                ['label' => 'Live Categories', 'val' => $liveCategory, 'max' => max($allCategories, 10), 'color' => 'purple'],
                                ['label' => 'Free Content', 'val' => $freeWallpapers, 'max' => max($allWallpapers, 10), 'color' => 'coral'],
                                ['label' => 'Premium Content', 'val' => $premiumWallpapers, 'max' => max($allWallpapers, 10), 'color' => 'blue'],
                            ];
                        @endphp

                        @foreach($days as $idx => $d)
                            @php
                                $fillPct = min(100, max(15, round(($d['val'] / $d['max']) * 100)));
                            @endphp
                            <div class="omnia-bar-col">
                                <div class="omnia-bar-bg" title="{{ $d['label'] }}: {{ $d['val'] }}">
                                    <div class="omnia-bar-fill fill-{{ $d['color'] }}" style="height: {{ $fillPct }}%;">
                                        <span class="omnia-bar-tooltip">{{ $d['val'] }}</span>
                                    </div>
                                </div>
                                <span class="omnia-bar-label">{{ $d['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Content Overview Card (Matching Omnia CampaignOverviewCard) -->
        <div class="col-12 col-lg-4">
            <div class="omnia-white-card h-100 d-flex flex-column justify-content-between">
                <div>
                    <h2 class="omnia-card-title">Content Ratio</h2>
                    <p class="omnia-card-subtitle">Engine storage breakdown</p>
                </div>

                <!-- Circular Visual Gauge -->
                <div class="omnia-gauge-wrap text-center my-4">
                    <div class="omnia-gauge-circle">
                        <div class="omnia-gauge-inner">
                            <span class="gauge-number">{{ $allWallpapers }}</span>
                            <span class="gauge-label">Total Assets</span>
                        </div>
                    </div>
                </div>

                <!-- Distribution Metrics List -->
                <div class="omnia-meta-list">
                    <div class="omnia-meta-item">
                        <div class="d-flex align-items-center gap-2">
                            <span class="legend-dot bg-blue"></span>
                            <span class="meta-name">Static Wallpapers</span>
                        </div>
                        <span class="meta-val">{{ $wallpapers }} ({{ $allWallpapers > 0 ? round(($wallpapers / $allWallpapers) * 100) : 0 }}%)</span>
                    </div>
                    <div class="omnia-meta-item">
                        <div class="d-flex align-items-center gap-2">
                            <span class="legend-dot bg-green"></span>
                            <span class="meta-name">Live Video Wallpapers</span>
                        </div>
                        <span class="meta-val">{{ $liveWallpapers }} ({{ $allWallpapers > 0 ? round(($liveWallpapers / $allWallpapers) * 100) : 0 }}%)</span>
                    </div>
                    <div class="omnia-meta-item">
                        <div class="d-flex align-items-center gap-2">
                            <span class="legend-dot bg-coral"></span>
                            <span class="meta-name">Unlocked Free Content</span>
                        </div>
                        <span class="meta-val">{{ $freeWallpapers }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 3: Recent Wallpapers & Collections (Omnia Table Component) -->
    <div class="row g-4">
        <!-- Recent Wallpapers Table Card -->
        <div class="col-12 col-lg-8">
            <div class="omnia-white-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h2 class="omnia-card-title">Recent Wallpapers</h2>
                        <p class="omnia-card-subtitle">Latest items added to the platform</p>
                    </div>
                    <a href="{{ route('wallpaper') }}" class="omnia-action-link">View All →</a>
                </div>

                <div class="table-responsive">
                    <table class="table omnia-table align-middle">
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Access</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentWallpapers as $wp)
                                <tr>
                                    <td>
                                        <div class="omnia-thumb-wrapper">
                                            @if($wp->thumbnail)
                                                <img src="{{ asset('storage/' . $wp->thumbnail) }}" alt="Wallpaper" class="omnia-thumb-img" onerror="this.src='{{ asset('asset/img/Mellune-Logo.png') }}'">
                                            @else
                                                <div class="omnia-thumb-placeholder">
                                                    <i data-feather="image"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if($wp->wallpaper_type == 1)
                                            <span class="omnia-status-badge badge-green">Live Video</span>
                                        @else
                                            <span class="omnia-status-badge badge-blue">Static</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-slate-800">{{ $wp->category->name ?? 'Uncategorized' }}</span>
                                    </td>
                                    <td>
                                        @if($wp->access_type == 1)
                                            <span class="omnia-badge-pill-sm pill-coral">Premium</span>
                                        @else
                                            <span class="omnia-badge-pill-sm pill-green">Free</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('wallpaper') }}" class="btn-table-action" title="Edit">
                                            <i data-feather="external-link"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        No wallpapers uploaded yet. <a href="{{ route('wallpaper') }}" class="text-blue">Add first wallpaper</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Collections & Quick Links -->
        <div class="col-12 col-lg-4">
            <div class="omnia-white-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h2 class="omnia-card-title">Top Categories</h2>
                        <p class="omnia-card-subtitle">Active collections</p>
                    </div>
                    <a href="{{ route('categories') }}" class="omnia-action-link">Manage →</a>
                </div>

                <div class="omnia-categories-list">
                    @forelse($recentCategories as $cat)
                        <div class="omnia-cat-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="omnia-cat-icon">
                                    <i data-feather="folder"></i>
                                </div>
                                <div>
                                    <div class="omnia-cat-name">{{ $cat->name }}</div>
                                    <div class="omnia-cat-count">{{ $cat->wallpapers_count ?? 0 }} Wallpapers</div>
                                </div>
                            </div>
                            <span class="omnia-cat-badge">{{ $cat->type == 1 ? 'Live' : 'Static' }}</span>
                        </div>
                    @empty
                        <div class="text-center py-4 text-muted">No categories created yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>
@endsection