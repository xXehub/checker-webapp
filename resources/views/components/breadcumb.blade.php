<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @php
                                $segments = request()->segments();
                                $currentUrl = url('/');
                                $isLast = false;
                            @endphp
                            
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            
                            @foreach($segments as $key => $segment)
                                @php
                                    $currentUrl .= '/'.$segment;
                                    $isLast = ($key === count($segments) - 1);
                                    
                                    // Format segment for display (convert slug to title)
                                    $segmentTitle = ucfirst(str_replace('-', ' ', $segment));
                                    
                                    // Special case handling for known routes
                                    if ($segment === 'kurir' && isset($segments[$key+1]) && $segments[$key+1] === 'track') {
                                        continue; // Skip "kurir" segment when it's followed by "track"
                                    } elseif ($segment === 'track' && isset($segments[$key-1]) && $segments[$key-1] === 'kurir') {
                                        $segmentTitle = 'Lacak Pengiriman';
                                    } elseif ($segment === 'kurir') {
                                        $segmentTitle = 'Pengiriman';
                                    }
                                @endphp
                                
                                @if($isLast)
                                    <li class="breadcrumb-item text-primary fw-bold" aria-current="page">{{ $segmentTitle }}</li>
                                @else
                                    <li class="breadcrumb-item">
                                        <a href="{{ $currentUrl }}">{{ $segmentTitle }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>