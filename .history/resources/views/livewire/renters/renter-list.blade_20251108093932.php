<div class="container-fluid py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-center align-items-center gap-4">
                <h2 class="display-5 fw-semibold text-dark mb-0">Available Rooms</h2>
                <div class="input-group" style="width: 300px;">
                    <span class="input-group-text" id="search-addon">
                        <svg class="bi" width="16" height="16" fill="currentColor">
                            <use xlink:href="#search"/>
                        </svg>
                    </span>
                    <input wire:model.live="searchQuery" type="search" class="form-control" placeholder="Search rooms..." aria-label="Search rooms" aria-describedby="search-addon">
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Filter State Indicator -->
            @if($filterType !== 'all')
                <div class="text-center mb-3">
                    <span class="badge bg-primary fs-6 px-3 py-2">Showing {{ $this->getFilterLabel() }}</span>
                </div>
            @endif

            <!-- Filter Tabs -->
            <ul class="nav nav-tabs justify-content-center mb-4" id="roomFilterTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button wire:click="$set('filterType', 'all')" class="nav-link {{ $filterType === 'all' ? 'active' : '' }}" id="all-tab" type="button" role="tab" aria-controls="all" aria-selected="{{ $filterType === 'all' ? 'true' : 'false' }}">All Rooms</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button wire:click="$set('filterType', 'shared')" class="nav-link {{ $filterType === 'shared' ? 'active' : '' }}" id="shared-tab" type="button" role="tab" aria-controls="shared" aria-selected="{{ $filterType === 'shared' ? 'true' : 'false' }}">Shared</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button wire:click="$set('filterType', 'private')" class="nav-link {{ $filterType === 'private' ? 'active' : '' }}" id="private-tab" type="button" role="tab" aria-controls="private" aria-selected="{{ $filterType === 'private' ? 'true' : 'false' }}">Private</button>
                </li>
            </ul>

            <!-- Room Grid -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @foreach($rooms as $room)
                <div class="col">
                    <div class="card h-100 shadow-sm transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <!-- Room Image -->
                        <div class="position-relative">
                            <img src="{{ asset('images/rooms/' . $this->getRoomImage($loop->index)) }}"
                                 class="card-img-top" alt="Room {{ $room->room_number }}" style="height: 200px; object-fit: cover;">
                            <button wire:click="toggleFavorite({{ $room->id }})"
                                    class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle transition-all duration-200 {{ in_array($room->id, $favorites) ? 'text-danger' : 'text-muted' }} hover:scale-110">
                                <svg class="bi" width="16" height="16" fill="{{ in_array($room->id, $favorites) ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2">
                                    <use xlink:href="#heart"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Room Details -->
                        <div class="card-body d-flex flex-column" style="min-height: 220px;">
                            <!-- Room Name and Rating -->
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-2 fw-bold">Room {{ $room->room_number }}</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center me-3">
                                            <svg class="bi text-warning me-1" width="16" height="16" fill="currentColor">
                                                <use xlink:href="#star-fill"/>
                                            </svg>
                                            <span class="fw-semibold text-dark">4.7</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Prominent Price -->
                            <div class="mb-3">
                                <div class="d-flex align-items-baseline">
                                    <span class="display-6 fw-bold text-primary me-2">₱{{ number_format($room->price, 0) }}</span>
                                    <span class="text-muted fw-medium">per month</span>
                                </div>
                                <small class="text-muted">Capacity: {{ $room->capacity }}</small>
                            </div>

                            <!-- Amenities -->
                            <div class="mb-3">
                                <span class="badge bg-light text-dark me-1 border">{{ $room->capacity > 1 ? 'Shared Room' : 'Private Room' }}</span>
                                <span class="badge bg-light text-dark me-1 border">WiFi</span>
                                <span class="badge bg-light text-dark border">Air Conditioning</span>
                            </div>

                            <!-- Action Button -->
                            <button class="btn btn-primary w-100 mt-auto fw-semibold">View Details</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($rooms->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $rooms->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Custom CSS for hover effects -->
    <style>
        .transition-all {
            transition: all 0.3s ease;
        }
        .duration-300 {
            transition-duration: 300ms;
        }
        .duration-200 {
            transition-duration: 200ms;
        }
        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        }
        .hover\:-translate-y-1:hover {
            transform: translateY(-4px);
        }
        .hover\:scale-110:hover {
            transform: scale(1.1);
        }
        .text-danger {
            color: #dc3545 !important;
        }
    </style>

    <!-- Bootstrap Icons SVG symbols for icons -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </symbol>
        <symbol id="heart" viewBox="0 0 16 16">
            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </symbol>
        <symbol id="star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
        </symbol>
    </svg>
</div>
